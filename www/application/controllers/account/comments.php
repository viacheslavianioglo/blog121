<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends Base_CI_Controller {

    var $entity = 'comment';
    var $dir = __DIR__;
    protected $needLogin = true;

    function __construct()
    {
        parent::__construct();
    }

    function add () {
        $page_id = $this->input->post("page_id");
        $params = array('user_id' => $this->user['user_id']);
        if (!$this->{$this->mdl}->add ($params)){
            $this->session->set_flashdata('comment_error', validation_errors());
        }
        redirect('pages/show/'.$page_id, 'refresh');
    }




}
