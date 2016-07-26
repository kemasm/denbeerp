<?php

use yii\db\Migration;

/**
 * Handles the creation for table `customer`.
 * Has foreign keys to the tables:
 *
 * - `customer_group`
 * - `lokasi`
 */
class m160726_081410_create_customer extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'no_customer' => $this->varchar(50)->unique(),
            'nama' => $this->varchar(255),
            'npwp' => $this->varchar(255),
            'no_tlp' => $this->varchar(255),
            'no_fax' => $this->varchar(255),
            'email' => $this->varchar(255),
            'media_sosial' => $this->varchar(255),
            'website' => $this->varchar(255),
            'file_npwp' => $this->varchar(255),
            'customer_group_id' => $this->integer(),
            'lokasi_id' => $this->integer(),
        ]);

        // creates index for column `customer_group_id`
        $this->createIndex(
            'idx-customer-customer_group_id',
            'customer',
            'customer_group_id'
        );

        // add foreign key for table `customer_group`
        $this->addForeignKey(
            'fk-customer-customer_group_id',
            'customer',
            'customer_group_id',
            'customer_group',
            'id',
            'CASCADE'
        );

        // creates index for column `lokasi_id`
        $this->createIndex(
            'idx-customer-lokasi_id',
            'customer',
            'lokasi_id'
        );

        // add foreign key for table `lokasi`
        $this->addForeignKey(
            'fk-customer-lokasi_id',
            'customer',
            'lokasi_id',
            'lokasi',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `customer_group`
        $this->dropForeignKey(
            'fk-customer-customer_group_id',
            'customer'
        );

        // drops index for column `customer_group_id`
        $this->dropIndex(
            'idx-customer-customer_group_id',
            'customer'
        );

        // drops foreign key for table `lokasi`
        $this->dropForeignKey(
            'fk-customer-lokasi_id',
            'customer'
        );

        // drops index for column `lokasi_id`
        $this->dropIndex(
            'idx-customer-lokasi_id',
            'customer'
        );

        $this->dropTable('customer');
    }
}
