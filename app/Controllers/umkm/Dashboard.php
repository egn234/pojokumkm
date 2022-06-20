<?php

namespace App\Controllers\umkm;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\M_umkm;
use App\Models\M_produk;
use App\Models\M_ads;


class Dashboard extends \App\Controllers\BaseController
{

	public function __construct()
	{
		$this->m_umkm = new M_umkm();
		$this->m_produk = new M_produk();
		$this->m_ads = new M_ads();
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
		$this->newUser();
		$iduser = session()->get('iduser');
		$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];
		$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;
		$l_produk = $this->m_produk->getProdukByIdUmkm($idumkm);
		$l_produk_kategori = $this->m_produk->getKategoriProdukByUmkm($idumkm);
		$l_voucher = $this->m_ads->getJumlahVoucherByUmkm($idumkm)[0];
		$l_produk_ads = $this->m_produk->getProdukAdsByIdUmkm($idumkm);


		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
			'detail_user' => $detilUser,
			'jumlah_produk' => count($l_produk),
			'jml_kat_produk' => count($l_produk_kategori),
			'jml_voucher' => $l_voucher->jumlah_voucher,
			'jml_produk_ads' => count($l_produk_ads)
		];

		return view('umkm/dashboard', $data);
	}
}
