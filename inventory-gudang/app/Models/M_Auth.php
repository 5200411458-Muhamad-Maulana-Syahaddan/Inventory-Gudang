<?php
namespace App\Models;
use CodeIgniter\Model;
class M_Auth extends Model {
  
    public function register($tabel,$data)
    {
         return $this->db->table($tabel)->insert($data);
    }
    
      public function cek_username($tabel,$username)
      {
        return $this->builder->select('username')
                 ->from($tabel)
                 ->where('username',$username)
                 ->get();
      }
    
}