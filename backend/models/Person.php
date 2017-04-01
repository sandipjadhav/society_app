<?php

namespace app\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property integer $saas_id
 * @property string $first_name
 * @property string $surname
 * @property string $title
 * @property string $photo
 * @property string $adhar_card
 * @property string $pan_card
 * @property string $education
 * @property string $occupation
 * @property integer $address1_id
 * @property integer $address2_id
 * @property integer $address_verified
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property Members[] $members
 * @property Address $address1
 * @property User $updatedBy
 * @property Address $address2
 * @property User $createdBy
 * @property RentalRecord[] $rentalRecords
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['saas_id', 'first_name', 'surname', 'address2_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['saas_id', 'address1_id', 'address2_id', 'address_verified', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'surname'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 6],
            [['photo'], 'string', 'max' => 150],
            [['adhar_card'], 'string', 'max' => 20],
            [['pan_card'], 'string', 'max' => 10],
            [['education', 'occupation'], 'string', 'max' => 50],
            [['address1_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address1_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['address2_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address2_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
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
            'first_name' => 'First Name',
            'surname' => 'Surname',
            'title' => 'Title',
            'photo' => 'Photo',
            'adhar_card' => 'Adhar Card',
            'pan_card' => 'Pan Card',
            'education' => 'Education',
            'occupation' => 'Occupation',
            'address1_id' => 'Address1 ID',
            'address2_id' => 'Address2 ID',
            'address_verified' => 'Address Verified',
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
        return $this->hasMany(Members::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress1()
    {
        return $this->hasOne(Address::className(), ['id' => 'address1_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress2()
    {
        return $this->hasOne(Address::className(), ['id' => 'address2_id']);
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
    public function getRentalRecords()
    {
        return $this->hasMany(RentalRecord::className(), ['tenent_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PersonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonQuery(get_called_class());
    }
}
