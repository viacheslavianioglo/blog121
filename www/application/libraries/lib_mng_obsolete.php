<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class lib_mng{

    //this is path starting from dir [controllers]
    var $path = "";

    function set_path($path)
    {
        $this->path = $path;
    }

    function add ($name, $title = '') {
        $this->reset_set();
        $CI = &get_instance ();
        $md = 'mdl_'.$name;
        $CI->load->model ($md); //Загрузка модели

        if ($CI->{$md}->add ()!==FALSE) {

            //Делаем редирект на список
            redirect ($this->path . $name.'s');

        }
        else {

            //Иначе показываем форму добавления
            $CI->lib_view->show_view($this->path, $name.'/add',array (), $title);

        }

    }


    function show ($name,$id,$title = '') {
        $this->reset_set();
        $CI = &get_instance ();
        $md = 'mdl_'.$name;
        $CI->load->model ($md);

        $data = $CI->{$md}->get ($id);

        if (empty ($data)) {
            die ('This record is not in the database');
        }

//        print_r ($data);
        $CI->lib_view->show_view($this->path, $name.'/view', $data, $title);

    }


    function edit ($name, $id, $title = '') {
        $this->reset_set();
        $CI = &get_instance ();
        $md = 'mdl_'.$name;
        $CI->load->model ($md); //Загрузка модели

        //Загружаем данные для этого объекта
        $data = $CI->$md->get ($id);

        if (empty ($data)) {
            die ('This record is not in the database');
        }

        if ($CI->{$md}->edit ($id)!==FALSE) {

            //Делаем редирект на список ссылок
            redirect ($this->path . $name.'s');

        }
        else {

            //Иначе показываем форму редактирования
            $CI->lib_view->show_view($this->path, $name.'/edit',$data, $title);

        }

    }


    function del ($name,$id) {
        $this->reset_set();
        $CI = &get_instance ();
        $md = 'mdl_'.$name;
        $CI->load->model ($md);

        $CI->{$md}->delete ($id);

        redirect ($this->path . $name.'s'); //Уходим к списку страниц

    }




    function show_index ($name, $title = '', $start_page = 0) {

        if ($start_page === 'list') {
            $this->reset_set();
            $start_page = 0;
        }

        if (!is_numeric ($start_page)) {
            $start_page = 0;
        }

        $CI = &get_instance ();
        $md = 'mdl_'.$name;
        $CI->load->model ($md);


        $CI->load->library ('pagination');

        $total = $CI->{$md}->getlist ();

        //Подготовка массива настроек
        $config = array ();
        $config['base_url'] = base_url (). $this->path .$name.'s/index/';
        $config['total_rows'] = count ($total);
        $config['per_page'] = $CI->config->item ('cms_per_page');
        $segment = count(explode("/", $this->path)) + 2;
        $config['uri_segment'] = $segment;

        //Устанавливаем настройки
        $CI->pagination->initialize ($config);

        unset ($total); //Освобождаем память от этой переменной

        $list = $CI->{$md}->getlist ($start_page);

        $data = array ();
        $data['list'] = $list; //Присваиваем список записей
        $data['page_links'] = $CI->pagination->create_links (); //Ссылки

//        print_r($CI->session->userdata);
//        return $data;
        $CI->lib_view->show_view($this->path , $name.'/index',$data, $title);

    }

    function set_filters ($filters) {

        $CI = &get_instance ();

        //Массив с данными для сессии
        $data = array ();
        $data['filters'] = $filters;

        $CI->session->set_userdata($data);
    }


    function set_sort ($name, $field) {

    $CI = &get_instance ();
//        $md = 'mdl_'.$name;
//        $CI->load->model ($md);

    //Массив с данными для сессии
    $data = array ();
    $data['sort_by'] = $field;
    $data['sort_dir'] = 'ASC';

    //Если в сессии текущая сортировка - меняем на обратную
    if ( ($CI->session->userdata ('sort_by') == $field) AND
        ($CI->session->userdata ('sort_dir') == 'ASC')) {
        $data['sort_dir'] = 'DESC';
    }

    //Записываем в сессию
    $CI->session->set_userdata($data);

    //Редирект к списку записей
    redirect ($this->path . $name.'s/');

    }


    function do_search ($name) {

        $CI = &get_instance ();

        $search = $CI->input->post ('str');
        $search_by = $CI->input->post ('field');

        //Если ничего не задали для поиска - просто редирект
        if (empty ($search)) {
            redirect ('admin/'.$name.'s/');
        }

        //Устаналиваем данные для сессии

        //Массив с данными для сессии
        $data = array ();
        $data['search'] = $search;
        $data['search_by'] = $search_by;

        //Записываем в сессию
        $CI->session->set_userdata($data);

        //Редирект к списку записей
        redirect ($this->path .$name.'s/');
    }


    function reset_set () {

        $CI = &get_instance ();

        $CI->session->unset_userdata('sort_by');
        $CI->session->unset_userdata('sort_dir');
        $CI->session->unset_userdata('search');
        $CI->session->unset_userdata('search_by');
        $CI->session->unset_userdata('filters');
    }


}
?>