<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%resources_cats}}`.
 */
class m200422_115139_add_is_companies_main_page_column_to_resources_cats_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->addColumn('{{%resources_cats}}', 'is_companies_main_page', $this->integer(1)->notNull()->defaultValue(0)->after('company_id'));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropColumn('{{%resources_cats}}', 'is_companies_main_page');
	}
}
