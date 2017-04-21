<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Address;

/**
 * AddressSearch represents the model behind the search form about `app\models\Address`.
 */
class AddressSearch extends Address
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'saas_id', 'city', 'state', 'country', 'pin', 'created_by', 'updated_by'], 'integer'],
            [['addr_line1', 'addr_line2', 'landmark', 'lattitude', 'langitude', 'phone1', 'phone2', 'created_at', 'updated_at'], 'safe'],
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
        $query = Address::find();

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
            'id' => $this->id,
            'saas_id' => $this->saas_id,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'pin' => $this->pin,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'addr_line1', $this->addr_line1])
            ->andFilterWhere(['like', 'addr_line2', $this->addr_line2])
            ->andFilterWhere(['like', 'landmark', $this->landmark])
            ->andFilterWhere(['like', 'lattitude', $this->lattitude])
            ->andFilterWhere(['like', 'langitude', $this->langitude])
            ->andFilterWhere(['like', 'phone1', $this->phone1])
            ->andFilterWhere(['like', 'phone2', $this->phone2]);

        return $dataProvider;
    }
}
