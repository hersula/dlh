<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertSiteWWTP extends Migration
{
    public function up()
    {
        $fields = [
            'siteWWTPID'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'perusahaanID'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'siteID'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'           => true,
            ],
            'adminsiteID'    => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'           => true,
            ],
            'nama_wwtp'      => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'           => true,
            ],
            'alamat_wwtp'    => [
                'type'       => 'TEXT',
                'null'           => true,
            ],
            'longitude_wwtp' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'           => true,
            ],
            'latitude_wwtp'  => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'created_at'     => [
                'type'       => 'DATETIME',
                'null'           => true,
            ],
            'created_by'     => [
                'type'       => 'INT',
                'null'           => true,
            ],
            'updated_at'     => [
                'type'       => 'DATETIME',
                'null'           => true,
            ],
            'updated_by'     => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'deleted_at'     => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'deleted_by'     => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'konfirmasi_at'  => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'konfirmasi_by'  => [
                'type'       => 'INT',
                'null'       => true,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('siteWWTPID', TRUE);
        $this->forge->createTable('site_wwtp',TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('site_wwtp');
    }
}
