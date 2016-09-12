<?php

use yii\db\Migration;

/**
 * Handles the creation for table `client`.
 */
class m160912_050629_create_client_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('client', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'logo' => $this->string(255)->notNull(),
            'url' => $this->string(255),
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
        $this->dropTable('client');
    }
}
