<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PublicOplata;


class PublicOplataSearch extends PublicOplata
{
    public $min_sum;
    public $max_sum;
    public $first_date;
    public $second_date;


    public function attributeLabels()
    {
        return [
            'first_date' => 'От',
            'second_date' => 'До'
        ];
    }
    public function rules()
    {
        return [
            [['email','from_date', 'category', 'time','first_date','second_date'], 'safe'],
            [['sum','min_sum','max_sum'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PublicOplata::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
//            'sum' => $this->sum,

            'time' => $this->time,
        ]);

        $query->andFilterWhere(['ilike', 'email', $_COOKIE['email']])
            ->andFilterWhere(['ilike', 'category', $this->category])
            ->andFilterWhere(['and',
                ['>','sum',$this->min_sum],
                ['<','sum',$this->max_sum],
            ])->andFilterWhere(['and',
                ['>','time',$this->first_date],
                ['<','time',$this->second_date],
            ]);

        return $dataProvider;
    }
}
