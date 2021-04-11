<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_siswa1 extends Model
{
    protected $table = 't_siswa';
    protected $useTimestamps;
    protected $db, $builder;
    protected $primaryKey = 'nisn';
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
    public function simpansiswa()
    {
        $request = \Config\Services::request();
        $isidata = array(
            'nisn'      => $request->getPost('nisn'),
            'nis'       => $request->getPost('nis'),
            'nama'      => $request->getPost('nama'),
            'id_kelas'  => $request->getPost('kelas'),
            'alamat'    => $request->getPost('alamat'),
            'no_telepon' => $request->getPost('no_telepon'),
            'id_spp'    => $request->getPost('spp'),
        );
        $this->insert($isidata);
    }
    public function get_siswa_by_id($id_siswa)
    {
        $this->where('nisn', $id_siswa);
        return $this->builder->get()->getRow();
    }
    public function get_id_by_siswa_edit($nisn)
    {
        $this->where('nisn', $nisn);
        return $this->get();
    }
    public function Update_siswa()
    {
        $request = \Config\Services::request();
        $this->save([
            'nisn'  =>   $request->getPost('nisn'),
            'nis' =>     $request->getPost('nis'),
            'nama'  =>   $request->getPost('nama'),
            'alamat' =>  $request->getPost('alamat'),
            'no_telepon' => $request->getPost('no_telepon'),
            'id_kelas'    => $request->getPost('id_kelas'),
            'id_spp'    => $request->getPost('id_spp'),
        ]);
    }
}
