<?php

use yii\db\Migration;

/**
 * Handles the creation for table `project`.
 * Has foreign keys to the tables:
 *
 * - `project_category`
 */
class m160913_143221_create_project_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'project_category_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'intro' => $this->string(500)->notNull(),
            'content' => $this->text()->notNull(),
            'picture' => $this->string(255)->notNull(),
            'position' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        // creates index for column `project_category_id`
        $this->createIndex(
            'IDX_project_project_category_id',
            '{{%project}}',
            'project_category_id'
        );

        // add foreign key for table `project_category`
        $this->addForeignKey(
            'FK_project_project_category_id',
            '{{%project}}',
            'project_category_id',
            'project_category',
            'id',
            'RESTRICT',
            'RESTRICT'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `project_category`
        $this->dropForeignKey(
            'FK_project_project_category_id',
            '{{%project}}'
        );

        // drops index for column `project_category_id`
        $this->dropIndex(
            'IDX_project_project_category_id',
            '{{%project}}'
        );

        $this->dropTable('{{%project}}');
    }
}
