<?php

/**
 *
 * Описание файла: Библиотека авторизации 
 *
 * @изменён 10.9.2009
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');


class lib_mdl {

	function get_categories () {
		$CI = &get_instance ();
        $CI->load->model('mdl_category');

        $total = $this->mdl_category->getlist();
        return $total;
    }
	

	
}


?>