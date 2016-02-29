<?php

/**
 *
 * Пример модели для "Ссылок" 
 *
 * @изменён 3.9.2009
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class mdl_page extends Crud {
	
	var $table = 'pages'; //Имя таблицы
	
	var $idkey = 'page_id';

    var $default_values = array(
        "add" => array (
            "showed" => "0"
        ),
        "edit" => array (
            "showed" => "0"
        )

    );

	
	var $add_rules = array (

			array (
				'field'	=> 'title',
				'label' => 'Title',
				'rules' => 'required|valid_title'
			
			),
			
			array (
				'field'	=> 'text',
				'label' => 'Text',
				'rules' => 'required|min_length[10]|max_length[10000]'
			
			),

			array (
				'field'	=> 'date',
				'label' => 'Date',
				'rules' => 'required|integer'
			),

        array (
				'field'	=> 'category_id',
				'label' => 'Category',
				'rules' => 'required'
			),

            array (
                'field'	=> 'showed'
            )
	
	);
	
	var $edit_rules = array (

        array (
            'field'	=> 'title',
            'label' => 'Title',
            'rules' => 'required|valid_title'

        ),

        array (
            'field'	=> 'text',
            'label' => 'Text',
            'rules' => 'required|min_length[10]|max_length[10000]'

        ),

        array (
            'field'	=> 'category_id',
            'label' => 'Category',
            'rules' => 'required'
        ),

        array (
            'field'	=> 'showed'
        )

	);

    function update_previews($page_id)
    {
        $res =  parent::get(array('page_id' => $page_id));
        $this->db->where('page_id', $page_id);
        $this->db->update($this->table, array('previews' => ($res['previews'] + 1)));

    }

    function get_statistic($params = array())
    {
        $this->db->select_sum('previews');
        $res =  parent::get($params);
        $data['previews'] = $res['previews'];

        $data['pages'] = parent::count_result($params);

        $this->db->select_max("previews");
        $res =  parent::get($params);
        $data['maxpreviews'] = $res['previews'];

        $params['previews'] = $data['maxpreviews'];
        $res = parent::get($params);

        $data['title'] = $res['title'];
        return $data;

    }

    function get_page_user_category($params = array())
    {

        $joins = array('users' => 'users.user_id = pages.user_id',
            'categories' => 'categories.category_id = pages.category_id');

        foreach($joins as $tname => $on)        {
            $this->db->join($tname, $on);
        }
        return parent::get($params);
    }

    function getlist_page_date_sorted($start_from = FALSE, $params = array(), $count = false)
    {
        $this->db->order_by("date","DESC");
        return parent::getlist($start_from, $params, $count);
    }

    function getlist_page_user_category($start_from = FALSE, $params = array(), $count = false)
    {
        $joins = array('users' => 'users.user_id = pages.user_id',
            'categories' => 'categories.category_id = pages.category_id');

        foreach($joins as $tname => $on)        {
            $this->db->join($tname, $on);
        }

//        var_dump($params);
        return parent::getlist($start_from, $params, $count);
    }


    function getlist_page_search_results($start_from = FALSE, $params = array(), $count = false)
    {
        parent::set_in_filters($params);
        return parent::getlist($start_from, array(), $count);
    }
	
	
}


?>