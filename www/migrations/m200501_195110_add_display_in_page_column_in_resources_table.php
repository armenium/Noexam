<?php

use yii\db\Migration;

/**
 * Class m200501_195110_add_display_in_page_column_in_resources_table
 */
class m200501_195110_add_display_in_page_column_in_resources_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->addColumn('{{%resources_companies}}', 'display_in_page', $this->integer(1)->notNull()->defaultValue(1));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropColumn('{{%resources_companies}}', 'display_in_page');
	}

}
