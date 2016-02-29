<?php



if (!defined('BASEPATH')) exit('No direct script access allowed');

class mdl_comment extends Crud {
	
	var $table = 'comments';
	
	var $idkey = 'comment_id';

	
	var $add_rules = array (

			
			array (
				'field'	=> 'text',
				'label' => 'Text',
				'rules' => 'required|min_length[10]|max_length[1000]'
			
			),

			array (
				'field'	=> 'date',
				'label' => 'Date',
				'rules' => 'required|integer'
			),

        array (
				'field'	=> 'page_id',
				'label' => 'Page',
				'rules' => 'required'
			)
	
	);

	function getlist_comment_user($start_from = FALSE, $params = array())
	{
        $joins = array('users' => 'users.user_id = comments.user_id');

		foreach($joins as $tname => $on)        {
			$this->db->join($tname, $on);
		}
        $this->db->order_by("date", "DESC");

		return parent::getlist($start_from, $params);
	}
	
	
}


?>