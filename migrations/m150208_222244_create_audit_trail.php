<?php

use yii\db\Schema;
use yii\db\Migration;
use yii\db\ActiveRecord;

class m150208_222244_create_audit_trail extends Migration
{
	/**
	 * Creates initial version of the audit trail table
	 */
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}
		//Create our first version of the audittrail table	
		//Please note that this matches the original creation of the 
		//table from version 1 of the extension. Other migrations will
		//upgrade it from here if we ever need to. This was done so
		//that older versions can still use migrate functionality to upgrade.
		$this->createTable( 'audit_trail', [
			'id' => Schema::TYPE_PK,
			'old_value' => Schema::TYPE_TEXT,
			'new_value' => Schema::TYPE_TEXT,
			'action' => Schema::TYPE_STRING . ' NOT NULL',
			'model' => Schema::TYPE_STRING . ' NOT NULL',
			'field' => Schema::TYPE_STRING,
			'user_id' => Schema::TYPE_INTEGER. ' NOT NULL',
			'model_id' => Schema::TYPE_STRING . ' NOT NULL',
			'stamp' => Schema::TYPE_DATETIME . ' NOT NULL',
		], $tableOptions);

		//Index these bad boys for speedy lookups
		$this->createIndex( 'idx_audit_trail_user_id', 'audit_trail', 'user_id');
		$this->createIndex( 'idx_audit_trail_model_id', 'audit_trail', 'model_id');
		$this->createIndex( 'idx_audit_trail_model', 'audit_trail', 'model');
		$this->createIndex( 'idx_audit_trail_field', 'audit_trail', 'field');
		/* http://stackoverflow.com/a/1827099/383478
		$this->createIndex( 'idx_audit_trail_old_value', 'audit_trail', 'old_value');
		$this->createIndex( 'idx_audit_trail_new_value', 'audit_trail', 'new_value');
		*/
		$this->createIndex( 'idx_audit_trail_action', 'audit_trail', 'action');

		$this->addForeignKey('audit_trail_user_id','{{%audit_trail}}','user_id','{{%user}}','id','NO ACTION','NO ACTION');
	}

	/**
	 * Drops the audit trail table
	 */
	public function down()
	{
		$this->dropForeignKey('audit_trail_user_id','{{%audit_trail}}');
		$this->dropTable( 'audit_trail' );
	}

	/**
	 * Creates initial version of the audit trail table in a transaction-safe way.
	 * Uses $this->up to not duplicate code.
	 */
	public function safeUp()
	{
		$this->up();
	}

	/**
	 * Drops the audit trail table in a transaction-safe way.
	 * Uses $this->down to not duplicate code.
	 */
	public function safeDown()
	{
		$this->down();
	}
}