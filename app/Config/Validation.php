<?php

namespace Config;

use PhpParser\Node\Expr\Cast\Array_;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
		\Myth\Auth\Authentication\Passwords\ValidationRules::class,
		\App\Validation\MyRules::class
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $edit_error = [
		'username' => 'required|alpha_numeric|min_length[5]|max_length[20]',
		'email' => 'required|valid_email',
		'password' => 'required|min_length[8]|max_length[20]'
	];
	public $add_errors = [
		'nama_kelas' => 'required|min_length[5]|max_length[20]',
		'kompetensi_keahlian' => 'required',
	];
	public $addspp_errors = [
		'tahun' => 'required|max_length[20]',
		'nominal' => 'required',
	];
	public $addwali_errors = [
		'nama' => 'required|max_length[100]',
		// 'kelas' => 'required',
	];
	public $addsiswa_errors = [
		'nisn'  => 'required|max_length[20]',
		'nis'     => 'required|max_length[20]',
		'nama'     => 'required',
		'alamat'     => 'required',
		'no_telepon'     => 'required|max_length[20]',
	];
	public $addtransaksi_errors = [
		'nisn'          => 'required',
		'tgl_bayar'     => 'required',
		'bulan_dibayar' =>  'required|is_unique[t_pembayaran.bulan_dibayar]',
		'tahun_dibayar' =>  'required',
		'id_spp'        => 'required',
		'jumlah_bayar'  => 'required',

	];
	public $addtf_errors = [

		'tanggal'     => 'required',
		'bulan_bayar' =>  'required',
		'tahun_bayar' =>  'required',
		'jumlah_bayar'  => 'required',

	];
	public $add_spp = [
		'nama_kelas' => 'required|min_length[5]|max_length[20]',
		'kompetensi_keahlian' => 'required',
	];
	public $add_invoice = [
		'nisn' => 'required|min_length[1]|max_length[20]',
	];
	public $add_nisn = [
		'nisn' => 'required|min_length[1]|max_length[20]',
	];
	public $adduser_errors = [
		'fullname' => 'required|min_length[5]|max_length[100]',
		'username' => 'required|is_unique[users.username]',
		'email' => 'required|is_unique[users.email]',
		'password' => 'required',
		'passwordvalid' => 'required|matches[password]',
	];
	public $addrole_errors = [
		'user_id' => 'required|min_length[1]|max_length[10]',
	];



	// public $register_errors = [
	// 	'username' => [
	// 		'required'      => 'Username wajib diisi',
	// 		'alpha_numeric' => 'Username hanya boleh diisi dengan huruf dan angka',
	// 		'min_length'    => 'Username minimal terdiri dari 5 karakter',
	// 		'max_length'    => 'Username maksimal terdiri dari 20 karakter'
	// 	],
	// 	'email' => [
	// 		'required'          => 'Email wajib diisi',
	// 		'email.valid_email' => 'Email tidak valid'
	// 	],
	// 	'password' => [
	// 		'required'      => 'Password wajib diisi',
	// 		'min_length'    => 'Password minimal terdiri dari 8 karakter',
	// 		'max_length'    => 'Password maksimal terdiri dari 20 karakter'
	// 	]
	// ];
}
