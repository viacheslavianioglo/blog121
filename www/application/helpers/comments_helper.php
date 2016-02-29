<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function show_add_comment_form()
{
    $CI = &get_instance ();
    $user = $CI->mdl_user->get_user();
    if ($user)
    {
        return $CI->load->view("partials/comments_form", array(), true);
    }

}


function show_all_comments($page_id)
{
    $CI = &get_instance ();
    $CI->load->model('mdl_comment');

    $params = array('page_id' => $page_id);
    $total = $CI->mdl_comment->getlist_comment_user(false, $params);
    $data['list'] = $total;
    return $CI->load->view("partials/comments_list", $data, true);

}