<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%resources_compare}}`.
 */
class m200402_200144_add_robot_index_column_to_resources_compare_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%resources_compare}}', 'no_index', $this->integer()->notNull()->defaultValue(1));
        $this->addColumn('{{%resources_compare}}', 'no_follow', $this->integer()->notNull()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%resources_compare}}', 'no_index');
        $this->dropColumn('{{%resources_compare}}', 'no_follow');
    }
}
