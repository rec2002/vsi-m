<?php
namespace common\widgets;

use Yii;
use common\modules\orders\models\MemberSuggestion;
use yii\helpers\Url;

class MemberSuggestions extends \yii\bootstrap\Widget
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

        if (!Yii::$app->user->can('majster')) return false;

        $model = MemberSuggestion::find()->where(['order_id'=>$this->id, 'member_id'=>Yii::$app->user->identity->getId()])->one();


        if (!$model) {
            $model = new MemberSuggestion();
            if ($model->load(Yii::$app->request->post())) {

                $hours = (int)Yii::$app->request->post('MemberSuggestion')['valid_days'] * 24 + (int)Yii::$app->request->post('MemberSuggestion')['valid_hours'];
                if ($hours > 0) $model->deadline = date('Y-m-d H:i:s', strtotime($hours . ' hour'));

                $model->order_id = $this->id;
                $model->member_id = Yii::$app->user->identity->getId();
       //         $model->save(false);
                header('Location: ' . Url::to(['/orders/default/detail', 'id' => $this->id]));
                exit();
            }
            return $this->render('MemberSuggestions', ['model' => $model]);
        }
    }
}