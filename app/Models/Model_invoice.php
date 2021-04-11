<?php

namespace App\Models;

use CodeIgniter\HTTP\Request;
use CodeIgniter\Model;

class Model_invoice extends Model
{
    protected $table = 't_invoice';
    protected $useTimestamps;
    protected $db, $builder;
    protected $primaryKey = 'id_invoice';
    protected $allowedFields = ['id_invoice', 'nisn', 'id', 'alamat', 'bank', 'tgl_bayar', 'batas_bayar', 'invoice_image'];
    public function __construct()
    {
        // $this->db      = \Config\Database::connect();
        // $this->builder = $this->db->table('t_kelas');
    }
    public function get_data_invoice()
    {
        return $this->get();
    }
    public function simpaninvoice($avatar)
    {
        $request = \Config\Services::request();
        date_default_timezone_set('Asia/Jakarta');

        $invoice = array(
            'nisn'        =>  $request->getPost('nisn'),
            'id'      => $request->getPost('id_user'),
            'bank'      => $request->getPost('bank'),
            'tgl_bayar'   => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
            'invoice_image' =>  $avatar->getName(),


        );
        $this->insert($invoice);
    }

    public function autodelete()
    {


        $this->delete('t_invoice');
        $$this->where('id_invoice');
        $this->where(date_diff(date($useTimestamps), 'batas_bayar') > 1);
    }

    public function simpanwali()
    {
        $request = \Config\Services::request();
        $isidata = array(
            'nama'    => $request->getPost('nama'),
            'id_kelas'          => $request->getPost('id_kelas'),
        );
        $this->insert($isidata);
    }
    public function get_wali_by_id($id_wali)
    {
        $this->where('id_wali', $id_wali);
        return $this->builder->get()->getRow();
    }
    public function get_data_wali_update($id_wali)
    {
        $this->where('id_wali', $id_wali);
        return $this->get();
    }

    public function Update_wali()
    {
        $request = \Config\Services::request();
        $this->save([
            'id_wali' => $request->getPost('id_wali'),
            'nama'    => $request->getPost('nama'),
            'id_kelas' => $request->getPost('id_kelas'),
        ]);
    }
    public function Hapuswali()
    {
        $request = \Config\Services::request();
        $id_spp = $request->getPost('id_wali');
        $this->where('id_wali', $id_spp)->delete();
    }
    //     public function get_siswa()
    //     {
    //         return $this->get();
    //     }
    //     public function simpankelas()
    //     {
    //         $request = \Config\Services::request();
    //         $isidata = array(
    //             'nisn'      => $this->input->post('nisn', TRUE),
    //             'nis'       => $this->input->post('nis', TRUE),
    //             'nama'      => $this->input->post('nama', TRUE),
    //             'id_kelas'  => $this->input->post('kelas', TRUE),
    //             'alamat'    => $this->input->post('alamat', TRUE),
    //             'no_telepon' => $this->input->post('no_telepon', TRUE),
    //             'id_spp'    => $this->input->post('spp', TRUE),
    //         );
    //         $this->insert($isidata);
    //         return redirect()->back();
    //     }
}
