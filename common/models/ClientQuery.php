<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Client]].
 *
 * @see Client
 */
class ClientQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Client[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Client|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return $this
     */
    public function orderByPosition()
    {
        return $this->orderBy(['position' => SORT_ASC]);
    }

    /**
     * @return $this
     */
    public function published()
    {
        return $this->andWhere(['status' => Client::STATUS_PUBLISHED]);
    }
}
