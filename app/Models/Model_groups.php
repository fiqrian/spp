<?php

namespace App\Models;

use CodeIgniter\Model;


class Model_groups extends Model
{
    protected $table = 'auth_groups_users';
    protected $useTimestamps;
    protected $db, $builder;
    // protected $primaryKey = 'group_id';
    protected $allowedFields = ['group_id', 'user_id',];
    public function __construct()
    {
        // $this->db      = \Config\Database::connect();
        // $this->builder = $this->db->table('t_kelas');
    }
    public function get_groups()
    {
        return $this->get();
    }
    public function simpangroups()
    {
        $request = \Config\Services::request();
        $this->save([
            'group_id' => $request->getPost('group_id'),
            'user_id' => $request->getPost('user_id'),

        ]);
    }
}
