<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customers}}`.
 */
class m200425_163254_create_customers_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->createTable('{{%customers}}', [
			'id' => $this->primaryKey(),
			'sid' => $this->string(32)->notNull()->unique(),
			'ip' => $this->string(32)->null(),
			'state' => $this->string(4)->null(),
			'gender' => $this->string(1)->null(),
			'age' => $this->integer(3)->notNull()->defaultValue(0),
			'byear' => $this->integer(4)->notNull()->defaultValue(0),
			'health' => $this->string(15)->null(),
			'amount' => $this->integer(10)->notNull()->defaultValue(0),
			'term' => $this->integer(3)->notNull()->defaultValue(0),
			'prices' => $this->text()->null(),
			'iniciator' => $this->string(50)->null(),
			'status' => $this->string(10)->notNull()->defaultValue('new'),
			'updates' => $this->integer(4)->notNull()->defaultValue(0),
			'updated_at' => $this->timestamp(),
			'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropTable('{{%customers}}');
	}
}
