<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lunit extends Base_CI_Controller {

    var $entity = 'user';
    var $dir = __DIR__;
    protected $needLogin = false;

    public function login()
    {
        $this->mdl_user->logout();
        if ( $this->mdl_user->login())
        {
            redirect ('account');

        }
        else
        {
            $this->lib_view->show_view('account/', 'lunit/login', array(), "Login");
        }


    }

    public function register()
    {
        $this->mdl_user->logout();

        if ( $this->mdl_user->register())
        {
            redirect ('account');
        }
        else
        {
            $this->lib_view->show_view('account/', 'lunit/register', array(), "Registration");
        }
    }

    public function logout()
    {
        $this->mdl_user->logout();
        redirect ('account/login');
    }


	public function index()
    {

        $this->need_login();

        $params = array();
        $my = "";
        if ($this->user !== null && $this->user['role'] !== 'admin')
        {
            $params['user_id'] = $this->user['user_id'];
            $my = "my ";
        }

        $this->load->model('mdl_page');
        $data = $this->mdl_page->get_statistic($params);
        $data["my"] = $my;
        $this->lib_view->show_view('account/', 'lunit/index', $data, "Statistics");

    }

    public function settings()
    {
        $this->need_login();

        $this->load->helper('images');
        $params = array('user_id' => $this->user['user_id']);
        $this->_edit('Edit user', $params );
    }



}
