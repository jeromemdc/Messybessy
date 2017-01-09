<?php

if(!function_exists('all_categories')){
	function all_categories(){

		$CI =& get_instance();
		$cats = $CI->admin_model->get_val();
		$assoc = array();
		
		if($cats){
			foreach($cats as $cat){
				$parent = $CI->admin_model->get_database_id($cat->parent,'hda_menu','id');
				$categories = $cat->parent == 0 ? "" : $parent->title." > ";
	           	$assoc[] = $categories. '' .$cat->title;
			}
		}
		return $assoc;
	}
}

if (!function_exists('alias_checker')){    
    function alias_checker($alias_text, $table, $field = '', $id = 0){
        $CI =& get_instance();

		$alias_text = strtolower(url_title(convert_accented_characters($alias_text)));

		if($id){
			$q_result = $CI->db->where($field.' !=', $id)->where('slug', $alias_text)->get($table)->result();
		}else{
			$q_result = $CI->db->like('slug', $alias_text, 'after')->get($table)->result();
		}
		
		if($q_result){
			$slug_counter = intval(count($q_result)) + 1;
			$return_alias = $alias_text.'-'.$slug_counter;
			return $return_alias;
		}else{
			return $alias_text;
		}

    }
}

if(!function_exists('img_thumb')){
	function img_thumb($data,$num){
		$size = array('big','med','small');
		$path_info = pathinfo($data);
		return $path_info['filename'].'_'.$size[$num].'.'.$path_info['extension'];
	}
}	

if(!function_exists('meta')){
	function meta($table, $field = '', $id = 0){

		$CI =& get_instance();

		if($id){
			$q_result = $CI->db->where($field, $id)->get($table)->row();
		}else{
			$q_result = $CI->db->get($table)->row();
		}

		$meta = array(
			'title' => $q_result->meta_title,
			'description' => $q_result->meta_description,
			'keywords' => $q_result->meta_keywords,
		);

		return $meta;
	}
}

if(!function_exists('dropdown_categories')){
	function dropdown_categories(){
		$CI =& get_instance();
		$data = $CI->admin_model->get_parent_categories();
			$categories = array('' => 'Select Parent Category');
			foreach ($data as $value) {
				$categories[$value->cat_id] = $value->cat_name;
			}
			return $categories;	
	}
}

if(!function_exists('get_variation')){
	function get_variation($id){
		$CI =& get_instance();
		$variation = $CI->home_model->getVariation($id);

		if($variation->min_price != ''){
			$price = 'Php '.number_format($variation->min_price,2). ' - '.'Php '.number_format($variation->max_price,2);
		}else{
			$price = 'Php '.number_format($variation->price,2);
		}

		return $price;
	}
}

if(!function_exists('update_ads')){
	function update_ads($data){
		$CI =& get_instance();
		foreach ($data as $ads) {
			$CI->home_model->updateAds($ads->id,'view');
		}
	}
}
