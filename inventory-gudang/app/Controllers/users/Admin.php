<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        return view('Admin\dashboard');
    }
    public function tambahbarang(){
        return view('form_input_barang\input_barang');
    }
}
