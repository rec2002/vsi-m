<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\members\models\Members;

/**
 * MembersSearch represents the model behind the search form about `common\modules\members\models\Members`.
 */
class MembersSearch extends Members
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'region', 'forma', 'brygada', 'budget_min'], 'integer'],
            [['email', 'auth_key', 'password', 'password_reset_token', 'first_name', 'last_name', 'surname', 'phone', 'avatar_image', 'place', 'company', 'about', 'busy_to', 'created_at', 'updated_at'], 'safe'],
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
        $query = Members::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
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
            'region' => $this->region,
            'forma' => $this->forma,
            'brygada' => $this->brygada,
            'busy_to' => $this->busy_to,
            'budget_min' => $this->budget_min,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'avatar_image', $this->avatar_image])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'about', $this->about]);

        return $dataProvider;
    }
}
