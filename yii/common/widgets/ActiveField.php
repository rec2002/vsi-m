<?php

namespace common\widget;

use yii\helpers\Html;

/**
 * @inheritdoc
 */
class ActiveField extends \yii\bootstrap\ActiveField {

    /**
     * @param string $value
     * @return ActiveField $this
     */
    public function defaultValue($value){
        if ($this->model->isNewRecord && !$this->model->{$this->attribute}) {
            $this->model->{$this->attribute} = $value;
        }
        return $this;
    }
}