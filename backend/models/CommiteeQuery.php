<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Commitee]].
 *
 * @see Commitee
 */
class CommiteeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Commitee[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Commitee|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
