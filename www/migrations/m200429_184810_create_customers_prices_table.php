<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customers_prices}}`.
 */
class m200429_184810_create_customers_prices_table extends Migration{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->createTable('{{%customers_prices}}', [
			'id' => $this->primaryKey(),
			'customer_id' => $this->integer()->notNull(),
			'coverage' => $this->integer(11)->notNull()->defaultValue(0),
			'term' => $this->integer(3)->notNull()->defaultValue(0),
			'premium_monthly' => $this->double(16.2)->notNull()->defaultValue(0),
			'premium_annual' => $this->double(16.2)->notNull()->defaultValue(0),
			'company_code' => $this->string(50)->null(),
			'company_name' => $this->string(50)->null(),
			'product_code' => $this->string(50)->null(),
			'product_name' => $this->string(50)->null(),
			'product_type' => $this->string(50)->null(),
			'rate_class_name' => $this->string(50)->null(),
			'policy_fee' => $this->string(10)->null(),
			'rating' => $this->string(5)->null(),
			'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
		]);

		// creates index for column `customer_id`
		$this->createIndex(
			'idx-customers_prices-customer_id',
			'customers_prices',
			'customer_id'
		);

		// add foreign key for table `customers`
		$this->addForeignKey(
			'fk-customers_prices-customer_id',
			'customers_prices',
			'customer_id',
			'customers',
			'id',
			'CASCADE'
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		// drops foreign key for table `customers`
		$this->dropForeignKey(
			'fk-customers_prices-customer_id',
			'customers_prices'
		);

		// drops index for column `customer_id`
		$this->dropIndex(
			'idx-customers_prices-customer_id',
			'customers_prices'
		);

		$this->dropTable('{{%customers_prices}}');
	}
}
