<?php

use yii\db\Migration;

/**
 * Class m211004_182032_add_fields_to_resources_cats_table
 */
class m211004_182032_add_fields_to_resources_cats_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->addColumn('{{%resources_cats}}', 'is_best_companies_page', $this->integer(1)->notNull()->defaultValue(0)->after('is_companies_main_page'));
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropColumn('{{%resources_cats}}', 'is_best_companies_page');
	}
	
}
