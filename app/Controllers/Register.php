<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class register extends BaseController{

	public function index(){
		$data = [
			'title_meta' => view('homepage_partial/title-meta', ['title' => 'Login'])
		];
		return view('register', $data);
	}
}