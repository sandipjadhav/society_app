<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RentalRecord]].
 *
 * @see RentalRecord
 */
class RentalRecordQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return RentalRecord[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RentalRecord|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
