<?php namespace App\Controllers\umkm;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_umkm;
	use App\Models\M_ads;

	class Iklan extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_umkm = new M_umkm();
			$this->m_ads = new M_ads();
		}
		
		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_umkm->countUmkmByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/umkm/profile/add';</script>";
    		exit;
    	}
		}

		public function index(){
			return redirect()->to(base_url('umkm/iklan/list'));
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;

			$l_voucher = $this->m_ads->getVoucherByUmkm($idumkm);
			$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Voucher Iklan']),
				'l_voucher' => $l_voucher,
				'detail_user' => $detilUser
			];
			
			return view('umkm/ads/list-voucher', $data);
		}
	}

?>