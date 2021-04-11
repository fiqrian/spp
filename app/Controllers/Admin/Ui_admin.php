<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_spp;
use App\Models\Model_espp;
use App\Models\Model_siswa;
use App\Models\Model_siswa1;
use App\Models\Model_pembayaran;
use App\Models\Model_pembayaran1;
use App\Models\Model_wali;
use App\Models\Model_wali1;
use App\Models\Model_invoice;
use App\Models\Model_invoice1;
use App\Models\Model_groups;
use App\Models\Model_users;
use App\Libraries\dompdf_gen;
use App\Views\ui_admin\data_kelas;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Database\Query;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\RequestInterface;
use PHP_CodeSniffer\Standards\MySource\Sniffs\Commenting\FunctionCommentSniff;
use phpDocumentor\Reflection\PseudoTypes\True_;

class Ui_admin extends BaseController
{
    // protected $db, $builder;
    protected $request;

    public function __construct()
    {

        $this->Model_users = new Model_users();
        $this->Model_invoice = new Model_invoice();
        $this->Model_invoice1 = new Model_invoice1();
        $this->Model_wali = new Model_wali();
        $this->Model_wali1 = new Model_wali1();
        $this->Model_spp = new Model_spp();
        $this->Model_groups = new Model_groups();
        $this->Model_espp = new Model_espp();
        $this->Model_siswa = new Model_siswa();
        $this->Model_siswa1 = new Model_siswa1();
        $this->Model_pembayaran = new Model_pembayaran();
        $this->Model_pembayaran1 = new Model_pembayaran1();
        // $this->Request = new Request();
        helper('form');
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->session = \Config\Services::session();
        $this->form_validation = \Config\Services::validation();
        $this->request =  \Config\Services::request();
    }

