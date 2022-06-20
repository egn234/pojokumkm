<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_kategori;
use App\Models\M_produk;

class Home extends BaseController
{

	function __construct()
	{
		$this->m_kategori = new M_kategori();
		$this->m_produk = new M_produk();
	}

	public function index()
	{

		$l_produk = $this->m_produk->getHomeProduct();
		$rand_id = $this->m_kategori->getIdKategoriRand()[0]->idkategori;

		$kat_name = $this->m_kategori->getKategoriById($rand_id)[0]->category_name;
		$l_rand_produk = $this->m_produk->getHomeProductRand($rand_id);

		$data = [
			'title_meta' => view('homepage_partial/title-meta', ['title' => 'Home']),
			'l_produk' => $l_produk,
			'kat_name' => $kat_name,
			'l_rand_produk' => $l_rand_produk
		];
		return view('home', $data);
	}

	public function list_produk()
	{
		$data = [
			'title_meta' => view('homepage_partial/title-meta', ['title' => 'Daftar Produk'])
		];
		return view('productlist', $data);
	}
}
