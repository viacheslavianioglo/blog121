<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function show_select_avatar_list($user_id = null)
{
    $CI = &get_instance ();
    $CI->load->model('mdl_image');
    $params = array();
    if ($user_id){
        $params = array('user_id' => $user_id);
    }
    $data['list'] = $CI->mdl_image->getlist(false, $params);
    return $CI->load->view("partials/select_avatar_list", $data, true);
}