    public function userlist()
    {
        $data['title'] = "User list";
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();


        $this->builder->select('users.id as userid,username,email,name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();
        $data['groups'] = $this->Model_groups->get_groups()->getResult();
        $data['list'] = $this->Model_users->get_users()->getResult();
        echo view('tamplates/header', $data);
        echo view('tamplates/sidebar');
        echo view('ui_admin/userlist', $data);
        echo view('tamplates/footer');
    }
    public function Getidusers($userid = null)
    {
        $data = $this->Model_users->get_users_by_id($userid);
        echo json_encode($data);
    }
    public function Hapususer()
    {

        $request = \Config\Services::request();
        $userid = $request->getPost('userid');
        $this->db->transBegin(true);
        // $this->Model_spp->where( $id)->delete();
        $this->Model_users->Hapususers($userid);
        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            $this->session->setFlashdata('error', 'Maaf data tidak bisa di hapus, karena masih berhubungan dengan tabel yang lain.!');
            return redirect()->back();
        } else {
            $this->db->transCommit();
            session()->setFlashdata('hapus', 'Data SPP Berhasil di hapus');
            return redirect()->back();
        }
    }
    public function simpanuser()
    {
        helper('form');
        $request = \Config\Services::request();
        $validation =  \Config\Services::validation();
        $userid =  $request->getPost('user_id');
        $request->getPost('group_id');
        $data = [
            'user_id'  => $userid,
            // 'kelas'     => $kelas,
        ];
        if ($this->form_validation->run($data, 'addrole_errors') == FALSE) {
            session()->setFlashdata('inputs', $request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            return redirect()->back();
        } else {
            session()->setFlashdata('success', ' data berhasil di tambah.! ');
            $this->Model_groups->simpangroups();
            return redirect()->back();
        }
    }
    public function detail($id)
    {
        $data['title'] = "User Detail";
        $this->builder->select('users.id as userid,username,email,fullname,user_image,name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();

        echo view('tamplates/header', $data);
        echo view('tamplates/sidebar');
        echo view('ui_admin/detail', $data);
        echo view('tamplates/footer');
    }
    //Percobaan

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('Modeldata');
    //     $this->load->library('form_validation');
    //     ceklogin();
    // }
    // public function transaksispp()
    // {

    //     $a['title'] = "Form Transaksi";

    //     // $query['t_kelas'] = $this->Model_spp->get_data_kelas()->result();


    //     echo view('tamplates/header', $a);
    //     echo view('tamplates/sidebar');
    //     echo view('ui_admin/input_transaksi');
    //     echo view('tamplates/footer');
    // }


    public function walikelas()
    {
        helper('form');
        $a['title'] = "Form Wali Kelas";
        $data['data_kelas'] = $this->Model_spp->get_data_kelas()->getResult();
        $data['data_wali'] = $this->Model_wali1->get_data_wali()->getResult();
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_admin/wali_kelas', $data);
        echo view('tamplates/footer');
    }
    public function Simpanwali()
    {

        helper('form');
        $request = \Config\Services::request();
        $validation =  \Config\Services::validation();
        $nama_wali  = $request->getPost('nama');
        // $kelas = $request->getPost('kelas');

        $data = [
            'nama'  => $nama_wali,
            // 'kelas'     => $kelas,
        ];
        if ($this->form_validation->run($data, 'addwali_errors') == FALSE) {
            session()->setFlashdata('inputs', $request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            return redirect()->back();
        } else {
            session()->setFlashdata('success', ' data berhasil di tambah.! ');
            $this->Model_wali->simpanwali();
            return redirect()->back();
        }
    }
    public function Editwali($id_wali = null)
    {
        $a['title'] = "Edit Kelas";
        $data['data_kelas'] = $this->Model_spp->get_data_kelas()->getResult();
        $data['cari_data_wali']  = $this->Model_wali->get_data_wali_update($id_wali)->getResult();
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_admin/edit_wali', $data);
        echo view('tamplates/footer');
    }
    public function Updatewali()
    {
        helper('form');
        $request = \Config\Services::request();;
        $nama    = $request->getPost('nama');
        // $kelas          = $request->getPost('kelas');

        $data = [
            'nama'    => $nama,
            // 'kelas'          => $kelas,
        ];
        if ($this->form_validation->run($data, 'addwali_errors') == FALSE) {
            session()->setFlashdata('inputs', $request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            $this->session->setFlashdata('gagal', 'Data SPP berhasil di perbaharui.!');
            redirect()->to('walikelas');
        } else {

            $this->Model_wali->Update_wali();
            session()->setFlashdata('add', 'Data SPP berhasil di perbaharui.!');
            return redirect()->to('walikelas');
        }
    }
    public function Getidwali($id_wali = null)
    {
        $data = $this->Model_wali->get_wali_by_id($id_wali);
        echo json_encode($data);
    }
    public function Hapuswali()
    {

        $request = \Config\Services::request();
        $id_wali = $request->getPost('id_spp');
        $this->db->transBegin(true);
        // $this->Model_spp->where( $id)->delete();
        $this->Model_wali->Hapuswali($id_wali);
        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            $this->session->setFlashdata('gagal', 'Maaf data tidak bisa di hapus, karena masih berhubungan dengan tabel yang lain.!');
            return redirect()->back();
        } else {
            $this->db->transCommit();
            session()->setFlashdata('hapus', 'Data SPP Berhasil di hapus');
            return redirect()->back();
        }
    }

    public function Kelas()
    {

        $a['title'] = "Form kelas";
        $data['data_kelas'] = $this->Model_spp->get_data_kelas()->getResult();
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_admin/data_kelas', $data);
        echo view('tamplates/footer');
    }
    public function hapuskelas()
    {
        // helper(['form', 'url']);
        // $session = \Config\Services::session();
        $request = \Config\Services::request();
        // $id = ([
        //     'id_kelas'  => $request->getPost('id_kelas', TRUE)
        // ]);

        $this->db->transBegin(true);
        // $this->Model_spp->where( $id)->delete();
        $id = $request->getPost('id_kelas');
        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            $this->session->setFlashdata('pesan', 'Maaf data tidak bisa di hapus, karena masih berhubungan dengan tabel yang lain.!');
            return redirect()->back();
        } else {
            $this->db->transCommit();
            $this->Model_spp->hapus_kelas($id);
            $this->session->setFlashdata('pesan', 'Data kelas berhasil di hapus.!');
            return redirect()->back();
        }
    }

    public function simpankelas()
    {

        helper('form');
        $request = \Config\Services::request();
        $validation =  \Config\Services::validation();
        // $isDataValid = $validation->withRequest($this->request)->run();
        // if ($isDataValid) {
        $nama_kelas  = $request->getPost('nama_kelas');
        $kompetensi_keahlian = $request->getPost('kompetensi_keahlian');

        $data = [
            'nama_kelas'  => $nama_kelas,
            'kompetensi_keahlian'     => $kompetensi_keahlian,
        ];
        if ($this->form_validation->run($data, 'add_errors') == FALSE) {
            session()->setFlashdata('inputs', $request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            // $this->session->setFlashdata('pesan', 'Data TIDAK berhasil di simpan.!');
            // $this->template->load('halaman_master', 'template/includes/data_kelas', $data);
            return redirect()->back();
        } else {
            session()->setFlashdata('success', ' data berhasil di tambah.! ');
            // $this->session->setFlashdata('pesan', 'Data Kelas berhasil di simpan.!');
            $this->Model_spp->simpankelas();
            return redirect()->back();
        }
    }
    public function Getidkelas($id = null)
    {
        $data = $this->Model_spp->get_kelas_by_id($id);
        echo json_encode($data);
    }
    public function Editkelas($id_kelas = null)
    {
        helper('form');
        $a['title'] = "Edit Kelas";
        $query = $this->Model_spp->get_data_kelas_update($id_kelas);
        $data['cari_data_kelas'] = $query->getResult();
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_admin/edit_kelas', $data);
        echo view('tamplates/footer');
    }


    public function dataspp()
    {
        helper('form');
        $a['title'] = "Form SPP";
        $query = $this->Model_espp->get_data_spp();
        $data['data_spp'] = $query->getResult();
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_admin/data_spp', $data);
        echo view('tamplates/footer');
    }
    public function Simpanspp()
    {
        $request = \Config\Services::request();
        $tahun  = $request->getPost('tahun');
        $nominal = $request->getPost('nominal');

        $data = [
            'tahun'  => $tahun,
            'nominal'     => $nominal,
        ];
        if ($this->form_validation->run($data, 'addspp_errors') == FALSE) {
            $this->session->setFlashdata('errors', 'Data Kelas gagal di simpan.!');
            session()->setFlashdata('inputs', $request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            $data['data_spp']         = $this->Model_espp->get_data_spp()->getResult();
            return redirect()->back();
        } else {
            $this->Model_espp->simpanspp();
            $this->session->setFlashdata('success', 'Data Kelas berhasil di simpan.!');
            return redirect()->back();
        }
    }
    public function Getidspp($id = null)
    {
        $data = $this->Model_espp->get_spp_by_id($id);
        echo json_encode($data);
    }
    public function Hapusspp()
    {

        $request = \Config\Services::request();
        $id_spp = $request->getPost('id_spp');
        $this->db->transBegin(true);
        // $this->Model_spp->where( $id)->delete();
        $this->Model_espp->Hapusspp($id_spp);
        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            $this->session->setFlashdata('error', 'Maaf data tidak bisa di hapus, karena masih berhubungan dengan tabel yang lain.!');
            return redirect()->back();
        } else {
            $this->db->transCommit();
            session()->setFlashdata('hapus', 'Data SPP Berhasil di hapus');
            return redirect()->back();
        }
    }
    public function Editspp($id = null)
    {
        helper('form');
        $a['title'] = "Form Edit SPP ";
        $query = $this->Model_espp->get_id_by_spp_edit($id);
        $data['data_spp'] = $query->getResult();
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_admin/edit_spp', $data);
        echo view('tamplates/footer');
    }
    public function Updatekelas()
    {
        helper('form');
        $request = \Config\Services::request();
        $id_kelas = $request->getPost('id_kelas', true);
        $nama_kelas  = $request->getPost('nama_kelas');
        $kompetensi_keahlian = $request->getPost('kompetensi_keahlian');

        $data = [
            'nama_kelas'  => $nama_kelas,
            'kompetensi_keahlian' => $kompetensi_keahlian,
        ];
        if ($this->form_validation->run($data, 'add_errors') == FALSE) {
            session()->setFlashdata('inputs', $request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            redirect()->to('kelas');
        } else {
            $this->Model_spp->Update_kelas();
            session()->setFlashdata('add', ' data kelas berhasil di perbaharui.! ');
            return redirect()->to('kelas');
        }
    }
    public function Updatespp()
    {
        helper('form');
        $request = \Config\Services::request();
        $request->getPost('id_spp', true);
        $tahun  = $request->getPost('tahun');
        $nominal = $request->getPost('nominal');

        $data = [
            'tahun'  => $tahun,
            'nominal' => $nominal,
        ];
        if ($this->form_validation->run($data, 'addspp_errors') == FALSE) {
            session()->setFlashdata('inputs', $request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            $this->session->setFlashdata('gagal', 'Data SPP berhasil di perbaharui.!');
            redirect()->to('kelas');
        } else {

            $this->Model_espp->Update_spp();
            session()->setFlashdata('pesan', 'Data SPP berhasil di perbaharui.!');
            return redirect()->to('spp');
        }
    }

    public function siswa()
    {
        helper('form');
        $a['title'] = 'Form Siswa';
        $data['data_siswa']     = $this->Model_siswa->get_siswa()->getResult();
        $data['data_kelas']     = $this->Model_spp->Get_data_kelas()->getResult();
        $data['data_spp']       = $this->Model_espp->get_data_spp()->getResult();
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_admin/data_siswa', $data);
        echo view('tamplates/footer');
    }
    public function Editsiswa($nisn = null)
    {
        helper('form');
        $a['title'] = 'Form Siswa';
        $data['cari_data_siswa']     = $this->Model_siswa1->get_id_by_siswa_edit($nisn)->getResult();
        $data['data_kelas']     = $this->Model_spp->Get_data_kelas()->getResult();
        $data['data_spp']       = $this->Model_espp->get_data_spp()->getResult();
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_admin/edit_siswa', $data);
        echo view('tamplates/footer');
    }
    public function Updatesiswa()
    {
        helper('form');
        $request = \Config\Services::request();
        $id_siswa = $request->getPost('nisn', true);
        $nisn  = $request->getPost('nisn');
        $nis = $request->getPost('nis');
        $nama  = $request->getPost('nama');
        $alamat = $request->getPost('alamat');
        $no_telepon  = $request->getPost('no_telepon');
        $data = [
            'nisn'   => $nisn,
            'nis'    => $nis,
            'nama'   => $nama,
            'alamat' => $alamat,
            'no_telepon' => $no_telepon
        ];
        if ($this->form_validation->run($data, 'addsiswa_errors') == FALSE) {
            session()->setFlashdata('inputs', $request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            redirect()->to('siswa');
        } else {
            $this->Model_siswa1->Update_siswa();
            session()->setFlashdata('add', ' data kelas berhasil di perbaharui.! ');
            return redirect()->to('siswa');
        }
    }
    public function Simpansiswa()
    {
        $request = \Config\Services::request();
        $nisn  = $request->getPost('nisn');
        $nis = $request->getPost('nis');
        $nama  = $request->getPost('nama');
        $alamat = $request->getPost('alamat');
        $no_telepon  = $request->getPost('no_telepon');


        $data = [
            'nisn'  => $nisn,
            'nis'     => $nis,
            'nama'     => $nama,
            'alamat'     => $alamat,
            'no_telepon'     => $no_telepon,
        ];
        if ($this->form_validation->run($data, 'addsiswa_errors') == FALSE) {
            $this->session->setFlashdata('errors', 'Data Kelas gagal di simpan.!');
            session()->setFlashdata('inputs', $request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            $data['data_spp']         = $this->Model_espp->get_data_spp()->getResult();
            $data['data_siswa']     = $this->Model_siswa->get_siswa()->getResult();
            $data['data_kelas']     = $this->Model_spp->Get_data_kelas()->getResult();
            $data['data_spp']       = $this->Model_espp->get_data_spp()->getResult();
            return redirect()->back();
        } else {
            $this->Model_siswa1->simpansiswa();
            $this->session->setFlashdata('success', 'Data siswa berhasil di simpan');
            return redirect()->back();
        }
    }
    public function Transaksi()
    {

        $data['data_siswa']              = $this->Model_siswa->get_siswa()->getResult();
        $data['data_pembayaran']         = $this->Model_pembayaran->get_transaksi_pembayaran()->getResult();
        $a['title'] = "Form Transaksi";
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_admin/input_transaksi', $data);
        echo view('tamplates/footer');
    }
    public function Edittransaksi($id_pembayaran = null)
    {
        helper('form');
        $a['title'] = 'Form Siswa';
        $data['cari_data_tf']            = $this->Model_pembayaran1->get_id_by_tf_edit($id_pembayaran)->getResult();
        $data['data_siswa']              = $this->Model_siswa->get_siswa()->getResult();
        $data['data_pembayaran']         = $this->Model_pembayaran->get_transaksi_pembayaran()->getResult();
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_admin/edit_tf', $data);
        echo view('tamplates/footer');
    }
    public function Updatetf()
    {
        helper('form');
        $request = \Config\Services::request();
        $id_pembayaran = $request->getPost('id_pembayaran', true);
        $tgl_bayar     = $request->getPost('tanggal');
        $bulan_dibayar =  $request->getPost('bulan_bayar');
        $tahun_dibayar =  $request->getPost('tahun_bayar');
        $jumlah_bayar  = $request->getPost('jumlah_bayar');

        $data = [
            'tanggal' => $tgl_bayar,
            'bulan_bayar'  => $bulan_dibayar,
            'tahun_bayar' => $tahun_dibayar,
            'jumlah_bayar' => $jumlah_bayar,
        ];
        if ($this->form_validation->run($data, 'addtf_errors') == FALSE) {
            session()->setFlashdata('inputs', $request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            return redirect()->to('transaksi');
        } else {
            $this->Model_pembayaran1->Update_tf();
            session()->setFlashdata('add', ' data kelas berhasil di perbaharui.! ');
            return redirect()->to('transaksi');
        }
    }
    public function Autocomplete1()
    {
        $id_kelas = $_GET['id_kelas'];
        $this->Model_spp->where('id_kelas', $id_kelas);
        $query = $this->Model_spp->get()->getResult();
        echo json_encode($query);
    }
    public function Autocomplete()
    {
        $nisn = $_GET['nisn'];
        $this->Model_siswa->where('nisn', $nisn);
        $query = $this->Model_siswa->get()->getResult();
        echo json_encode($query);
    }
    public function Simpantransaksi()
    {
        $request = \Config\Services::request();
        $id            = $request->getPost('id');
        $nisn          = $request->getPost('nisn');
        $tgl_bayar     = $request->getPost('tanggal');
        $bulan_dibayar = $request->getPost('bulan_bayar');
        $tahun_dibayar = $request->getPost('tahun_bayar');
        $id_spp        = $request->getPost('id_tahun');
        $jumlah_bayar  = $request->getPost('jumlah_bayar');

        $data = [
            'id'    => $id,
            'nisn'          => $nisn,
            'tgl_bayar'     => $tgl_bayar,
            'bulan_dibayar' => $bulan_dibayar,
            'tahun_dibayar' => $tahun_dibayar,
            'id_spp'        => $id_spp,
            'jumlah_bayar' => $jumlah_bayar

        ];
        if ($this->form_validation->run($data, 'addtransaksi_errors') == FALSE) {
            $this->session->setFlashdata('errors', 'Data Kelas gagal di simpan.!');
            session()->setFlashdata('inputs', $request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            $data['data_siswa']              = $this->Model_siswa1->get_siswa()->getResult();
            $data['data_pembayaran']         = $this->Model_pembayaran1->get_transaksi_pembayaran()->getResult();
            return redirect()->back();
        } else {
            $this->Model_pembayaran1->simpantransaksi();
            $this->session->setFlashdata('success', 'Data Kelas berhasil di simpan.!');
            return redirect()->back();
        }
    }
    public function Getnisnsiswa($nisn = null)
    {
        $data = $this->Model_siswa1->get_siswa_by_id($nisn);
        echo json_encode($data);
    }
    public function Hapussiswa()
    {
        $request = \Config\Services::request();
        $id = $request->getPost('nisn');
        $this->db->transBegin(true);
        $this->Model_siswa1->where('nisn', $id);
        $this->Model_siswa1->delete();
        if ($this->db->transStatus() == false) {
            $this->db->transRollback();
            $this->session->setFlashdata('error', 'Maaf data tidak bisa di hapus, karena masih berhubungan dengan tabel yang lain.!');
            return redirect()->back();
        } else {
            $this->db->transCommit();
            session()->setFlashdata('hapus', 'Data SPP Berhasil di hapus');
            return redirect()->back();
        }
    }
    public function Laporanadmin()
    {

        $a['title'] = "Laporan SPP";
        $data['data_wali'] = $this->Model_wali1->get_data_wali()->getResult();
        $data['data_kelas'] = $this->Model_spp->get_data_kelas()->getResult();
        $data['data_siswa']     = $this->Model_siswa->get_siswa()->getResult();
        $data['data_kelas']     = $this->Model_spp->Get_data_kelas()->getResult();
        $data['data_spp']       = $this->Model_espp->get_data_spp()->getResult();
        $data['data_pembayaran']         = $this->Model_pembayaran->get_transaksi_pembayaran()->getResult();
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_admin/laporan_admin', $data);
        echo view('tamplates/footer');
    }

    public function invoice_admin()
    {

        $a['title'] = "Invoice SPP";
        $data['data_wali'] = $this->Model_wali1->get_data_wali()->getResult();
        $data['data_kelas'] = $this->Model_spp->get_data_kelas()->getResult();
        $data['data_siswa']     = $this->Model_siswa->get_siswa()->getResult();
        $data['data_kelas']     = $this->Model_spp->Get_data_kelas()->getResult();
        $data['data_spp']       = $this->Model_espp->get_data_spp()->getResult();
        $data['data_invoice']         = $this->Model_invoice1->get_invoice()->getResult();
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_admin/invoice_admin', $data);
        echo view('tamplates/footer');
    }
    public function detail_invoice($id_invoice)
    {

        $a['title'] = "Invoice SPP";
        $data['invoice'] = $this->Model_invoice1->get_invoice_by_id($id_invoice);
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_admin/detail_invoice', $data);
        echo view('tamplates/footer');
    }
    function htmlToPDF()
    {
        $dompdf = new \Dompdf\Dompdf();
        $data['data_wali'] = $this->Model_wali1->get_data_wali()->getResult();
        $data['data_kelas'] = $this->Model_spp->get_data_kelas()->getResult();
        $data['data_siswa']     = $this->Model_siswa->get_siswa()->getResult();
        $data['data_kelas']     = $this->Model_spp->Get_data_kelas()->getResult();
        $data['data_spp']       = $this->Model_espp->get_data_spp()->getResult();
        $data['data_pembayaran']         = $this->Model_pembayaran->get_transaksi_pembayaran()->getResult();
        $dompdf->loadHtml(view('ui_admin/laporan_admin', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
    }
}
