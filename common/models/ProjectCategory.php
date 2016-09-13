<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yarcode\base\behaviors\TimestampBehavior;
use yarcode\base\traits\StatusTrait;

/**
 * This is the model class for table "{{%project_category}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class ProjectCategory extends \yii\db\ActiveRecord
{
    use StatusTrait;

    const STATUS_HIDDEN = 0;
    const STATUS_PUBLISHED = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at'
            ],
            BlameableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return ProjectCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectCategoryQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function getStatusLabels()
    {
        return [
            static::STATUS_HIDDEN => 'Hidden',
            static::STATUS_PUBLISHED => 'Published',
        ];
    }

    /**
     * @return array list of categories.
     */
    public static function getListData()
    {
        return yii\helpers\ArrayHelper::map(ProjectCategory::find()->orderByName()->published()->all(), 'id', 'name');
    }
}
