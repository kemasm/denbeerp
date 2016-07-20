<?php

use yii\db\Migration;

/**
 * Handles adding id_hutang_column to table `hutang`.
 */
class m160715_095736_add_id_hutang_column_to_hutang extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropPrimaryKey('no_penyetujuan', 'hutang');
        //$this->alterColumn('hutang', 'no_penyetujuan', $this->string(255));
        $this->addColumn('hutang', 'id', $this->primaryKey());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('hutang', 'id');
        $this->addPrimaryKey('hutang_pk', 'hutang', 'no_penyetujuan');
    }
}
