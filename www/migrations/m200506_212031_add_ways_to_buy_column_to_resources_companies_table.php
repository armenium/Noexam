<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%resources_companies}}`.
 */
class m200506_212031_add_ways_to_buy_column_to_resources_companies_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->addColumn('{{%resources_companies}}', 'ways_to_buy', $this->string(50)->null()->after('content'));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropColumn('{{%resources_companies}}', 'ways_to_buy');
	}
}
