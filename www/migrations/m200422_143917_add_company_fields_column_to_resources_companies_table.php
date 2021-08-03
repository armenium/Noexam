<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%resources_companies}}`.
 */
class m200422_143917_add_company_fields_column_to_resources_companies_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->addColumn('{{%resources_companies}}', 'content', $this->text()->after('riders_available'));
		$this->addColumn('{{%resources_companies}}', 'complaint_index', $this->string(255)->null()->after('riders_available'));
		$this->addColumn('{{%resources_companies}}', 'types_offered', $this->string(255)->null()->after('riders_available'));
		$this->addColumn('{{%resources_companies}}', 'number_of_employees', $this->string(255)->null()->after('riders_available'));
		$this->addColumn('{{%resources_companies}}', 'underwriting_time', $this->string(255)->null()->after('riders_available'));
		$this->addColumn('{{%resources_companies}}', 'state_availability', $this->string(255)->null()->after('riders_available'));
		//$this->addColumn('{{%resources_companies}}', 'bbb_rating', $this->integer(1)->notNull()->defaultValue(0)->after('riders_available'));
		//$this->addColumn('{{%resources_companies}}', 'financial_rating', $this->integer(1)->notNull()->defaultValue(0)->after('riders_available'));
		$this->addColumn('{{%resources_companies}}', 'our_rating', $this->integer(1)->notNull()->defaultValue(0)->after('riders_available'));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropColumn('{{%resources_companies}}', 'our_rating');
		$this->dropColumn('{{%resources_companies}}', 'state_availability');
		$this->dropColumn('{{%resources_companies}}', 'underwriting_time');
		$this->dropColumn('{{%resources_companies}}', 'number_of_employees');
		$this->dropColumn('{{%resources_companies}}', 'types_offered');
		$this->dropColumn('{{%resources_companies}}', 'complaint_index');
		$this->dropColumn('{{%resources_companies}}', 'content');
	}
}
