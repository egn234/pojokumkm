<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_user;
	use CodeIgniter\Files\File;

	class Iklan extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_pengelola = new M_pengelola();
			$this->m_user = new M_user();
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
			return redirect()->to(base_url('pengelola/produk/list'));
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;

			$l_iklan = $this->m_produk->getAllProduk();
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Paket Iklan']),
				'l_iklan' => $l_iklan,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/prod/list-produk', $data);
		}
	}
