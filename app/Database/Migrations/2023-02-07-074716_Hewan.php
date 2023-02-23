<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hewan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_hewan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'harga_hewan' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'warna_hewan' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hewan');
    }

    public function down()
    {
        $this->forge->dropTable('hewan');
    }
}
