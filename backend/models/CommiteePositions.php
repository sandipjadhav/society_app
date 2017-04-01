<?php

namespace app\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "commitee_positions".
 *
 * @property integer $id
 * @property integer $saas_id
 * @property integer $name
 * @property integer $is_associate
 * @property integer $main_position
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property CommiteeMembers[] $commiteeMembers
 * @property User $createdBy
 * @property User $updatedBy
 */
class CommiteePositions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commitee_positions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['saas_id', 'name', 'is_associate', 'main_position', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['name', 'is_associate', 'main_position', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
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
            'name' => 'Name',
            'is_associate' => 'Is Associate',
            'main_position' => 'Main Position',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommiteeMembers()
    {
        return $this->hasMany(CommiteeMembers::className(), ['position_id' => 'id']);
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
     * @return CommiteePositionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommiteePositionsQuery(get_called_class());
    }
}
