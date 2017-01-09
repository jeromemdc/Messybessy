<?php
class home_model extends CI_Model {

    function getSLiders(){
		return $this->db
			->get('sliders')
			->result();
	}

	function getCategories(){
		return $this->db
			->select('categories.*,COUNT(name) AS count')
			->join('products', 'products.cat_id = categories.cat_id', 'left')
			->order_by('sort','asc')
			->group_by('cat_name')
			->get('categories')
			->result();
	}

	function getCategory($slug){
		return $this->db
			->where('slug',$slug)
			->get('categories')
			->row();
	}

    function getFeaturedProducts(){
		return $this->db
			->where('status',1)
			->where('quantity >',0)
			->where('featured',1)
			->order_by('rand()')
			->limit(4)
			->get('products')
			->result();
	}

	function getProductsPagination($limit, $offset){
        return $this->db
        	->where('status',1)
			->where('quantity >',0)
        	->limit($limit)
        	->offset($offset)
        	->get('products')
        	->result();
    }
	
	function getCategoryProducts($slug, $limit, $offset, $order, $sort){
		return $this->db
			->select('products.*, categories.*, products.description AS prod_desc, products.slug AS prod_slug, products.image AS prod_image')
			->join('categories', 'products.cat_id = categories.cat_id', 'left')
			->where('status',1)
			->where('quantity >',0)
			->where('categories.slug', $slug)
			->limit($limit)
        	->offset($offset)
	 		->order_by($order, $sort)
	 		->get('products')
			->result();
	}

	function countCategoryProducts($slug){
		return $this->db
			->join('categories', 'products.cat_id = categories.cat_id', 'left')
			->where('status',1)
			->where('quantity >',0)
			->where('categories.slug', $slug)
	 		->order_by('products.name','asc')
			->get('products')
			->num_rows();
	}

	function getSearchProducts($search, $limit, $offset, $order, $sort){
		return $this->db
			->select('products.*, categories.*, products.description AS prod_desc, products.slug AS prod_slug, products.image AS prod_image')
			->join('categories', 'products.cat_id = categories.cat_id', 'left')
			->join('products_meta', 'products.pid = products_meta.pid', 'left')
			->where('status',1)
			->where('quantity >',0)
			->like('name', $search)
			->or_like('tags', $search)
			->or_like('products.description', $search)
			->limit($limit)
        	->offset($offset)
	 		->order_by($order, $sort)
	 		->get('products')
			->result();
	}

	function countSearchProducts($search){
		return $this->db
			->join('categories', 'products.cat_id = categories.cat_id', 'left')
			->where('status',1)
			->where('quantity >',0)
			->like('name', $search)
	 		->order_by('products.name','asc')
			->get('products')
			->num_rows();
	}

	function getProduct($slug){
		return $this->db
			->select('products.*, categories.*, products_variations.*, products.description AS prod_desc, products.slug AS prod_slug, products.image AS prod_image, products.pid AS pid')
			->join('categories', 'products.cat_id = categories.cat_id', 'left')
			->join('products_variations', 'products.pid = products_variations.pid', 'left')
			->where('status',1)
			->where('quantity >',0)
			->where('products.slug', $slug)
	 		->get('products')
			->result();
	}

	function getVariation($id){
		return $this->db
			->select('price')
			->select_min('var_price', 'min_price')
			->select_max('var_price', 'max_price')
			->join('products', 'products.pid = products_variations.pid', 'left')
			->where('products.pid',$id)
	 		->get('products_variations')
			->row();
	}

	function getProductAttribute($id){
		return $this->db
			->where('prod_var_id',$id)
	 		->get('products_variations')
			->row();	
	}

	function getProductImage($id){
		return $this->db
			->select('image')
			->where('prod_img_id',$id)
	 		->get('products_image')
			->row();	
	}

	function getSimilarProducts($id,$pid){
		return $this->db
			->where('status',1)
			->where('quantity >',0)
			->where('cat_id', $id)
			->where('pid !=', $pid)
			->limit(3)
			->order_by('rand()')
	 		->get('products')
			->result();
	}

	function getStore($id){
		return $this->db
			->where('id',$id)
	 		->get('stores')
			->row();
	}

	function getStores(){
		return $this->db
	 		->get('stores')
			->result();
	}

	function getLatestBlog(){
		return $this->db
			->where('published', 1)
			->limit(1)
			->order_by('id','desc')
	 		->get('posts')
			->row();
	}

	function getPublishedBlogs(){
		return $this->db
			->where('published', 1)
			->order_by('id','desc')
	 		->get('posts')
			->result();
	}

	function getSlugBlog($slug){
		return $this->db
			->where('published', 1)
			->where('slug', $slug)
	 		->get('posts')
			->row();
	}

	function getArchive(){
		return $this->db
			->select('date')
			->select('count(*) as total')
			->order_by('date')
			->group_by('MONTH(date)')
			->group_by('YEAR(date)')
	 		->get('posts')
			->result();
	}

	function getChildArchive($month,$year){
		return $this->db
			->where('MONTH(date)',  $month)
			->where('YEAR(date)', $year)
	 		->get('posts')
			->result();
	}

	function getPages(){
		return $this->db
			->order_by('id','asc')
	 		->get('pages')
			->result();
	}

