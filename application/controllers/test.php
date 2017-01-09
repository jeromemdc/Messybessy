<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		
		if($this->session->userdata('login') == true){
			redirect('test/profile');
		}
		
		if (isset($_GET['code'])) {
			
			$this->googleplus->getAuthenticate();
			$this->session->set_userdata('login',true);
			$this->session->set_userdata('user_profile',$this->googleplus->getUserInfo());
			redirect('test/profile');
			
		} 
			
		$contents['login_url'] = $this->googleplus->loginURL();
		$this->load->view('google',$contents);
		
	}
	
	public function profile(){
		
		if($this->session->userdata('login') != true){
			redirect('');
		}
		
		$contents['user_profile'] = $this->session->userdata('user_profile');
		$this->load->view('profile',$contents);
		
	}
	
	public function logout(){
		
		$this->session->sess_destroy();
		$this->googleplus->revokeToken();
		redirect('');
		
	}
	
}
