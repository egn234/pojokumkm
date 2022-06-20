<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_kategori;

class Kategori extends BaseController{
	
	function __construct(){
		$this->m_kategori = new M_kategori();
	}

  public function index(){
  	$l_kategori = $this->m_kategori->getAllKategori();

		$data = [
			'title_meta' => view('homepage_partial/title-meta', ['title' => 'List Kategori']),
			'l_kategori' => $l_kategori,
		];
		return view('kategori', $data);
  }
}
