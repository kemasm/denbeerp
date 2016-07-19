<?php

use yii\db\Migration;

/**
 * Handles adding nik_admin_column to table `cuti`.
 * Has foreign keys to the tables:
 *
 * - `karyawan`
 */
class m160715_065348_add_nik_admin_column_to_cuti extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('cuti', 'nik_admin', $this->string(6));

        // creates index for column `nik_admin`
        $this->createIndex(
            'idx-cuti-nik_admin',
            'cuti',
            'nik_admin'
        );

        // add foreign key for table `karyawan`
        $this->addForeignKey(
            'fk-cuti-nik_admin',
            'cuti',
            'nik_admin',
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
        // drops foreign key for table `karyawan`
        $this->dropForeignKey(
            'fk-cuti-nik_admin',
            'cuti'
        );

        // drops index for column `nik_admin`
        $this->dropIndex(
            'idx-cuti-nik_admin',
            'cuti'
        );

        $this->dropColumn('cuti', 'nik_admin');
    }
}
