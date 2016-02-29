<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function show_categories_as_list()
{
    $CI = &get_instance ();
    $CI->load->model('mdl_category');
    $total = $CI->mdl_category->getlist();
    $data['list'] = $total;
    return $CI->load->view("partials/categories_list", $data, true);

}

function show_categories_as_dropdown($cat_id = null)
{
    $CI = &get_instance ();
    $CI->load->model('mdl_category');
    $total = $CI->mdl_category->getlist();
    $all =  array();

    if ($cat_id)
        $selected = $cat_id;
    else
        $selected =  $selected = $total[0]['category_id'];

    foreach($total as $one)
    {
         $all[$one['category_id']] = $one['name'];
    }

//    var_dump($selected);
//    var_dump($all);

    return form_dropdown('category_id', $all, $selected, "class='form-control'" );
}
