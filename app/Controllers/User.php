<?php

namespace App\Controllers;

use App\Models\User_models;
use App\Models\Dep_models;

class User extends BaseController
{
    protected $User_models;
    protected $Dep_models;
    public function __construct()
    {
        helper('form');
        $this->User_models = new User_models();
        $this->Dep_models = new Dep_models();
    }
    public function user()
    {
        $data = [
            'title' => 'User | E-Arsip',
            'menu' => 'user',
            'user' => $this->User_models->all_data()
        ];
        return view('user/v_index', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Tambah User | E-Arsip',
            'menu' => 'user',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
            'dep' => $this->Dep_models->all_data()
        ];
        return view('user/v_add', $data);
    }
    public function tambah()
    {
        if (!$this->validate([
            'nama_user' => [
                'label'  => 'Nama user',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'is_unique' => '{field} sudah terdaftar, gunakan {field} lain.'
                ],
            ],
            'pw' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'id_dep' => [
                'label'  => 'Departemen',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to(base_url('/user/add'))->withInput();
        } else {
            $data = [
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'pw' => $this->request->getPost('pw'),
                'level' => $this->request->getPost('level'),
                'id_dep' => $this->request->getPost('id_dep'),
            ];
            $this->User_models->add($data);
            session()->setFlashdata('swal_icon', 'success');
            session()->setFlashdata('swal_title', 'Berhasil');
            session()->setFlashdata('swal_text', 'Tambah Data User Berhasil');
            return redirect()->to(base_url('/user'));
        }
    }
    public function edit($id_user)
    {
        $data = [
            'title' => 'Edit User | E-Arsip',
            'menu' => 'user',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
            'dep' => $this->Dep_models->all_data(),
            'user' => $this->User_models->detail($id_user)
        ];
        return view('user/v_edit', $data);
    }
    public function update($id_user)
    {
        if (!$this->validate([
            'nama_user' => [
                'label'  => 'Nama user',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'pw' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'id_dep' => [
                'label'  => 'Departemen',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to(base_url('/user/edit/' . $id_user))->withInput();
        } else {
            $data = [
                'id_user' => $id_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'pw' => $this->request->getPost('pw'),
                'level' => $this->request->getPost('level'),
                'id_dep' => $this->request->getPost('id_dep'),
            ];
            $this->User_models->edit($data);
            session()->setFlashdata('swal_icon', 'success');
            session()->setFlashdata('swal_title', 'Berhasil');
            session()->setFlashdata('swal_text', 'Edit Data User Berhasil');
            return redirect()->to(base_url('/user'));
        }
    }
    public function hapus($id_user)
    {
        $data = [
            'id_user' => $id_user
        ];
        $this->User_models->hapus($data);
        session()->setFlashdata('swal_icon', 'success');
        session()->setFlashdata('swal_title', 'Berhasil');
        session()->setFlashdata('swal_text', 'Data User Berhasil dihapus');
        return redirect()->to(base_url('/user'));
    }
}
