<?php

// este archivo se crea desde la terminal

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombre' => 'Calzado'
            ],
            [
                'nombre' => 'Deportes'
            ],
            [
                'nombre' => 'Electronica'
            ]
        ];
        $this->db->table('categorias')->insertBatch($data);
    }
}
