<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_user;

class register extends BaseController{

	function __construct(){
		$this->m_user = new M_user();
	}

	public function index(){
		$data = [
			'title_meta' => view('homepage_partial/title-meta', ['title' => 'Register'])
		];
		return view('register', $data);
	}

	public function reg_proc(){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$pass1 = md5($_POST['pass1']);
		$pass2 = md5($_POST['pass2']);

		$cekUsername = $this->m_user->countUsername($username)[0]->hitung;
		$cekEmail = $this->m_user->countUserByEmail($email)[0]->hitung;

		if ($pass1 != $pass2) {
			$alert = view('homepage_partial/notification-alert', 
						['notif_text' => 'Password tidak sesuai',
						 'status' => 'warning']
						);

			session()->setFlashdata('notif_login', $alert);
			session()->setFlashdata('s_username', $username);
			session()->setFlashdata('s_email', $email);
			return redirect()->to(base_url('register'));
		}

		// if ($idgroup == 0) {
		// 	$alert = view('homepage_partial/notification-alert', 
		// 				['notif_text' => 'Password tidak sesuai',
		// 				 'status' => 'warning']
		// 				);
		// 	session()->setFlashdata('notif_login', $alert);
		// 	session()->setFlashdata('s_username', $username);
		// 	session()->setFlashdata('s_email', $email);
		// 	return redirect()->to(base_url('register'));
		// }

		if ($cekUsername != 0) {
			$alert = view('homepage_partial/notification-alert', 
						['notif_text' => 'Username telah terdaftar',
						 'status' => 'warning']
						);

			session()->setFlashdata('notif_login', $alert);
			session()->setFlashdata('s_username', $username);
			session()->setFlashdata('s_email', $email);
			return redirect()->to(base_url('register'));
		}

		if ($cekEmail != 0) {
			$alert = view('homepage_partial/notification-alert', 
						['notif_text' => 'Email telah terdaftar',
						 'status' => 'warning']
						);

			session()->setFlashdata('notif_login', $alert);
			session()->setFlashdata('s_username', $username);
			session()->setFlashdata('s_email', $email);
			return redirect()->to(base_url('register'));
		}

		$dataUser = [
			'username' => $username,
			'pass' => $pass1,
			'email' => $email,
			'flag' => 1,
			'idgroup' => 2
		];

		$this->m_user->insertUser($dataUser);

		echo "<script>alert('user berhasil dibuat, silahkan login untuk melanjutkan'); 
			window.location.href = '".base_url()."/auth/login';</script>";
		// exit;
	}
}