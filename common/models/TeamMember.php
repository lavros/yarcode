<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yarcode\base\behaviors\TimestampBehavior;
use yarcode\base\traits\StatusTrait;

/**
 * This is the model class for table "{{%team_member}}".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $photo
 * @property string $post
 * @property integer $position
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class TeamMember extends \yii\db\ActiveRecord
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
        return '{{%team_member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'photo', 'post', 'position', 'status'], 'required'],
            [['position', 'status', 'created_by', 'updated_by'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['post'], 'string', 'max' => 100],
            ['photo', 'file', 'extensions' => 'png, jpg, gif'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            self::SCENARIO_CREATE => ['first_name', 'last_name', 'photo', 'post', 'position', 'status'],
            self::SCENARIO_UPDATE => ['first_name', 'last_name', 'post', 'position', 'status']
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
                'attribute' => 'photo',
                'filePath' => '@frontend/web/uploads/team-member/[[pk]].[[extension]]',
                'fileUrl' => Yii::$app->params['frontendBaseUrl'] . '/uploads/team-member/[[pk]].[[extension]]',
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
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'photo' => 'Photo',
            'post' => 'Post',
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
     * @return TeamMemberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TeamMemberQuery(get_called_class());
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
