<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%resources_company}}`.
 */
class m200807_224148_add_best_company_column_to_resources_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('{{%resources_companies}}', 'best_company', $this->integer(1)->notNull()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->dropColumn('{{%resources_companies}}', 'best_company');
    }
}
