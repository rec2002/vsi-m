<?php

namespace common\modules\professionals\controllers;



use yii\web\Controller;
use Yii;
use yii\helpers\Url;
use common\modules\members\models\ProfSearch;
use common\modules\members\models\MemberEdit;
use common\modules\members\models\MemberTypes;
use common\modules\members\models\MemberPrices;
use common\modules\members\models\Portfolio;
use yii\data\SqlDataProvider;
use yii\helpers\ArrayHelper;


/**
 * Default controller for the `Professionals` module
 */
class DefaultController extends Controller
{

    public function actionIndex()
    {
        $settings = array('title'=>'', 'cat'=>'0', 'region'=>0);
        $breadcrumb[] =  ['label' => 'Головна сторінка', 'url' => ['/']];
        $breadcrumb[] =  ['label' => 'Каталог майстрів', 'url' => ['/members/professionals']];

        $param = [];
        if (!empty(Yii::$app->request->get('region'))) {
            $region =  Yii::$app->db->createCommand('SELECT id, name, url_tag FROM `dict_regions` WHERE `url_tag`="'.Yii::$app->request->get('region').'" ')->queryOne();
            if ($region['id']>0) {
                $settings['region'] = $region['id'];
                $settings['title'] = $region['name'];
                $param[':region'] = $region['id'];
                $breadcrumb[] =  ['label' => $region['name'], 'url' => Url::to(['/members/professionals/',  'region'=>$region['url_tag']])];
            }
        }

        if (!empty(Yii::$app->request->get('cat'))) {
            $cat =  Yii::$app->db->createCommand('SELECT id, name, url_tag FROM `dict_category` WHERE `url_tag`="'.Yii::$app->request->get('cat').'" AND active=1  AND types=1 ')->queryOne();

            if ($cat['id']>0) {
                $param[':type'] = $cat['id'];
                $settings['title'] = $cat['name'];
                $settings['cat'] = $cat['id'];
                $breadcrumb[] =  ['label' => $cat['name'], 'url' => Url::to(['/members/professionals/',  'cat'=>$cat['url_tag']])];
            }
        }



        if (@$cat['id']>0 && @$region['id']>0) {
            $settings['title'] =  $cat['name'].' - '.$region['name'];
            $breadcrumb[] =  ['label' => $cat['name'].' - '.$region['name'], 'url' => Url::to(['members/professionals/',  'cat'=>$cat['url_tag'] ,  'region'=>$region['url_tag']])];
        }


        $filter = array();
        if (sizeof($param)) foreach($param as $key=>$val){
            switch($key){
                case ':member':
                    $filter[] = ' m.id='.$key;
                    break;
                case ':region':
                    $filter[] = ' rm.region ='.$key;
                    break;
                case ':type':
                    $filter[] = ' mt.type ='.$key;
                    break;
            }
        }

        $filter[] = ' a.item_name = "majster"' ;


        $count = Yii::$app->db->createCommand('SELECT COUNT(DISTINCT(m.id)) FROM `members` m
                      LEFT JOIN `auth_assignment` a ON a.user_id = m.id
                      LEFT JOIN `member_regions` rm ON rm.member = m.id
                      LEFT JOIN `member_types` mt ON mt.member = m.id
                      '.((sizeof($filter)) ?  'WHERE '.implode(' AND ', $filter) : '').'  ', $param)->queryScalar();

        $provider = new SqlDataProvider([
            'sql' => 'SELECT m.id, m.first_name, m.last_name, m.surname, m.phone, m.avatar_image, m.place, r.name as region, m.forma, m.brygada, m.company, m.about, m.busy_to, m.budget_min, m.created_at 
                      FROM `members` m
                      LEFT JOIN `auth_assignment` a ON a.user_id = m.id
                      LEFT JOIN `dict_regions` r ON r.id = m.region
                      LEFT JOIN `member_regions` rm ON rm.member = m.id
                      LEFT JOIN `member_types` mt ON mt.member = m.id
                      
                      '.((sizeof($filter)) ?  'WHERE '.implode(' AND ', $filter) : '').' GROUP BY m.id ORDER BY m.created_at DESC',
            'params' => $param,
            'totalCount' => $count,
            'pagination' => ['pageSize' => 10, 'pageParam' => 'стр', 'pageSizeParam' => 'лім'],
        ]);

        $arr = array();
        foreach( $provider->models as $key => $val){
            $arr[$key] = $provider->models[$key];
            $arr[$key]['prices'] = Yii::$app->db->createCommand('SELECT d.name, d.job_unit, p.price FROM `member_prices` p
                                                                    LEFT JOIN `dict_category` d ON p.price_id = d.id AND d.types = 2
                                                                    WHERE p.member = "'. $arr[$key]['id'].'" AND d.active=1 LIMIT 3')->queryAll();


            $arr[$key]['portfolio'] = Yii::$app->db->createCommand('SELECT p.id, COUNT(i1.id) as counts, (SELECT i.image FROM `member_portfolio_images` i WHERE i.portfolio_id = p.id ORDER BY i.created_at ASC, i.id ASC LIMIT 1) as image 
                                                                        FROM `member_porfolio` p LEFT JOIN `member_portfolio_images` i1 ON i1.portfolio_id = p.id 
                                                                        WHERE p.member="'.$arr[$key]['id'].'" GROUP BY p.id ORDER BY p.created_at DESC LIMIT 4')->queryAll();


        }
        $provider->models =  $arr;

        $ProfSearch = new ProfSearch();
        return $this->render('prof-list', ['provider'=>$provider->getModels(), 'pagination'=>$provider->pagination, 'ProfSearch'=>$ProfSearch, 'breadcrumb'=>$breadcrumb, 'settings'=>$settings]);
    }



    public function actionProfile($id)
    {


        $member = MemberEdit::find()->where(['id' => $id])->one();
        $member->types = ArrayHelper::getColumn(MemberTypes::findBySql('SELECT type FROM member_types WHERE member="'.$id.'" ')->asArray()->all(), 'type');
        $member->prices = ArrayHelper::index( MemberPrices::findBySql('SELECT price_id as id, price  FROM member_prices WHERE member="'.$id.'" ')->asArray()->all(), 'id');
        $member->regions = ArrayHelper::getColumn(MemberTypes::findBySql('SELECT region FROM member_regions WHERE member="'.$id.'" ')->asArray()->all(), 'region');

        $portfolio =  Portfolio::findBySql('SELECT  p.id, p.member,	p.title, p.description,	p.cost,	p.work_date, 
                                  (SELECT i.image FROM `member_portfolio_images` i WHERE i.portfolio_id = p.id ORDER BY i.created_at ASC, i.id ASC LIMIT 1) as image	 
                                  FROM `member_porfolio` p 
                                  WHERE p.member="'.$id.'"   ORDER BY p.created_at DESC')->asArray()->all();


        return $this->render('profile', ['member'=> $member, 'portfolio'=> $portfolio]);
    }


}
