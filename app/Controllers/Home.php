<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_kategori;
use App\Models\M_produk;
use App\Models\M_umkm;

class Home extends BaseController{
	
	function __construct(){
		$this->m_kategori = new M_kategori();
		$this->m_produk = new M_produk();
    $this->m_umkm = new M_umkm();
	}

  public function index(){
  	$l_produk = $this->m_produk->getHomeProduct();
  	$cek_rand = $this->m_kategori->getIdKategoriRand();
  	
  	if ($cek_rand != null) {
  		$rand_id = $this->m_kategori->getIdKategoriRand()[0]->idkategori;
  		$kat_name = $this->m_kategori->getKategoriById($rand_id)[0]->category_name;
  		$l_rand_produk = $this->m_produk->getHomeProductRand($rand_id);  	
  	}else{
  		$kat_name = "";
  		$l_rand_produk = "";
  	}


		$data = [
			'title_meta' => view('homepage_partial/title-meta', ['title' => 'Home']),
			'l_produk' => $l_produk,
			'kat_name' => $kat_name,
			'l_rand_produk' => $l_rand_produk
		];
		return view('home', $data);
  }

  public function list_produk(){
  	$data = [
			'title_meta' => view('homepage_partial/title-meta', ['title' => 'Daftar Produk'])
		];
		return view('productlist', $data);
  }

  public function contact_us(){
    $data = [
      'title_meta' => view('homepage_partial/title-meta', ['title' => 'Contact Us'])
    ];
    return view('contact-us', $data);
  }

  public function umkm(){
    $l_umkm = $this->m_umkm->getAllUmkm();
    
    $data = [
      'title_meta' => view('homepage_partial/title-meta', ['title' => 'List Umkm']),
      'l_umkm' => $l_umkm
    ];
    return view('umkm-list', $data);
  }
}
