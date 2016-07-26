<?php

use yii\db\Migration;

/**
 * Handles the creation for table `customer_group`.
 */
class m160726_081403_create_customer_group extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('customer_group', [
            'id' => $this->primaryKey(),
            'no_group' => $this->int(11)->unique(),
            'nama_group' => $this->varchar(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('customer_group');
    }
}
