<?php

namespace App\Controllers\Operator;
use App\Controllers\BaseController;

class Operator extends BaseController
{
    public function index()
    {
        return view('Operator\dashboard');
    }
    public function tambahbarang(){
        return view('form_input_barang\input_barang');
    }
}
