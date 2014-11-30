<?php

use yii\db\Schema;
use yii\db\Migration;

class m141130_184504_page extends Migration
{
    public function up()
    {
        $this->createTable('page', 
            [
                'id'=> 'INT AUTO_INCREMENT PRIMARY KEY',
                'title' => 'VARCHAR(255)',
                'teaser' => 'MEDIUMTEXT',
                'body' => 'TEXT',
                'author' => Schema::TYPE_INTEGER,
                'status' => 'enum("draft","hidden","public")',
                'created_at' => Schema::TYPE_TIMESTAMP,
                'updated_at' => Schema::TYPE_TIMESTAMP
                
            ]
            );
    }

    public function down()
    {
        echo "m141130_184504_page cannot be reverted.\n";

        return false;
    }
}
