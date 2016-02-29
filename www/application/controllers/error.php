<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {


    function error_404 () {
        $this->lib_view->show_view("errors/", "html/error_404", array() , "404");
    }


    function error_db () {
        $this->lib_view->show_view("errors/", "html/error_db", array() , "404");
    }

    function test () {
        var_dump($_SERVER);
    }






}
