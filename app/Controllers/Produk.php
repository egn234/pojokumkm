<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_kategori;
use App\Models\M_produk;

class Produk extends BaseController
{

	function __construct()
	{
		$this->m_kategori = new M_kategori();
		$this->m_produk = new M_produk();
	}

	public function index()
	{
		$search = (isset($_GET['search'])) ? explode(" ", $_GET['search']) : "";
		$kategori = (isset($_GET['kategori'])) ?  $_GET['kategori'] : [];

		if (isset($_GET['search']) || isset($_GET['kategori'])) {
			$keyword = (isset($_GET['search'])) ? ["product_name LIKE '%$search[0]%'"] : "";
			//LOOP BUAT CARI NAMA PRODUK
			for ($i = 1; $i < count($search); $i++) {
				array_push($keyword, "OR product_name LIKE '%$search[$i]%' ");
			}
			//LOOP BUAT CARI KATEGORI
			for ($i = 0; $i < count($kategori); $i++) {
				array_push($keyword, "OR category_name LIKE '%$kategori[$i]%' ");
			}

			$query = implode(" ", $keyword);
			$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

			// Jumlah data per halaman
			$limit = 12;
			$limitStart = ($page - 1) * $limit;
			$allProduk = count($this->m_produk->getAllproduk());

			$jumlahPage = ceil($allProduk / $limit);
			print_r($jumlahPage);
			$l_produk = $this->m_produk->getHomeProduct($limit, $limitStart, $search, $query);
		} else {
			$allProduk = count($this->m_produk->getAllproduk());
			$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

			// Jumlah data per halaman
			$limit = 12;
			$jumlahPage = ceil($allProduk / $limit);
			$limitStart = ($page - 1) * $limit;
			$l_produk = $this->m_produk->getHomeProduct($limit, $limitStart);
		}
		$data = [
			'title_meta' => view('homepage_partial/title-meta', ['title' => 'Grid Produk']),
			'l_produk' => $l_produk,
			'l_page' => $page,
			'jumlahPage' => $jumlahPage
		];
		return view('search-page', $data);
	}

	public function id($idproduk)
	{
		$detil_produk = $this->m_produk->getProdukById($idproduk)[0];

		$data = [
			'title_meta' => view('homepage_partial/title-meta', ['title' => $detil_produk->product_name]),
			'l_detail' => $detil_produk
		];
		return view('detail-produk', $data);
	}

	public function gridDisplay()
	{
	}
}
