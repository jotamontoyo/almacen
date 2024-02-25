<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Galeria extends BaseController
{




    public function index()
    {
        return view('formulario');
    }




    public function subir()
    {
        echo '<pre>';

        // print_r($_FILES);
        $file = $this->request->getFile('archivo');
        
        if (!$file->isValid()) {

            echo $file->getErrorString();
            exit;
        }

        $reglas = [
            'archivo' => [
                'label' => 'Archivo',
                'rules' => [
                    'is_image[archivo]',
                    'max_size[archivo, 100]',
                    'max:dims[archivo, 1024, 768'
                ]
            ]
        ];

        if ($this->validate($reglas)) {
            print_r($this->validator->getErrors());
            exit;
        }

        if (!$file->hasMoved()) {

            $ruta = ROOTPATH . 'public/images';
            $file->move($ruta, 'mi_img.jpg', false);

            echo ('Archivo cargado');

        }


        echo '</pre>';



    }
}
