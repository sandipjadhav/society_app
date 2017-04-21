<?php

namespace app\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "commitee".
 *
 * @property integer $id
 * @property integer $saas_id
 * @property integer $year
 * @property string $elected_on
 * @property string $handover_complete_on
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property CommiteeMembers[] $commiteeMembers
 */
class Commitee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commitee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['saas_id', 'year', 'created_by', 'updated_by'], 'integer'],
            [['year', 'elected_on', 'handover_complete_on', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['elected_on', 'handover_complete_on', 'created_at', 'updated_at'], 'safe'],
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
            'year' => 'Year',
            'elected_on' => 'Elected On',
            'handover_complete_on' => 'Handover Complete On',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
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
     * @return \yii\db\ActiveQuery
     */
    public function getCommiteeMembers()
    {
        return $this->hasMany(CommiteeMembers::className(), ['commitee_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CommiteeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommiteeQuery(get_called_class());
    }
}
