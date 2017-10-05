<?php

namespace backend\controllers;

use backend\models\Dictcategory;
use Yii;
use backend\models\Dictypes;
use backend\models\DictypesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * DictypesController implements the CRUD actions for Dictypes model.
 */
class DictypesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Dictypes models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new DictypesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



        $dataProvider->setSort([
            'defaultOrder' => ['id' => SORT_DESC]
        ]);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new Dictypes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dictypes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Dictypes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Dictypes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dictypes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dictypes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dictypes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionActive($id)
    {
        $model = $this->findModel($id);
        if ($model->active == 0) $model->active = 1;
        else $model->active = 0;

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model->updated_at = date("Y-m-d H:i:s");
        if ($model->save()) {
            $model->refresh();
            return json_encode(array('active'=> $model->active));
        } else {
            return json_encode(array('error'=> 1));
        }
    }

    public function actionValidation()
    {
        $model = new Dictcategory();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
    }

    public function actionDeleteimg($id)
    {
        $model = $this->findModel($id);
        $dir = Yii::getAlias('@type_images').'/types/';


        if (file_exists($dir.$model->image)) {
            @unlink($dir.$model->image);
        }

        $model->image = '';

        if ($model->save()) return true; else return false;
    }

}
