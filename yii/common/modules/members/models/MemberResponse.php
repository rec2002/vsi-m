<?php

namespace common\modules\members\models;

use Yii;


/**
 * This is the model class for table "{{%member_response}}".
 *
 * @property integer $id
 * @property integer $suggestion_id
 * @property integer $step
 * @property integer $active
 * @property integer $devotion
 * @property integer $connected
 * @property integer $punctuality
 * @property integer $price
 * @property integer $terms
 * @property integer $quality
 * @property integer $meeting
 * @property integer $meeting_result
 * @property string $meeting_comment
 * @property integer $stage
 * @property integer $days
 * @property integer $positive_negative
 * @property integer $come_personality
 * @property string $role
 * @property string $positive_note
 * @property string $negative_note
 * @property integer $dogovir
 * @property string $updated_at
 * @property string $created_at
 *
 * @property MemberSuggestion $suggestion
 */
class MemberResponse extends \yii\db\ActiveRecord
{


    public $image = array();

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member_response}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['devotion'], 'required',  'message' => 'Прошу поставити оцінку `Вічливість`', 'on' => 'step1'],
            [['connected'], 'required',  'message' => 'Прошу поставити оцінку `На зв\'язку`', 'on' => 'step1'],
            [['meeting'], 'required',  'message' => 'Прошу вибрати результат спілкування.', 'on' => 'step1'],
            ['punctuality', 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number', 'message' => 'Прошу поставити оцінку `Пунктуальність`', 'on' => 'step2'],
            ['price', 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number', 'message' => 'Прошу поставити оцінку `Дотримання ціни`', 'on' => 'step2'],
            [['meeting_result'], 'required',  'message' => 'Прошу вибрати результат спілкування.', 'on' => 'step2'],
            [['stage'], 'required',  'message' => 'Прошу вказати `На якому етапі Ви знаходитесь?`', 'on' => 'step3'],
            //[['days'], 'required', 'message'=>'Вказати кількість днів', 'on' => 'step3'],
            ['days', 'required', 'whenClient' => "function (attribute, value) { /*alert ($('input[name=\"MemberResponse[stage]\"]:checked').val()+\" \"+$('#memberresponse-days').val()); */ 
            
            if ($('input[name=\"MemberResponse[stage]\"]:checked').val()==1)
             
             if (parseInt($('#memberresponse-days').val()) >= 1) return false; else return true; }", 'message'=>'Вказати кількість днів', 'on' => 'step3'],



            [['terms'], 'required', 'whenClient' => "function (attribute, value) { return ($('input[name=\"MemberResponse[stage]\"]:checked').val()!=1);}", 'message' => 'Прошу поставити оцінку `Дотримання термінів`',  'on' => 'step3'],
            [['quality'], 'required', 'whenClient' => "function (attribute, value) { return ($('input[name=\"MemberResponse[stage]\"]:checked').val()!=1);}", 'message' => 'Прошу поставити оцінку `Ціна/Якість`',  'on' => 'step3'],
            [['positive_negative'], 'required', 'whenClient' => "function (attribute, value) { return ($('input[name=\"MemberResponse[stage]\"]:checked').val()!=1);}", 'message' => 'Прошу поставити загальне враження',  'on' => 'step3'],
            [['come_personality'], 'required', 'whenClient' => "function (attribute, value) { return ($('input[name=\"MemberResponse[stage]\"]:checked').val()!=1);}", 'message' => 'Прошу вибрати `так` або `ні` ',  'on' => 'step3'],
            [['positive_note', 'negative_note', 'conclusion_note'], 'required', 'whenClient' => "function (attribute, value) { return ($('input[name=\"MemberResponse[stage]\"]:checked').val()!=1);}", 'message' => 'Поле обов\'язкове для заповнення',  'on' => 'step3'],


 //           ['terms', 'required', 'whenClient' => "function (attribute, value) { return false; }", 'message'=>'Прошу поставити оцінку `Дотримання термінів `', 'on' => 'step3'],




            //       ['punctuality', 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number', 'message' => 'Прошу поставити оцінку `Пунктуальність`', 'on' => 'step2'],
     //       ['price', 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number', 'message' => 'Прошу поставити оцінку `Дотримання ціни`', 'on' => 'step2'],


      //      ['stage', 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number', 'message' => 'Прошу вказати `На якому етапі Ви знаходитесь?`', 'on' => 'step3'],


            /*[['suggestion_id', 'step', 'active', 'devotion', 'connected', 'punctuality', 'price', 'terms', 'quality', 'meeting', 'meeting_result', 'meeting_comment', 'stage', 'days', 'positive', 'negative', 'come_personality', 'role', 'positive_note', 'negative_note', 'dogovir'], 'required'],
            [['suggestion_id', 'step', 'active', 'devotion', 'connected', 'punctuality', 'price', 'terms', 'quality', 'meeting', 'meeting_result', 'stage', 'days', 'positive', 'negative', 'come_personality', 'dogovir'], 'integer'],
            [['meeting_comment', 'positive_note', 'negative_note'], 'string'],
            [['created_at'], 'safe'],
            [['role'], 'string', 'max' => 255],*/
            [['suggestion_id'], 'exist', 'skipOnError' => true, 'targetClass' => MemberSuggestion::className(), 'targetAttribute' => ['suggestion_id' => 'id']],
          //  [['images'], 'exist', 'skipOnError' => true, 'targetClass' => MemberResponseImages::className(), 'targetAttribute' => ['response_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'suggestion_id' => 'Suggestion ID',
            'step' => 'Step',
            'active' => 'Active',
            'devotion' => 'Devotion',
            'connected' => 'Connected',
            'punctuality' => 'Punctuality',
            'price' => 'Price',
            'terms' => 'Terms',
            'quality' => 'Quality',
            'meeting' => 'Meeting',
            'meeting_result' => 'Meeting Result',
            'meeting_comment' => 'Meeting Comment',
            'stage' => 'Stage',
            'days' => 'Days',
            'positive_negative ' => 'Positive',

            'come_personality' => 'Come Personality',
            'role' => 'Role',
            'positive_note' => 'Positive Note',
            'negative_note' => 'Negative Note',
            'dogovir' => 'Dogovir',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuggestion()
    {
        return $this->hasOne(MemberSuggestion::className(), ['id' => 'suggestion_id']);
    }


}
