<?php

use yii\db\Migration;

/**
 * Handles dropping sisa_pokok_column from table `hutang`.
 */
class m160721_054411_drop_sisa_pokok_column_from_hutang extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('hutang', 'sisa_pokok');
        $this->dropColumn('hutang', 'sisa_bunga');
        // +status
        $this->addColumn('hutang', 'status', $this->string(255);
        // manager_nik
        $this->addColumn('hutang', 'manager_nik', $this->string(6));
        $this->createIndex(
            'idx-hutang-manager_nik',
            'hutang',
            'manager_nik'
        );
        $this->addForeignKey(
            'fk-hutang-manager_nik',
            'hutang',
            'manager_nik',
            'karyawan',
            'nik',
            'CASCADE'
        );
        // admin_nik
        $this->addColumn('hutang', 'admin_nik', $this->string(6));
        $this->createIndex(
            'idx-hutang-admin_nik',
            'hutang',
            'admin_nik'
        );
        $this->addForeignKey(
            'fk-hutang-admin_nik',
            'hutang',
            'admin_nik',
            'karyawan',
            'nik',
            'CASCADE'
        );
        // penolak_nik
        $this->addColumn('hutang', 'penolak_nik', $this->string(6));
        $this->createIndex(
            'idx-hutang-penolak_nik',
            'hutang',
            'penolak_nik'
        );
        $this->addForeignKey(
            'fk-hutang-penolak_nik',
            'hutang',
            'penolak_nik',
            'karyawan',
            'nik',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('hutang', 'sisa_pokok', $this->integer());
        $this->addColumn('hutang', 'sisa_bunga', $this->integer());
    }
}
