<?php
use yii\db\Schema;
use yii\db\Migration;
use yii\db\ActiveRecord;

class m150110_222244_create_tag_table extends Migration
{
	public function up()
	{
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
                
        $this->createTable('{{%tag}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'type' => Schema::TYPE_STRING . ' NULL',
            'status' => Schema::TYPE_STRING . ' NOT NULL DEFAULT "active"',
            'update_time' => Schema::TYPE_DATETIME . ' DEFAULT NULL',
            'update_by' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'create_time' => Schema::TYPE_DATETIME . ' DEFAULT NULL',
            'create_by' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
        ], $tableOptions);
        $this->createIndex('tag_type', '{{%tag}}', 'type');

	}

	public function down()
	{
        $this->dropIndex('tag_type', '{{%tag}}');
	    $this->dropTable('{{%tag}}');
	}
}