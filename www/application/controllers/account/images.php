<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends Base_CI_Controller {

    var $entity = 'image';
    var $dir = __DIR__;
    protected $needLogin = true;

    function __construct()
    {
        parent::__construct();
    }

    function index ($link_num = 0) {
        $params = array();
        $this->add_user_id($params);
        $this->_index("Images", $link_num, $params);
    }


    function add () {
        $params = array('user_id' => $this->user['user_id']);
        $this->_add('Add new image', $params);
    }

    function show ($id) {
        $params = array($this->{$this->mdl}->idkey => $id);
        $this->add_user_id($params);
        $this->_show('Preview image', $params );
    }

    function edit ($id) {
        $params = array($this->{$this->mdl}->idkey => $id);
        $this->add_user_id($params);
        $this->_edit('Edit image', $params );
    }

    function del ($id) {
        $params = array($this->{$this->mdl}->idkey => $id);
        $this->add_user_id($params);
        $this->_del($params);
    }

    function sort ($field) {
        $this->_set_sort($field);
        redirect("account/images/index");
    }

    function search () {
        $this->_do_search();
        redirect("account/images/index");
    }


    function mylist()
    {
        $total = $this->{$this->mdl}->getlist (false, array("user_id" => $this->user['user_id']));
        $output = '';
        $output .= '[';
        foreach($total as $img)
        {
            $filename = $img['filename'];
            $originfilename = $img['originfilename'];
            $output .= "{title: '$originfilename', value: '/img/$filename'}, ";
        }
        $output .= ']';
        echo $output;
    }


}
