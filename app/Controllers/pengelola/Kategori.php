<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_user;
	use App\Models\M_kategori;
	use App\Models\M_produk;
	use CodeIgniter\Files\File;

	class Kategori extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_pengelola = new M_pengelola();
			$this->m_user = new M_user();
			$this->m_kategori = new M_kategori();
			$this->m_produk = new M_produk();
			$this->request = \Config\Services::request();
		}

		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_pengelola->countPengelolaByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/pengelola/profile/add';</script>";
    		exit;
    	}
		}

		public function index(){
			return redirect()->to(base_url('pengelola/kategori/list'));
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;

			$l_kategori = $this->m_kategori->getAllKategori();
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Kategori']),
				'l_kategori' => $l_kategori,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/kat/list-kategori', $data);
		}

		public function add(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;

			$category_name = $_POST['category_name'];
			$category_description = $_POST['category_description'];

			$cek_tag = $this->m_kategori->countKategoriByName($category_name)[0]->hitung;

			if ($cek_tag != 0) {
				$alert = view('partials/notification-alert', 
					['notif_text' => 'Kategori sudah terdaftar',
					 'status' => 'warning']
					);
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/kategori/list'));
			}

			$data = [
				'category_name' => $category_name,
				'category_description' => $category_description,
				'category_status' => 'on'
			];

			$this->m_kategori->insertKategori($data);
			$alert = view('partials/notification-alert', 
				['notif_text' => 'Kategori berhasil ditambahkan',
				 'status' => 'success']
				);
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/kategori/list'));
		}

		public function edit($idkategori){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;
			
			$data = [];

			$category_name = $_POST['category_name'];
			$category_description = $_POST['category_description'];

			$old_name = $this->m_kategori->getKategoriById($idkategori)[0]->category_name;
			
			if ($old_name != $category_name) {
				
				$cek_tag = $this->m_kategori->countKategoriByName($category_name)[0]->hitung;
				
				if ($cek_tag != 0) {
					$alert = view('partials/notification-alert', 
						['notif_text' => 'Kategori sudah terdaftar',
						 'status' => 'warning']
						);
					session()->setFlashdata('notif', $alert);
					return redirect()->to(base_url('pengelola/kategori/list'));
				}
				
				$data += ['category_name' => $category_name];
			}

			$data += ['category_description' => $category_description];

			$this->m_kategori->updateKategori($data, $idkategori);
			$alert = view('partials/notification-alert', 
				['notif_text' => 'Kategori berhasil diubah',
				 'status' => 'success']
				);
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/kategori/list'));
		}

		public function flag_switch($idkategori){
			$category_status = $this->m_kategori->getKategoriById($idkategori)[0]->category_status;

			if ($category_status == 'off') {
				$this->m_kategori->aktifkanKategori($idkategori);

				$alert = view('partials/notification-alert', 
					['notif_text' => 'Kategori Diaktifkan',
					 'status' => 'success']
					);
				session()->setFlashdata('notif', $alert);

			}elseif ($category_status == 'on') {
				$this->m_kategori->nonaktifkanKategori($idkategori);

				$alert = view('partials/notification-alert', 
					['notif_text' => 'Kategori Dinonaktifkan',
					 'status' => 'success']
					);
				session()->setFlashdata('notif', $alert);
			}
			
			return redirect()->to(base_url('pengelola/kategori/list/'));
		}

		public function del_kat($idkategori){
			$cek = $this->m_produk->countProdukByIdKategori($a->idkategori)[0]->hitung;

			if ($cek != 0) {
    		echo "<script>alert('restricted'); window.location.href = '".base_url()."/pengelola/kategori/list';</script>";
    		exit;
			}

			$this->m_kategori->deleteKategori($idkategori);

			$alert = view('partials/notification-alert', 
				['notif_text' => 'Kategori Berhasil Dihapus',
				 'status' => 'success']
				);

			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/kategori/list/'));
		}

		public function konfirEdit(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$kat = $this->m_kategori->getKategoriById($id)[0];
				$data = ['a' => $kat];
				echo view('pengelola/kat/part-kat-mod-edit', $data);
			}
		}

		public function konfirSwitch(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$kat = $this->m_kategori->getKategoriById($id)[0];
				$data = ['a' => $kat];
				echo view('pengelola/kat/part-kat-mod-switch-flag', $data);
			}
		}

		public function konfirDel(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$kat = $this->m_kategori->getKategoriById($id)[0];
				$data = ['a' => $kat];
				echo view('pengelola/kat/part-kat-mod-del', $data);
			}
		}

	}
