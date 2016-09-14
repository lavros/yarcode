<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yarcode\base\behaviors\TimestampBehavior;
use yarcode\base\traits\StatusTrait;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%timeline}}".
 *
 * @property integer $id
 * @property string $date_from
 * @property string $date_from_format
 * @property string $date_to
 * @property string $date_to_format
 * @property string $image
 * @property string $title
 * @property string $content
 * @property integer $side
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class Timeline extends \yii\db\ActiveRecord
{
    use StatusTrait;

    const STATUS_HIDDEN = 0;
    const STATUS_PUBLISHED = 1;

    const SIDE_LEFT = 0;
    const SIDE_RIGHT = 1;

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    // Format as specified in the ICU manual
    const DATE_FORMAT_YEAR = 'yyyy';
    const DATE_FORMAT_MONTH_YEAR = 'MMMM yyyy';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%timeline}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_from', 'date_from_format', 'image', 'title', 'content', 'side', 'status'], 'required'],
            [['date_from', 'date_to'], 'safe'],
            [['content'], 'string'],
            [['side', 'status', 'created_by', 'updated_by'], 'integer'],
            [['date_from_format', 'date_to_format'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'jpg, png, gif'],

            [['date_to_format'], 'required', 'when' => function($model) {
                return !empty($model->date_to);
            }],
            [['date_from_format', 'date_to_format'], 'in', 'range' => array_keys(Timeline::getDateFormatLabels())],
            [['date_to', 'date_to_format'], 'default', 'value' => null],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            self::SCENARIO_CREATE => ['date_from', 'date_from_format', 'date_to', 'date_to_format', 'image', 'title', 'content', 'side', 'status'],
            self::SCENARIO_UPDATE => ['date_from', 'date_from_format', 'date_to', 'date_to_format', 'title', 'content', 'side', 'status']
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
                'attribute' => 'image',
                'filePath' => '@frontend/web/uploads/timeline/[[pk]].[[extension]]',
                'fileUrl' => Yii::$app->params['frontendBaseUrl'] . '/uploads/timeline/[[pk]].[[extension]]',
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
            'date_from' => 'Date From',
            'date_from_format' => 'Date From Format',
            'date_to' => 'Date To',
            'date_to_format' => 'Date To Format',
            'image' => 'Image',
            'title' => 'Title',
            'content' => 'Content',
            'side' => 'Side',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return TimelineQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TimelineQuery(get_called_class());
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
     * @return array
     */
    public static function getSideLabels()
    {
        return [
            static::SIDE_LEFT => 'Left',
            static::SIDE_RIGHT => 'Right',
        ];
    }

    /**
     * @param null $default
     * @return string|null
     */
    public function getSideLabel($default = null)
    {
        return ArrayHelper::getValue(static::getSideLabels(), $this->side, $default);
    }

    /**
     * @return array
     */
    public static function getDateFormatLabels()
    {
        return [
            static::DATE_FORMAT_YEAR => 'Year (0000)',
            static::DATE_FORMAT_MONTH_YEAR => 'Month year (January 0000)',
        ];
    }

    /**
     * @return array
     */
    public function getDateFormatLabel($format, $default = null)
    {
        return ArrayHelper::getValue(static::getDateFormatLabels(), $format, $default);
    }

    /**
     * @return bool
     */
    public function isRightSide()
    {
        return $this->side == self::SIDE_RIGHT;
    }

    /**
     * @return string formatted date
     */
    public function getDate()
    {
        $formatter = Yii::$app->formatter;
        $formattedDate = $formatter->asDate($this->date_from, $this->date_from_format);

        if ($this->date_to) {
            $formattedDate .= '–' . $formatter->asDate($this->date_to, $this->date_to_format);
        }

        return $formattedDate;
    }
}
