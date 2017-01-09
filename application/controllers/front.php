<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public $data = array();



    function __construct() {
        parent::__construct();
        $this->data['categories'] = $this->home_model->getCategories();
        $this->data['latestBlog'] = $this->home_model->getLatestBlog();
        $this->data['pages'] = $this->home_model->getPages();
        $this->data['firstPage'] = $this->home_model->getFirstPage();
        $str = $this->session->userdata('str');
        $this->data['ads'] = $this->home_model->getAds($str);
        //echo current_url(); 
        $user = $this->session->userdata('users');
        if($this->session->userdata('users')){
        	$this->data['name'] = $user->fname.' '.$user->lname;
        }
    }

    public function index(){	
		$data['page'] = 'home';
		$data['featuredProducts'] = $this->home_model->getFeaturedProducts();
		$data['homeContent'] = $this->home_model->getHomeContent();
		$data['sliders'] = $this->home_model->getSliders();
		//echo '<pre>'.print_r($data['sliders'],1).'</pre>'; exit;
		$data['meta'] = meta('homepage');
		$this->load->view('template',$data);
    }	

	public function product_category($slug, $order){
		$data['page'] = 'products';
		update_ads($this->data['ads']);

		if (is_numeric($order) || $order == '') {
			$base = base_url().'product-category/'.$slug;
			$segments = ($this->uri->segment(3) ? $this->uri->segment(3) : 0);
			$ordername = 'name';
			$order = 'asc';
			$config['uri_segment'] = 3;
		}else{
			$config['uri_segment'] = $segments = ($this->uri->segment(4) ? $this->uri->segment(4) : 0);
			$base = base_url().'product-category/'.$slug.'/'.$order;
			$sort = explode('-', $order);
			$ordername = $sort[0];
			$order = $sort[1];
			$config['uri_segment'] = 4;
		}

		$data['base_url'] = $config['base_url'] = $base;	
		$data['total_rows'] = $config['total_rows'] = $this->home_model->countCategoryProducts($slug);
		$config['per_page'] = $data['per_page'] = 9;
		$config['display_pages'] = FALSE;
		$config['full_tag_open'] = '<div><ul class="pull-left pagination m-t-0 m-b-10">';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:;">';
		$config['cur_tag_close'] = '</a></li>';
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['next_link'] = '<span class="glyphicon glyphicon-chevron-right"></span>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<span class="glyphicon glyphicon-chevron-left"></span>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
	
		$this->pagination->initialize($config);

		$data['currentPage'] = ceil(($segments/$config['per_page']) + 1); 
		$data['maxSelect'] = ceil(($config['total_rows']/$config['per_page'])); 
		$data['products'] = $this->home_model->getCategoryProducts($slug,$config['per_page'],$segments,$ordername,$order);	
		$data['category'] = $this->home_model->getCategory($slug);
		$data['pagination'] = $this->pagination->create_links();
		if($data['category']){
			$data['meta'] = meta('categories','cat_id', $data['category']->cat_id);	
		}
		
		$this->load->view('template',$data);
	}

	public function product($slug){

		$data['page'] = 'productdetail';
		update_ads($this->data['ads']);
		$data['products'] = $this->home_model->getProduct($slug);
		if($data['products']){
			$data['meta'] = meta('products_meta','pid',@$data['products'][0]->pid);
			$data['similarProducts'] = $this->home_model->getSimilarProducts(@$data['products'][0]->cat_id, @$data['products'][0]->pid);
			$data['price'] = get_variation($data['products'][0]->pid);
			$data['images'] = $this->home_model->getThumbnails($data['products'][0]->pid);
		}

		$this->load->view('template',$data);
	}

	public function search($search, $order = ''){

		if($this->input->post('search')){
			redirect('search/'.$this->input->post('search'));
		} 
		$search = $data['search'] = urldecode($search);
		$data['page'] = 'search';
		$data['meta'] = meta('homepage');
		update_ads($this->data['ads']);

		if (is_numeric($order) || $order == '') {
			$base = base_url().'search/'.$search;
			$segments = ($this->uri->segment(3) ? $this->uri->segment(3) : 0);
			$ordername = 'name';
			$order = 'asc';
			$config['uri_segment'] = 3;
		}else{
			$config['uri_segment'] = $segments = ($this->uri->segment(4) ? $this->uri->segment(4) : 0);
			$base = base_url().'search/'.$search.'/'.$order;
			$sort = explode('-', $order);
			$ordername = $sort[0];
			$order = $sort[1];
			$config['uri_segment'] = 4;
		}

		$data['base_url'] = $config['base_url'] = $base;	
		$data['total_rows'] = $config['total_rows'] = $this->home_model->countSearchProducts($search);
		$config['per_page'] = $data['per_page'] = 6;
		$config['display_pages'] = FALSE;
		$config['full_tag_open'] = '<div><ul class="pull-left pagination m-t-0 m-b-10">';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:;">';
		$config['cur_tag_close'] = '</a></li>';
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['next_link'] = '<span class="glyphicon glyphicon-chevron-right"></span>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<span class="glyphicon glyphicon-chevron-left"></span>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
	
		$this->pagination->initialize($config);

		$data['currentPage'] = ceil(($segments/$config['per_page']) + 1); 
		$data['maxSelect'] = ceil(($config['total_rows']/$config['per_page'])); 
		$data['products'] = $this->home_model->getSearchProducts($search,$config['per_page'],$segments,$ordername,$order);	
		//$data['category'] = $this->home_model->getCategory($search);
		$data['pagination'] = $this->pagination->create_links();

		//echo '<pre>'.print_r($data['products'],1).'</pre>'; exit;

		$this->load->view('template',$data);
	}

	public function about_us(){
		$data['page'] = 'page';
		$data['meta'] = meta('pages', 'id', 1);
		$data['result'] = $this->home_model->getPage(1);
		$this->load->view('template',$data);
	}

	public function our_story(){
		$data['page'] = 'page';
		$data['meta'] = meta('pages', 'id', 2);
		$data['result'] = $this->home_model->getPage(2);
		$this->load->view('template',$data);
	}

	public function our_social_innovation(){
		$data['page'] = 'page';
		$data['meta'] = meta('pages', 'id', 3);
		$data['result'] = $this->home_model->getPage(3);
		$this->load->view('template',$data);
	}

	public function our_heroes(){
		$data['page'] = 'page';
		$data['meta'] = meta('pages',4);
		$data['result'] = $this->home_model->getPage(4);
		$data['heroes'] = $this->home_model->getHeroes();
		//echo '<pre>'.print_r($data['heroes'],1).'</pre>'; exit;
		$this->load->view('template',$data);
	}

	public function blog($slug=''){
		
		$data['meta'] = meta('homepage');
		$data['archives'] = $this->home_model->getArchive();

		if($slug == ''){
			$data['page'] = 'blog';
			$data['blogs'] = $this->home_model->getPublishedBlogs();	
		}else{
			$data['page'] = 'blog_inner';
			$data['blog'] = $this->home_model->getSlugBlog($slug);
		}
		
		$this->load->view('template',$data);
	}

	public function contact(){
		$data['page'] = 'contact';
		$data['meta'] = meta('pages', 'id', 5);
		$data['stores'] = $this->home_model->getStores();
		$data['result'] = $this->home_model->getPage(5);
		$data['success'] = 0;

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');

		if($this->form_validation->run() == TRUE){
			$data['success'] = 1;
			$save = $this->input->post();
			$this->home_model->insertInquiries($save);

			//$this->_send_email($this->input->post('name'),$this->input->post('email'),$this->input->post('contact'),$this->input->post('message'));
		}

		$this->load->view('template',$data);
	}	

	private function _send_email($name,$email,$contact,$message){

		/*$mail_config = Array(
		    'protocol' => 'mail',
		    'smtp_host' => 'virus-server.com',
		    'smtp_port' => '587',
		    'smtp_user' => 'noreply@virus-server.com',
		    'smtp_pass' => 'I+%6?N]D93!G',
		    'mailtype'  => 'html'
		);*/

		$config['protocol'] = 'mail';
		$config['mailtype'] = 'html';

		$this->load->library('email');
		$this->email->initialize($config);
		
		$this->email->set_newline("\r\n");
		$this->email->from('no-reply@repchem.com', 'Messy Bessy');
		$this->email->reply_to('no-reply@repchem.com', 'Messy Bessy');
		$this->email->to('jerome.delacruz@virusworldwide.com');     
		$this->email->subject('RCI Contact Form - '.$name);
		$this->email->message( '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
									<html xmlns="http://www.w3.org/1999/xhtml">
									<body>
										<p>Name: '.$name.'</p>
										<p>Email: '.$email.'</p>
										<p>Contact: '.$contact.'</p>
										<p>Message: '.nl2br($message).'</p>
									</body>
									</html>' ); 
		$this->email->send();
		//echo $this->email->print_debugger();
	}

	public function save_comment(){

		$this->form_validation->set_rules('review', 'Review', 'required');
		$this->form_validation->set_rules('rating', 'Rating', 'required');

		if($this->form_validation->run() == TRUE){
			$save = $this->input->post();
			$save['date'] = date('Y-m-d H:i:s');
			/*$save['url'] = current_url();*/
			$this->home_model->insertComments($save);
		}
	}

	public function rating(){
		$result = $this->home_model->getRatings();
		$rating = round(($result->rating*2), 0)/2;
		echo json_encode($rating);
	}

	public function user_rating($id){
		$result = $this->home_model->getUserRating($id);
		$rating = round(($result->rating*2), 0)/2;
		echo json_encode($rating);
	}

	public function user_review(){
		$x = $this->home_model->getProductReview(1);
		/*echo '<pre>'.print_r($data,1).'</pre>'; exit;*/
		echo json_encode($x);
	}

	public function select_attribute(){
		$id = $this->input->post('attribute');
		$result = $this->home_model->getProductAttribute($id);
		echo json_encode($result);
	}

	public function select_image(){
		$id = $this->input->post('id');
		$result = $this->home_model->getProductImage($id);
		echo json_encode($result);	
	}

	public function ads($id){
		$this->home_model->updateAds($id,'count');
		$result = $this->home_model->getAd($id);
		$str = $this->session->userdata('str');
		$new = $str;
		$new .= $id;
		$new .= ",";
		$this->session->set_userdata('str',$new);
		redirect($result->link, 'refresh');
	}

	public function remove_ads(){
  		$id = $this->input->post('id');
  		$str = $this->session->userdata('str');
		$new = (string) $str;
		$new .= "$id";
		$new .= ",";
		$this->session->set_userdata('str',$new);
  	}

	public function all_userdata(){
  		echo '<pre>'.print_r($this->session->all_userdata(),1).'</pre>'; exit;
  	}

  	public function destroy(){
  		$this->session->sess_destroy();
  	}

  	public function buy()
	{
		$price_id = $this->input->post('price_id');
		$prod_id = $this->input->post('prod_id');
		$qty = $this->input->post('quantity');

		if($price_id){
			$result = $this->home_model->getProductId($price_id);
			$sku = $result->var_sku;
			$price = $result->var_price;
			$image = $result->var_image;
			$attribute = $result->var_attribute;
		}else{
			$result = $this->home_model->getSingleProductId($prod_id);
			$sku = $result->sku;
			$price = $result->price;
			$image = $result->image;
			$attribute = '';
		}

		$data = array(
           'id'      => $sku,
           'qty'     => $qty,
           'price'   => $price,
           'name'    => $result->name,
           'image'   => $image,
           'attribute' => $attribute
        );

		$this->cart->insert($data);
		//echo '<pre>'.print_r($result,1).'</pre>'; exit;
		redirect('cart', 'refresh');
	}

	public function cart(){
		
		if($this->input->post('update')){
			$total = $this->cart->total_items();  
			$item = $this->input->post('rowid');  
			$qty = $this->input->post('qty');  
			for($i=0;$i < $total;$i++)  {  
				$data = array(  
					'rowid' => @$item[$i], 
					'qty'   => @$qty[$i]  
				);  
				$this->cart->update($data);  
			}
		}

		$data['page'] = 'cart';
		$data['meta'] = meta('homepage');
		$data['cart'] = $this->cart->contents();
		$this->load->view('template',$data);
	}

	public function checkout(){
		$data['page'] = 'checkout';
		$data['meta'] = meta('homepage');
		$data['cart'] = $this->cart->contents();
		$user = $this->session->userdata('users');
		if($user){
			$user = $this->home_model->getUserId($user->user_id);	
			$data['user'] = array(
					'fname' => $user->fname,
					'lname' => $user->lname,
					'email' => $user->email,
					'company' => $user->company,
					'phone' => $user->phone,
					'address1' => $user->address1,
					'address2' => $user->address2,
					'city' => $user->city,
					'state' => $user->state,
					'zipcode' => $user->zipcode,
				);
		}else{
			$data['user'] = array(
					'fname' => '',
					'lname' => '',
					'email' => '',
					'company' => '',
					'phone' => '',
					'address1' => '',
					'address2' => '',
					'city' => '',
					'state' => '',
					'zipcode' => '',
				);
		}

		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('company', 'Company', '');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('address1', 'Address 1', 'required');
		$this->form_validation->set_rules('address2', 'Address 2', '');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('zipcode', 'Zip Code', 'required');
		$this->form_validation->set_rules('diff-account', '', '');

		$diff_account = @$this->input->post('diff-account');
		if($diff_account == 1){
			$this->form_validation->set_rules('ship_fname', 'First Name', 'required');
			$this->form_validation->set_rules('ship_lname', 'Last Name', 'required');
			$this->form_validation->set_rules('ship_email', 'Email Address', 'required|valid_email');
			$this->form_validation->set_rules('ship_company', 'Company', '');
			$this->form_validation->set_rules('ship_phone', 'Phone', 'required');
			$this->form_validation->set_rules('ship_address1', 'Address 1', 'required');
			$this->form_validation->set_rules('ship_address2', 'Address 2', '');
			$this->form_validation->set_rules('ship_city', 'City', 'required');
			$this->form_validation->set_rules('ship_state', 'State', 'required');
			$this->form_validation->set_rules('ship_zipcode', 'Zip Code', 'required');
		}

		if($this->form_validation->run() == TRUE){
			
			$save = $this->input->post();
			if(@$diff_account != 1){
				$save['ship_fname'] = $this->input->post('fname');
				$save['ship_lname'] = $this->input->post('lname');
				$save['ship_email'] = $this->input->post('email');
				$save['ship_company'] = $this->input->post('company');
				$save['ship_address1'] = $this->input->post('address1');
				$save['ship_address2'] = $this->input->post('address2');
				$save['ship_city'] = $this->input->post('city');
				$save['ship_state'] = $this->input->post('state');
				$save['ship_zipcode'] = $this->input->post('zipcode');
			}
			$this->home_model->addCart($save);
			redirect('thankyou','refresh');
		}

		//echo '<pre>'.print_r($data['user'],1).'</pre>'; exit;
		$this->load->view('template',$data);
	}


	public function thankyou(){
		echo 'THANK YOU';
		$this->cart->destroy();
	}

	public function login(){
		$data['page'] = 'login';
		$data['meta'] = meta('pages', 'id', 5);
		
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_login_check');

		if($this->form_validation->run() == TRUE){
			redirect(base_url(),'refresh');
		}

		$this->load->view('template',$data);
	}

	public function register(){
		$data['page'] = 'register';
		$data['meta'] = meta('pages', 'id', 5);
		
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|callback_register_check');
		$this->form_validation->set_rules('company', 'Company', '');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('address1', 'Address 1', 'required');
		$this->form_validation->set_rules('address2', 'Address 2', '');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('zipcode', 'Zip Code', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');

		if($this->form_validation->run() == TRUE){
			$save = $this->input->post();
			$user = $this->home_model->insertRegister($save);
			$this->session->set_userdata('users', $user);
			$this->session->set_userdata(array('signed_in' => TRUE));
			redirect(base_url(),'refresh');
		}

		$this->load->view('template',$data);
	}

	public function login_check(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->home_model->checkUser($email,$password);
		
		if($user){
			$this->session->set_userdata('users', $user);
			$this->session->set_userdata(array('signed_in' => TRUE));
			return TRUE;
		}else{
			$this->form_validation->set_message('login_check', 'Username and password do not match.');
			return FALSE;
		}
	}

	public function register_check(){
		$email = $this->input->post('email');
		$user = $this->home_model->checkRegister($email);
		
		if(!$user){
			return TRUE;
		}else{
			$this->form_validation->set_message('register_check', 'Email Address is already registered.');
			return FALSE;
		}
	}



}	
