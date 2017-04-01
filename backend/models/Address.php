<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $id
 * @property integer $saas_id
 * @property string $addr_line1
 * @property string $addr_line2
 * @property string $landmark
 * @property string $lattitude
 * @property string $langitude
 * @property integer $city
 * @property integer $state
 * @property integer $country
 * @property integer $pin
 * @property string $phone1
 * @property string $phone2
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Person[] $people
 * @property Person[] $people0
 * @property Society[] $societies
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['saas_id', 'city', 'state', 'country', 'pin', 'created_by', 'updated_by'], 'integer'],
            [['addr_line1', 'city', 'state', 'country', 'pin', 'phone1', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['addr_line1', 'addr_line2'], 'string', 'max' => 200],
            [['landmark'], 'string', 'max' => 100],
            [['lattitude', 'langitude'], 'string', 'max' => 10],
            [['phone1', 'phone2'], 'string', 'max' => 15],
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
            'addr_line1' => 'Addr Line1',
            'addr_line2' => 'Addr Line2',
            'landmark' => 'Landmark',
            'lattitude' => 'Lattitude',
            'langitude' => 'Langitude',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'pin' => 'Pin',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['address1_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople0()
    {
        return $this->hasMany(Person::className(), ['address2_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocieties()
    {
        return $this->hasMany(Society::className(), ['address_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddressQuery(get_called_class());
    }
}
