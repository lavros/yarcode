<?php

use yii\db\Migration;
use yii\db\Expression;
use common\models\TeamMember;

class m160912_131321_add_data_to_team_member extends Migration
{
    public function up()
    {
        $now = new Expression('NOW()');
        $status = TeamMember::STATUS_PUBLISHED;
        $rootId = 1;

        $columns = [
            'first_name',
            'last_name',
            'photo',
            'post',
            'position',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ];

        $this->batchInsert('{{%team_member}}', $columns, [
            ['Kay', 'Garland', '1.jpg', 'Lead Desinger', 1, $status, $rootId, $rootId, $now, $now],
            ['Larry', 'Parker', '2.jpg', 'Lead Marketer', 2, $status, $rootId, $rootId, $now, $now],
            ['Diana', 'Pertersen', '3.jpg', 'Lead Developer',  3, $status, $rootId, $rootId, $now, $now],
        ]);
    }

    public function down()
    {
        $this->delete('{{%team_member}}', ['id' => [1, 2, 3]]);
    }
}
