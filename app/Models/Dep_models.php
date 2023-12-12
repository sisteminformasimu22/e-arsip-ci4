<?php

namespace App\Models;

use CodeIgniter\Model;

class Dep_models extends Model
{
    protected $table      = 'tbl_dep';
    protected $primaryKey = 'id_dep';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_dep', 'nama_dep'];

    public function all_data()
    {
        return $this->db->table('tbl_dep')
            ->orderBy('id_dep', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_dep')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_dep')
            ->where('id_dep', $data['id_dep'])
            ->update($data);
    }
    public function hapus($data)
    {
        $this->db->table('tbl_dep')
            ->where('id_dep', $data['id_dep'])
            ->delete($data);
    }
}
