<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_pesanan;

	class Dashboard extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_pengelola = new M_pengelola();
			$this->m_pesanan = new M_pesanan();
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
			$this->newUser();
	    $iduser = session()->get('iduser');
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$incomes = $this->m_pesanan->getTotalIncomes()[0]->incomes;
			$p_incomes = $this->m_pesanan->getPotentialIncomes()[0]->p_incomes;
			$t_incomes = $this->m_pesanan->getTodayIncomes()[0]->today;
			$withdrawal = $this->m_pesanan->getTotalWithdrawal()[0]->withdrawal;
			$totalcsrate = $this->m_pesanan->getAllCsRating()[0]->csrate;
			$totaldesrate = $this->m_pesanan->getAllDesignerRating()[0]->desrate;
			$totalorder = $this->m_pesanan->countAllOrder()[0]->hitung;
			$closedorder = $this->m_pesanan->countAllClosedOrder()[0]->hitung;
			$canceledorder = $this->m_pesanan->countAllCanceledOrder()[0]->hitung;
			$all_income = $this->m_pesanan->getAllIncomes();

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
				'pendapatan' => $incomes,
				'p_pendapatan' => $p_incomes,
				't_pendapatan' => $t_incomes,
				'withdrawal' => $withdrawal,
				'cs_rate' => $totalcsrate,
				'des_rate' => $totaldesrate,
				'total_order' => $totalorder,
				'closed_order' => $closedorder,
				'canceled_order' => $canceledorder,
				'all_income' => $all_income,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/dashboard', $data);
		}
	}

?>