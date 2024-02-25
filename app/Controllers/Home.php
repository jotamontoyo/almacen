<?php

namespace App\Controllers;

use Throwable;

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        // echo "Hola CI4";

        
        /*$migrate = \Config\Services::migrations();
        try {
            $migrate->latest(); //ejecuta la ultima migracion definida en \Database\Migrations. Tambien se puede desde la termial: php spark migrate
            //$migrate ->regress(-1);
        } 
        catch(Throwable $e)
        {
            echo $e;
        }*/

        /*$seeder = \Config\Database::seeder(); 
        $seeder->call('CategoriasSeeder'); //procesa el seeder. Desde terminal php spark db:seed CategoriasSeeder */

        /*helper('util_helper');
        echo generaToken();*/

 
    }

    
}
