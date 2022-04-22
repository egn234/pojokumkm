<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	// use App\Models\M_pesanan;
	use App\Models\M_user;

	class User extends \App\Controllers\BaseController{

		public function __construct(){
			// $this->m_pesanan = new M_pesanan();
			$this->m_pengelola = new M_pengelola();
			$this->m_user = new M_user();
		}
		
		// public function newUser(){
	 //    $iduser = session()->get('iduser');
	 //    $is_new = $this->m_pengelola->countPengelolaByIdUser($iduser)[0]->hitung;

  //   	if ($is_new == 0){
  //   		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/pengelola/profile/add';</script>";
  //   		exit;
  //   	}
		// }

		public function index(){
			return redirect()->to(base_url('pengelola/user/list'));
		}

		public function list(){
			// $this->newUser();
	    $iduser = session()->get('iduser');
			$l_user = $this->m_user->getAllNewUser();
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List User']),
				'l_user' => $l_user,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/user/list-user', $data);
		}

		public function flag_switch($iduser){
			$flag = $this->m_user->getUserById($iduser)[0]->flag;

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

			return redirect()->to(base_url('pengelola/user/list/'));
		}

		public function delete_user($iduser){
			$this->m_user->deleteUser($iduser);

			$alert = view('partials/notification-alert', 
				['notif_text' => 'User Berhasil Dihapus',
				 'status' => 'success']
				);

			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/user/list/'));
		}

		public function konfirSwitch(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$user = $this->m_user->getUserById($id)[0];
				$data = ['a' => $user];
				echo view('pengelola/user/part-user-mod-switch-flag', $data);
			}
		}

		public function konfirDel(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$user = $this->m_user->getUserById($id)[0];
				$data = ['a' => $user];
				echo view('pengelola/user/part-user-mod-del', $data);
			}
		}

/**
		public function upload_img(){
      $validationRule = [
        'designer_pic' => [
          'label' => 'Image File',
          'rules' => 'uploaded[designer_pic]'
            . '|is_image[designer_pic]'
            . '|mime_in[designer_pic,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[designer_pic,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					'.$data.'
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('pengelola/designer/list'));
      }else{
      	$img = $this->request->getFile('designer_pic');
      	$newName = $img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/images/designer/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }
**/
	}

?>