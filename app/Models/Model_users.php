<?php

namespace App\Models;

use CodeIgniter\Model;


class Model_users extends Model
{
    protected $table = 'users';
    protected $useTimestamps;
    protected $db, $builder;
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'email', 'nisn', 'username', 'fullname', 'user_iamge', 'password'];
    public function __construct()
    {
        // $this->db      = \Config\Database::connect();
        // $this->builder = $this->db->table('t_kelas');
    }
    public function get_users()
    {
        return $this->get();
    }
    public function get_users_by_id($userid)
    {
        $this->where('id', $userid);
        return $this->builder->get()->getRow();
    }
    public function Hapususers()
    {
        $request = \Config\Services::request();
        $userid = $request->getPost('userid');
        $this->where('id', $userid)->delete();
    }
    public function simpankaitkan()
    {
        $request = \Config\Services::request();
        $this->save([
            'id' => $request->getPost('id'),
            'email' => $request->getPost('email'),
            'nisn'    => $request->getPost('nisn'),
        ]);
    }
    public function updateuser()
    {
        $request = \Config\Services::request();

        $this->save([
            'fullname' => $request->getPost('fullname'),
            'username' => $request->getPost('username'),
            'email'    => $request->getPost('email'),
            'password_hash' => $request->getPost('password'),
        ]);
    }
}
