<?php

use yii\db\Migration;

/**
 * Handles the creation for table `request`.
 * Has foreign keys to the tables:
 *
 * - `karyawan`
 * - `customer`
 */
class m160726_081417_create_request extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('request', [
            'id' => $this->primaryKey(),
            'no_request' => $this->varchar(50)->unique(),
            'keperluan' => $this->varchar(255),
            'waktu_tanggal_pengajuan' => $this->timestamp(),
            'tanggal_ekspektasi' => $this->date(),
            'tanggal_pembelian' => $this->date(),
            'status' => $this->varchar(255),
            'pic_id' => $this->integer(),
            'customer_id' => $this->integer(),
        ]);

        // creates index for column `pic_id`
        $this->createIndex(
            'idx-request-pic_id',
            'request',
            'pic_id'
        );

        // add foreign key for table `karyawan`
        $this->addForeignKey(
            'fk-request-pic_id',
            'request',
            'pic_id',
            'karyawan',
            'id',
            'CASCADE'
        );

        // creates index for column `customer_id`
        $this->createIndex(
            'idx-request-customer_id',
            'request',
            'customer_id'
        );

        // add foreign key for table `customer`
        $this->addForeignKey(
            'fk-request-customer_id',
            'request',
            'customer_id',
            'customer',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `karyawan`
        $this->dropForeignKey(
            'fk-request-pic_id',
            'request'
        );

        // drops index for column `pic_id`
        $this->dropIndex(
            'idx-request-pic_id',
            'request'
        );

        // drops foreign key for table `customer`
        $this->dropForeignKey(
            'fk-request-customer_id',
            'request'
        );

        // drops index for column `customer_id`
        $this->dropIndex(
            'idx-request-customer_id',
            'request'
        );

        $this->dropTable('request');
    }
}
