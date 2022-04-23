<?php namespace App\Controllers\umkm;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_umkm;
	use App\Models\M_user;
	use CodeIgniter\Files\File;

	class Profile extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_umkm = new M_umkm();
			$this->m_user = new M_user();
			$this->request = \Config\Services::request();
		}

		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_umkm->countUmkmByIdUser($iduser)[0]->hitung;

    	if ($is_new > 0){
    		echo "<script>alert('restricted'); window.location.href = '".base_url()."/umkm/dashboard';</script>";
    		exit;
    	}
		}

		public function index(){
			$iduser = session()->get('iduser');
			$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
				'detail_user' => $detilUser
			];
			return view('umkm/prof/detail-profile', $data);
		}

		public function add(){
			$this->newUser();

			$iduser = session()->get('iduser');
			$detilUser = $this->m_user->getUserById($iduser)[0];
			$detilUser->umkm_pic = 'image.jpg';

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
				'detail_user' => $detilUser
			];
			return view('umkm/prof/add-profile', $data);
		}

		public function update_proc($iduser){
			$iduser2 = session()->get('iduser');
			
			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('umkm/dashboard'));
			}

			define('MB', 1000000);
			if ($_FILES['umkm_pic']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = view('partials/notification-alert', 
					['notif_text' => 'File foto terlalu besar',
					 'status' => 'warning']
					);
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('umkm/profile'));
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
					return redirect()->to(base_url('umkm/profile'));
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
				['notif_text' => 'Profil berhasil diubah',
				 'status' => 'success']
				);
			session()->setFlashdata('notif', $alert);

			return redirect()->to(base_url('umkm/profile'));
		}

		public function create_proc($iduser){
			$this->newUser();

			$iduser2 = session()->get('iduser');

			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('umkm/dashboard'));
			}

			define('MB', 1000000);
			if ($_FILES['umkm_pic']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = view('partials/notification-alert', 
					['notif_text' => 'File foto terlalu besar',
					 'status' => 'warning']
					);
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('umkm/profile'));
			}
			elseif ($_FILES['umkm_pic']['size'] != 0) {
				$img_path = $this->upload_img($iduser)['name'];
			}
			else{
				$img_path = 'image.jpg';
			}

			$umkm_name = $_POST['nama'];
			$description = $_POST['description'];
			$address = $_POST['alamat'];
			$phone = $_POST['notelp'];

			$dataset = [
				'umkm_name' => $umkm_name,
				'description' => $description,
				'address' => $address,
				'phone' => $phone,
				'umkm_pic' => $img_path,
				'iduser' => $iduser
			];
			
			$this->m_umkm->insertUmkm($dataset);

			return redirect()->to(base_url('umkm/dashboard'));
		}

		public function update_pass($iduser){
			$iduser2 = session()->get('iduser');

			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('umkm/dashboard'));
			}

			$old_pass = md5($_POST['old_pass']);
			$new_pass = md5($_POST['new_pass']);
			$auth_pass = md5($_POST['auth_pass']);

			$db_pass = $this->m_user->getUserById($iduser)[0]->pass;

			if ($old_pass != $db_pass) {
				$alert = view('partials/notification-alert', 
					['notif_text' => 'Password lama tidak sesuai',
					 'status' => 'warning']
					);
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('umkm/profile'));
			}

			if($new_pass != $auth_pass){
				$alert = view('partials/notification-alert', 
					['notif_text' => 'Password baru tidak sesuai dengan konformasi password baru',
					 'status' => 'danger']
					);
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('umkm/profile'));	
			}

			$this->m_user->updatePassword($new_pass, $iduser);
			$alert = view('partials/notification-alert', 
				['notif_text' => 'Password berhasil diubah',
				 'status' => 'success']
				);
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('umkm/profile'));
		}

		public function add_link($iduser){
			$iduser2 = session()->get('iduser');

			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('umkm/dashboard'));
			}

			$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];

			$umkm_link_name = $_POST['link_name'];
			$umkm_link_address = $_POST['link_address'];

			$data = [
				'umkm_link_name' => $umkm_link_name,
				'umkm_link_address' => $umkm_link_address,
				'idumkm' => $detilUser->idumkm
			];

			$this->m_umkm->insertLinkUmkm($data);

			$alert = view('partials/notification-alert', 
				['notif_text' => 'Link ditambahkan',
				 'status' => 'success']
				);
			session()->setFlashdata('notif', $alert);

			return redirect()->to(base_url('umkm/profile'));
		}

		public function del_link($iduser, $idumkmlink){
			$iduser2 = session()->get('iduser');

			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('umkm/dashboard'));
			}

			$this->m_umkm->deleteLinkUmkm($idumkmlink);

			$alert = view('partials/notification-alert', 
				['notif_text' => 'Link dihapus',
				 'status' => 'warning']
				);
			session()->setFlashdata('notif', $alert);

			return redirect()->to(base_url('umkm/profile'));
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

				return redirect()->to(base_url('umkm/profile'));
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
?>