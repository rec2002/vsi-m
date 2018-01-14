<?php
namespace common\widgets;

use Yii;
use common\modules\orders\models\MemberSuggestion;
use yii\helpers\Url;
use \yii\db\ActiveRecord;

class MemberSuggestionsList extends \yii\bootstrap\Widget
{
    public $model;
    public $id;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();

        if (Yii::$app->request->isPost) {

            $model = MemberSuggestion::findOne([
                'id' => Yii::$app->request->post('id')
            ]);

            $model->disregast_suggestion = Yii::$app->request->post('disregast');
            $model->save(false);
            header('Location: ' . Url::to(['/orders/default/detail', 'id' => Yii::$app->request->get('id')]));
            exit();
        }

        $models = MemberSuggestion::find()->where(['order_id'=>$this->id])->orderBy(['created_at'=>SORT_DESC])->all();

        $ratings = array();
        foreach($models as $key => $val){
            $ratings[$val->member_id] = \common\modules\professionals\controllers\DefaultController::GetRetingsReviews($val->member_id)['reviews'];
        }

        if ($models) {
            return $this->render('MemberSuggestionsList', ['models' => $models, 'ratings'=>$ratings]);
        }
    }
}