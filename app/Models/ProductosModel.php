<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model {

    protected $table      = 'productos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array'; //object
    protected $useSoftDeletes = true;

    protected $allowedFields = ['codigo', 'nombre', 'precio', 'stock', 'id_almacen', 'estatus', 'fecha_elimina'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime'; //date //int
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'fecha_elimina';

}
