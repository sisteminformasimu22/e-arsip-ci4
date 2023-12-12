<?php

namespace App\Controllers;

use App\Models\Dep_models;

class Dep extends BaseController
{
    protected $Dep_models;
    public function __construct()
    {
        helper('form');
        $this->Dep_models = new Dep_models();
    }
    public function index()
    {
        $data = [
            'title' => 'Departemen | E-Arsip',
            'menu' => 'departemen',
            'departemen' => $this->Dep_models->all_data()
        ];
        return view('v_dep', $data);
    }
    public function tambah()
    {
        $data = ['nama_dep' => $this->request->getPost()];
        $this->Dep_models->add($data);
        session()->setFlashdata('swal_icon', 'success');
        session()->setFlashdata('swal_title', 'Berhasil');
        session()->setFlashdata('swal_text', 'Tambah Data Departemen Berhasil');
        return redirect()->to(base_url('/departemen'));
    }
    public function ubah($id_dep)
    {
        $data = [
            'id_dep' => $id_dep,
            'nama_dep' => $this->request->getPost()
        ];
        $this->Dep_models->edit($data);
        session()->setFlashdata('swal_icon', 'success');
        session()->setFlashdata('swal_title', 'Berhasil');
        session()->setFlashdata('swal_text', 'Update Data Departemen Berhasil');
        return redirect()->to(base_url('/departemen'));
    }
    public function hapus($id_dep)
    {
        $data = [
            'id_dep' => $id_dep
        ];
        $this->Dep_models->hapus($data);
        session()->setFlashdata('swal_icon', 'success');
        session()->setFlashdata('swal_title', 'Berhasil');
        session()->setFlashdata('swal_text', 'Data Departemen Berhasil dihapus');
        return redirect()->to(base_url('/departemen'));
    }
}
