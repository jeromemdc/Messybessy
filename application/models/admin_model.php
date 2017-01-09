<?php 

class Admin_model extends CI_Model {

    function __construct(){ 
        parent::__construct();
    }

	function get_parent_categories(){
		return $this->db->get('categories')->result();
	}

	function get_products(){
		return $this->db
			->select('products.*, categories.*, products.image AS image')
			->join('categories', 'products.cat_id = categories.cat_id', 'left')
	 		->get('products')
			->result();
	}

	function insert_product($data){
		$products = array(
						'name' => $data['name'],
						'image' => $data['image'],
						'price' => $data['price'],
						'slug' => $data['slug'],
						'cat_id' => $data['cat_id'],
						'description' => $data['description'],
						'model' => $data['model'],
						'quantity' => $data['quantity'],
						'sku' => $data['sku'],
						'status' => $data['status'],
						'featured' => $data['featured'],
						'points' => $data['points'],
						'date' => date('Y-m-d H:i:s'),
					);

		$this->db->insert('products',$products);

		$lastid = $this->db->insert_id();
		$meta = array(
					'pid' => $lastid,
					'meta_title' => $data['meta_title'],
					'meta_description' => $data['meta_description'],
					'meta_keywords' => $data['meta_keywords'],
					'tags' => $data['tags'],
				);

		$this->db->insert('products_meta',$meta);
	}

	function update_product($data,$id){
		$products = array(
						'name' => $data['name'],
						'image' => $data['image'],
						'price' => $data['price'],
						'slug' => $data['slug'],
						'cat_id' => $data['cat_id'],
						'description' => $data['description'],
						'model' => $data['model'],
						'quantity' => $data['quantity'],
						'sku' => $data['sku'],
						'status' => $data['status'],
						'featured' => $data['featured'],
						'points' => $data['points'],
					);	
		
		$this->db->where('pid',$id)->update('products',$products);

		$meta = array(
					'meta_title' => $data['meta_title'],
					'meta_description' => $data['meta_description'],
					'meta_keywords' => $data['meta_keywords'],
					'tags' => $data['tags'],
				);

		$this->db->where('pid',$id)->update('products_meta',$meta);
	}	

	function get_products_image($id){
		return $this->db
			->where('pid',$id)
	 		->order_by('pid','asc')
	 		->get('products_image')
			->result();
	}

    function get_database($table){
		return $this->db
	 		->get($table)
			->result();
	}

    function get_database_id($id,$table,$where){
		return $this->db
			->where($where,$id)
			->get($table)
			->row();
	}

	function get_database_ids($id,$table,$where){
		return $this->db
			->where($where,$id)
			->get($table)
			->result();
	}

	function insert_database($to_insert,$table){
		return $this->db
	 		->insert($table,$to_insert);
	}



	function update_database($to_update,$id,$table,$where){
		return $this->db
			->where($where,$id)
	 		->update($table,$to_update);
	}

	function delete_database($id,$table,$where){
		return $this->db
			->where($where,$id)
	 		->delete($table);
	}

	function getOrders(){
		return $this->db
			->join('customers', 'customers.user_id = orders.user_id', 'left')
			->where('order_status !=', 'deleted')
	 		->get('orders')
			->result();
	}

	function getCustomerOrder($id){
		return $this->db
			->join('customers', 'customers.user_id = orders.user_id', 'left')
			->join('address', 'address.order_id = orders.order_id', 'left')
	 		->where('orders.order_id', $id)	
	 		->get('orders')
			->row();	
	}

	function getCartOrder($id){
		return $this->db
	 		->where('order_id', $id)	
	 		->get('cart')
			->result();
	}

	function getCustomers(){
		return $this->db
			->where('customer_status', 1)
			->order_by('date', 'DESC')
			->group_by('email')
	 		->get('customers')
			->result();	
	}

	function getEmail($id){
		return $this->db
			->where('id', $id)
	 		->get('status_emails')
			->row();	
	}

    
}
?>