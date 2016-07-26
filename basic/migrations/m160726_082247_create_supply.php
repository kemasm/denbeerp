<?php

use yii\db\Migration;

/**
 * Handles the creation for table `supply`.
 */
class m160726_082247_create_supply extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('supply', [
            'id' => $this->primaryKey(),
            'no_supply' => $this->varchar(50)->unique(),
            'nama' => $this->varchar(255),
            'jumlah' => $this->int(11),
            'keterangan' => $this->varchar(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('supply');
    }
}
