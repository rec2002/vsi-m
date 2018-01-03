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

        if (Yii::$app->request->isPost) {

            $model = MemberSuggestion::findOne([
                'id' => Yii::$app->request->post('MemberSuggestion')['id']
            ]);

            if (isset($_POST['frozen_btn'])) { $model->deleted = 2;
            }elseif (isset($_POST['delete_btn'])) { $model->deleted = 1;
            } elseif (isset($_POST['restore_btn'])) $model->deleted = 0;

            $model->save(false);
            header('Location: ' . Url::to(['/orders/default/detail', 'id' => Yii::$app->request->get('id')]));
            exit();
        }



        $model = MemberSuggestion::find()->where(['order_id'=>$this->id, 'member_id'=>Yii::$app->user->identity->getId()])->one();


        if ($model) {
            return $this->render('MemberSuggestionsOne', ['model' => $model]);
        }
    }
}