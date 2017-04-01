<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Flat]].
 *
 * @see Flat
 */
class FlatQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Flat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Flat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
