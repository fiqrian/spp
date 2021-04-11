<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_espp extends Model
{
    protected $table = 't_spp';
    protected $useTimestamps;
    protected $db, $builder;
    protected $primaryKey = 'id_spp';
    // protected $primaryKey = 'id_kelas';
    protected $allowedFields = ['id_spp', 'tahun', 'nominal'];
    public function __construct()
    {
        // $this->db      = \Config\Database::connect();
        // $this->builder = $this->db->table('t_spp');
    }
    public function get_data_spp()
    {
        return $this->get();
    }
    public function simpanspp()
    {
        $request = \Config\Services::request();

        $isidata = array(
            'tahun'     =>     $request->getPost('tahun'),
            'nominal'   =>     $request->getPost('nominal'),
        );
        $this->insert($isidata);
        return redirect()->back();
    }
    public function get_spp_by_id($id)
    {
        $this->where('id_spp', $id);
        return $this->builder->get()->getRow();
    }
    public function get_id_by_spp_edit($id_spp)
    {
        $this->where('id_spp', $id_spp);
        return $this->get();
    }
    public function Hapusspp()
    {
        $request = \Config\Services::request();
        $id_spp = $request->getPost('id_spp');
        $this->where('id_spp', $id_spp)->delete();
    }
    public function Update_spp()
    {
        $request = \Config\Services::request();
        $this->save([
            'id_spp' => $request->getPost('id_spp'),
            'tahun'     => $request->getPost('tahun'),
            'nominal'   => $request->getPost('nominal'),


        ]);
    }
}
