<?php

namespace App\Controllers;

use phpDocumentor\Reflection\PseudoTypes\True_;
use CodeIgniter\Models\M_Auth;

class Auth extends BaseController
{
    public function index()
    {
        
        return view('Auth\login');
    }


}
