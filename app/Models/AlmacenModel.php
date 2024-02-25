<?php

namespace App\Models;

use CodeIgniter\Model;

class AlmacenModel extends Model
{
    protected $table            = 'almacen';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['nombre', 'descripcion'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'fecha_elimina';

    
}
