<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class lib_view{

    public function show_view($path, $view,  $data = array(), $title)
    {
        $CI = &get_instance();
        $data['pagetitle'] = $title;
        $content = $CI->load->view($path . $view, $data, true);
        $CI->load->view("main", array('content' => $content));
    }
}
?>