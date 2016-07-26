<?php

use yii\db\Migration;

/**
 * Handles the creation for table `fixed_asset`.
 * Has foreign keys to the tables:
 *
 * - `karyawan`
 * - `lokasi`
 */
class m160726_081349_create_fixed_asset extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('fixed_asset', [
            'id' => $this->primaryKey(),
            'no_fixed_asset' => $this->varchar(50)->unique(),
            'nama' => $this->varchar(255),
            'nilai' => $this->int(11),
            'jumlah' => $this->int(11),
            'tanggal_pembelian' => $this->date(),
            'penanggung_jawab_id' => $this->varchar(6),
            'lokasi_id' => $this->integer(),
        ]);

        // creates index for column `penanggung_jawab_id`
        $this->createIndex(
            'idx-fixed_asset-penanggung_jawab_id',
            'fixed_asset',
            'penanggung_jawab_id'
        );

        // add foreign key for table `karyawan`
        $this->addForeignKey(
            'fk-fixed_asset-penanggung_jawab_id',
            'fixed_asset',
            'penanggung_jawab_id',
            'karyawan',
            'id',
            'CASCADE'
        );

        // creates index for column `lokasi_id`
        $this->createIndex(
            'idx-fixed_asset-lokasi_id',
            'fixed_asset',
            'lokasi_id'
        );

        // add foreign key for table `lokasi`
        $this->addForeignKey(
            'fk-fixed_asset-lokasi_id',
            'fixed_asset',
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
        // drops foreign key for table `karyawan`
        $this->dropForeignKey(
            'fk-fixed_asset-penanggung_jawab_id',
            'fixed_asset'
        );

        // drops index for column `penanggung_jawab_id`
        $this->dropIndex(
            'idx-fixed_asset-penanggung_jawab_id',
            'fixed_asset'
        );

        // drops foreign key for table `lokasi`
        $this->dropForeignKey(
            'fk-fixed_asset-lokasi_id',
            'fixed_asset'
        );

        // drops index for column `lokasi_id`
        $this->dropIndex(
            'idx-fixed_asset-lokasi_id',
            'fixed_asset'
        );

        $this->dropTable('fixed_asset');
    }
}
