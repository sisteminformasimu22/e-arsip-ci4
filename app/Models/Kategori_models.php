<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_models extends Model
{
    protected $table      = 'tbl_kategori';
    protected $primaryKey = 'id_kategori';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_kategori', 'nama_kategori'];

    public function all_data()
    {
        return $this->db->table('tbl_kategori')
            ->orderBy('id_kategori', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_kategori')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->update($data);
    }
    public function hapus($data)
    {
        $this->db->table('tbl_kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->delete($data);
    }
}
