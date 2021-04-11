<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pembayaran extends Model
{
    protected $table = 'vw_pembayaran1';
    protected $useTimestamps;
    protected $db, $builder;
    // protected $primaryKey = 'id_kelas';
    protected $allowedFields = ['id_pembayaran', 'id_petugas', 'nisn', 'nama_petugas', 'nama', 'tgl_bayar', 'bulan_dibayar', 'tahun_dibayar', 'id_spp', 'tahun', 'nominal', 'jumlah_bayar', 'status'];
    public function __construct()
    {
        // $this->db      = \Config\Database::connect();
        // $this->builder = $this->db->table('t_kelas');
    }
    public function get_transaksi_pembayaran()
    {
        return $this->get();
    }
    public function get_by_nisn($nisn)
    {
        $this->where('nisn', $nisn);
        return $this->get()->getResult();
    }

    // public function simpantransaksi()
    // {
    //     $isidata = array(
    //         'id_petugas'    => $this->input->post('id_petugas', TRUE),
    //         'nisn'          => $this->input->post('nisn', TRUE),
    //         'tgl_bayar'     => $this->input->post('tanggal', TRUE),
    //         'bulan_dibayar' => $this->input->post('bulan_bayar', TRUE),
    //         'tahun_dibayar' => $this->input->post('tahun_bayar', TRUE),
    //         'id_spp'        => $this->input->post('id_tahun', TRUE),
    //         'jumlah_bayar'  => $this->input->post('jumbar', TRUE),
    //     );
    //     $this->db->insert('t_pembayaran', $isidata);
    // }
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
