<?php

namespace App\Models;

use CodeIgniter\Model;


class Model_users1 extends Model
{
    protected $table = 'vw_users_join_siswa';
    protected $useTimestamps;
    protected $db, $builder;
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nisn','nis', 'nama', 'alamat', 'no_telepon',];
    public function __construct()
    {
        // $this->db      = \Config\Database::connect();
        // $this->builder = $this->db->table('t_kelas');
    }
    public function get_users()
    {
        return $this->get();
    }
    public function get_data_users($id)
    {
        $this->where('id', $id);
        return $this->get();
    }
}
