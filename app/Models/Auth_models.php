<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_models extends Model
{
    protected $table      = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_user', 'email', 'pw', 'level', 'id_dep'];

    public function cek_login($email, $password)
    {
        return $this->db->table('tbl_user')
            ->where([
                'email' => $email,
                'pw' => $password
            ])->get()->getRowArray();
    }
    public function addUser($data)
    {
        return $this->db->table('tbl_user')->insert($data);
    }
}
