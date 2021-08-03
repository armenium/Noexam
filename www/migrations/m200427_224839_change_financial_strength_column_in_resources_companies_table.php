<?php

use yii\db\Migration;

/**
 * Class m200427_224839_change_financial_strength_column_in_resources_companies_table
 */
class m200427_224839_change_financial_strength_column_in_resources_companies_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->alterColumn('{{%resources_companies}}', 'financial_strength', $this->string(10)->null());
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		echo "m200427_224839_change_financial_strength_column_in_resources_companies_table cannot be reverted.\n";

		return false;
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m200427_224839_change_financial_strength_column_in_resources_companies_table cannot be reverted.\n";

		return false;
	}
	*/
}
