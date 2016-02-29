<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Base_CI_Controller {

    var $entity = 'user';
    var $dir = __DIR__;
    protected $needLogin = true;


    function __construct()
    {
        parent::__construct();
        if ($this->user['role'] !== 'admin')
        {
            redirect("error/error_404");
        }
    }

    function index ($link_num = 0) {

        $this->_index("Users", $link_num);
    }


    function edit () {
        $user_id = ($this->input->post("user_id"));
        $params = array("user_id" => $user_id);
        $this->mdl_user->update_user_from_admin_table($params);
        redirect("admin/users/index");
    }

    function sort ($field) {
        $this->_set_sort($field);
        redirect("admin/users/index");

    }

    function search () {
        $this->_do_search();
        redirect("admin/users/index");
    }


}
