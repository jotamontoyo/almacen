<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
    protected $table            = 'stock';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['almacen', 'producto', 'cantidad'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'fecha_elimina';
}
