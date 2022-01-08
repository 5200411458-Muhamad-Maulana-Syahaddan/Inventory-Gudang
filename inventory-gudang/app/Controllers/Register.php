<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use CodeIgniter\Exceptions\PageNotFoundException;


class Register extends BaseController
{
    public function index()
    {
        return view('Auth\register');
    }

    public function process()
    {

        $rules = [
            'username'      => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[tb_users.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Username Sudah digunakan'
                ]
            ],
            'email'      => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'password'      => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'confirm_pass'      => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sama!',

                ]
            ]
        ];

        if ($this->validate($rules)) {
            // jika validasi berhasil
            $this->userModel->insert([
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'id_role' => 1,
                'password' => password_hash($this-> request -> getVar('password') , PASSWORD_DEFAULT),
                'img' => 'default.png'
            ]);
            return redirect()->to(base_url('/'));
        } else {
            //jika validasi gagal
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }
}
