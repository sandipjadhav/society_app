<?php

namespace app\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "rental_record".
 *
 * @property integer $id
 * @property integer $saas_id
 * @property integer $flat_id
 * @property integer $tenent_id
 * @property string $stay_start_on
 * @property string $left_on
 * @property string $contract_expiry_date
 * @property string $last_renewal
 * @property integer $contract_duration
 * @property string $society_noc_date
 * @property integer $society_noc_provider
 * @property integer $police_verification_reference
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property Flat $flat
 * @property Person $tenent
 * @property User $createdBy
 * @property User $updatedBy
 */
class RentalRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rental_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['saas_id', 'flat_id', 'tenent_id', 'contract_duration', 'society_noc_provider', 'police_verification_reference', 'created_by', 'updated_by'], 'integer'],
            [['flat_id', 'tenent_id', 'stay_start_on', 'contract_expiry_date', 'contract_duration', 'society_noc_date', 'society_noc_provider', 'police_verification_reference', 'created_by', 'created_at', 'updated_by'], 'required'],
            [['stay_start_on', 'left_on', 'contract_expiry_date', 'last_renewal', 'society_noc_date', 'created_at', 'updated_at'], 'safe'],
            [['flat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flat::className(), 'targetAttribute' => ['flat_id' => 'id']],
            [['tenent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['tenent_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'saas_id' => 'Saas ID',
            'flat_id' => 'Flat ID',
            'tenent_id' => 'Tenent ID',
            'stay_start_on' => 'Stay Start On',
            'left_on' => 'Left On',
            'contract_expiry_date' => 'Contract Expiry Date',
            'last_renewal' => 'Last Renewal',
            'contract_duration' => 'Contract Duration',
            'society_noc_date' => 'Society Noc Date',
            'society_noc_provider' => 'Society Noc Provider',
            'police_verification_reference' => 'Police Verification Reference',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlat()
    {
        return $this->hasOne(Flat::className(), ['id' => 'flat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenent()
    {
        return $this->hasOne(Person::className(), ['id' => 'tenent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @inheritdoc
     * @return RentalRecordQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RentalRecordQuery(get_called_class());
    }
}
