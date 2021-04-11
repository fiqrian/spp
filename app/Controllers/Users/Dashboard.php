<?php

namespace App\Controllers\Users;

use   App\Controllers\BaseController;
use App\Models\Model_users;
use App\Models\Model_invoice;
use App\Models\Model_pembayaran1;
use App\Models\Model_pembayaran;
use App\Models\Model_siswa;

class Dashboard extends BaseController
{
	protected $db, $builder;

	public function __construct()
	{
		$this->Model_siswa = new Model_siswa();
		$this->Model_users = new Model_users();
		$this->Model_invoice = new Model_invoice();
		$this->Model_pembayaran1 = new Model_pembayaran1();
		$this->Model_pembayaran = new Model_pembayaran();
		$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('t_pembayaran');
	}

	public function dashboard()
	{
		$data['title'] = "Dashboard";

		// $this->builder->select('users.id as userid,username,email,name');
		// $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		// $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		// $query = $this->builder->get();

		// $data['users'] = $query->getRow();
		$data['users'] = $this->Model_siswa->countAllResults();
		$data['invoice'] = $this->Model_invoice->countAllResults();
		$data['bayar'] = $this->Model_pembayaran->countAllResults();
		$this->builder->selectSum('jumlah_bayar');
		$query = $this->builder->get();
		$data['total'] = $query->getRow();
		echo view('tamplates/header', $data);
		echo view('tamplates/sidebar');
		echo view('ui_user/dashboard', $data);
		echo view('tamplates/footer');
	}
}
