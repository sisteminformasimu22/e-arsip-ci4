<?php

namespace App\Controllers;

use App\Models\Kategori_models;

class Kategori extends BaseController
{
    protected $Kategori_models;
    public function __construct()
    {
        helper('form');
        $this->Kategori_models = new Kategori_models();
    }
    public function index()
    {
        $data = [
            'title' => 'Kategori | E-Arsip',
            'menu' => 'kategori',
            'kategori' => $this->Kategori_models->all_data()
        ];
        return view('v_kategori', $data);
    }
    public function tambah()
    {
        $data = ['nama_kategori' => $this->request->getPost()];
        $this->Kategori_models->add($data);
        session()->setFlashdata('swal_icon', 'success');
        session()->setFlashdata('swal_title', 'Berhasil');
        session()->setFlashdata('swal_text', 'Tambah Data Kategori Berhasil');
        return redirect()->to(base_url('/kategori'));
    }
    public function ubah($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost()
        ];
        $this->Kategori_models->edit($data);
        session()->setFlashdata('swal_icon', 'success');
        session()->setFlashdata('swal_title', 'Berhasil');
        session()->setFlashdata('swal_text', 'Update Data Kategori Berhasil');
        return redirect()->to(base_url('/kategori'));
    }
    public function hapus($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori
        ];
        $this->Kategori_models->hapus($data);
        session()->setFlashdata('swal_icon', 'success');
        session()->setFlashdata('swal_title', 'Berhasil');
        session()->setFlashdata('swal_text', 'Data Kategori Berhasil dihapus');
        return redirect()->to(base_url('/kategori'));
    }
}
