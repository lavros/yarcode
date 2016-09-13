<?php

use yii\db\Migration;
use yii\db\Expression;
use common\models\Project;

class m160913_190241_add_data_to_project extends Migration
{
    public function up()
    {
        $now = new Expression('NOW()');
        $status = Project::STATUS_PUBLISHED;
        $rootId = 1;

        $columns = [
            'name',
            'project_category_id',
            'title',
            'intro',
            'content',
            'picture',
            'position',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ];

        $this->batchInsert(
            '{{%project}}',
            $columns,
            require(__DIR__ . '/project_data.php'));
    }

    public function down()
    {
        $this->delete('{{%project}}', ['id' => range(1,6)]);
    }
}
