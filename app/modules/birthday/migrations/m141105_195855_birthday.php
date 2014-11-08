<?php

use yii\db\Schema;
use yii\db\Migration;

class m141105_195855_birthday extends Migration
{
    public function up()
    {
        $this->createTable('birthday', [
            'id'=>'pk',
            'name' =>'varchar(255)',
            'picture' => 'varchar(255)',
            'filename' => 'varchar(255)',
            'comments' => 'text',
            'birthdate' => 'date',
            'dateofdeath' =>'date',
            'created_at'=>'timestamp',
            'updated_at'=>'timestamp'
        ]);
    }

    public function down()
    {
        $this->dropTable('birthday');
    }
}
