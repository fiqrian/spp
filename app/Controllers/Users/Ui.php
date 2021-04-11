<?php

namespace App\Controllers\Users;

use   App\Controllers\BaseController;
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
use App\Models\Model_users;
use App\Models\Model_users1;
use CodeIgniter\I18n\Time;

class Ui extends BaseController
{
    public function __construct()
    {
        $this->myTime = new Time('now');
        $this->Model_users = new Model_users();
        $this->Model_users1 = new Model_users1();
        $this->Model_invoice = new Model_invoice();
        $this->Model_invoice1 = new Model_invoice1();
        $this->Model_wali = new Model_wali();
        $this->Model_wali1 = new Model_wali1();
        $this->Model_spp = new Model_spp();
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
    public function profile($id = null)
    {
        $data['title'] = "Profile";
        $data['data_siswa']     = $this->Model_siswa->get_siswa()->getResult();
        $data['siswa']     = $this->Model_users1->get_data_users($id)->getRow();
        echo view('tamplates/header', $data);
        echo view('tamplates/sidebar');
        echo view('ui_user/profile', $data);
        echo view('tamplates/footer');
    }
    public function invoice_spp($id_invoice = null)
    {
        $request = \Config\Services::request();
        $a['title'] = "Invoice";
        $data['invoice'] = $this->Model_invoice1->get_invoice_by_invoice($id_invoice);
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_user/invoice_spp', $data);
        echo view('tamplates/footer');
    }
    public function Getidspp($id = null)
    {
        $data = $this->Model_espp->get_invoice_by_users($id);
        echo json_encode($data);
    }
    public function history_spp($id = null)
    {
        $request = \Config\Services::request();
        $a['title'] = "History Spp";
        $data['invoice'] = $this->Model_invoice1->get_invoice_by_users($id);
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_user/history_spp', $data);
        echo view('tamplates/footer');
    }

    public function bayar_spp()
    {

        $a['title'] = "Pembayaran SPP";
        $data['data_wali'] = $this->Model_wali1->get_data_wali()->getResult();
        $data['data_kelas'] = $this->Model_spp->get_data_kelas()->getResult();
        $data['data_siswa']     = $this->Model_siswa->get_siswa()->getResult();
        $data['data_kelas']     = $this->Model_spp->Get_data_kelas()->getResult();
        $data['data_spp']       = $this->Model_espp->get_data_spp()->getResult();
        $data['data_pembayaran']         = $this->Model_pembayaran->get_transaksi_pembayaran()->getResult();
        $data['data_invoice'] = $this->Model_invoice->get_data_invoice()->getResult();
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_user/bayar_spp', $data);
        echo view('tamplates/footer');
    }
    public function laporan_spp($nisn = null)
    {

        $a['title'] = "laporan SPP";
        $data['bayar']         = $this->Model_pembayaran->get_by_nisn($nisn);
        echo view('tamplates/header', $a);
        echo view('tamplates/sidebar');
        echo view('ui_user/laporan_spp', $data);
        echo view('tamplates/footer');
    }
    public function bayarspp()
    {
        $request = \Config\Services::request();
        $nisn          = $request->getPost('nisn');
        $id          = $request->getPost('id');

        $data = [
            'nisn'          => $nisn,

        ];
        if ($this->form_validation->run($data, 'add_invoice') === FALSE) {
            $this->session->setFlashdata('errors', 'Data Kelas gagal di simpan.!');
            session()->setFlashdata('inputs', $request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            return redirect()->back();
        } else {
            // $file =  $request->getFile('file_upload');
            // $randomName = $file->getRandomName();
            // if ($file->isValid() && !$file->hasMoved()) {
            //     $file->move(ROOTPATH . 'public/uploads/', $randomName);
            //     session()->setFlashData('message', 'Berhasil upload');
            //     return redirect()->back();
            // } else {
            //     session()->setFlashData('message', 'Gagal upload');
            //     return redirect()->back();
            // }
            $validated = $this->validate([
                'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
            ]);

            if ($validated == FALSE) {

                // Kembali ke function index supaya membawa data uploads dan validasi
                return redirect()->back();
            } else {

                $avatar = $request->getFile('file_upload');
                $avatar->move(ROOTPATH . 'public/uploads');

                $this->Model_invoice->simpaninvoice($avatar);
                session()->setFlashdata('success', 'success');
                return redirect()->back();
            }
        }
    }



    public function Autocomplete()
    {
        $nisn = $_GET['nisn'];
        $this->Model_siswa->where('nisn', $nisn);
        $query = $this->Model_siswa->get()->getResult();
        echo json_encode($query);
    }
    public function detail_invoice($id_invoice = null)
    {
        $data['title'] = "Invoice Detail";
        $data['invoice'] = $this->Model_invoice1->get_invoice_by_invoice($id_invoice);

        echo view('tamplates/header', $data);
        echo view('tamplates/sidebar');
        echo view('ui_user/invoice_spp', $data);
        echo view('tamplates/footer');
    }
    public function kaitkan()
    {

        helper('form');
        $request = \Config\Services::request();
        $validation =  \Config\Services::validation();
        $nisn  = $request->getPost('nisn');
        // $kelas = $request->getPost('kelas');

        $data = [
            'nisn'  => $nisn,
            // 'kelas'     => $kelas,
        ];
        if ($this->form_validation->run($data, 'add_nisn') == FALSE) {
            session()->setFlashdata('inputs', $request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            return redirect()->back();
        } else {
            session()->setFlashdata('success', ' data berhasil di tambah.! ');
            $this->Model_users->simpankaitkan();
            return redirect()->back();
        }
    }
    public function contact()
    {
        $request = \Config\Services::request();
        $email = \Config\Services::email();
        $validation =  \Config\Services::validation();

        //Set form validation
        $validation->SetRule('name', 'Name', 'trim|required|min_length[4]|max_length[16]');
        $validation->SetRule('email', 'Email', 'trim|required|valid_email|min_length[6]|max_length[60]');
        $validation->SetRule('message', 'Message', 'trim|required|min_length[12]|max_length[200]');

        //Run form validation
        if ($validation->run() === FALSE) {
            $data['title'] = "Contact";
            echo view('tamplates/header', $data);
            echo view('tamplates/sidebar');
            echo view('ui_user/contact');
            echo view('tamplates/footer');
        } else {

            //Get the form data
            $name = $request->getPost('name');
            $from_email = $request->getPost('email');
            $subject = $request->getPost('subject');
            $message = $request->getPost('message');

            //Web master email
            $to_email = 'fiqrian.faturahman@gmail.com'; //Webmaster email, who receive mails

            //Mail settings
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'fiqrian.faturahman@gmail.com'; // Your email address
            $config['smtp_pass'] = ''; // Your email account password
            $config['mailtype'] = 'html'; // or 'text'
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE; //No quotes required
            $config['newline'] = "\r\n"; //Double quotes required

            $email->initialize($config);

            //Send mail with data
            $email->from($from_email, $name);
            $email->to($to_email);
            $email->subject($subject);
            $email->message($message);

            if ($email->send()) {
                session()->setFlashdata('msg', '<div class="alert alert-success">Mail sent!</div>');

                redirect()->back();
            } else {
                session()->setFlashdata('msg', '<div class="alert alert-danger">Problem in sending</div>');
                redirect()->back();
            }
        }
    }
}
