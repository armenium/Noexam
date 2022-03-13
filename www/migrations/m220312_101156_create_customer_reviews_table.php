<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer_reviews}}`.
 */
class m220312_101156_create_customer_reviews_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->createTable('{{%customer_reviews}}', [
			'id' => $this->primaryKey(),
			'customer_name' => $this->string(50),
			'customer_avatar' => $this->string(255)->notNull()->defaultValue(''),
			'review_title' => $this->string(255),
			'review_content' => $this->text(),
			'review_stars' => $this->integer(1)->notNull()->defaultValue(0),
			'review_date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
		]);
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropTable('{{%customer_reviews}}');
	}
}
