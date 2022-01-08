<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class ItemModel extends Model{

    protected $table = 'tb_item';
    protected $primaryKey = 'kode_barang';
    protected $returnType = "object";
    protected $allowedFields = [
        'id_transaksi',
        'kode_barang',
        'nama_barang',
        'jumlah',
        'lokasi',
        'tanggal_masuk'
    ];

}