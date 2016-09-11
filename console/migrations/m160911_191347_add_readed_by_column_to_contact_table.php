<?php

use yii\db\Migration;

/**
 * Handles adding readed_by to table `contact`.
 */
class m160911_191347_add_readed_by_column_to_contact_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('contact', 'readed_by', $this->integer()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('contact', 'readed_by');
    }
}
