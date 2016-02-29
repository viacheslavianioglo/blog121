<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function show_menu()
{
    $CI = &get_instance ();
    $user = $CI->mdl_user->get_user();
    $menu = array();
    if (!$user)
    {
        $menu =  array("account" => "Account");
    }
    else
    {
        $menu = array("account/lunit/index" => "Statistic",
                "account/pages/index/list" => "My pages",
                "account/images/index/list" => "My images",
                "account/lunit/settings" => "My settings",
                "account/logout" => "Logout"
            );

        if (($user['role'] === 'admin'))
        {
            $menu = array("account/lunit/index" => "Statistic",
                    "account/pages/index/list" => "All pages",
                    "account/images/index/list" => "All images",
                    "admin/categories/index/list" => "Categories",
                    "admin/settings/edit" => "App Settings",
                    "admin/users" => "Users",
                    "account/lunit/settings" => "My settings",
                    "account/logout" => "Logout",
                );
        }
    }

    $res = "";

    foreach($menu as $address => $text)
    {
        $res .= "<li>" . anchor($address, $text). "</li>";
    }

    return $res;
}

