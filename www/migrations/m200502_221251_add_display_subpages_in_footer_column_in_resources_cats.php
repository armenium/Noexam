<?php

use yii\db\Migration;

/**
 * Class m200502_221251_add_display_subpages_in_footer_column_in_resources_cats
 */
class m200502_221251_add_display_subpages_in_footer_column_in_resources_cats extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->addColumn('{{%resources_cats}}', 'display_subpages_in_footer', $this->integer(1)->notNull()->defaultValue(1)->after('header_image'));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropColumn('{{%resources_cats}}', 'display_subpages_in_footer');
	}
}
