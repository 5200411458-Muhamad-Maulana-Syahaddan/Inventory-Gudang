<?php

namespace App\Controllers;


class Register extends BaseController
{
    public function index()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username'      => 'required|min_length[2]|max_length[50]|is_unique[tb_users.username]',
                'email'         => 'required|min_length[4]|max_length[100]|is_unique[tb_users.email]',
                'password'      => 'required|min_length[4]|max_length[50]',
                'confirm_pass'  => 'matches[password]'
            ];

            if ($this->validate($rules)) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password =  $_POST['password'];

                $insert = [
                    'username'   => $username,
                    'email'      => $email,
                    'password'   => password_hash($password, PASSWORD_DEFAULT),
                    'id_role'    => 1,
                    'img'        => 'asdfjasdlf'
                ];

                if ( $this->M_Auth->register('tb_users', $insert))
                {
                    return redirect()->route('/');
                }

            } else {
                $data['error'] = $this->validator;
            }

        }
        return view('Auth\register', $data);
    }
}
