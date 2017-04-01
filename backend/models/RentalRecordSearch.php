<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RentalRecord;

/**
 * RentalRecordSearch represents the model behind the search form about `app\models\RentalRecord`.
 */
class RentalRecordSearch extends RentalRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'saas_id', 'flat_id', 'tenent_id', 'contract_duration', 'society_noc_provider', 'police_verification_reference', 'created_by', 'updated_by'], 'integer'],
            [['stay_start_on', 'left_on', 'contract_expiry_date', 'last_renewal', 'society_noc_date', 'created_at', 'updated_at'], 'safe'],
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
        $query = RentalRecord::find();

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
            'flat_id' => $this->flat_id,
            'tenent_id' => $this->tenent_id,
            'stay_start_on' => $this->stay_start_on,
            'left_on' => $this->left_on,
            'contract_expiry_date' => $this->contract_expiry_date,
            'last_renewal' => $this->last_renewal,
            'contract_duration' => $this->contract_duration,
            'society_noc_date' => $this->society_noc_date,
            'society_noc_provider' => $this->society_noc_provider,
            'police_verification_reference' => $this->police_verification_reference,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
