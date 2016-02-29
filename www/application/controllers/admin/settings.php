<?php

/**
 *
 * Описание файла: 
 *
 * @изменён 11.9.2009
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends Base_CI_Controller {

    var $entity = 'set';
    var $dir = __DIR__;

	function __construct()
	{
		parent::__construct();
	  if ($this->user['role'] !== 'admin')
		{
			redirect("error/error_404");
		}
	}
	
	function edit () {

		if ($this->{$this->mdl}->edit()) {
			redirect ('account/lunit/');
			
		} else {
			$this->lib_view->show_view ('admin/', 'settings/edit', array(),'Settings');
			
		}
		
	}

	
}

?>