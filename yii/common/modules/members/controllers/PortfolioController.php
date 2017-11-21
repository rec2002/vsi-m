<?php

namespace common\modules\members\controllers;
use common\modules\members\models\PortfolioImages;
use Yii;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\ImageInterface;
use common\modules\members\models\Portfolio;
use yii\web\Request;

class PortfolioController extends \common\modules\members\controllers\DefaultController
{
    public function actionIndex()
    {
        return 1;
    }


    public function actionDetail($id)
    {
        $model = Portfolio::find()->where(['id'=>$id])->one();
        $images = PortfolioImages::find()->select(['image'])->where(['portfolio_id'=>$model->id])->orderBy(['created_at'=>SORT_ASC, 'id'=>SORT_ASC])->all();
        return $this->renderAjax('portfolio-detail', ['model'=> $model, 'images'=> $images]);
    }




    public function actionList()
    {

        $items =  Portfolio::findBySql('SELECT  p.id, p.member,	p.title, p.description,	p.cost,	p.work_date, 
                                  (SELECT i.image FROM `member_portfolio_images` i WHERE i.portfolio_id = p.id ORDER BY i.created_at ASC, i.id ASC LIMIT 1) as image	 
                                  FROM `member_porfolio` p 
                                  WHERE p.member="'.Yii::$app->user->identity->getId().'" 
                                    ORDER BY p.created_at DESC')->asArray()->all();

        return $this->render('porfolio-list-edit', ['items'=> $items]);
    }

    /**
     * Creates a new Dictjobs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        ini_set('memory_limit', '-1');
        $model = new Portfolio();

        if ($model->load(Yii::$app->request->post())) {
            $model->work_date = date("Y-m-d", strtotime(Yii::$app->request->post('Portfolio')['work_date']));

            $model->member = Yii::$app->user->identity->getId();
            $model->save();
            $id = Yii::$app->db->getLastInsertID();
            $model->image = UploadedFile::getInstances($model, 'image');
            if ($model->image) {
                $dir = Yii::getAlias('@type_images').'/members/portfolio/';
                foreach ($model->image as $image) {
                    $portfolioImages = new PortfolioImages();
                    $portfolioImages->portfolio_id = $id;
                    $filename = strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$image->extension;
                    $image->saveAs($dir.$filename);
                    Image::thumbnail($dir.$filename, 409, 220)->save($dir.'thmb/'.$filename, ['quality' => 90]);
                    Image::thumbnail($dir.$filename, 150, 150)->save($dir.'thmb150/'.$filename, ['quality' => 90]);
                    Image::thumbnail($dir.$filename, 208, 156)->save($dir.'thmb200/'.$filename, ['quality' => 90]);
                    Image::thumbnail($dir.$filename, 945, 600, ImageInterface::THUMBNAIL_INSET)->save($dir.$filename, ['quality' => 90]);
                    $portfolioImages->image = $filename;

                    $portfolioImages->save(false);
                }
            }


            $request = new Request(['url' => parse_url(Yii::$app->request->referrer, PHP_URL_PATH)]);
            $url = Yii::$app->urlManager->parseRequest($request)[0];

            if (strpos($url,'/member/profile')) {
                return $this->redirect(['/members/member/profile/#projects']);
            } else return $this->redirect(['/members/portfolio/list/#'.$id]);


        } else {
            return $this->renderAjax('portfolio-form', [
                'model' => $model, 'images'=> array()
            ]);
        }
    }


    public function actionUpdate($id)
    {

        $model = Portfolio::find()->where(['member' => Yii::$app->user->identity->getId(), 'id'=>$id])->one();
        $images = PortfolioImages::find()->select(['id', 'image'])->where(['portfolio_id'=>$model->id])->orderBy(['created_at'=>SORT_ASC, 'id'=>SORT_ASC])->all();

        if ($model->load(Yii::$app->request->post())) {

            $model->work_date = date("Y-m-d", strtotime(Yii::$app->request->post('Portfolio')['work_date']));
            $model->updated_at = date("Y-m-d H:i:s");
            $model->save();
            $model->images_uploaded = array();
            if (isset(Yii::$app->request->post('Portfolio')['images_uploaded']))  $model->images_uploaded = Yii::$app->request->post('Portfolio')['images_uploaded'];

            $dir = Yii::getAlias('@type_images').'/members/portfolio/';
            if (sizeof($images)) foreach ($images as $val) {
                if (!in_array( $val['id'], $model->images_uploaded)) {
                    if (file_exists($dir.'thmb/'.$val['image']))  @unlink($dir.'thmb/'.$val['image']);
                    if (file_exists($dir.'thmb150/'.$val['image'])) @unlink($dir.'thmb150/'.$val['image']);
                    if (file_exists($dir.'thmb200/'.$val['image'])) @unlink($dir.'thmb200/'.$val['image']);
                    if (file_exists($dir.$val['image'])) @unlink($dir.$val['image']);
                    Yii::$app->db->createCommand()->delete('member_portfolio_images', ['id' => $val['id']])->execute();
                }
            }
            $model->image = UploadedFile::getInstances($model, 'image');
            if ($model->image) {
                foreach ($model->image as $image) {

                    $portfolioImages = new PortfolioImages();
                    $portfolioImages->portfolio_id = $model->id;
                    $filename = strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$image->extension;
                    $image->saveAs($dir.$filename);
                    Image::thumbnail($dir.$filename, 409, 220)->save($dir.'thmb/'.$filename, ['quality' => 90]);
                    Image::thumbnail($dir.$filename, 150, 150)->save($dir.'thmb150/'.$filename, ['quality' => 90]);
                    Image::thumbnail($dir.$filename, 208, 156)->save($dir.'thmb200/'.$filename, ['quality' => 90]);
                    Image::thumbnail($dir.$filename, 945, 600, ImageInterface::THUMBNAIL_INSET)->save($dir.$filename, ['quality' => 90]);
                    $portfolioImages->image = $filename;
                    $portfolioImages->save(false);
                }
            }


            $request = new Request(['url' => parse_url(Yii::$app->request->referrer, PHP_URL_PATH)]);
            $url = Yii::$app->urlManager->parseRequest($request)[0];

            if (strpos($url,'/member/profile')) {
                return $this->redirect(['/members/member/profile/#projects']);
            } else return $this->redirect(['/members/portfolio/list/#'.$model->id]);

        } else {
            return $this->renderAjax('portfolio-form', [
                'model' => $model, 'images'=> $images
            ]);
        }


    }


    public function actionValidation($id=0)
    {
        if ($id>0) {
            $model = Portfolio::find()->where(['member' => Yii::$app->user->identity->getId(), 'id' => $id])->one();
            $model->image = PortfolioImages::find()->select(['id'])->where(['portfolio_id'=>$model->id])->orderBy(['created_at'=>SORT_ASC, 'id'=>SORT_ASC])->all();
        } else {
            $model = new Portfolio();
            $model->image = array();
        }

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
    }

    public function actionDelete($id)
    {

        $images =  Portfolio::findBySql('SELECT i.id, i.image FROM `member_portfolio_images` i
                                              LEFT JOIN member_porfolio p ON p.id= i.portfolio_id
                                              WHERE p.member="'.Yii::$app->user->identity->getId().'" AND  p.id = "'.$id.'"')->asArray()->all();

        $dir = Yii::getAlias('@type_images').'/members/portfolio/';
        if (sizeof($images)) foreach ($images as $image) {
            if (file_exists($dir.'thmb/'.$image['image']))  @unlink($dir.'thmb/'.$image['image']);
            if (file_exists($dir.'thmb150/'.$image['image'])) @unlink($dir.'thmb150/'.$image['image']);
            if (file_exists($dir.'thmb200/'.$image['image'])) @unlink($dir.'thmb200/'.$image['image']);
            if (file_exists($dir.$image['image'])) @unlink($dir.$image['image']);

        }
        Yii::$app->db->createCommand()->delete('member_porfolio', ['id' => $id, 'member' => Yii::$app->user->identity->getId()])->execute();

        $request = new Request(['url' => parse_url(Yii::$app->request->referrer, PHP_URL_PATH)]);
        $url = Yii::$app->urlManager->parseRequest($request)[0];

        if (strpos($url,'/member/profile')) {
            return $this->redirect(['/members/member/profile/#projects']);
        } else return $this->redirect(['/members/portfolio/list/']);

    }


}
