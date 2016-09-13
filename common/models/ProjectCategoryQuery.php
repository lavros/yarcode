<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ProjectCategory]].
 *
 * @see ProjectCategory
 */
class ProjectCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProjectCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProjectCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return $this
     */
    public function orderByName()
    {
        return $this->orderBy(['name' => SORT_ASC]);
    }

    /**
     * @return $this
     */
    public function published()
    {
        return $this->andWhere(['status' => ProjectCategory::STATUS_PUBLISHED]);
    }
}
