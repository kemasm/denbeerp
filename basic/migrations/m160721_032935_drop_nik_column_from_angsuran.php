<?php

use yii\db\Migration;

/**
 * Handles dropping nik_column from table `angsuran`.
 */
class m160721_032935_drop_nik_column_from_angsuran extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropIndex(
            'no_penyetujuan_nik',
            'angsuran'
        );
        $this->renameColumn(
            'angsuran',
            'no_angsuran',
            'id'
        );
        $this->alterColumn(
            'angsuran', 'id', $this->primaryKey();
        );
        $this->dropForeignKey(
            'FK_angsuran_hutang_2',
            'angsuran'
        );
        $this->dropIndex(
            'FK_angsuran_hutang_2',
            'angsuran'
        );
        $this->dropColumn('angsuran', 'nik');

        $this->dropForeignKey(
            'FK_angsuran_hutang',
            'angsuran'
        );
        $this->dropIndex(
            'no_penyetujuan',
            'angsuran'
        );
        $this->dropColumn('angsuran', 'no_penyetujuan');

        $this->addColumn('angsuran', 'hutang_id', $this->integer());

        $this->createIndex(
            'idx-angsuran-id_hutang',
            'angsuran',
            'hutang_id'
        );

        $this->addForeignKey(
            'fk-angsuran-hutang_id',
            'angsuran',
            'hutang_id',
            'hutang',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey(
            'fk-angsuran-hutang_id',
            'angsuran'
        );
        $this->dropIndex(
            'idx-angsuran-hutang_id',
            'angsuran'
        );
        $this->dropColumn('angsuran', 'hutang_id');   

        $this->addColumn('angsuran', 'no_penyetujuan', $this->string(6));

        $this->createIndex(
            'no_penyetujuan',
            'angsuran',
            'no_penyetujuan'
        );

        $this->addForeignKey(
            'FK_angsuran_hutang',
            'angsuran',
            'no_penyetujuan',
            'hutang',
            'no_penyetujuan',
            'CASCADE'
        );

        $this->addColumn('angsuran', 'nik', $this->string(6));

        $this->createIndex(
            'FK_angsuran_hutang_2',
            'angsuran',
            'nik'
        );

        $this->addForeignKey(
            'FK_angsuran_hutang_2',
            'angsuran',
            'nik',
            'hutang',
            'nik',
            'CASCADE'
        );
    }
}
