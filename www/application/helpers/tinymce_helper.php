<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function show_tinymce()
{
    $CI = &get_instance ();
    return $CI->load->view("partials/tinymce", array (), true);

}

