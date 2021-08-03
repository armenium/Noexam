<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%resources_companies}}`.
 */
class m200422_184851_add_most_popular_column_to_resources_companies_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->addColumn('{{%resources_companies}}', 'financial_strength', $this->integer(4)->notNull()->defaultValue(0)->after('riders_available'));
		$this->addColumn('{{%resources_companies}}', 'most_popular', $this->integer(4)->notNull()->defaultValue(0)->after('riders_available'));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropColumn('{{%resources_companies}}', 'most_popular');
		$this->dropColumn('{{%resources_companies}}', 'financial_strength');
	}
}
