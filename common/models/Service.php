<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yarcode\base\behaviors\TimestampBehavior;
use yarcode\base\traits\StatusTrait;

/**
 * This is the model class for table "{{%service}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property string $icon
 * @property integer $position
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class Service extends \yii\db\ActiveRecord
{
    use StatusTrait;

    const STATUS_HIDDEN = 0;
    const STATUS_PUBLISHED = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'position', 'status'], 'required'],
            [['position', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['icon'], 'image', 'extensions' => 'png, jpg, gif'],
            [['name'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => '\yiidreamteam\upload\FileUploadBehavior',
                'attribute' => 'icon',
                'filePath' => '@frontend/web/uploads/service/[[pk]].[[extension]]',
                'fileUrl' => Yii::$app->params['frontendBaseUrl'] . '/uploads/service/[[pk]].[[extension]]',
            ],
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'created_at'
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
            'content' => 'Content',
            'icon' => 'Icon',
            'position' => 'Position',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return ServiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceQuery(get_called_class());
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
