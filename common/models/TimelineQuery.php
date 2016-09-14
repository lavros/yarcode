<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Timeline]].
 *
 * @see Timeline
 */
class TimelineQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Timeline[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Timeline|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return $this
     */
    public function orderByDateFrom()
    {
        return $this->orderBy(['date_from' => SORT_ASC]);
    }

    /**
     * @return $this
     */
    public function published()
    {
        return $this->andWhere(['status' => Timeline::STATUS_PUBLISHED]);
    }
}
