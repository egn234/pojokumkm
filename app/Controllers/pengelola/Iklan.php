<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_user;
	use App\Models\M_ads;
	use CodeIgniter\Files\File;

	class Iklan extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_pengelola = new M_pengelola();
			$this->m_user = new M_user();
			$this->m_ads = new M_ads();
			$this->request = \Config\Services::request();
		}

		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_pengelola->countPengelolaByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/pengelola/profile/add';</script>";
    		exit;
    	}
		}

		public function index(){
			return redirect()->to(base_url('pengelola/iklan/list'));
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;

			$l_iklan = $this->m_ads->getAllAds();
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Paket Iklan']),
				'l_iklan' => $l_iklan,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/ads/list-iklan', $data);
		}

		public function detail($idads){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;

			$l_detail = $this->m_ads->getAdsById($idads)[0];
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Paket Iklan']),
				'l_detail' => $l_detail,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/ads/detail-iklan', $data);
		}

		public function add(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;

			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Tambah Paket Iklan']),
				'detail_user' => $detilUser
			];
			
			return view('pengelola/ads/add-iklan', $data);
		}

		public function edit($idads){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;

			$l_detail = $this->m_ads->getAdsById($idads)[0];
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Tambah Paket Iklan']),
				'l_detail' => $l_detail,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/ads/edit-iklan', $data);
		}

		public function add_proc(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;

			$ads_name = $_POST['ads_name'];

			$ceknama = $this->m_ads->countAdsByName($ads_name)[0]->hitung;
			
			if ($ceknama > 0) {
				$alert = view('partials/notification-alert', 
					['notif_text' => 'paket sudah terdaftar pada aplikasi',
					 'status' => 'warning']
					);
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/iklan/add'));
			}

			if ($_POST['duration1'] < 1) {
				$alert = view('partials/notification-alert', 
					['notif_text' => 'durasi tidak boleh kurang dari 1',
					 'status' => 'warning']
					);
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/iklan/add'));
			}

			$ads_description = $_POST['ads_description'];
			$ads_duration = $_POST['duration1'];
			$ads_price = $_POST['ads_price'];

			$dataset = [
				'ads_name' => $ads_name,
				'ads_duration' => $ads_duration,
				'ads_description' => $ads_description,
				'ads_price' => $ads_price,
				'ads_status' => 'on'
			];

			$this->m_ads->insertAds($dataset);

			$alert = view('partials/notification-alert', 
				['notif_text' => 'Paket Iklan berhasil ditambahkan',
				 'status' => 'success']
				);

			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/iklan/list'));
		}

		public function edit_proc($idads){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;

			$temp_data = $this->m_ads->getAdsById($idads)[0];

			$ads_name = $_POST['ads_name'];

			if ($ads_name != $temp_data->ads_name) {
				$ceknama = $this->m_ads->countAdsByName($ads_name)[0]->hitung;
				
				if ($ceknama > 0) {
					$alert = view('partials/notification-alert', 
						['notif_text' => 'paket sudah terdaftar pada aplikasi',
						 'status' => 'warning']
						);
					session()->setFlashdata('notif', $alert);
					return redirect()->to(base_url('pengelola/iklan/add'));
				}
			}

			if ($_POST['duration1'] < 1) {
				$alert = view('partials/notification-alert', 
					['notif_text' => 'durasi tidak boleh kurang dari 1',
					 'status' => 'warning']
					);
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/iklan/add'));
			}

			$ads_description = $_POST['ads_description'];
			$ads_duration = $_POST['duration1'];
			$ads_price = $_POST['ads_price'];

			$dataset = [
				'ads_name' => $ads_name,
				'ads_duration' => $ads_duration,
				'ads_description' => $ads_description,
				'ads_price' => $ads_price,
			];

			$this->m_ads->updateAds($dataset, $idads);

			$alert = view('partials/notification-alert', 
				['notif_text' => 'Paket Iklan berhasil diubah',
				 'status' => 'success']
				);

			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/iklan/detail/'.$idads));
		}

		public function switch($idads){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;

			$status = $this->m_ads->getAdsById($idads)[0]->ads_status;
			
			if ($status == 'on') {
				$ads_status = 'off';
				$alert = view('partials/notification-alert', 
					['notif_text' => 'Paket Iklan dinonaktifkan',
					 'status' => 'success']
					);

				session()->setFlashdata('notif', $alert);
			}else{
				$ads_status = 'on';
				$alert = view('partials/notification-alert', 
					['notif_text' => 'Paket Iklan diaktifkan',
					 'status' => 'success']
					);

				session()->setFlashdata('notif', $alert);
			}

			$this->m_ads->switchAdsStatus($ads_status, $idads);
			return redirect()->to(base_url('pengelola/iklan/detail/'.$idads));
		}
	}
