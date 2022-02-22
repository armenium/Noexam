<?php

use yii\db\Migration;

/**
 * Class m220222_231126_add_fields_to_resources_cats_table
 */
class m220222_231126_add_fields_to_resources_cats_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->addColumn('resources_cats', 'meta_nofollow', $this->integer(1)->defaultValue(0)->after('meta_keys'));
		$this->addColumn('resources_cats', 'meta_noindex', $this->integer(1)->defaultValue(0)->after('meta_keys'));
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropColumn('resources_cats', 'meta_noindex');
		$this->dropColumn('resources_cats', 'meta_nofollow');
	}
	
}
