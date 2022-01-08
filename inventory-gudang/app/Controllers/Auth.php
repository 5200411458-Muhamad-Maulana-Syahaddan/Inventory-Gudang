<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        return view('Auth\login');
    }
    public function signin()
    {

        if (!isset($_POST['username'])){
            return view('Auth\login'); 
        }

        $username = $this->request->getVar('username');
        $password = $this-> request -> getVar('password'); 
        $dataUser = $this->userModel->where([
            'username' => $username,
        ])->first();

        if ( $dataUser ){
            if ( password_verify($password, $dataUser->password)){
                session()->set([
                    'username' => $dataUser->username,
                    'email' => $dataUser->email,
                    'img' => $dataUser->img,
                ]);

                if ($dataUser->id_role == "1" ){
                    return redirect()->to(base_url('/Admin'));
                }
                elseif ( $dataUser -> id_role == "2"){
                    return redirect()->to(base_url('/Operator'));
                }
                else{
                    return redirect()->to(base_url('/Users'));
                }

            }else{
                session()->setFlashdata('error', 'Password yang anda masukkan salah!');
                return redirect()->back()->withInput();
            }
        }else{
            session()->setFlashdata('error', 'Username belum terdaftar!');
            return redirect()->back()->withInput();
        }
    }
}