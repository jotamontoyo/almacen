<?php

namespace App\Controllers;

use App\Models\ProductosModel;
use CodeIgniter\HTTP\ResponseInterface;

class Productos extends BaseController
{

    private $productoModel;
    protected $helpers = ['form']; // permite usar las funciones del helper form

    public function __construct()
    {
        $this->productoModel = new ProductosModel();
    }




    public function index()
    {

        /*if (!auth()->user()) {
            /*return $this->respond($this->genericResponse(
                ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
                'Invalid credentials',
                true,
                []
            ), ResponseInterface::HTTP_INTERNAL_SERVER_ERROR); */
        /*    echo ResponseInterface::HTTP_INTERNAL_SERVER_ERROR;
            return redirect()->back()->withInput()->with('error', 'No tiene acceso');
            exit;
        }*/


        $db = \Config\Database::connect(); // conexion a db
        /*$condicion = ['estatus' => 1, 'stock >' => 4];
        $query = $db->table('productos')
        ->select('id, codigo, nombre, id_almacen, stock')
        ->where($condicion)
        ->orderBy('nombre', 'asc')
        ->limit(1)
        ->get(); */
        $query = $db->table('productos');
        $query->select
        ('
            productos.id,
            productos.codigo,
            productos.nombre,
            productos.fecha_elimina
        ');
        $query->where(['productos.fecha_elimina' => NULL]);
        $query = $query->get();
        $resultado = $query->getResultArray();

        /*$productObject = new ProductosModel();
        $user_data = $productObject->findById(auth()->id());
        $token = $user_data->generateAccessToken("Api Shield");
        $auth_token = $token->raw_token;*/

        


 //       echo $db->getLastQuery(); // muestra el SQL

//        $productoModel = new ProductosModel();
//        $resultado = $productoModel->where('estatus', 1)->findAll(); //trae todos los registros con estatus 1

        $data = ['titulo' => 'Catalogo de Productos', 'productos' => $resultado];
        return view('productos/index', $data);     // devuelve la vista con layout

    }





    public function new()
    {
        $data = ['titulo' => 'Altas de Producto'];
        return view('productos/new', $data);
    }





    


    


    public function create()
    {   
        $reglas = [                     // de validacion
            'codigo' => [
                'label' => 'código',
                'rules' => 'required|is_unique[productos.codigo]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'is_unique' => 'El campo {field} debe ser único'
                ],
            ],
            'nombre' => [
                'label' => 'nombre',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio'
                ],
            ],
            'precio' => [
                'label' => 'precio',
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'greater_than' => 'El campo {field} tiene que ser mayor a cero'
                ],
            ]
        ];
        if(!$this->validate($reglas)){ //si no se cumplen las reglas
            return redirect()->back()->withInput();
        } else {
            $request= \Config\Services::request();
            $data = 
            [
                'id' =>$request->getPostGet('id'),
                'codigo' =>$request->getPostGet('codigo'),
                'nombre' =>$request->getPostGet('nombre'),
                'precio' =>$request->getPostGet('precio'),
                'fecha_alta' =>$request->getPostGet('datetime')
            ];
            $this->productoModel->insert($data, false);
            return redirect('Productos::index');
        }
    }



    







  







    public function show($id)
    {
        $producto = $this->productoModel->find($id);
        $db = \Config\Database::connect(); // conexion a db
        $query = $db->table('stock');
        $query->select
        ('
            stock.id,
            stock.codigo_almacen,
            stock.codigo_producto,
            stock.cantidad,
            almacen.nombre AS almacen
        ')
        ->where(['stock.codigo_producto' => $producto['codigo']])
        ->join('almacen', 'stock.codigo_almacen = almacen.id', false)
        ->orderBy('almacen.id', 'asc');
        $query = $query->get();
        $resultado = $query->getResultArray();
        $data = ['titulo' => 'Descripción del Producto', 'producto' => $producto, 'stocks' => $resultado];
        return view('productos/show', $data);
    }







    public function edit($id = null)
    {
        $producto = $this->productoModel->find($id);
        $data = 
        [
            'titulo' => 'Editar producto',
            'producto' => $producto,
            'id' => $id
        ];
        return view('productos/edit', $data);
    }






    public function update($id = null)
    {
        $reglas = [                     
            'nombre' => [
                'label' => 'nombre',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio'
                ],
            ],
            'precio' => [
                'label' => 'precio',
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'greater_than' => 'El campo {field} tiene que ser mayor a cero'
                ],
            ]
        ];
        if(!$this->validate($reglas)){ 
            return redirect()->back()->withInput();
        } else {
            $request= \Config\Services::request();
            $data = [
                'nombre' => $request->getPostGet('nombre'),
                'precio' => $request->getPostGet('precio')
            ];
            $this->productoModel->update($id, $data);
            return redirect()->to(base_url('productos/'.$id));        //volver pagina anterior
        }
    }




    public function cat($categoria, $id)
    {
        echo "<h2>Categoría: $categoria <br> Producto: $id</h2>";
    }



    /*public function modalElimina($id = null)
    {
        $producto = $this->productoModel->find($id);
        $data = 
        [
            'titulo' => 'Eliminar producto',
            'producto' => $producto
        ];
        return view('productos/modalElimina', $data);
    }*/

    public function delete($id = null)
    {
        $this->productoModel->delete($id);
        return redirect('Productos::index');
    }





    public function invalidRequest() 
    {
        
        return redirect()->back()->withInput()->with('error', 'Acceso prohibido');
        
    }




}
