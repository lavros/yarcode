<?php

use yii\db\Migration;

/**
 * Handles the creation for table `timeline`.
 */
class m160914_030116_create_timeline_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%timeline}}', [
            'id' => $this->primaryKey(),
            'date_from' => $this->date()->notNull(),
            'date_from_format' => $this->string(50)->notNull(),
            'date_to' => $this->date(),
            'date_to_format' => $this->string(50),
            'image' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'side' => $this->integer()->notNull(),
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
        $this->dropTable('{{%timeline}}');
    }
}
