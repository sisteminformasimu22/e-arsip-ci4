<?php

namespace App\Models;

use CodeIgniter\Model;

class Arsip_models extends Model
{
    protected $table      = 'tbl_arsip';
    protected $primaryKey = 'id_arsip';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_arsip', 'id_kategori', 'no_arsip', 'nama_file', 'deskripsi', 'tgl_upload', 'tgl_update', 'file_arsip', 'id_dep', 'id_user'];

    public function all_data()
    {
        return $this->db->table('tbl_arsip')
            ->join('tbl_dep', 'tbl_dep.id_dep = tbl_arsip.id_dep', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user', 'left')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori', 'left')
            ->orderBy('id_arsip', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function detail($id_arsip)
    {
        return $this->db->table('tbl_arsip')
            ->join('tbl_dep', 'tbl_dep.id_dep = tbl_arsip.id_dep', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user', 'left')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori', 'left')
            ->where('id_arsip', $id_arsip)
            ->get()
            ->getRowArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_arsip')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_arsip')
            ->where('id_arsip', $data['id_arsip'])
            ->update($data);
    }
    public function hapus($data)
    {
        $this->db->table('tbl_arsip')
            ->where('id_arsip', $data['id_arsip'])
            ->delete($data);
    }
}
