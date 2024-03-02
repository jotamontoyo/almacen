<?php

namespace App\Controllers;


use App\Models\AlmacenModel;
use CodeIgniter\HTTP\ResponseInterface;

class Almacen extends BaseController
{


    private $almacenModel;
    
    public function __construct()
    {
        $this->almacenModel = new AlmacenModel();
    }

    protected $helpers = ['form']; // permite usar las funciones del helper form

 
 
 
 
 
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {

        if (!auth()->user()) {
            /*return $this->respond($this->genericResponse(
                ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
                'Invalid credentials',
                true,
                []
            ), ResponseInterface::HTTP_INTERNAL_SERVER_ERROR); */
            echo ResponseInterface::HTTP_INTERNAL_SERVER_ERROR;
            return redirect()->back()->withInput()->with('error', 'No tiene acceso');
            exit;
        }
        $db = \Config\Database::connect(); // conexion a db
        $query = $db->table('almacen');
        $query->select
        ('
            almacen.id,
            almacen.nombre,
            almacen.descripcion
        ')
        ->where(['fecha_elimina' => NULL]); //lo hago aqui para que el framework no lo muestre
        $query = $query->get();
        $resultado = $query->getResultArray();
        $data = ['titulo' => 'Listado de almacenes', 'almacenes' => $resultado];
        return view('almacen/index', $data);     // devuelve la vista con layout
    }







    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $almacen = $this->almacenModel->find($id);
        $db = \Config\Database::connect();
        $query = $db->table('stock');
        $query->select
        ('
            stock.id,
            stock.codigo_almacen,
            stock.codigo_producto,
            stock.cantidad,
            productos.nombre AS producto
        ')
        ->where(['stock.codigo_almacen' => $almacen['id']])
        ->join('productos', 'stock.codigo_producto = productos.codigo', false)
        ->orderBy('producto', 'asc');
        $query = $query->get();
        $resultado = $query->getResultArray();
        $data = ['titulo' => 'Descripción del Almacén','almacen' => $almacen, 'stocks' => $resultado];
        return view('almacen/show', $data);
    }








    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = ['titulo' => 'Altas de Almacén'];
        return view('almacen/new', $data);
    }







    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $request= \Config\Services::request();
        $data = [
            'id' =>$request->getPostGet('id'),
            'nombre' =>$request->getPostGet('nombre'),
            'descripcion' =>$request->getPostGet('descripcion'),
            'fecha_alta' =>$request->getPostGet('datetime')
        ];
        $this->almacenModel->insert($data, false);
        return redirect('Almacen::index');
    }









    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $almacen = $this->almacenModel->find($id);
        $data = 
        [
            'titulo' => 'Editar almacen',
            'almacen' => $almacen,
            'id' => $id
        ];
        return view('almacen/edit', $data);
    }






    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $request= \Config\Services::request();
        $data = [
            'id' => $request->getPostGet('id'),
            'nombre' => $request->getPostGet('nombre'),
            'descripcion' => $request->getPostGet('descripcion')
        ];
        $this->almacenModel->update($id, $data);
        return redirect()->to(base_url('almacen/'.$id));        //volver pagina anterior
    }
 
 
 
 
    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->almacenModel->delete($id);
        return redirect('Almacen::index');
    }





}
