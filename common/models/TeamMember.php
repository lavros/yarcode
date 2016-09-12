<?php

namespace common\models;

use Yii;

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
            [['first_name', 'photo', 'post', 'position', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'required'],
            [['position', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['photo'], 'string', 'max' => 255],
            [['post'], 'string', 'max' => 100],
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
}
