<?php

use yii\db\Migration;

/**
 * Handles the creation for table `request_fixed_asset`.
 * Has foreign keys to the tables:
 *
 * - `request`
 * - `fixed_asset`
 */
class m160726_081423_create_request_fixed_asset extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('request_fixed_asset', [
            'id' => $this->primaryKey(),
            'request_id' => $this->integer(),
            'fixed_asset_id' => $this->integer(),
            'kuantitas' => $this->int(11),
        ]);

        // creates index for column `request_id`
        $this->createIndex(
            'idx-request_fixed_asset-request_id',
            'request_fixed_asset',
            'request_id'
        );

        // add foreign key for table `request`
        $this->addForeignKey(
            'fk-request_fixed_asset-request_id',
            'request_fixed_asset',
            'request_id',
            'request',
            'id',
            'CASCADE'
        );

        // creates index for column `fixed_asset_id`
        $this->createIndex(
            'idx-request_fixed_asset-fixed_asset_id',
            'request_fixed_asset',
            'fixed_asset_id'
        );

        // add foreign key for table `fixed_asset`
        $this->addForeignKey(
            'fk-request_fixed_asset-fixed_asset_id',
            'request_fixed_asset',
            'fixed_asset_id',
            'fixed_asset',
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
            'fk-request_fixed_asset-request_id',
            'request_fixed_asset'
        );

        // drops index for column `request_id`
        $this->dropIndex(
            'idx-request_fixed_asset-request_id',
            'request_fixed_asset'
        );

        // drops foreign key for table `fixed_asset`
        $this->dropForeignKey(
            'fk-request_fixed_asset-fixed_asset_id',
            'request_fixed_asset'
        );

        // drops index for column `fixed_asset_id`
        $this->dropIndex(
            'idx-request_fixed_asset-fixed_asset_id',
            'request_fixed_asset'
        );

        $this->dropTable('request_fixed_asset');
    }
}
