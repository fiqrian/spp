<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_siswa extends Model
{
    protected $table = 'vw_siswa_join_kelas_spp';
    protected $useTimestamps;
    protected $db, $builder;
    // protected $primaryKey = 'id_kelas';
    protected $allowedFields = ['nisn', 'nis', 'nama', 'alamat', 'no_telepon', 'id_kelas', 'id_spp'];
    public function __construct()
    {
        // $this->db      = \Config\Database::connect();
        // $this->builder = $this->db->table('t_kelas');
    }
    public function get_siswa()
    {
        return $this->get();
    }
    // public function simpankelas()
    // {
    //     $request = \Config\Services::request();
    //     $isidata = array(
    //         'nisn'      => $this->input->post('nisn', TRUE),
    //         'nis'       => $this->input->post('nis', TRUE),
    //         'nama'      => $this->input->post('nama', TRUE),
    //         'id_kelas'  => $this->input->post('kelas', TRUE),
    //         'alamat'    => $this->input->post('alamat', TRUE),
    //         'no_telepon' => $this->input->post('no_telepon', TRUE),
    //         'id_spp'    => $this->input->post('spp', TRUE),
    //     );
    //     $this->insert($isidata);
    //     return redirect()->back();
    // }
}
