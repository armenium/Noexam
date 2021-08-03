<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%options}}`.
 */
class m210623_105528_create_options_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->createTable('{{%options}}', [
			'id'    => $this->primaryKey(),
			'option_name'  => $this->string(255)->null(),
			'option_value' => $this->text()->null(),
			'updated_at' => $this->timestamp(),
			'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
		]);
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropTable('{{%options}}');
	}
}
