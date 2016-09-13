<?php

use yii\db\Migration;
use yii\db\Expression;
use common\models\ProjectCategory;

class m160913_081005_add_data_to_project_category extends Migration
{
    public function up()
    {
        $now = new Expression('NOW()');
        $status = ProjectCategory::STATUS_PUBLISHED;
        $rootId = 1;

        $columns = [
            'name',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ];

        $this->batchInsert('{{%project_category}}', $columns, [
            ['Graphic Design', $status, $rootId, $rootId, $now, $now],
            ['Website Design', $status, $rootId, $rootId, $now, $now],
        ]);

    }

    public function down()
    {
        $this->delete('{{%project_category}}', ['id' => [1, 2]]);
    }

}
