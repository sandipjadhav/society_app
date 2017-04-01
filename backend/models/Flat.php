<?php

namespace app\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "flat".
 *
 * @property integer $id
 * @property integer $saas_id
 * @property integer $flat_number
 * @property integer $building_name
 * @property integer $is_rented
 * @property string $carpet_area
 * @property string $builtup_area
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property Members[] $members
 * @property RentalRecord[] $rentalRecords
 */
class Flat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['saas_id', 'flat_number', 'building_name', 'is_rented', 'created_by', 'updated_by'], 'integer'],
            [['flat_number', 'building_name', 'is_rented', 'carpet_area', 'builtup_area', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['carpet_area', 'builtup_area'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
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
            'flat_number' => 'Flat Number',
            'building_name' => 'Building Name',
            'is_rented' => 'Is Rented',
            'carpet_area' => 'Carpet Area',
            'builtup_area' => 'Builtup Area',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Members::className(), ['flat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentalRecords()
    {
        return $this->hasMany(RentalRecord::className(), ['flat_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return FlatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FlatQuery(get_called_class());
    }
}
