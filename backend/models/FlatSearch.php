<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Flat;

/**
 * FlatSearch represents the model behind the search form about `app\models\Flat`.
 */
class FlatSearch extends Flat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'saas_id', 'flat_number', 'building_name', 'is_rented', 'created_by', 'updated_by'], 'integer'],
            [['carpet_area', 'builtup_area'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = Flat::find();

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
            'flat_number' => $this->flat_number,
            'building_name' => $this->building_name,
            'is_rented' => $this->is_rented,
            'carpet_area' => $this->carpet_area,
            'builtup_area' => $this->builtup_area,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
