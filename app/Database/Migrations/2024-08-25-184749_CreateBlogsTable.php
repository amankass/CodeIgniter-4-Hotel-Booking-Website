<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBlogsTable extends Migration
{
    public function up()
{

    $this->forge->addField([
        'id'          => [
            'type'           => 'INT',
            'auto_increment' => true,
        ],
        'user_id'     => [
            'type'       => 'INT',
            'constraint' => 11,
        ],
        'title'       => [
            'type' => 'VARCHAR',
            'constraint' => '255',
        ],
        'content'     => [
            'type' => 'TEXT',
        ],
        'created_at'  => [
            'type' => 'DATETIME',
            'null' => true,
        ],
        'updated_at'  => [
            'type' => 'DATETIME',
            'null' => true,
        ],
    ]);
    $this->forge->addColumn('blogs', [
        'image' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
            'null'       => true,
        ],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('blogs');
}

    public function down()
    {
        $this->forge->dropColumn('blogs', 'image');
    }
}
