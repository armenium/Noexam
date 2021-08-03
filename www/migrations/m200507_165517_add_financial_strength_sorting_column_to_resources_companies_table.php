<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%resources_companies}}`.
 */
class m200507_165517_add_financial_strength_sorting_column_to_resources_companies_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->addColumn('{{%resources_companies}}', 'financial_strength_sorting', $this->integer(5)->notNull()->defaultValue(0)->after('financial_strength'));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropColumn('{{%resources_companies}}', 'financial_strength_sorting');
	}
}
