<?php namespace App\Filters;

	use CodeIgniter\HTTP\RequestInterface;
	use CodeIgniter\HTTP\ResponseInterface;
	use CodeIgniter\Filters\FilterInterface;

	class PengelolaFilter implements FilterInterface{
	 
	  public function before(RequestInterface $request, $arguments = null){
	    if(!session()->get('logged_in')){
				$alert = view('homepage_partial/notification-alert', 
						['notif_text' => 'Session Habis',
						 'status' => 'danger']
						);

					session()->setFlashdata('notif_login', $alert);
				return redirect()->to(base_url('auth/login'));
	    }else{
	    	$flag = session()->get('flag');
	    	$idgroup = session()->get('idgroup');

	    	if ($flag == 0) {
					$alert = view('homepage_partial/notification-alert', 
						['notif_text' => 'Akun ini sudah tidak aktif',
						 'status' => 'danger']
						);

					session()->setFlashdata('notif_login', $alert);
					session()->setFlashdata('s_username', $username);
					return redirect()->to(base_url('auth/login'));
	    	}

	    	if ($idgroup == 2) {
	    		return redirect()->to(base_url('umkm/dashboard'));
	    	}
	    }
	  }

	  //--------------------------------------------------------------------

	  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	  {
	      
	  }
	}

?>