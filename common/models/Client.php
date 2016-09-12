<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yarcode\base\behaviors\TimestampBehavior;
use yarcode\base\traits\StatusTrait;

/**
 * This is the model class for table "{{%client}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $logo
 * @property string $url
 * @property integer $position
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class Client extends \yii\db\ActiveRecord
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
        return '{{%client}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'logo', 'position', 'status'], 'required'],
            [['position', 'status', 'created_by', 'updated_by'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
            ['url', 'url', 'defaultScheme' => 'http'],
            ['logo', 'file', 'extensions' => 'png, jpg, gif'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            self::SCENARIO_CREATE => ['name', 'logo', 'url', 'position', 'status'],
            self::SCENARIO_UPDATE => ['name', 'url', 'position', 'status']
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
                'attribute' => 'logo',
                'filePath' => '@frontend/web/uploads/client/[[pk]].[[extension]]',
                'fileUrl' => Yii::$app->params['frontendBaseUrl'] . '/uploads/client/[[pk]].[[extension]]',
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
            'logo' => 'Logo',
            'url' => 'Url',
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
     * @return ClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientQuery(get_called_class());
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
