<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateUserTable extends Migration
{
    public function up()
    {
        $fields = [
            'name'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'after'      => "username"
            ],
            'phone'   => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
                'after'     => "username"
            ],
            'position'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'after'     => "username"
            ],
            'level'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'after'     => "username"
            ],
            'company_id'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'after'     => "username"
            ],
        ];
        $this->forge->addColumn('users',$fields);
    }

    public function down()
    {
        //
    }
}
