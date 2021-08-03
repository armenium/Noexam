<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%resources_companies}}`.
 */
class m200429_175858_add_internal_code_column_to_resources_companies_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->addColumn('{{%resources_companies}}', 'internal_code', $this->string(50)->null()->after('id'));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropColumn('{{%resources_companies}}', 'internal_code');
	}
}
