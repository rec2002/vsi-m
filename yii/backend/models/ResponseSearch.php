<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\members\models\MemberResponse;

/**
 * ResponseSearch represents the model behind the search form of `common\modules\members\models\MemberResponse`.
 */
class ResponseSearch extends MemberResponse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'suggestion_id', 'step', 'active', 'devotion', 'connected', 'punctuality', 'price', 'terms', 'quality', 'meeting', 'meeting_result', 'stage', 'days', 'positive_negative', 'come_personality', 'dogovir'], 'integer'],
            [['meeting_comment', 'date_continue', 'role', 'positive_note', 'negative_note', 'performer', 'updated_at', 'created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MemberResponse::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['updated_at'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'suggestion_id' => $this->suggestion_id,
            'step' => $this->step,
            'active' => $this->active,
            'devotion' => $this->devotion,
            'connected' => $this->connected,
            'punctuality' => $this->punctuality,
            'price' => $this->price,
            'terms' => $this->terms,
            'quality' => $this->quality,
            'meeting' => $this->meeting,
            'meeting_result' => $this->meeting_result,
            'date_continue' => $this->date_continue,
            'stage' => $this->stage,
            'days' => $this->days,
            'positive_negative' => $this->positive_negative,
            'come_personality' => $this->come_personality,
            'dogovir' => $this->dogovir,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'meeting_comment', $this->meeting_comment])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'positive_note', $this->positive_note])
            ->andFilterWhere(['like', 'negative_note', $this->negative_note])
            ->andFilterWhere(['like', 'performer', $this->performer]);

        return $dataProvider;
    }
}
