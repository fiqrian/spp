<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pembayaran1 extends Model
{
    protected $table = 't_pembayaran';
    protected $useTimestamps;
    protected $db, $builder;
    protected $primaryKey = 'id_pembayaran';
    protected $allowedFields = ['id_pembayaran', 'username', 'fullname', 'id', 'nisn', 'nama_petugas', 'nama', 'tgl_bayar', 'bulan_dibayar', 'tahun_dibayar', 'id_spp', 'tahun', 'nominal', 'jumlah_bayar', 'status'];
    public function __construct()
    {
        // $this->db      = \Config\Database::connect();
        // $this->builder = $this->db->table('t_kelas');
    }
    public function get_transaksi_pembayaran()
    {
        return $this->get();
    }
    public function simpantransaksi()
    {
        $request = \Config\Services::request();
        $isidata = array(
            'id'            => $request->getPost('id'),
            'userid'            => $request->getPost('userid'),
            'nisn'          => $request->getPost('nisn'),
            'tgl_bayar'     => $request->getPost('tanggal'),
            'bulan_dibayar' => $request->getPost('bulan_bayar'),
            'tahun_dibayar' => $request->getPost('tahun_bayar'),
            'id_spp'        => $request->getPost('id_tahun'),
            'jumlah_bayar'  => $request->getPost('jumlah_bayar')
        );
        $this->insert($isidata);
    }
    public function get_id_by_tf_edit($id_tf)
    {
        $this->where('id_pembayaran', $id_tf);
        return $this->get();
    }
    public function Update_tf()
    {
        $request = \Config\Services::request();
        $this->save([
            'id_pembayaran' => $request->getPost('id_pembayaran'),
            'id'            => $request->getPost('id'),
            'tgl_bayar'     => $request->getPost('tanggal'),
            'bulan_dibayar' =>  $request->getPost('bulan_bayar'),
            'tahun_dibayar' =>  $request->getPost('tahun_bayar'),
            'jumlah_bayar'  => $request->getPost('jumlah_bayar'),
        ]);
    }
    public function hitung_pembayaran()
    {

        $this->selectSum('jumlah_bayar');
        $this->get();
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
