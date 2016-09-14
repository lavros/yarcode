<?php

namespace common\models;

use Yii;

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
            [['date_from', 'date_from_format', 'image', 'title', 'content', 'side', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'required'],
            [['date_from', 'date_to', 'created_at', 'updated_at'], 'safe'],
            [['content'], 'string'],
            [['side', 'status', 'created_by', 'updated_by'], 'integer'],
            [['date_from_format', 'date_to_format'], 'string', 'max' => 50],
            [['image', 'title'], 'string', 'max' => 255],
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
}
