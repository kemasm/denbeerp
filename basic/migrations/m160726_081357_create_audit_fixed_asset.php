<?php

use yii\db\Migration;

/**
 * Handles the creation for table `audit_fixed_asset`.
 * Has foreign keys to the tables:
 *
 * - `fixed_asset`
 */
class m160726_081357_create_audit_fixed_asset extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('audit_fixed_asset', [
            'id' => $this->primaryKey(),
            'waktu_tanggal' => $this->timestamp(),
            'jenis_update' => $this->varchar(255),
            'keterangan' => $this->varchar(255),
            'fixed_asset_id' => $this->integer(),
        ]);

        // creates index for column `fixed_asset_id`
        $this->createIndex(
            'idx-audit_fixed_asset-fixed_asset_id',
            'audit_fixed_asset',
            'fixed_asset_id'
        );

        // add foreign key for table `fixed_asset`
        $this->addForeignKey(
            'fk-audit_fixed_asset-fixed_asset_id',
            'audit_fixed_asset',
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
        // drops foreign key for table `fixed_asset`
        $this->dropForeignKey(
            'fk-audit_fixed_asset-fixed_asset_id',
            'audit_fixed_asset'
        );

        // drops index for column `fixed_asset_id`
        $this->dropIndex(
            'idx-audit_fixed_asset-fixed_asset_id',
            'audit_fixed_asset'
        );

        $this->dropTable('audit_fixed_asset');
    }
}
