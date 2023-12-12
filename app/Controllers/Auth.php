<?php

namespace App\Controllers;

use App\Models\Auth_models;

class Auth extends BaseController
{
    protected $Auth_models;
    public function __construct()
    {
        helper('form');
        $this->Auth_models = new Auth_models();
    }
    public function dashboard()
    {
        return view('layout/dashboard');
    }
    public function login()
    {
        $data = [
            'title' => 'Login | E-Arsip',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];
        return view('layout/login', $data);
    }
    public function cek_login()
    {
        if (!$this->validate([
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to(base_url('/'))->withInput();
        } else {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $session = session();
            $cek = $this->Auth_models->cek_login($email, $password);
            if ($cek) {
                $login = [
                    'isLogin' => true,
                    'nama_user' => $cek['nama_user'],
                    'id_dep' => $cek['id_dep'],
                    'id_user' => $cek['id_user'],
                    'email' => $cek['email']
                ];
                $session->set($login);
                session()->setFlashdata('swal_icon', 'success');
                session()->setFlashdata('swal_title', 'Berhasil');
                session()->setFlashdata('swal_text', 'Login berhasil, Selamat datang ');
                return redirect()->to(base_url("/dashboard"));
            } else {
                return redirect()->back();
            }
        }
    }
    public function registrasi()
    {
        $data = [
            'title' => 'Registrasi | E-Arsip',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];
        return view('layout/registrasi', $data);
    }
    public function addUser()
    {
        if (!$this->validate([
            'nama_user' => [
                'label'  => 'Nama User',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to(base_url('/registrasi'))->withInput();
        } else {
            $nama_user = $this->request->getVar('nama_user');
            $email = $this->request->getVar('email');
            $pw = $this->request->getVar('password');
            $data = [
                'nama_user' => $nama_user,
                'email' => $email,
                'pw' => $pw,
                'level' => 2,
                'id_dep' => 7,
            ];
            $result = $this->Auth_models->addUser($data);
            if ($result) {
                session()->setFlashdata('swal_icon', 'success');
                session()->setFlashdata('swal_title', 'Berhasil');
                session()->setFlashdata('swal_text', 'Registrasi berhasil, Silahkan login ');
                return redirect()->to(base_url('/'))->withInput();
            } else {
                session()->setFlashdata('gagal', 'Anda gagal mendaftar. Silahkan coba kembali!');
                return redirect()->to(base_url('/registrasi'))->withInput();
            }
        }
    }

    public function logout()
    {
        session()->setFlashdata('swal_icon', 'success');
        session()->setFlashdata('swal_title', 'Berhasil');
        session()->setFlashdata('swal_text', 'Logout berhasil');
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
