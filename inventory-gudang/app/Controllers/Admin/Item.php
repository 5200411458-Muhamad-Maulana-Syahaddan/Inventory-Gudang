<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Item extends BaseController
{
    public function index()
    {
        $data = [];
        if (null !== (session()->get('username'))) {

            $data['username'] = session()->get('username');
            $data['navbar'] = 'Admin';

            return view('\Admin\layout\input_barang', $data);
        }
        return redirect()->to(base_url('/'));
    }

    public function input_item()
    {
        $data['TRANSID']   = "TRANSID-".strtoupper(uniqid());
        $rules = [
            'kodebarang'      => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[tb_item.kode_barang]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 2 Karakter',
                    'max_length' => '{field} Maksimal 25 Karakter',
                    'is_unique' => 'Username Sudah digunakan'
                ]
            ],
            'namabarang'      => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'jumlah'      => [
                'rules' => 'required|min_length[1]|max_length[50]|integer',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 1 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                    'integer' => '{field} Harus angka.'
                ]
            ],
            'lokasi'      => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ]
        ];

        if ($this->validate($rules)) {
            // jika validasi berhasil
            $this->itemModel->insert([
                'id_transaksi' => $data['TRANSID'],
                'kode_barang' => $this->request->getVar('kodebarang'),
                'nama_barang' => $this->request->getVar('namabarang'),
                'jumlah' => $this->request->getVar('jumlah'),
                'lokasi' => $this->request->getVar('lokasi'),
                'tabggal_masuk' => date('d / M / y')
            ]);
            session()->setFlashdata('msg', 'Berhasil Menambahkan Barang.');
            return redirect()->to(base_url('/input_barang'));
        } else {
            //jika validasi gagal
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

    }

    public function getItem(){
        return view('\Admin\layout\table_item');
    }
}

