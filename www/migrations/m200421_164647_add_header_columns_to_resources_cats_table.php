<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%resources_cats}}`.
 */
class m200421_164647_add_header_columns_to_resources_cats_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->addColumn('{{%resources_cats}}', 'header_image', $this->string(255)->null()->after('company_id'));
		$this->addColumn('{{%resources_cats}}', 'header_subtitle', $this->string(255)->null()->after('company_id'));
		$this->addColumn('{{%resources_cats}}', 'header_title', $this->string(255)->null()->after('company_id'));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropColumn('{{%resources_cats}}', 'header_title');
		$this->dropColumn('{{%resources_cats}}', 'header_subtitle');
		$this->dropColumn('{{%resources_cats}}', 'header_image');
	}
}
