<?php

use yii\db\Migration;

/**
 * Handles adding company_id to table `resources_cats`.
 */
class m200130_205427_add_company_id_column_to_resources_cats_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('resources_cats', 'company_id', $this->integer()->notNull()->defaultValue(0)->after('custom_childs_links'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('resources_cats', 'company_id');
    }
}
