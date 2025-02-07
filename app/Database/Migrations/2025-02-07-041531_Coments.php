<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class Coments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'post_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'content' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_by' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
                'update' => new RawSql('CURRENT_TIMESTAMP')
            ]
        ]);
        $this->forge->addKey('id',true); 
        $this->forge->addForeignKey('post_id','posts','id');
        $this->forge->addForeignKey('created_by','users','id');
        $this->forge->createTable('comments');
    }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}
