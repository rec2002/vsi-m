<?php

namespace common\modules\orders\models;

use Yii;

/**
 * This is the model class for table "{{%member_suggestion}}".
 *
 * @property integer $id
 * @property integer $member_id
 * @property integer $order_id
 * @property integer $price_from
 * @property integer $price_to
 * @property integer $start_from
 * @property integer $start_to
 * @property integer $prepayment
 * @property integer $prepayment_material
 * @property integer $payment_object
 * @property integer $come_personally
 * @property string $dates
 * @property string $descriptions
 * @property integer $offer_is_valid
 * @property integer $valid_days
 * @property integer $valid_hours
 * @property string $created_at
 *
 * @property Members $member
 * @property Orders $order
 * @property integer disregast_suggestion
 */
class MemberSuggestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $payment_object_checkbox;
    public $proposal;
    public $valid_days;
    public $valid_hours;


    public static function tableName()
    {
        return '{{%member_suggestion}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        //    [['member_id', 'order_id', 'prepayment', 'prepayment_material', 'payment_object', 'come_personally', 'dates', 'descriptions', 'offer_is_valid', 'valid_days', 'valid_hours'], 'required'],
            [['member_id', 'order_id', 'prepayment', 'prepayment_material',  'come_personally', 'offer_is_valid', 'valid_days', 'valid_hours'], 'integer'],
            [['descriptions'], 'string'],
            [['created_at', 'disregast_suggestion'], 'safe'],
            [['valid_days', 'valid_hours'], 'required', 'whenClient' => "function (attribute, value) {
         
                if (parseInt($('#membersuggestion-proposal:checked').length)==1) {
                    if ($('input#membersuggestion-valid_days').val()!='' || $('input#membersuggestion-valid_hours').val()!='') {
                         $('p#proposal').html('');
                         return false;
                    } else  {
                        $('p#proposal').html('Не вказано скільки часу діє пропозиція днів чи годин');
                        return true;
                    }
                }
                

            }"],

            [['payment_object'], 'required', 'whenClient' => "function (attribute, value) {
         
                if (parseInt($('#membersuggestion-payment_object_checkbox:checked').length)==1) {
                    if ($('input#membersuggestion-payment_object').val()!='') {
                         $('p#payment_object').html('');
                         return false;
                    } else  {
                        $('p#payment_object').html('Не вказано суму виїзду на об\'єкт');
                        return true;
                    }
                }
                

            }"],
            [['price_from', 'price_to'], 'required', 'whenClient' => "function (attribute, value) {          
                if ($('input[name=\"MemberSuggestion[price_from]\"]').val()>0 && parseInt($('input[name=\"MemberSuggestion[price_to]\"]').val())>=parseInt($('input[name=\"MemberSuggestion[price_from]\"]').val())) {
                     $('p#price_range').html('');
                     return false;
                }else  {     
                    $('p#price_range').html('Ціну роботи вказано не вірно');
                    return true;
                }
             }"],
            [['start_from', 'start_to'], 'required', 'whenClient' => "function (attribute, value) {          
                if ($('input[name=\"MemberSuggestion[start_from]\"]').val()>0 && parseInt($('input[name=\"MemberSuggestion[start_to]\"]').val())>=parseInt($('input[name=\"MemberSuggestion[start_from]\"]').val())) {
                     $('p#start_range').html('');
                     return false;
                }else  {     
                    $('p#start_range').html('Строк виконання вказано не вірно');
                    return true;
                }
             }"],

            [['dates'], 'required', 'whenClient' => "function (attribute, value) {
               if($('input[name=\"MemberSuggestion[dates]\"]').val()!='') {
                     $('input[name=\"MemberSuggestion[dates]\"]').next().html('');
                     return false;
               }else  {     
                    $('input[name=\"MemberSuggestion[dates]\"]').next().html('Не вказано дату виїзду');
                    return true;
               }
             }"],
            [['dates'], 'string', 'max' => 255],
            [['price_to'], 'required', 'message'=>'Ціну роботи вказано не вірно'],
            ['price_to','compare','compareAttribute'=>'price_from','operator'=>'>=','message'=>'Ціну роботи вказано не вірно'],
            [['start_to'], 'required', 'message'=>'Ціну роботи вказано не вірно'],
            ['start_to','compare','compareAttribute'=>'start_from','operator'=>'>=','message'=>'Строк виконання вказано не вірно'],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\modules\members\models\Members::className(), 'targetAttribute' => ['member_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\modules\members\models\Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['suggestion_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\modules\orders\models\MemberSuggestionApproved::className(), 'targetAttribute' => ['suggestion_id' => 'id']],

        ];
    }

/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'order_id' => 'Order ID',
            'price_from' => 'Price From',
            'price_to' => 'Price To',
            'start_from' => 'Start From',
            'start_to' => 'Start To',
            'prepayment' => 'Prepayment',
            'prepayment_material' => 'Prepayment Material',
            'payment_object' => 'Payment Object',
            'come_personally' => 'Come Personally',
            'dates' => 'Dates',
            'descriptions' => 'Descriptions',
            'offer_is_valid' => 'Offer Is Valid',
            'valid_days' => 'Valid Days',
            'valid_hours' => 'Valid Hours',
            'created_at' => 'Created At',
            'disregast_suggestion'=> 'Причини відмови'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(\common\modules\members\models\Members::className(), ['id' => 'member_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(\common\modules\members\models\Orders::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApproved()
    {
        return $this->hasOne(\common\modules\orders\models\MemberSuggestionApproved::className(), ['suggestion_id' => 'id']);
    }

}
