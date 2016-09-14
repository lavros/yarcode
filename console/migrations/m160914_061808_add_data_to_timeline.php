<?php

use yii\db\Migration;
use yii\db\Expression;
use common\models\Timeline;

class m160914_061808_add_data_to_timeline extends Migration
{
    public function up()
    {
        $now = new Expression('NOW()');
        $status = Timeline::STATUS_PUBLISHED;
        $rootId = 1;
        $content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!';

        $columns = [
            'date_from',
            'date_from_format',
            'date_to',
            'date_to_format',
            'image',
            'title',
            'content',
            'side',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ];

        $this->batchInsert(
            '{{%timeline}}',
            $columns,
            [
                ['2009-01-01', 'yyyy', '2011-01-01', 'yyyy', '1.jpg', 'Our Humble Beginnings', $content, '0', $status, $rootId, $rootId, $now, $now],
                ['2011-03-01', 'MMMM yyyy', null, null, '2.jpg', 'An Agency is Born', $content, '1', $status, $rootId, $rootId, $now, $now],
                ['2012-12-01', 'MMMM yyyy', null, null, '3.jpg', 'Transition to Full Service', $content, '0', $status, $rootId, $rootId, $now, $now],
                ['2014-07-01', 'MMMM yyyy', null, null, '4.jpg', 'Phase Two Expansion', $content, '1', $status, $rootId, $rootId, $now, $now],
            ]
        );
    }

    public function down()
    {
        $this->delete('{{%timeline}}', ['id' => range(1,4)]);
    }
}
