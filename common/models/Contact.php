<?php

namespace common\models;

use Yii;
use yarcode\base\traits\StatusTrait;
use yii\helpers\Html;

/**
 * This is the model class for table "{{%contact}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property string $created_at
 * @property string $readed_at
 * @property integer $status
 */
class Contact extends \yii\db\ActiveRecord
{
    use StatusTrait;

    const STATUS_UNREADED = 0;
    const STATUS_READED = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%contact}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'message'], 'required'],
            [['message'], 'string'],
            [['created_at', 'readed_at'], 'safe'],
            [['status'], 'integer'],
            [['name', 'phone'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['status'], 'default', 'value' => self::STATUS_UNREADED],
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
            'email' => 'Email',
            'phone' => 'Phone',
            'message' => 'Message',
            'created_at' => 'Created At',
            'readed_at' => 'Readed At',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return ContactQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function getStatusLabels()
    {
        return [
            static::STATUS_UNREADED => 'Unreaded',
            static::STATUS_READED => 'Readed',
        ];
    }

    /**
     * It arranges data in HTML format for sending by email.
     *
     * @return string html message
     */
    public function buildHtmlMessage()
    {
        return
            Html::tag('p', Html::a('Open message in control panel', sprintf(Yii::$app->params['backendViewContact'], $this->id))) .
            Html::tag('p', Html::tag('b', 'Sended at: ') . Yii::$app->formatter->asDatetime($this->created_at, 'medium')) . "\n" .
            Html::tag('p', Html::tag('b', 'Name: ') . Html::encode($this->name)) . "\n" .
            Html::tag('p', Html::tag('b', 'Email: ') . Html::encode($this->email)) . "\n" .
            Html::tag('p', Html::tag('b', 'Phone: ') . Html::encode($this->phone)) . "\n" .
            Html::tag('p', Html::tag('b', 'Message: ') . nl2br(Html::encode($this->message)));

    }
}
