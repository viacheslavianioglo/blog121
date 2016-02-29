<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Base_CI_Controller {

    var $entity = 'page';
    var $dir = __DIR__;
    protected $needLogin = true;


    function __construct()
    {
        parent::__construct();
    }

    function index ($link_num = 0) {
        $params = array();
        if ($this->user['role'] !== 'admin')
            $params['pages.user_id'] = $this->user['user_id'];

        $this->_index("Articles", $link_num, $params, "getlist_page_user_category");
    }


    function add () {
        $this->load->helper('categories');
        $this->load->helper('tinymce');
        $params = array('user_id' => $this->user['user_id']);
        $this->_add( 'Add new page', $params);
    }

    function show ($id) {
        $params = array($this->{$this->mdl}->idkey => $id);
        $this->add_user_id($params);
        $this->_show('Preview page', $params );
    }

    function edit ($id) {
        $this->load->helper('tinymce');
        $this->load->helper('categories');
        $params = array($this->{$this->mdl}->idkey => $id);
        $this->add_user_id($params);
        $this->_edit('Edit page', $params );
    }

    function del ($id) {
        $params = array($this->{$this->mdl}->idkey => $id);
        $this->add_user_id($params);
        $this->_del($params);
    }

    function sort ($field) {
        $this->_set_sort($field);
        redirect("account/pages/index");

    }

    function search () {
        $this->_do_search();
        redirect("account/pages/index");
    }


}
