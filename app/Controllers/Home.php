<?php

namespace App\Controllers;

class Home extends BaseController{
	
	// function __construct(){
		
	// }

  public function index(){
		$data = [
			'title_meta' => view('homepage_partial/title-meta', ['title' => 'Home'])
		];
		return view('home', $data);
  }

  public function list_produk(){
  	$data = [
			'title_meta' => view('homepage_partial/title-meta', ['title' => 'Daftar Produk'])
		];
		return view('productlist', $data);
  }
}
