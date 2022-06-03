<?php namespace App\Controllers\umkm;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_umkm;
	use App\Models\M_order;

	class Order extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_umkm = new M_umkm();
			$this->m_order = new M_order();
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
			return redirect()->to(base_url('umkm/order/list'));
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;

			$l_pesanan = $this->m_order->getOrderByUmkm($idumkm);
			$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Voucher Iklan']),
				'l_pesanan' => $l_pesanan,
				'detail_user' => $detilUser
			];
			
			return view('umkm/ads/list-order', $data);
		}
	}

?>