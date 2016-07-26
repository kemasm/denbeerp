<?php

use yii\db\Migration;

/**
 * Handles the creation for table `request_supply`.
 * Has foreign keys to the tables:
 *
 * - `request`
 * - `supply`
 */
class m160726_082257_create_request_supply extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('request_supply', [
            'id' => $this->primaryKey(),
            'request_id' => $this->integer(),
            'supply_id' => $this->integer(),
            'kuantitas' => $this->int(11),
        ]);

        // creates index for column `request_id`
        $this->createIndex(
            'idx-request_supply-request_id',
            'request_supply',
            'request_id'
        );

        // add foreign key for table `request`
        $this->addForeignKey(
            'fk-request_supply-request_id',
            'request_supply',
            'request_id',
            'request',
            'id',
            'CASCADE'
        );

        // creates index for column `supply_id`
        $this->createIndex(
            'idx-request_supply-supply_id',
            'request_supply',
            'supply_id'
        );

        // add foreign key for table `supply`
        $this->addForeignKey(
            'fk-request_supply-supply_id',
            'request_supply',
            'supply_id',
            'supply',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `request`
        $this->dropForeignKey(
            'fk-request_supply-request_id',
            'request_supply'
        );

        // drops index for column `request_id`
        $this->dropIndex(
            'idx-request_supply-request_id',
            'request_supply'
        );

        // drops foreign key for table `supply`
        $this->dropForeignKey(
            'fk-request_supply-supply_id',
            'request_supply'
        );

        // drops index for column `supply_id`
        $this->dropIndex(
            'idx-request_supply-supply_id',
            'request_supply'
        );

        $this->dropTable('request_supply');
    }
}
