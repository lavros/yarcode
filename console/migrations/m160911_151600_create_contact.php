<?php

use yii\db\Migration;

/**
 * Handles the creation for table `contact`.
 */
class m160911_151600_create_contact extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'email' => $this->string(100)->notNull(),
            'phone' => $this->string(50)->notNull(),
            'message' => $this->text()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'readed_at' => $this->dateTime()->notNull(),
            'status' => $this->integer()->notNUll(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('contact');
    }
}
