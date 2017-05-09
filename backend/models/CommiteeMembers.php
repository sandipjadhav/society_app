<?php

namespace app\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "commitee_members".
 *
 * @property integer $id
 * @property integer $saas_id
 * @property integer $commitee_id
 * @property integer $member_id
 * @property integer $position_id
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property Commitee $commitee
 * @property Members $member
 * @property CommiteePositions $position
 */
class CommiteeMembers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commitee_members';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['saas_id', 'commitee_id', 'member_id', 'position_id', 'created_by', 'updated_by'], 'integer'],
            [['commitee_id', 'member_id', 'position_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['commitee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Commitee::className(), 'targetAttribute' => ['commitee_id' => 'id']],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Members::className(), 'targetAttribute' => ['member_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => CommiteePositions::className(), 'targetAttribute' => ['position_id' => 'id']],
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
            'commitee_id' => 'Commitee ID',
            'member_id' => 'Member ID',
            'position_id' => 'Position ID',
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
    public function getCommitee()
    {
        return $this->hasOne(Commitee::className(), ['id' => 'commitee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Members::className(), ['id' => 'member_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(CommiteePositions::className(), ['id' => 'position_id']);
    }

    /**
     * @inheritdoc
     * @return CommiteeMembersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommiteeMembersQuery(get_called_class());
    }
}
