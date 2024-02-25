<?php

//este archivo se crea desde la terminal

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreaTablaCategorias extends Migration
{
    public function up() //crea o modifica registros
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ]
        ]);

        $this->forge->addKey('id');
        $this->forge->createTable('categorias');

    }

    public function down() //revierte modificaciones
    {
        $this->forge->dropTable('categorias');
    }
}
