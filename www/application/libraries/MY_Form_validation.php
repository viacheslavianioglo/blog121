<?php


if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_Validation extends CI_Form_Validation {


    function __construct() {
        parent::__construct();

        $CI = &get_instance ();
        $CI->lang->load ('validation_new');

    }


    function az_numeric($str) {
        return ( ! preg_match("/^([a-z0-9])+$/i", $str)) ? FALSE : TRUE;
    }


    function valid_url ($str) {
        return (!preg_match('/^(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:;.?+=&%@!\-\/]))?$/',$str)) ? FALSE : TRUE;
    }


    function valid_title ($str)
    {
        return (!preg_match ('/^[Р-пр-џЈИ\w\d\s\.\,\+\-\_\!\?\#\%\@\Й\/\(\)\[\]\:\&\$\*]{1,250}$/'
            ,$str)) ? FALSE : TRUE;
    }


    function uniq ($str, $field) {
        $CI = & get_instance ();
        $field_ar = explode('.', $field);
        $tname = $field_ar[0];
        $fname = $field_ar[1];

        $CI->db->where ($fname,$str);
        return ($CI->db->count_all_results($tname)==0);
    }

    function is_banned ($str, $field) {
        $CI = & get_instance ();
        $field_ar = explode('.', $field);
        $tname = $field_ar[0];
        $fname = $field_ar[1];

        $CI->db->where ($fname,$str);
        $CI->db->where ("banned",'1');

        return ($CI->db->count_all_results($tname)==0);
    }

}
