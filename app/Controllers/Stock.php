<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StockModel;

class Stock extends BaseController
{


    private $StockModel;
    
    public function __construct()
    {
        $this->StockModel = new StockModel();
    }

    protected $helpers = ['form']; // permite usar las funciones del helper form



    public function index()
    {
        //
    }
}
