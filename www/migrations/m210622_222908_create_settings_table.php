<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%settings}}`.
 */
class m210622_222908_create_settings_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->createTable('{{%settings}}', [
			'id'    => $this->primaryKey(),
			'setting_name'  => $this->string(255)->null(),
			'setting_value' => $this->text()->null(),
			'field_type' => $this->string(255)->null(),
			'field_options' => $this->text()->null(),
			'order' => $this->integer(10)->notNull()->defaultValue(0),
			'active' => $this->integer(1)->notNull()->defaultValue(1),
			'updated_at' => $this->timestamp(),
			'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
		]);
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropTable('{{%settings}}');
	}
}
