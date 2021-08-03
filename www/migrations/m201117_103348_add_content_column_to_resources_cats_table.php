<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%resources_cats}}`.
 */
class m201117_103348_add_content_column_to_resources_cats_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('{{%resources_cats}}', 'content', $this->text()->null()->after('title'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->dropColumn('{{%resources_cats}}', 'content');
    }
}
