<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [];
        if (null !== (session()->get('username'))) {
            $data['sesi'] = [
                'username' => session()->get('username'),
                'email' => session()->get('email'),
                'img' => session()->get('img')
            ];
            return view('Admin\layout\Dashboard', $data);
        }
        return redirect()->to(base_url('/'));
    }
}
