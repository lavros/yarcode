<?php

use yii\db\Migration;

/**
 * Handles the creation for table `team_member`.
 */
class m160912_104248_create_team_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%team_member}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(50)->notNull(),
            'last_name' => $this->string(50),
            'photo' => $this->string(255)->notNull(),
            'post' => $this->string(100)->notNull(),
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
        $this->dropTable('{{%team_member}}');
    }
}
