<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_user;

class auth extends BaseController{
	
	public function index(){
		return redirect()->to(base_url('auth/login'));
	}

	public function login(){
		$data = [
			'title_meta' => view('homepage_partial/title-meta', ['title' => 'Login'])
		];
		return view('auth-login', $data);
	}

	public function login_proc(){

		$m_user = new M_user();

		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$status = $m_user->countUsername($username)[0]->hitung;

		if ($status != 0){
			$user = $m_user->getUser($username)[0];
			if ($password == $user->pass) {
				if($user->flag == 0){
					$alert = view('homepage_partial/notification-alert', 
						['notif_text' => 'Akun ini sudah tidak aktif',
						 'status' => 'danger']
						);

					session()->setFlashdata('notif_login', $alert);
					session()->setFlashdata('s_username', $username);
					return redirect()->to(base_url('auth/login'));
				}else{
					$userdata = [
						'iduser' => $user->iduser,
						'username' => $user->username,
						'flag' => $user->flag,
						'idgroup' => $user->idgroup,
						'logged_in' => TRUE
					];
					session()->set($userdata);
					
					if($user->idgroup == 1){
						return redirect()->to(base_url('pengelola/dashboard'));
						echo session()->get('username');
					}
					elseif($user->idgroup == 2){
						return redirect()->to(base_url('umkm/dashboard'));
					}
				}

			}else{
				$alert = view('homepage_partial/notification-alert', 
						['notif_text' => 'Password Salah',
						 'status' => 'danger']
						);

					session()->setFlashdata('notif_login', $alert);
				session()->setFlashdata('s_username', $username);
				return redirect()->to(base_url('auth/login'));
			}
		}else{
			$alert = view('homepage_partial/notification-alert', 
						['notif_text' => 'User Tidak Ada',
						 'status' => 'danger']
						);

					session()->setFlashdata('notif_login', $alert);
			session()->setFlashdata('s_username', $username);
			return redirect()->to(base_url('auth/login'));
		}
	}

	public function logout(){
		session_destroy();
		return redirect()->to(base_url('auth/login'));
	}
}
