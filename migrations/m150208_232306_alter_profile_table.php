<?php

use yii\db\Schema;
use yii\db\Migration;

class m150208_232306_alter_profile_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%profile}}', 'firstname', 'string AFTER user_id');
        $this->addColumn('{{%profile}}', 'lastname', 'string AFTER firstname');
    }

    public function down()
    {
        $this->dropColumn('{{%profile}}', 'firstname');
        $this->dropColumn('{{%profile}}', 'lastname');
    }
}
