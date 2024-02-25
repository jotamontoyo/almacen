<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregaPrecioProductos extends Migration
{
    public function up()
    {
        $campos = [
            'precio' => [
                'type' => 'DECIMAL',
                'contraint' => '10,2',
                'after' => 'nombre',
                'null' => false
            ]
        ];

        $this->forge->addColumn('productos', $campos);


    }

    public function down()
    {
        $this->forge->dropColumn('productos', 'precio'); // o desde la terminal con php spark migrate:rollback -b 1. 1 es el batch de la tabla migrations
    }
}
