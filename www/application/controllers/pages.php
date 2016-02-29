<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Base_CI_Controller {

    var $entity = 'page';
    var $dir = __DIR__;

    function __construct()
    {
        parent::__construct();

    }

    function index ($link_num = 0, $paramname = null, $paramvalue = null) {
        $this->load->helper('categories');
        $params = array('showed' => 1);

        if ($paramname !== null){
            $params[$paramname] = $paramvalue;
        }

        if ($paramname === 'search'){
            $this->search($link_num);
            return;
        }

        $this->_index("Articles", $link_num, $params, 'getlist_page_date_sorted');
    }

    function show ($id) {
        $this->load->helper('comments');
        $params = array($this->{$this->mdl}->idkey => $id);
        $this->_show('Preview page', $params, 'get_page_user_category');
        $this->{$this->mdl}->update_previews($id);
    }

    function search($link_num = 0)
    {
        $str =  $this->session->userdata ('searchpage');
        $this->load->helper('categories');
        $res = $this->mdl_page->get_fulltext_search_result('text', $str, array('page_id'));

        foreach($res as $one){
            $params['page_id'][] = $one['page_id'];
        }

        if (!isset($params))
            $params['page_id'][] = 100000;

        $this->_index("Search results", $link_num, $params, 'getlist_page_search_results');
    }


    function searchpage()
    {
        $this->session->unset_userdata('searchpage');
        $search = $this->input->post ('searchstr');

        if (empty ($search)) {
            redirect ('/pages');
        }
        $this->session->set_userdata(array("searchpage" => $search));
        redirect ('/search/pages');

    }

}
