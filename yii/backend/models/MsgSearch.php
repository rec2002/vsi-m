<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use common\modules\members\models\MemberMsg;

/**
 * MsgSearch represents the model behind the search form of `common\modules\members\models\MemberMsg`.
 */
class MsgSearch extends MemberMsg
{
    /**
     * @inheritdoc
     */
    public $name;


    public function rules()
    {
        return [
            [['id', 'suggestion_id', 'ticket_id', 'member_id', 'system', 'support'], 'integer'],
            [['msg', 'name', 'created_at'], 'safe'],
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



        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM support_tickets')->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT s.id, m.id as member_id, 
                    if (m.company!=\'\', m.company, CONCAT(m.first_name, \' \', m.surname, \' \', m.last_name)) as name,
                    (SELECT msg1.msg FROM `member_msg` msg1 WHERE msg1.ticket_id = s.id ORDER BY msg1.created_at DESC LIMIT 1) as msg,
                    (SELECT msg1.created_at FROM `member_msg` msg1 WHERE msg1.ticket_id = s.id ORDER BY msg1.created_at DESC LIMIT 1) as created_at,
                    (SELECT count(*) as count FROM `member_msg_unread` u LEFT JOIN `member_msg` msg ON  msg.id=u.msg_id WHERE s.id=msg.ticket_id AND u.status=0 AND u.member_id=s.member_id AND u.support = 0) as counts
                    FROM `support_tickets` s 
                    LEFT JOIN `members` m ON s.member_id = m.id ORDER BY created_at DESC',
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

                // add conditions that should always apply here
        /*
                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);
        */


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
/*
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'suggestion_id' => $this->suggestion_id,
            'ticket_id' => $this->ticket_id,
            'member_id' => $this->member_id,
            'who_id' => $this->who_id,
            'whom_id' => $this->whom_id,
            'system' => $this->system,
            'support' => $this->support,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'msg', $this->msg]);
*/


        return $dataProvider;
    }
}
