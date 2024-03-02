<?php

namespace App\Controllers;


use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    protected $helpers = ['shield'];

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
       
        return view('index');
    }

}