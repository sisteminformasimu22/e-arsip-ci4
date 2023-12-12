<?php

namespace App\Models;

use CodeIgniter\Model;

class User_models extends Model
{
    protected $table      = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_user', 'nama_user', 'email', 'pw', 'level', 'id_dep'];

    public function all_data()
    {
        return $this->db->table('tbl_user')
            ->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_dep', 'left')
            ->orderBy('id_user', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function detail($id_user)
    {
        return $this->db->table('tbl_user')
            ->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_dep', 'left')
            ->where('id_user', $id_user)
            ->get()
            ->getRowArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_user')
            ->where('id_user', $data['id_user'])
            ->update($data);
    }
    public function hapus($data)
    {
        $this->db->table('tbl_user')
            ->where('id_user', $data['id_user'])
            ->delete($data);
    }
}
