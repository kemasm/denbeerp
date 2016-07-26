<?php

use yii\db\Migration;

/**
 * Handles the creation for table `temporary_asset`.
 */
class m160726_082229_create_temporary_asset extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('temporary_asset', [
            'id' => $this->primaryKey(),
            'no_temporary_asset' => $this->varchar(50)->unique(),
            'nama' => $this->varchar(255),
            'part_number_1' => $this->varchar(255),
            'part_number_2' => $this->varchar(255),
            'spesifikasi' => $this->varchar(255),
            'tipe' => $this->varchar(255),
            'kuantitas' => $this->int(11),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('temporary_asset');
    }
}
