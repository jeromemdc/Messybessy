<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
		
		if($this->session->userdata('login') == true){
			redirect('main/profile');
		}
		
		if (isset($_GET['code'])) {
			
			$this->googleplus->getAuthenticate();
			$this->session->set_userdata('login',true);
			$this->session->set_userdata('user_profile',$this->googleplus->getUserInfo());
			redirect('main/profile');
			
		} 
			
		$contents['login_url'] = $this->googleplus->loginURL();
		$this->load->view('google',$contents);
		
	}

	public function test(){
		$data = $this->home_model->getCategoryProducts('desktops');

		echo '	&#8369;';
		echo '<pre>'.print_r($data,1).'</pre>'; exit;
	}
	
}
