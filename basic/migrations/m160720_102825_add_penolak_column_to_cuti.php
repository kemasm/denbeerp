<?php

use yii\db\Migration;

/**
 * Handles adding penolak_column to table `cuti`.
 * Has foreign keys to the tables:
 *
 * - `karyawan`
 */
class m160720_102825_add_penolak_column_to_cuti extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('cuti', 'penolak', $this->string(6));

        // creates index for column `penolak`
        $this->createIndex(
            'idx-cuti-penolak',
            'cuti',
            'penolak'
        );

        // add foreign key for table `karyawan`
        $this->addForeignKey(
            'fk-cuti-penolak',
            'cuti',
            'penolak',
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
            'fk-cuti-penolak',
            'cuti'
        );

        // drops index for column `penolak`
        $this->dropIndex(
            'idx-cuti-penolak',
            'cuti'
        );

        $this->dropColumn('cuti', 'penolak');
    }
}
