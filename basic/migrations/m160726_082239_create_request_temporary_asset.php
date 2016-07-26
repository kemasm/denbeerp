<?php

use yii\db\Migration;

/**
 * Handles the creation for table `request_temporary_asset`.
 * Has foreign keys to the tables:
 *
 * - `request`
 * - `temporary_asset`
 */
class m160726_082239_create_request_temporary_asset extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('request_temporary_asset', [
            'id' => $this->primaryKey(),
            'request_id' => $this->integer(),
            'temporary_asset_id' => $this->integer(),
            'kuantitas' => $this->int(11),
        ]);

        // creates index for column `request_id`
        $this->createIndex(
            'idx-request_temporary_asset-request_id',
            'request_temporary_asset',
            'request_id'
        );

        // add foreign key for table `request`
        $this->addForeignKey(
            'fk-request_temporary_asset-request_id',
            'request_temporary_asset',
            'request_id',
            'request',
            'id',
            'CASCADE'
        );

        // creates index for column `temporary_asset_id`
        $this->createIndex(
            'idx-request_temporary_asset-temporary_asset_id',
            'request_temporary_asset',
            'temporary_asset_id'
        );

        // add foreign key for table `temporary_asset`
        $this->addForeignKey(
            'fk-request_temporary_asset-temporary_asset_id',
            'request_temporary_asset',
            'temporary_asset_id',
            'temporary_asset',
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
            'fk-request_temporary_asset-request_id',
            'request_temporary_asset'
        );

        // drops index for column `request_id`
        $this->dropIndex(
            'idx-request_temporary_asset-request_id',
            'request_temporary_asset'
        );

        // drops foreign key for table `temporary_asset`
        $this->dropForeignKey(
            'fk-request_temporary_asset-temporary_asset_id',
            'request_temporary_asset'
        );

        // drops index for column `temporary_asset_id`
        $this->dropIndex(
            'idx-request_temporary_asset-temporary_asset_id',
            'request_temporary_asset'
        );

        $this->dropTable('request_temporary_asset');
    }
}
