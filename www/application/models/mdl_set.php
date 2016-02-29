<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.01.2016
 * Time: 14:46
 */
class mdl_set extends CI_Model
{
    var $table = 'settings';

    function __construct()
    {
        parent::__construct();
        $this->load_config();
    }

    var $edit_rules =  array (

			array (
				'field' => 'cms_per_page',
				'label' => 'Item per page',
				'rules' => 'required|numeric',
			),

		);



    function load_config()
    {
        $query = $this->db->get($this->table);
        $res = $query->result_array();

        foreach($res as $row)
        {
            $value = $row['value'];
            if (is_numeric($value)) $value = $value + 0;
            $this->config->set_item($row['param'], $value);
        }

    }


    function  edit($params = array())
    {
        $this->form_validation->set_rules($this->edit_rules);
        $data = $this->input->post ();

        if ($this->form_validation->run ()) {
            foreach ($data as $key => $one) {
                $this->db->where('param', $key);
                $this->db->update($this->table, array('value' => $one));
            }
            return true;
        }

        return false;
    }
}