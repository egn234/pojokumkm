<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_umkm;
	use App\Models\M_user;

	class umkm extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_pengelola = new M_pengelola();
			$this->m_umkm = new M_umkm();
			$this->m_user = new M_user();
		}

		public function index(){
			return redirect()->to(base_url('pengelola/umkm/list'));
		}

		public function list(){
			// $this->newUser();
	    $iduser = session()->get('iduser');
			$l_umkm = $this->m_umkm->getAllUmkm();
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List UMKM']),
				'l_umkm' => $l_umkm,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/user/list-umkm', $data);
		}

		public function detail($iduser){
			$detilUser = $this->m_pengelola->getJoinUserPengelola(session()->get('iduser'))[0];
			$detail_umkm = $this->m_umkm->getJoinUserUmkm($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Detail UMKM']),
				'detail_umkm' => $detail_umkm,
				'detail_user' => $detilUser
			];

			return view('pengelola/user/detail-umkm', $data);
		}

		public function add_proc(){
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = md5($_POST['pass']);

			$cekUsername = $this->m_user->countUsername($username)[0]->hitung;
			$cekEmail = $this->m_user->countUserByEmail($email)[0]->hitung;

			if ($cekUsername != 0) {
				$alert = view('partials/notification-alert', 
					['notif_text' => 'Username '.$username.' telah terdaftar',
					 'status' => 'warning']
					);
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/umkm/list'));
			}

			if ($cekEmail != 0) {
				$alert = view('partials/notification-alert', 
					['notif_text' => 'Email telah terdaftar',
					 'status' => 'warning']
					);
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/umkm/list'));
			}

			$dataUser = [
				'username' => $username,
				'pass' => $password,
				'email' => $email,
				'flag' => 1,
				'idgroup' => 2
			];

			$this->m_user->insertUser($dataUser);

			$alert = view('partials/notification-alert', 
					['notif_text' => 'User berhasil dibuat',
					 'status' => 'success']
					);
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/umkm/list'));
		}

		public function update_proc($iduser){

			define('MB', 1000000);
			if ($_FILES['umkm_pic']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = view('partials/notification-alert', 
					['notif_text' => 'Ukuran file terlalu besar',
					 'status' => 'danger']
					);
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/umkm/detail/'.$iduser));
			}
			elseif ($_FILES['umkm_pic']['size'] != 0) {
				$old_img = $this->m_umkm->getJoinUserUmkm($iduser)[0]->umkm_pic;
				if ($old_img != 'image.jpg') {
					unlink(ROOTPATH.'public/uploads/user/umkm/user'.$iduser.'/'.$old_img);
				}
				$img_path = $this->upload_img($iduser)['name'];
			}
			else{
				$img_path = $this->m_umkm->getJoinUserUmkm($iduser)[0]->umkm_pic;
			}

			$umkm_name = $_POST['nama'];
			$description = $_POST['description'];
			$address = $_POST['alamat'];
			$phone = $_POST['notelp'];

			$email = $_POST['email'];
			$old_email = $_POST['old_email'];

			if ($email != $old_email) {
				$cekEmail = $this->m_user->cekEmailTerdaftar($email, $iduser)[0]->hitung;
				if ($cekEmail > 0) {
					$alert = view('partials/notification-alert', 
						['notif_text' => 'Email telah terdaftar',
						 'status' => 'warning']
						);
					session()->setFlashdata('notif', $alert);
					return redirect()->to(base_url('pengelola/umkm/detail/'.$iduser));
				}
				$this->m_user->updateEmail($email, $iduser);
			}

			$dataset = [
				'umkm_name' => $umkm_name,
				'description' => $description,
				'address' => $address,
				'phone' => $phone,
				'umkm_pic' => $img_path
			];
			
			$this->m_umkm->updateUmkm($dataset, $iduser);
			
			$alert = view('partials/notification-alert', 
					['notif_text' => 'Profil UMKM berhasil diubah',
					 'status' => 'success']
					);
			session()->setFlashdata('notif', $alert);

			return redirect()->to(base_url('pengelola/umkm/detail/'.$iduser));
		}

		public function flag_switch($iduser){
			$flag = $this->m_umkm->getJoinUserUmkm($iduser)[0]->flag;

			if ($flag == 0) {
				$this->m_user->aktifkanUser($iduser);

				$alert = view('partials/notification-alert', 
					['notif_text' => 'User Diaktifkan',
					 'status' => 'success']
					);
				session()->setFlashdata('notif', $alert);

			}elseif ($flag == 1) {
				$this->m_user->nonaktifkanUser($iduser);

				$alert = view('partials/notification-alert', 
					['notif_text' => 'User Dinonaktifkan',
					 'status' => 'success']
					);
				session()->setFlashdata('notif', $alert);
			}
			
			return redirect()->to(base_url('pengelola/umkm/list/'));
		}

		public function konfirSwitch(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$user = $this->m_umkm->getJoinUserUmkm($id)[0];
				$data = ['a' => $user];
				echo view('pengelola/user/part-umkm-mod-switch-flag', $data);
			}
		}

		public function upload_img($iduser){
      $validationRule = [
        'umkm_pic' => [
          'label' => 'Image File',
          'rules' => 'uploaded[umkm_pic]'
            . '|is_image[umkm_pic]'
            . '|mime_in[umkm_pic,image/jpg,image/jpeg,image/webp]'
            . '|max_size[umkm_pic,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					'.$data.'
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('pengelola/umkm/list'));
      }else{
      	$img = $this->request->getFile('umkm_pic');
      	$newName = $img->getRandomName();

      	$img->move(ROOTPATH.'public/uploads/user/umkm/user'.$iduser, $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }

	}
	