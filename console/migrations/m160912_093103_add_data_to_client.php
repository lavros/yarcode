<?php

use yii\db\Migration;
use yii\db\Expression;
use common\models\Client;

class m160912_093103_add_data_to_client extends Migration
{
    public function up()
    {
        $now = new Expression('NOW()');
        $status = Client::STATUS_PUBLISHED;
        $rootId = 1;

        $columns = [
            'name',
            'logo',
            'url',
            'position',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ];

        $this->batchInsert('{{%client}}', $columns, [
            ['Envato', 'envato.jpg', 'http://envato.com', 1, $status, $rootId, $rootId, $now, $now],
            ['Designmod', 'designmodo.jpg', 'http://designmodo.com', 2, $status, $rootId, $rootId, $now, $now],
            ['Themefores', 'themeforest.jpg', 'http://themeforest.com', 3, $status, $rootId, $rootId, $now, $now],
            ['Creative Marke', 'creative-market.jpg', 'http://creative-market.com', 4, $status, $rootId, $rootId, $now, $now],
        ]);
    }

    public function down()
    {
        $this->delete('{{%client}}', ['id' => [1, 2, 3, 4]]);
    }
}
