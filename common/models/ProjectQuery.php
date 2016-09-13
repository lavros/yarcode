<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Project]].
 *
 * @see Project
 */
class ProjectQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return Project[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Project|array|null
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
        return $this->andWhere(['status' => Project::STATUS_PUBLISHED]);
    }
}
