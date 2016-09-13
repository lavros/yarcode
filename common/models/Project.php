<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yarcode\base\behaviors\TimestampBehavior;
use yarcode\base\traits\StatusTrait;

/**
 * This is the model class for table "{{%project}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $project_category_id
 * @property string $title
 * @property string $intro
 * @property string $content
 * @property string $picture
 * @property integer $position
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ProjectCategory $projectCategory
 */
class Project extends \yii\db\ActiveRecord
{
    use StatusTrait;

    const STATUS_HIDDEN = 0;
    const STATUS_PUBLISHED = 1;

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'project_category_id', 'title', 'intro', 'content', 'picture', 'position', 'status'], 'required'],
            [['project_category_id', 'position', 'status', 'created_by', 'updated_by'], 'integer'],
            [['content'], 'string'],
            [['name', 'title'], 'string', 'max' => 255],
            [['intro'], 'string', 'max' => 500],
            [['project_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectCategory::className(), 'targetAttribute' => ['project_category_id' => 'id']],
            [['picture'], 'file', 'extensions' => 'jpg, png, gif'],
            [['description'], 'default', 'value' => null],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            self::SCENARIO_CREATE => ['name', 'project_category_id', 'title', 'intro', 'content', 'picture', 'position', 'status'],
            self::SCENARIO_UPDATE => ['name', 'project_category_id', 'title', 'intro', 'content', 'position', 'status']
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => '\yiidreamteam\upload\ImageUploadBehavior',
                'attribute' => 'picture',
                'thumbs' => [
                    'thumb' => [
                        'width' => '400',
                        'height' => '289'
                    ],
                ],
                'filePath' => '@frontend/web/uploads/project/[[pk]].[[extension]]',
                'fileUrl' => Yii::$app->params['frontendBaseUrl'] . '/uploads/project/[[pk]].[[extension]]',
                'thumbPath' => '@frontend/web/uploads/project/thumb/[[pk]].[[extension]]',
                'thumbUrl' => Yii::$app->params['frontendBaseUrl'] . '/uploads/project/thumb/[[pk]].[[extension]]',
            ],
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
            'project_category_id' => 'Category',
            'title' => 'Title',
            'intro' => 'Intro',
            'content' => 'Content',
            'picture' => 'Picture',
            'position' => 'Position',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ProjectCategory::className(), ['id' => 'project_category_id']);
    }

    /**
     * @inheritdoc
     * @return ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectQuery(get_called_class());
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
}
