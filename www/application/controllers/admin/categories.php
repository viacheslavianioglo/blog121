<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends Base_CI_Controller {

    var $entity = 'category';
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
        $this->_index("Categories", $link_num);
    }


    function add () {
        $this->_add('Add new category');
    }

    function show ($id) {
        $params = array($this->{$this->mdl}->idkey => $id);
        $this->_show('Preview category', $params );
    }

    function edit ($id) {
        $params = array($this->{$this->mdl}->idkey => $id);
        $this->_edit('Edit category', $params );
    }

    function del ($id) {
        $params = array($this->{$this->mdl}->idkey => $id);
        $this->_del($params);
    }

    function sort ($field) {
        $this->_set_sort($field);
        redirect("admin/categories/index");

    }

    function search () {
        $this->_do_search();
        redirect("admin/categories/index");
    }



}
