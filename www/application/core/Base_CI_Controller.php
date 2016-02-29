<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Base_CI_Controller extends CI_Controller {

    //properties
    protected $entity;
    protected $mdl;
    protected $dir;
    protected $needLogin = false;
    protected $user;		// авторизованный пользователь || null


    function __construct()
    {
        parent::__construct();
        $this->before();
    }

    protected function before()
    {
        $this->mdl = 'mdl_'.$this->entity;
        $this->load->model($this->mdl);
        $this->_set_current_controller();
        $this-> _clearOldSessions();
        $this->user = $this->mdl_user->get_user();
        if($this->needLogin && $this->user === null)
        {
            redirect('account/lunit/login');
        }
    }

    protected function need_login()
    {
        if($this->user === null)
        {
            redirect('account/lunit/login');
        }
    }

    protected function getfolder()
    {
        $arr =  explode("controllers\\" , $this->dir);
        $folder = isset($arr[1]) ? $arr[1] .'/' : "";
        return $folder;
    }

    protected function getfullname()
    {
        $folder = $this->getfolder();
        $fullname = $folder . get_class($this);
        return $fullname;
    }


    function _set_current_controller()
    {
        if  ($this->getfullname() !== $this->session->userdata ('current_c')) {
            $this->session->set_userdata('current_c', $this->getfullname());
            $this->_reset_filters ();
        }

    }

    protected function add_user_id(&$params)
    {
        if ($this->user !== null && $this->user['role'] !== 'admin')
        {
            $params['user_id'] = $this->user['user_id'];
        }
    }

    function _add ($title = '', $params = array()) {
        $this->_reset_filters();
        if ($this->{$this->mdl}->add ($params)!==FALSE) {
            redirect ($this->getfolder() . strtolower(get_class($this)));
        }
        else {
            $this->lib_view->show_view($this->getfolder(), strtolower(get_class($this)).'/add',array (), $title);
        }
    }


    function _edit ( $title = '', $params) {
        $this->_reset_filters();
        $data = $this->{$this->mdl}->get ($params);

        if (empty ($data)) {
            redirect("error/error_db");
        }

        if ($this->{$this->mdl}->edit ($params)!==FALSE) {
            redirect ($this->getfolder() . strtolower(get_class($this)));
        }
        else {
            $this->lib_view->show_view($this->getfolder(), strtolower(get_class($this)).'/edit',$data, $title);
        }
    }


    function _del ($params) {
        $this->_reset_filters();
        if ($this->{$this->mdl}->delete ($params) === false)
        {
            redirect("error/error_db");
        }
        redirect ($this->getfolder() . strtolower(get_class($this)));

    }


    function _show ($title = '', $params, $method = 'get') {
        $this->_reset_filters();
        $data = $this->{$this->mdl}->{$method}($params);
        if (empty ($data)) {
            redirect("error/error_db");
        }
        $this->lib_view->show_view($this->getfolder(), strtolower(get_class($this)).'/view', $data, $title);
    }


    function _index ($title = '', $start_page = 0, $params = array(), $method = 'getlist') {
//        var_dump($params);

        if ($start_page === 'list') {
            $this->_reset_filters();
            $start_page = 0;
        }

        if (!is_numeric ($start_page)) {
            $start_page = 0;
        }

        $data = array ();
//        var_dump($this->{$this->mdl}->{$method}($start_page, $params, true));
//        var_dump($start_page);
//        var_dump($params);
        $data['page_links'] = $this-> get_pagination($this->{$this->mdl}->{$method}($start_page, $params, true));

        $list = $this->{$this->mdl}->{$method}($start_page, $params);
        $data['list'] = $list;

        $this->lib_view->show_view($this->getfolder() , strtolower(get_class($this)).'/index',$data, $title);
    }



    protected function get_pagination($count)
    {
        $this->load->library ('pagination');

        $config = array ();
        $config['base_url'] = $this->get_base_url_for_pagination() . strtolower(get_class($this)) . '/';

        $config['total_rows'] = $count;
        $config['per_page'] = $this->config->item ('cms_per_page');
        $segment = count(explode("/", $this->get_base_url_for_pagination())) - 2;
        $config['uri_segment'] = $segment;

        $this->pagination->initialize ($config);
        return  $this->pagination->create_links ();

    }

    protected function get_base_url_for_pagination()
    {
        $res = "";
        $arr = explode("/", $_SERVER['REQUEST_URI']);
        for ($i = 0; $i < count($arr); $i++)
        {
            if ($arr[$i] == "") continue;
            if ($arr[$i] == strtolower(get_class($this))) break;
            $res .= $arr[$i] . "/";
        }

        return base_url() . $res;
    }

    function _set_filters ($filters) {

        $data = array ();
        $data['filters'] = $filters;

        $this->session->set_userdata($data);
    }


    function _set_sort ( $field) {

        $data = array ();
        $data['sort_by'] = $field;
        $data['sort_dir'] = 'ASC';

        if ( ($this->session->userdata ('sort_by') == $field) AND
            ($this->session->userdata ('sort_dir') == 'ASC')) {
            $data['sort_dir'] = 'DESC';
        }

        $this->session->set_userdata($data);

    }


    function _do_search () {

        $search = $this->input->post ('str');
        $search_by = $this->input->post ('field');

        if (empty ($search)) {
            redirect ('admin/'.strtolower(get_class($this)));
        }

        $data = array ();
        $data['search'] = $search;
        $data['search_by'] = $search_by;

        $this->session->set_userdata($data);

    }


    function _reset_filters () {

        $this->session->unset_userdata('sort_by');
        $this->session->unset_userdata('sort_dir');
        $this->session->unset_userdata('search');
        $this->session->unset_userdata('search_by');
        $this->session->unset_userdata('filters');
    }

    public function _clearOldSessions()
    {
        $min = time() - 60 * 120; //120 min
        $this->db->where("timestamp < ", $min);
        $this->db->delete('sessions');
    }




}
