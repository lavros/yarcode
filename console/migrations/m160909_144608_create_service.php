<?php

use yii\db\Migration;

/**
 * Handles the creation for table `service`.
 */
class m160909_144608_create_service extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('service', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'content' => $this->string(500),
            'icon' => $this->string(255),
            'position' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('service');
    }
}
