<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_kategori;
use App\Models\M_produk;

class Produk extends BaseController{
	
	function __construct(){
		$this->m_kategori = new M_kategori();
		$this->m_produk = new M_produk();
	}

  public function index(){

  }

  public function id($idproduk){
  	$detil_produk = $this->m_produk->getProdukById($idproduk)[0];

  	$data = [
			'title_meta' => view('homepage_partial/title-meta', ['title' => $detil_produk->product_name]),
			'l_detail' => $detil_produk
		];
		return view('detail-produk', $data);
  }
}
