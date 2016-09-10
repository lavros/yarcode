<?php

use yii\db\Migration;
use yii\db\Expression;

class m160910_104331_add_data_to_service extends Migration
{
    public function up()
    {
        $content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.';
        $now = new Expression('NOW()');

        $columns = [
            'name',
            'content',
            'icon',
            'position',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ];

        $this->batchInsert('{{%service}}', $columns, [
            ['E-commerce', $content, '1.jpg', 1, \common\models\Service::STATUS_PUBLISHED, 1, 1, $now, $now],
            ['Responsive Design', $content, '2.jpg', 2, \common\models\Service::STATUS_PUBLISHED, 1, 1, $now, $now],
            ['Web Security', $content, '3.jpg', 3, \common\models\Service::STATUS_PUBLISHED, 1, 1, $now, $now],
        ]);
    }

    public function down()
    {
        $this->delete('{{%service}}', ['id' => [1, 2, 3]]);
    }
}
