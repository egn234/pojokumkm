<?php

namespace App\Controllers\umkm;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\M_umkm;
use App\Models\M_ads;
use App\Models\M_order;

class Iklan extends \App\Controllers\BaseController
{

	public function __construct()
	{
		$this->m_umkm = new M_umkm();
		$this->m_ads = new M_ads();
		$this->m_order = new M_order();
	}

	public function newUser()
	{
		$iduser = session()->get('iduser');
		$is_new = $this->m_umkm->countUmkmByIdUser($iduser)[0]->hitung;

		if ($is_new == 0) {
			echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '" . base_url() . "/umkm/profile/add';</script>";
			exit;
		}
	}

	public function index()
	{
		return redirect()->to(base_url('umkm/iklan/list'));
	}

	public function list()
	{
		$this->newUser();
		$iduser = session()->get('iduser');
		$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;

		$l_order = $this->m_order->getOrderByUmkm($idumkm);
		$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];

		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'List Pesanan Voucher']),
			'l_order' => $l_order,
			'detail_user' => $detilUser
		];

		return view('umkm/ads/list-order', $data);
	}

	public function order()
	{
		$iduser = session()->get('iduser');
		$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;
		$l_voucher = $this->m_ads->getAllAds();
		$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Pesanan Voucher Iklan']),
			'l_voucher' => $l_voucher,
			'detail_user' => $detilUser,
			'idumkm' => $idumkm
		];
		return view('umkm/ads/add-order', $data);
	}

	public function add_order()
	{
		$idads = $_POST['adsid'];
		$jmlh_voucher = $_POST['jmlh_voucher'];
		$idumkm = $_POST['idumkm'];
		$total = $_POST['total'];

		$dataset = [
			'idads' => $idads,
			'idumkm ' => $idumkm,
			'item_amount' => $jmlh_voucher,
			'date_ordered' => date("Y-m-d H:i:s"),
			'payment_amount' => $total,
			'status' => "Menunggu Bukti Transfer"
		];
		$this->m_order->insertOrder($dataset);
		$alert = view(
			'partials/notification-alert',
			[
				'notif_text' => 'Order berhasil ditambahkan',
				'status' => 'success'
			]
		);

		session()->setFlashdata('notif', $alert);
		return redirect()->to(base_url('umkm/Iklan/list'));
	}

	public function detail($idorder)
	{
		$iduser = session()->get('iduser');
		$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];
		$detail_orderan = $this->m_order->getOrderById($idorder)[0];

		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Detail Orderan']),
			'detail_orderan' => $detail_orderan,
			'detail_user' => $detilUser
		];

		return view('umkm/ads/detail-order', $data);
	}

	public function add_pic_payment()
	{
		$idorder = $_POST['idorder'];
		$iduser = session()->get('iduser');
		$upload_data = [
			'iduser' => $iduser,
			'tipe' => 'payment_img',
			'file_n' => 'main'
		];
		$payment_pic = $this->upload_bukti_pembayaran($upload_data)['name'];
		$dataset = [
			'payment_proof' => $payment_pic,
			'status' => "Dalam Proses"
		];
		$this->m_order->updateOrder($dataset, $idorder);
		$alert = view(
			'partials/notification-alert',
			[
				'notif_text' => 'Upload Bukti Pembayaran Berhasil',
				'status' => 'success'
			]
		);

		session()->setFlashdata('notif', $alert);
		return redirect()->to(base_url('umkm/Iklan/list'));
	}

	public function upload_bukti_pembayaran($dataset)
	{
		$img = $this->request->getFile($dataset['tipe']);
		$newName = 'ord_' . $dataset['file_n'] . '_' . $dataset['iduser'] . '_' . $img->getRandomName();

		$img->move(ROOTPATH . 'public/uploads/user/umkm/user' . $dataset['iduser'] . '/ord/', $newName);
		$data = [
			'name' => $img->getName(),
			'type' => $img->getClientMimeType()
		];

		return $data;
	}
}
