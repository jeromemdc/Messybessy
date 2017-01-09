<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Manila');		
		if(!$this->session->userdata('logged_in')){
			redirect(base_url().'login');
		}
	}  
 
	public function index(){
		if($this->session->userdata('logged_in')){
			redirect('administrator/dashboard','location');
		}else{
			redirect('login','refresh');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login','refresh');	
	}
	
	public function dashboard(){
		$data['title'] = 'Dashboard';
		$data['page'] = 'dashboard';
		$data['products'] = count($this->admin_model->get_database('products'));
		$this->load->view('administrator',$data);
	}

	public function categories(){
		$data['title'] = 'Categories';
		$data['page'] = 'categories';
		$data['results'] = $this->admin_model->get_database('categories');
		$this->load->view('administrator',$data);
	}

	public function add_category(){
		$data['title'] = 'Add Category';
		$data['page'] = 'add_category';
		$data['sort'] = count($this->admin_model->get_database('categories')) + 1;
 		
		if($_POST){
			$save = $this->input->post();
			$save['slug'] = alias_checker($this->input->post('cat_name'),'categories');
	       	$this->admin_model->insert_database($save,'categories');
	       	$this->session->set_flashdata('saved', 'Category is successfully inserted.');
			redirect('administrator/categories?route=catalog');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function edit_category($id){
		
		$data['title'] = 'Edit Category';
		$data['page'] = 'edit_category';
		$data['result'] = $this->admin_model->get_database_id($id,'categories','cat_id');

		if($_POST){
			$save = $this->input->post();
			$save['slug'] = alias_checker($this->input->post('cat_name'), 'categories', 'cat_id', $id);
	       	$this->admin_model->update_database($save,$id,'categories','cat_id');
	       	$this->session->set_flashdata('saved', 'Category is successfully updated.');
			redirect('administrator/categories?route=catalog');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function delete_category(){
		$checked = $this->input->post('delete');
	    foreach($checked as $val){
			$this->admin_model->delete_database($val,'categories','cat_id');
	    }
		$this->session->set_flashdata('saved', 'Category is successfully deleted.');
		redirect('administrator/categories?route=catalog');
	}

	public function products(){
		$data['title'] = 'Products';
		$data['page'] = 'products';
		$data['results'] = $this->admin_model->get_products();
		$this->load->view('administrator',$data);
	}

	public function add_product(){
		$data['title'] = 'Add Product';
		$data['page'] = 'add_product';
		$data['categories'] = dropdown_categories();
		
		if($_POST){
			$save = $this->input->post();
			$save['slug'] = alias_checker($this->input->post('name'),'products');
	       	$this->admin_model->insert_product($save);
	       	$this->session->set_flashdata('saved', 'Product is successfully inserted.');
			redirect('administrator/products?route=catalog');
		}
	   	
	   	$this->load->view('administrator',$data);	  	    
	}

	public function add_attribute($id){
		$data['title'] = 'Add Attribute';
		$data['page'] = 'add_attribute';
		$data['result'] = $this->admin_model->get_database_id($id,'products','pid');
		$data['attributes'] = $this->admin_model->get_database_ids($id,'products_variations','pid');

		if($_POST){
			$save = $this->input->post();
			$this->admin_model->insert_database($save,'products_variations');
			$this->session->set_flashdata('saved', 'Product Attribute is successfully inserted.');
			redirect('administrator/add_attribute/'.$id.'?route=catalog');
		}	

	   	$this->load->view('administrator',$data);
	}

	public function delete_attribute($id){
	    $this->load->library('user_agent');
		$this->admin_model->delete_database($id,'products_variations','prod_var_id');
		$this->session->set_flashdata('saved', 'Product Attribute is successfully deleted.');
		redirect($this->agent->referrer());
	}

	public function add_image($id){
		$data['title'] = 'Add Image';
		$data['page'] = 'add_image';
		$data['result'] = $this->admin_model->get_database_id($id,'products','pid');
		$data['images'] = $this->admin_model->get_database_ids($id,'products_image','pid');

		//echo '<pre>'.print_r($data['attributes'],1).'</pre>'; exit;
		if($_POST){
			$save = $this->input->post();
			$this->admin_model->insert_database($save,'products_image');
			$this->session->set_flashdata('saved', 'Product Image is successfully inserted.');
			redirect('administrator/add_image/'.$id.'?route=catalog');
		}	

	   	$this->load->view('administrator',$data);
	}

	public function delete_image($id){
	    $this->load->library('user_agent');
		$this->admin_model->delete_database($id,'products_image','prod_img_id');
		$this->session->set_flashdata('saved', 'Product Image is successfully deleted.');
		redirect($this->agent->referrer());
	}

	public function edit_product($id){
		$data['title'] = 'Edit Product';
		$data['page'] = 'edit_product';
		$data['categories'] = dropdown_categories();
		$data['product'] = $this->admin_model->get_database_id($id,'products','pid');
		$data['meta'] = $this->admin_model->get_database_id($id,'products_meta','pid');
		
		if($_POST){
			$save = $this->input->post();
			$save['slug'] = alias_checker($this->input->post('name'),'products');
	       	$this->admin_model->update_product($save,$id);
	       	$this->session->set_flashdata('saved', 'Product is successfully updated.');
			redirect('administrator/products?route=catalog');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function delete_product(){
		$checked = $this->input->post('delete');
	    foreach($checked as $val){

	        $this->admin_model->delete_database($val,'products','pid');
			$this->admin_model->delete_database($val,'products_meta','pid');
			$this->admin_model->delete_database($val,'products_variations','pid');
	    }
		$this->session->set_flashdata('saved', 'Product is successfully deleted.');
		redirect('administrator/products?route=catalog');
	}

	public function sliders(){
		$data['title'] = 'Sliders';
		$data['page'] = 'sliders';
		$data['results'] = $this->admin_model->get_database('sliders');
		$this->load->view('administrator',$data);
	}

	public function add_slider(){
		$data['title'] = 'Add Slider';
		$data['page'] = 'add_slider';

		if($_POST){
			$save = $this->input->post();
	       	$this->admin_model->insert_database($save,'sliders');
	       	$this->session->set_flashdata('saved', 'Slider is successfully inserted.');
			redirect('administrator/sliders?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function edit_slider($id){
		
		$data['title'] = 'Edit Slider';
		$data['page'] = 'edit_slider';
		$data['result'] = $this->admin_model->get_database_id($id,'sliders','id');

		if($_POST){
			$save = $this->input->post();
	       	$this->admin_model->update_database($save,$id,'sliders','id');
	       	$this->session->set_flashdata('saved', 'Slider is successfully updated.');
			redirect('administrator/sliders?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function delete_slider(){
		$checked = $this->input->post('delete');
	    foreach($checked as $val){
			$this->admin_model->delete_database($val,'sliders','id');
	    }
		$this->session->set_flashdata('saved', 'Slider is successfully deleted.');
		redirect('administrator/sliders?route=catalog');
	}

 	public function posts(){
		$data['title'] = 'posts';
		$data['page'] = 'posts';
		$data['results'] = $this->admin_model->get_database('posts');
		$this->load->view('administrator',$data);
	}

	public function add_post(){
		$data['title'] = 'Add Post';
		$data['page'] = 'add_post';

		if($_POST){
			$save = $this->input->post();
			$save['slug'] = alias_checker($this->input->post('title'), 'posts', 'id', $id);
			$save['date'] = date('Y-m-d H:i:s');
	       	$this->admin_model->insert_database($save,'posts');
	       	$this->session->set_flashdata('saved', 'Post is successfully inserted.');
			redirect('administrator/posts?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function edit_post($id){
		
		$data['title'] = 'Edit Post';
		$data['page'] = 'edit_post';
		$data['result'] = $this->admin_model->get_database_id($id,'posts','id');

		if($_POST){
			$save = $this->input->post();
			$save['slug'] = alias_checker($this->input->post('title'), 'posts', 'id', $id);
	       	$this->admin_model->update_database($save,$id,'posts','id');
	       	$this->session->set_flashdata('saved', 'Post is successfully updated.');
			redirect('administrator/posts?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function delete_post(){

		$checked = $this->input->post('delete');
	    foreach($checked as $val){
			$this->admin_model->delete_database($val,'posts','id');
	    }
		$this->session->set_flashdata('saved', 'Post is successfully deleted.');
		redirect('administrator/posts?route=system');
	}

	public function ads(){
		$data['title'] = 'ads';
		$data['page'] = 'ads';
		$data['results'] = $this->admin_model->get_database('ads');
		$this->load->view('administrator',$data);
	}

	public function add_ad(){
		$data['title'] = 'Add Ad';
		$data['page'] = 'add_ad';

		if($_POST){
			$save = $this->input->post();
			$save['date'] = date('Y-m-d H:i:s');
	       	$this->admin_model->insert_database($save,'ads');
	       	$this->session->set_flashdata('saved', 'Ad is successfully inserted.');
			redirect('administrator/ads?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function edit_ad($id){
		
		$data['title'] = 'Edit Ad';
		$data['page'] = 'edit_ad';
		$data['result'] = $this->admin_model->get_database_id($id,'ads','id');

		if($_POST){
			$save = $this->input->post();
	       	$this->admin_model->update_database($save,$id,'ads','id');
	       	$this->session->set_flashdata('saved', 'Ad is successfully updated.');
			redirect('administrator/ads?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function delete_ad(){
		$checked = $this->input->post('delete');
	    foreach($checked as $val){
			$this->admin_model->delete_database($val,'ads','id');
	    }
		$this->session->set_flashdata('saved', 'Ad is successfully deleted.');
		redirect('administrator/ads?route=system');
	}


	public function heroes(){
		$data['title'] = 'Heroes';
		$data['page'] = 'heroes';
		$data['results'] = $this->admin_model->get_database('heroes');
		$this->load->view('administrator',$data);
	}

	public function add_hero(){

	   	$data['title'] = 'Add Hero';
		$data['page'] = 'add_hero';

		if($_POST){ 
			$save = $this->input->post();
			$save['date'] = date('Y-m-d H:i:s');
	       	$this->admin_model->insert_database($save,'heroes');
	       	$this->session->set_flashdata('saved', 'Hero is successfully inserted.');
			redirect('administrator/heroes?route=system');
		}
	   	
	   	$this->load->view('administrator',$data); 	   
	}

	public function edit_hero($id){
		
		$data['title'] = 'Edit Hero';
		$data['page'] = 'edit_hero';
		$data['result'] = $this->admin_model->get_database_id($id,'heroes','id');

		if($_POST){
			$save = $this->input->post();
	       	$this->admin_model->update_database($save,$id,'heroes','id');
	       	$this->session->set_flashdata('saved', 'Hero is successfully updated.');
			redirect('administrator/heroes?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function delete_hero(){
		$checked = $this->input->post('delete');
	    foreach($checked as $val){
			$this->admin_model->delete_database($val,'heroes','id');
	    }
		$this->session->set_flashdata('saved', 'Hero is successfully deleted.');
		redirect('administrator/heroes?route=system');
	}

	public function home_page(){
		
		$data['title'] = 'Home Page Content';
		$data['page'] = 'homepage';
		$data['result'] = $this->admin_model->get_database_id(1,'homepage','id');

		if($_POST){
			$save = $this->input->post();
	       	$this->admin_model->update_database($save,1,'homepage','id');
	       	$this->session->set_flashdata('saved', 'Page is successfully updated.');
			redirect('administrator/home_page?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function about_us(){
		
		$data['title'] = 'About Us Content';
		$data['page'] = 'edit_page';
		$id = 1;
		$data['result'] = $this->admin_model->get_database_id($id,'pages','id');

		if($_POST){
			$save = $this->input->post();
	       	$this->admin_model->update_database($save,$id,'pages','id');
	       	$this->session->set_flashdata('saved', 'Page is successfully updated.');
			redirect('administrator/about_us?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);  	   
	}

	public function timeline(){
		
		$data['title'] = 'Timeline Content';
		$data['page'] = 'edit_page';
		$id = 2;
		$data['result'] = $this->admin_model->get_database_id($id,'pages','id');

		if($_POST){
			$save = $this->input->post();
	       	$this->admin_model->update_database($save,$id,'pages','id');
	       	$this->session->set_flashdata('saved', 'Page is successfully updated.');
			redirect(current_url().'?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);  	   
	}

	public function social(){
		
		$data['title'] = 'Our Social Innovation Content';
		$data['page'] = 'edit_page';
		$id = 3;
		$data['result'] = $this->admin_model->get_database_id($id,'pages','id');

		if($_POST){
			$save = $this->input->post();
	       	$this->admin_model->update_database($save,$id,'pages','id');
	       	$this->session->set_flashdata('saved', 'Page is successfully updated.');
			redirect(current_url().'?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);  	   
	}

	public function hero(){
		
		$data['title'] = 'Our Hero Content';
		$data['page'] = 'edit_page';
		$id = 4;
		$data['result'] = $this->admin_model->get_database_id($id,'pages','id');

		if($_POST){
			$save = $this->input->post();
	       	$this->admin_model->update_database($save,$id,'pages','id');
	       	$this->session->set_flashdata('saved', 'Page is successfully updated.');
			redirect(current_url().'?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);  	   
	}

	public function contact(){
		
		$data['title'] = 'Contact Us Content';
		$data['page'] = 'edit_page';
		$id = 5;
		$data['result'] = $this->admin_model->get_database_id($id,'pages','id');

		if($_POST){
			$save = $this->input->post();
	       	$this->admin_model->update_database($save,$id,'pages','id');
	       	$this->session->set_flashdata('saved', 'Page is successfully updated.');
			redirect(current_url().'?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);  	   
	}

	public function stores(){
		$data['title'] = 'Stores';
		$data['page'] = 'stores';
		$data['results'] = $this->admin_model->get_database('stores');
		$this->load->view('administrator',$data);
	}

	public function add_store(){
		$data['title'] = 'Add Store';
		$data['page'] = 'add_store';

		if($_POST){
			$save = $this->input->post();
			$save['date'] = date('Y-m-d H:i:s');
	       	$this->admin_model->insert_database($save,'stores');
	       	$this->session->set_flashdata('saved', 'Store is successfully inserted.');
			redirect('administrator/stores?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function edit_store($id){
		
		$data['title'] = 'Edit Store';
		$data['page'] = 'edit_store';
		$data['result'] = $this->admin_model->get_database_id($id,'stores','id');

		if($_POST){
			$save = $this->input->post();
	       	$this->admin_model->update_database($save,$id,'stores','id');
	       	$this->session->set_flashdata('saved', 'Store is successfully updated.');
			redirect('administrator/stores?route=system');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function delete_store(){
		$checked = $this->input->post('delete');
	    foreach($checked as $val){
			$this->admin_model->delete_database($val,'stores','id');
	    }
		$this->session->set_flashdata('saved', 'Store is successfully deleted.');
		redirect('administrator/stores?route=system');
	}

    public function do_upload(){

        $path = './uploads/img/';
        $this->load->library('upload');
        
        // Define file rules
        $this->upload->initialize(array(
            "upload_path"       =>  $path,
            "allowed_types"     =>  "gif|jpg|png|jpeg",
            "max_size" => "5000"
        ));
        
        if($this->upload->do_multi_upload("uploadfile")){
            $data['upload_data'] = $upload_data = $this->upload->get_multi_upload_data();

            if(!$upload_data){
                $data['upload_data'] = $upload_data = $this->upload->data();
            }

            echo json_encode($upload_data);
        } else {    
            // Output the errors
            echo json_encode(array('errors' => $this->upload->display_errors()));
        }
            
        // Exit to avoid further execution
        exit;
    }

    public function orders(){
    	$data['title'] = 'Orders';
		$data['page'] = 'orders';
		$data['results'] = $this->admin_model->getOrders();
		$this->load->view('administrator',$data);
    }

    public function view_order($id){
    	$data['title'] = 'Orders';
		$data['page'] = 'view_order';
		$data['result'] = $this->admin_model->getCustomerOrder($id);
		$data['carts'] = $this->admin_model->getCartOrder($id);
		$this->load->view('administrator',$data);	
    }

    public function delete_order(){
		$checked = $this->input->post('delete');
		$save = array('order_status' => 'deleted');

	    foreach($checked as $val){
			$this->admin_model->update_database($save,$val,'orders','order_id');
	    }
		$this->session->set_flashdata('saved', 'Order is successfully deleted.');
		redirect('administrator/orders?route=sales');
	}

    public function customers(){
    	$data['title'] = 'Customers';
		$data['page'] = 'customers';
		$data['results'] = $this->admin_model->getCustomers();
		$this->load->view('administrator',$data);
    }

    public function delete_customer(){
		$checked = $this->input->post('delete');
		$save = array('customer_status' => 0);
	    foreach($checked as $val){
			$this->admin_model->update_database($save,$val,'customers','email');
	    }

		$this->session->set_flashdata('saved', 'Slider is successfully deleted.');
		redirect('administrator/customers?route=sales');
	}

	function email_status($id){
		$data['title'] = 'Order Email Settings';
		$data['page'] = 'email_status';
		if($_POST){
			$save = $this->input->post();
	       	$this->admin_model->update_database($save,$id,'status_emails','id');
	       	$this->session->set_flashdata('saved', 'Email Status is successfully updated.');
			redirect('administrator/email_status/'.$id.'?route=system');
		}

		$data['result'] = $this->admin_model->getEmail($id);
		$this->load->view('administrator',$data);
	}
}

?>