	function getFirstPage(){
		return $this->db
			->where('id', 3)
			->limit(1)
	 		->get('pages')
			->row();
	}

	function getPage($id){
		return $this->db
			->where('id', $id)
	 		->get('pages')
			->row();
	}

	function getHomeContent(){
		return $this->db
			->where('id', 1)
	 		->get('homepage')
			->row();	
	}

	function getHeroes(){
		return $this->db
			->where('published', 1)
	 		->get('heroes')
			->result();	
	}

	function insertComments($data){
		return $this->db
	 		->insert('comments',$data);
	}

	function getRatings(){
		return $this->db
			->select_avg('rating')
			->where('status', 1)
	 		->get('comments')
			->row();
	}

	function getProductReview($pid){
		return $this->db
			->where('prod_id', $pid)
			->where('status', 1)
	 		->get('comments')
			->result();	
	}

	function getUserRating($id){
		return $this->db
			->where('comment_id', $id)
			->where('status', 1)
	 		->get('comments')
			->row();
	}

	function insertInquiries($data){
		return $this->db
	 		->insert('inquiries',$data);
	}

	function updateAds($id,$table){
		$query = $this->db
					->where('id',$id)
					->get('ads')
					->row();			
		$to_update = array($table => $query->$table + 1);			

		$this->db
			->where('id',$id)
	 		->update('ads',$to_update);
	}

	function getAd($id){
		return $this->db
			->where('id', $id)
	 		->get('ads')
			->row();	
	}

	function getAds($data=''){
		$data = rtrim($data, ",");
		$data_array = explode(",", $data);
		$data_int_array = array_map('intval', $data_array);

		return $this->db
			->where('published', 1)
			->where_not_in('id', $data_int_array)
	 		->get('ads')
			->result();	
	}

	function getThumbnails($id){
		return $this->db
			->select('image')
			->where('pid', $id)
	 		->get('products_image')
			->result();
	}

	function getProductId($id){
		return $this->db
			->join('products', 'products.pid = products_variations.pid', 'left')
			->where('prod_var_id', $id)
	 		->get('products_variations')
			->row();
	}

	function getSingleProductId($id){
		return $this->db
			->where('pid', $id)
	 		->get('products')
			->row();
	}



	function addCart($data){

		$role = ($data['password'] == '' ? 0 : 1);

		$customer = array(
			'fname' => $data['fname'],
			'lname' => $data['lname'],
			'email' => $data['email'],
			'company' => $data['company'],
			'phone' => $data['phone'],
			'address1' => $data['address1'],
			'address2' => $data['address2'],
			'city' => $data['city'],
			'state' => $data['state'],
			'zipcode' => $data['zipcode'],
			'country' => 'Philippines',
			'role' => $role,
			'password' => sha1($data['password']),
			'date' => date('Y-m-d H:i:s')
		);

		$this->db->insert('customers',$customer);
		$customerLastId = $this->db->insert_id();

		$orders = array(
			'user_id' => $customerLastId,
			'sub_total' => $this->cart->total(),
			'vat' => 0,
			'total_price' => $this->cart->total() + 0,
			'payment_method' => 'Cash on Delivery',
			'shipping_method' => 'Flat Shipping Rate',
			'order_date' => date('Y-m-d H:i:s'),
			'order_status' => 'pending',
		);

		$this->db->insert('orders',$orders);
		$orderLastId = $this->db->insert_id();

		foreach ($this->cart->contents() as $product) {
			$cart = array(
				'pid' => $product['id'],
				'order_id' => $orderLastId,
				'item_price	' => $product['price'],
				'item_name' => $product['name'],
				'item_quantity' => $product['qty'],
				'item_total_price' => $product['subtotal'],
				'item_image' => $product['image'],
			);

			$this->db->insert('cart',$cart);
		}

		$address = array(
			'order_id' => $orderLastId,
			'ship_fname' => $data['ship_fname'],
			'ship_lname' => $data['ship_lname'],
			'ship_company' => $data['ship_company'],
			'ship_address1' => $data['ship_address1'],
			'ship_address2' => $data['ship_address2'],
			'ship_city' => $data['ship_city'],
			'ship_state' => $data['ship_state'],
			'ship_zipcode' => $data['ship_zipcode'],
			'ship_country' => 'Philippines',
		);

		$this->db->insert('address',$address);
	}

	function checkUser($email, $pass ){
		return $this->db
			->where('email', $email)
			->where('password', sha1($pass))
	 		->get('customers')
			->row();
	}

	function checkRegister($email){
		return $this->db
			->where('email', $email)
			->where('role', 1)
	 		->get('customers')
			->row();
	}

	function getUserId($id){
		return $this->db
			->where('user_id', $id)
	 		->get('customers')
			->row();
	}

	function insertRegister($data){
		$data['date'] = date('Y-m-d H:i:s');
		$data['role'] = 1;
		$data['password'] = sha1($data['password']);
		$data['country'] = 'Philippines';
		unset($data['cpassword']);
		$this->db
	 		->insert('customers',$data);

	 	return $this->db
			->where('email', $data['email'])
			->where('password', $data['password'])
	 		->get('customers')
			->row();


	}

}
?>
