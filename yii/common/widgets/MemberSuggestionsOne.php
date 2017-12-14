<?php
namespace common\widgets;

use Yii;
use common\modules\orders\models\MemberSuggestion;
use yii\helpers\Url;

class MemberSuggestionsOne extends \yii\bootstrap\Widget
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


        if ($model) {
            return $this->render('MemberSuggestionsOne', ['model' => $model]);
        }
    }
}