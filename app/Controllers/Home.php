<?php

namespace App\Controllers;

use App\Models\Home_models;

class Home extends BaseController
{
    protected $Home_models;
    public function __construct()
    {
        $this->Home_models = new Home_models();
    }
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard | E-Arsip',
            'tot_user' => $this->Home_models->tot_user(),
            'tot_dep' => $this->Home_models->tot_dep(),
            'tot_kategori' => $this->Home_models->tot_kategori(),
            'tot_arsip' => $this->Home_models->tot_arsip(),
            'menu' => 'dashboard',
        ];
        return view('dashboard', $data);
    }
}
