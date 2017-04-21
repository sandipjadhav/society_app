<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "society".
 *
 * @property integer $id
 * @property string $name
 * @property integer $address_id
 * @property string $reg_no
 * @property integer $builder_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Address $address
 */
class Society extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'society';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'address_id', 'reg_no', 'builder_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['id', 'address_id', 'builder_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['reg_no'], 'string', 'max' => 100],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address_id' => 'Address ID',
            'reg_no' => 'Reg No',
            'builder_id' => 'Builder ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'address_id']);
    }

    /**
     * @inheritdoc
     * @return SocietyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SocietyQuery(get_called_class());
    }
}
