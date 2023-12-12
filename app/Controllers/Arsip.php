<?php

namespace App\Controllers;

use App\Models\Arsip_models;
use App\Models\Kategori_models;

class Arsip extends BaseController
{
    protected $Arsip_models;
    protected $Kategori_models;
    public function __construct()
    {
        helper('form');
        $this->Arsip_models = new Arsip_models();
        $this->Kategori_models = new Kategori_models();
    }
    public function index()
    {
        $data = [
            'title' => 'Arsip | E-Arsip',
            'arsip' => $this->Arsip_models->all_data(),
            'menu' => 'arsip'
        ];
        return view('arsip/v_index', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Form Tambah Arsip | E-Arsip',
            'arsip' => $this->Arsip_models->all_data(),
            'kategori' => $this->Kategori_models->all_data(),
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
            'menu' => 'arsip'
        ];
        return view('arsip/v_add', $data);
    }
    public function tambah()
    {
        if (!$this->validate([
            'nama_file' => [
                'label'  => 'Nama Arsip',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'file_arsip' => [
                'label'  => 'File Arsip',
                'rules'  => 'uploaded[file_arsip]|max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
                'errors' => [
                    'uploaded' => '{field} tidak boleh kosong.',
                    'max_size' => 'Ukuran {field} maksimal 2048 KB.',
                    'ext_in' => 'Format {field} harus .PDF',
                ],
            ],
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to(base_url('/arsip/add'))->withInput();
        } else {
            $file_arsip = $this->request->getFile('file_arsip');
            $nama_file = $file_arsip->getRandomName();
            $ukuran = $file_arsip->getSize();
            $data = [
                'no_arsip' => $this->request->getPost('no_arsip'),
                'nama_file' => $this->request->getPost('nama_file'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tgl_upload' => date('Y-m-d'),
                'tgl_update' => date('Y-m-d'),
                'file_arsip' => $nama_file,
                'ukuran' => $ukuran,
                'id_dep' => session()->get('id_dep'),
                'id_user' => session()->get('id_user'),
            ];
            $file_arsip->move('file_arsip', $nama_file);
            $this->Arsip_models->add($data);
            session()->setFlashdata('swal_icon', 'success');
            session()->setFlashdata('swal_title', 'Berhasil');
            session()->setFlashdata('swal_text', 'Tambah Data Arsip Berhasil');
            return redirect()->to(base_url('/arsip'));
        }
    }
    public function edit($id_arsip)
    {
        $data = [
            'title' => 'Form Edit Arsip | E-Arsip',
            'arsip' => $this->Arsip_models->detail($id_arsip),
            'kategori' => $this->Kategori_models->all_data(),
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
            'menu' => 'arsip'
        ];
        return view('arsip/v_edit', $data);
    }
    public function update($id_arsip)
    {
        if (!$this->validate([
            'nama_file' => [
                'label'  => 'Nama Arsip',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'file_arsip' => [
                'label'  => 'File Arsip',
                'rules'  => 'max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 2048 KB.',
                    'ext_in' => 'Format {field} harus .PDF',
                ],
            ],
        ])) {
            // Jika error
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to(base_url('/arsip/edit/' . $id_arsip))->withInput();
        } else {
            $file_arsip = $this->request->getFile('file_arsip');
            if ($file_arsip->getError() == 4) {
                $data = [
                    'id_arsip' => $id_arsip,
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'nama_file' => $this->request->getPost('nama_file'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('Y-m-d'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                ];
                $this->Arsip_models->edit($data);
                session()->setFlashdata('swal_icon', 'success');
                session()->setFlashdata('swal_title', 'Berhasil');
                session()->setFlashdata('swal_text', 'Edit Data Arsip Berhasil');
                return redirect()->to(base_url('/arsip'));
            } else {
                $arsip = $this->Arsip_models->detail($id_arsip);
                if ($arsip['file_arsip'] != "") {
                    unlink('file_arsip/' . $arsip['file_arsip']);
                } else {
                    $nama_file = $file_arsip->getRandomName();
                    $ukuran = $file_arsip->getSize();
                    $data = [
                        'id_arsip' => $id_arsip,
                        'no_arsip' => $this->request->getPost('no_arsip'),
                        'nama_file' => $this->request->getPost('nama_file'),
                        'id_kategori' => $this->request->getPost('id_kategori'),
                        'deskripsi' => $this->request->getPost('deskripsi'),
                        'tgl_update' => date('Y-m-d'),
                        'file_arsip' => $nama_file,
                        'ukuran' => $ukuran,
                        'id_dep' => session()->get('id_dep'),
                        'id_user' => session()->get('id_user'),
                    ];
                    $file_arsip->move('file_arsip', $nama_file);
                    $this->Arsip_models->update($data);
                    session()->setFlashdata('swal_icon', 'success');
                    session()->setFlashdata('swal_title', 'Berhasil');
                    session()->setFlashdata('swal_text', 'Edit Data Arsip Berhasil');
                    return redirect()->to(base_url('/arsip'));
                }
            }
        }
    }
    public function hapus($id_arsip)
    {
        $arsip = $this->Arsip_models->detail($id_arsip);
        if ($arsip['file_arsip'] != "") {
            unlink('file_arsip/' . $arsip['file_arsip']);
        }
        $data = [
            'id_arsip' => $id_arsip
        ];
        $this->Arsip_models->hapus($data);
        session()->setFlashdata('swal_icon', 'success');
        session()->setFlashdata('swal_title', 'Berhasil');
        session()->setFlashdata('swal_text', 'Data Arsip Berhasil dihapus');
        return redirect()->to(base_url('/arsip'));
    }
    public function viewpdf($id_arsip)
    {
        $data = [
            'title' => 'View PDF Arsip | E-Arsip',
            'arsip' => $this->Arsip_models->detail($id_arsip),
            'menu' => 'arsip'
        ];
        return view('arsip/v_viewpdf', $data);
    }
}
