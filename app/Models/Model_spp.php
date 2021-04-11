<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_spp extends Model
{
    protected $table = 't_kelas';
    protected $useTimestamps;
    protected $db, $builder;
    protected $primaryKey = 'id_kelas';
    protected $allowedFields = ['id_kelas', 'nama_kelas', 'kompetensi_keahlian'];
    public function __construct()
    {
        // $this->db      = \Config\Database::connect();
        // $this->builder = $this->db->table('t_kelas');
    }
    public function getkelas($id_kelas = false)
    {
        if ($id_kelas == false) {
            return $this->findAll();
        }
        return $this->where([
            'id_kelas' => $id_kelas,
        ]);
    }

    public function Get_data_kelas()
    {
        return $this->get();
    }
    public function simpankelas()
    {
        // $isidata = array(
        //     'nama_kelas'            => $this->request->getPost('nama_kelas'),
        //     'kompetensi_keahlian'   => $this->request->getPost('kompetensi_keahlian'),
        // );
        // $this->builder->insert($isidata);
        $request = \Config\Services::request();
        $isidata = array(
            'nama_kelas'            => $request->getPost('nama_kelas'),
            'kompetensi_keahlian'   => $request->getPost('kompetensi_keahlian'),
        );
        $this->insert($isidata);
        return redirect()->back();
    }
    public function get_kelas_by_id($id)
    {
        $this->where('id_kelas', $id);
        return $this->builder->get()->getRow();
    }
    public function hapus_kelas($id)
    {
        $this->where('id_kelas', $id)->delete();
    }
    public function get_data_kelas_update($id_kelas)
    {
        $this->where('id_kelas', $id_kelas);
        return $this->get();
    }
    public function Update_kelas()
    {
        $request = \Config\Services::request();
        $this->save([
            'id_kelas' => $request->getPost('id_kelas'),
            'nama_kelas'           => $request->getPost('nama_kelas'),
            'kompetensi_keahlian'   => $request->getPost('kompetensi_keahlian'),



        ]);
    }
}
