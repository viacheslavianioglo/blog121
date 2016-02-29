<?php



if (!defined('BASEPATH')) exit('No direct script access allowed');

class mdl_category extends Crud {
	
	var $table = 'categories';
	
	var $idkey = 'category_id';
	
	var $add_rules = array (
			
			array (
			'field'	=> 'name',
			'label' => 'Category name',
			'rules' => 'required|alpha_numeric|uniq[categories.name]'

		),

		array (
			'field'	=> 'desc',
			'label' => 'Description',
			'rules' => 'required|max_length[50]'

		),

	);
	
	var $edit_rules = array (

		array (
			'field'	=> 'name',
			'label' => 'Category name',
			'rules' => 'required|alpha_numeric'

		),

		array (
			'field'	=> 'desc',
			'label' => 'Description',
			'rules' => 'required|max_length[50]'

		),

	);
	
	
	
}


?>