<?php

namespace App\Controllers\umkm;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\M_umkm;
use App\Models\M_user;
use App\Models\M_produk;
use App\Models\M_kategori;
use App\Models\M_ads;
use App\Models\M_order;
use CodeIgniter\Files\File;

class Produk extends \App\Controllers\BaseController
{

	function __construct()
	{
		$this->m_umkm = new M_umkm();
		$this->m_user = new M_user();
		$this->m_produk = new M_produk();
		$this->m_kategori = new M_kategori();
		$this->m_ads = new M_ads();
		$this->m_order = new M_order();
		$this->request = \Config\Services::request();
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
		return redirect()->to(base_url('umkm/produk/list'));
	}

	public function list()
	{
		$this->newUser();
		$iduser = session()->get('iduser');
		$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;

		$l_produk = $this->m_produk->getProdukByIdUmkm($idumkm);
		$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'List Produk']),
			'l_produk' => $l_produk,
			'detail_user' => $detilUser
		];

		return view('umkm/produk/list-produk', $data);
	}

	public function detail($idproduk)
	{
		$this->newUser();
		$iduser = session()->get('iduser');
		$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;
		$cek_id = $this->m_produk->getProdukById($idproduk)[0]->idumkm;
		$l_order = $this->m_ads->getVoucherByUmkm($idumkm);

		if ($idumkm != $cek_id) {
			return redirect()->to(base_url('umkm/pesanan/list'));
		}

		$l_detail = $this->m_produk->getProdukById($idproduk)[0];
		$l_produk_ads = $this->m_produk->getProdukAds($idproduk);
		$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];

		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Detail Produk']),
			'l_detail' => $l_detail,
			'detail_user' => $detilUser,
			'l_order' => $l_order,
			'l_produk_ads' => $l_produk_ads

		];

		return view('umkm/produk/detail-produk', $data);
	}

	public function add()
	{
		$this->newUser();
		$iduser = session()->get('iduser');
		$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;

		$katprod = $this->m_kategori->getKategoriAktif();
		$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];

		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'List Produk']),
			'katprod' => $katprod,
			'detail_user' => $detilUser
		];

		return view('umkm/produk/add-produk', $data);
	}

	public function edit($idproduk)
	{
		$this->newUser();
		$iduser = session()->get('iduser');
		$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;

		$katprod = $this->m_kategori->getKategoriAktif();
		$l_detail = $this->m_produk->getProdukById($idproduk)[0];
		$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];

		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'List Produk']),
			'katprod' => $katprod,
			'l_detail' => $l_detail,
			'detail_user' => $detilUser
		];

		return view('umkm/produk/edit-produk', $data);
	}

	public function add_proc()
	{
		$iduser = session()->get('iduser');
		$v_foto = FALSE;
		$c_foto = 0;

		$idkategori = $_POST['idkategori'];

		if ($idkategori == 0) {
			$alert = view(
				'partials/notification-alert',
				[
					'notif_text' => 'Pilih jenis produk terlebih dahulu',
					'status' => 'warning'
				]
			);
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('umkm/produk/add'));
		}

		$description = $_POST['description'];
		$product_name = $_POST['product_name'];

		$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;

		$dataset = [
			'idkategori' => $idkategori,
			'product_name' => $product_name,
			'description' => $description,
			'idumkm' => $idumkm,
			'product_status' => 'on'
		];

		define('MB', 1000000);
		if ($_FILES['main_img']['size'] > 8 * MB) {
			$v_foto = TRUE;
		} elseif ($_FILES['main_img']['size'] != 0) {
			$upload_data = [
				'iduser' => $iduser,
				'tipe' => 'main_img',
				'file_n' => 'main'
			];
			$product_main_pic = $this->upload_foto_produk($upload_data)['name'];
			$dataset += ['product_main_pic' => $product_main_pic];
		} elseif ($_FILES['main_img']['size'] == 0) {
			$c_foto += 1;
		}

		if ($_FILES['foto1']['size'] > 8 * MB) {
			$v_foto = TRUE;
		} elseif ($_FILES['foto1']['size'] != 0) {
			$upload_data = [
				'iduser' => $iduser,
				'tipe' => 'foto1',
				'file_n' => 'ex1'
			];
			$product_extra_pic1 = $this->upload_foto_produk($upload_data)['name'];
			$dataset += ['product_extra_pic1' => $product_extra_pic1];
		} elseif ($_FILES['foto1']['size'] == 0) {
			$c_foto += 1;
		}

		if ($_FILES['foto2']['size'] > 8 * MB) {
			$v_foto = TRUE;
		} elseif ($_FILES['foto2']['size'] != 0) {
			$upload_data = [
				'iduser' => $iduser,
				'tipe' => 'foto2',
				'file_n' => 'ex2'
			];
			$product_extra_pic2 = $this->upload_foto_produk($upload_data)['name'];
			$dataset += ['product_extra_pic2' => $product_extra_pic2];
		} elseif ($_FILES['foto2']['size'] == 0) {
			$c_foto += 1;
		}

		if ($_FILES['foto3']['size'] > 8 * MB) {
			$v_foto = TRUE;
		} elseif ($_FILES['foto3']['size'] != 0) {
			$upload_data = [
				'iduser' => $iduser,
				'tipe' => 'foto3',
				'file_n' => 'ex3'
			];
			$product_extra_pic3 = $this->upload_foto_produk($upload_data)['name'];
			$dataset += ['product_extra_pic3' => $product_extra_pic3];
		} elseif ($_FILES['foto3']['size'] == 0) {
			$c_foto += 1;
		}

		if ($v_foto) {
			$alert = view(
				'partials/notification-alert',
				[
					'notif_text' => 'file terlalu besar',
					'status' => 'warning'
				]
			);

			$data_session = [
				'notif' => $alert,
				'idkategori' => $idkategori,
				'product_name' => $product_name,
				'description' => $description
			];

			session()->setFlashdata($data_session);
			return redirect()->to(base_url('umkm/produk/add'));
		}

		if ($c_foto == 4) {
			$alert = view(
				'partials/notification-alert',
				[
					'notif_text' => 'Harus menyertakan minimal 1 foto produk',
					'status' => 'warning'
				]
			);

			$data_session = [
				'notif' => $alert,
				'idkategori' => $idkategori,
				'product_name' => $product_name,
				'description' => $description
			];

			session()->setFlashdata($data_session);
			return redirect()->to(base_url('umkm/produk/add'));
		}

		$this->m_produk->insertProduk($dataset);

		if ($_POST['product_link'] != "" && $_POST['link_name'] != "") {
			$idproduk = $this->m_produk->getProdukUmkmTerbaru($idumkm)[0]->idproduk;

			$link_data = [
				'link_name' => $_POST['link_name'],
				'link_address' => $_POST['product_link'],
				'idproduk' => $idproduk
			];

			$this->m_produk->insertProdukLink($link_data);
		}

		$alert = view(
			'partials/notification-alert',
			[
				'notif_text' => 'Produk berhasil ditambahkan',
				'status' => 'success'
			]
		);

		session()->setFlashdata('notif', $alert);
		return redirect()->to(base_url('umkm/produk/list'));
	}

	public function edit_proc($idproduk)
	{
		$iduser = session()->get('iduser');
		$v_foto = FALSE;

		$temp_dat = $this->m_produk->getProdukById($idproduk)[0];

		$idkategori = $_POST['idkategori'];

		if ($idkategori == 0) {
			$alert = view(
				'partials/notification-alert',
				[
					'notif_text' => 'Pilih jenis produk terlebih dahulu',
					'status' => 'warning'
				]
			);
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('umkm/produk/add'));
		}

		$description = $_POST['description'];
		$product_name = $_POST['product_name'];

		$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;

		$dataset = [
			'idkategori' => $idkategori,
			'product_name' => $product_name,
			'description' => $description,
			'idumkm' => $idumkm
		];

		define('MB', 1000000);
		if ($_FILES['main_img']['size'] > 8 * MB) {
			$v_foto = TRUE;
		} elseif ($_FILES['main_img']['size'] != 0) {
			$upload_data = [
				'iduser' => $iduser,
				'tipe' => 'main_img',
				'file_n' => 'main'
			];

			if ($temp_dat->product_main_pic != null) {
				unlink(ROOTPATH . 'public/uploads/user/umkm/user' . $iduser . '/prd/' . $temp_dat->product_main_pic);
			}

			$product_main_pic = $this->upload_foto_produk($upload_data)['name'];
			$dataset += ['product_main_pic' => $product_main_pic];
		}

		if ($_FILES['foto1']['size'] > 8 * MB) {
			$v_foto = TRUE;
		} elseif ($_FILES['foto1']['size'] != 0) {
			$upload_data = [
				'iduser' => $iduser,
				'tipe' => 'foto1',
				'file_n' => 'ex1'
			];

			if ($temp_dat->product_extra_pic1 != null) {
				unlink(ROOTPATH . 'public/uploads/user/umkm/user' . $iduser . '/prd/' . $temp_dat->product_extra_pic1);
			}

			$product_extra_pic1 = $this->upload_foto_produk($upload_data)['name'];
			$dataset += ['product_extra_pic1' => $product_extra_pic1];
		}

		if ($_FILES['foto2']['size'] > 8 * MB) {
			$v_foto = TRUE;
		} elseif ($_FILES['foto2']['size'] != 0) {
			$upload_data = [
				'iduser' => $iduser,
				'tipe' => 'foto2',
				'file_n' => 'ex2'
			];

			if ($temp_dat->product_extra_pic2 != null) {
				unlink(ROOTPATH . 'public/uploads/user/umkm/user' . $iduser . '/prd/' . $temp_dat->product_extra_pic2);
			}

			$product_extra_pic2 = $this->upload_foto_produk($upload_data)['name'];
			$dataset += ['product_extra_pic2' => $product_extra_pic2];
		}

		if ($_FILES['foto3']['size'] > 8 * MB) {
			$v_foto = TRUE;
		} elseif ($_FILES['foto3']['size'] != 0) {
			$upload_data = [
				'iduser' => $iduser,
				'tipe' => 'foto3',
				'file_n' => 'ex3'
			];

			if ($temp_dat->product_extra_pic3 != null) {
				unlink(ROOTPATH . 'public/uploads/user/umkm/user' . $iduser . '/prd/' . $temp_dat->product_extra_pic3);
			}

			$product_extra_pic3 = $this->upload_foto_produk($upload_data)['name'];
			$dataset += ['product_extra_pic3' => $product_extra_pic3];
		}

		if ($v_foto) {
			$alert = view(
				'partials/notification-alert',
				[
					'notif_text' => 'file terlalu besar',
					'status' => 'warning'
				]
			);

			$data_session = [
				'notif' => $alert,
				'idkategori' => $idkategori,
				'product_name' => $product_name,
				'description' => $description
			];

			session()->setFlashdata($data_session);
			return redirect()->to(base_url('umkm/produk/add'));
		}

		$this->m_produk->updateProduk($dataset, $idproduk);

		$alert = view(
			'partials/notification-alert',
			[
				'notif_text' => 'Produk berhasil diubah',
				'status' => 'success'
			]
		);

		session()->setFlashdata('notif', $alert);
		return redirect()->to(base_url('umkm/produk/detail/' . $idproduk));
	}

	public function add_link($idproduk)
	{
		$this->newUser();
		$iduser = session()->get('iduser');
		$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;

		$link_name = $_POST['link_name'];
		$link_address = $_POST['product_link'];

		$data = [
			'link_name' => $link_name,
			'link_address' => $link_address,
			'idproduk' => $idproduk
		];

		$this->m_produk->insertProdukLink($data);

		$alert = view(
			'partials/notification-alert',
			[
				'notif_text' => 'Link ditambahkan',
				'status' => 'success'
			]
		);
		session()->setFlashdata('notif', $alert);

		return redirect()->to(base_url('umkm/produk/detail/' . $idproduk));
	}

	public function del_link($idproduk, $idprodlink)
	{
		$this->newUser();
		$iduser = session()->get('iduser');
		$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;

		$this->m_produk->deleteLinkProduk($idprodlink);

		$alert = view(
			'partials/notification-alert',
			[
				'notif_text' => 'Link dihapus',
				'status' => 'warning'
			]
		);
		session()->setFlashdata('notif', $alert);

		return redirect()->to(base_url('umkm/produk/detail/' . $idproduk));
	}

	public function upload_foto_produk($dataset)
	{
		$img = $this->request->getFile($dataset['tipe']);
		$newName = 'prd_' . $dataset['file_n'] . '_' . $dataset['iduser'] . '_' . $img->getRandomName();

		$img->move(ROOTPATH . 'public/uploads/user/umkm/user' . $dataset['iduser'] . '/prd/', $newName);
		$data = [
			'name' => $img->getName(),
			'type' => $img->getClientMimeType()
		];

		return $data;
	}

	public function use_ads()
	{
		$idproduk = $_POST['idproduk'];
		$idumkm = $_POST['idumkm'];
		$voucher = explode("-", $_POST['voucher']);
		$idads = $voucher[0];
		$voucherDate = $voucher[2];
		$ads_date_finished = date('Y-m-d H:i:s', strtotime('+' . $voucherDate . 'days', strtotime(date("Y-m-d H:i:s"))));
		$dataset = [
			'idumkm' => $idumkm,
			'idads' => $idads,
			'idproduk' => $idproduk,
			'ads_date_start' => date('Y-m-d H:i:s'),
			'ads_date_finished' => $ads_date_finished,
			'ads_date_used' => date('Y-m-d H:i:s')
		];

		$voucherAmount = $voucher[1];
		$sisa = $voucherAmount - 1;

		$datasetOwned = [
			'ads_amount' => $sisa
		];

		$this->m_order->useVoucher($dataset, $datasetOwned, $idumkm, $idads);
		$alert = view(
			'partials/notification-alert',
			[
				'notif_text' => 'Produk Berhasil Di Iklankan',
				'status' => 'success'
			]
		);

		session()->setFlashdata('notif', $alert);
		return redirect()->to(base_url('umkm/produk/list'));
	}

	public function del_proc($idproduk)
	{
		$this->newUser();
		$iduser = session()->get('iduser');
		$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;

		$this->m_produk->deleteLinkProdukByIdProduk($idproduk);
		$this->m_produk->deleteProdukByIdProduk($idproduk);

		$alert = view(
			'partials/notification-alert',
			[
				'notif_text' => 'Produk dihapus',
				'status' => 'warning'
			]
		);
		session()->setFlashdata('notif', $alert);

		return redirect()->to(base_url('umkm/produk/list'));
	}
}
