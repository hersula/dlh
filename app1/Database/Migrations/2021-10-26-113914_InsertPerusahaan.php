<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertPerusahaan extends Migration
{
    public function up()
    {
        $fields = [
            'company_id'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'company_name'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'company_address'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'company_email'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'provinces_id'   => [
                'type'       => 'INT',
            ],
            'regencies_id'   => [
                'type'       => 'INT',
            ],
            'districts_id'   => [
                'type'       => 'INT',
            ],
            'villages_id'   => [
                'type'       => 'INT',
            ],
            'post_code'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'company_phone'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'type_industry'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'crt_at'   => [
                'type'       => 'DATETIME',
                'null'           => true,
            ],
            'crt_by'   => [
                'type'       => 'INT',
                'null'           => true,
            ],
            'upd_at'   => [
                'type'       => 'DATETIME',
                'null'           => true,
            ],
            'upd_by'   => [
                'type'       => 'INT',
                'null'           => true,
            ],
            'del_at'   => [
                'type'       => 'DATETIME',
                'null'           => true,
            ],
            'del_by'   => [
                'type'       => 'INT',
                'null'           => true,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('company_id', TRUE);
        $this->forge->createTable('company',TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('company');
    }
}
