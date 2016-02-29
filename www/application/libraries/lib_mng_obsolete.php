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
        $CI->load->model ($md); //�������� ������

        if ($CI->{$md}->add ()!==FALSE) {

            //������ �������� �� ������
            redirect ($this->path . $name.'s');

        }
        else {

            //����� ���������� ����� ����������
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
        $CI->load->model ($md); //�������� ������

        //��������� ������ ��� ����� �������
        $data = $CI->$md->get ($id);

        if (empty ($data)) {
            die ('This record is not in the database');
        }

        if ($CI->{$md}->edit ($id)!==FALSE) {

            //������ �������� �� ������ ������
            redirect ($this->path . $name.'s');

        }
        else {

            //����� ���������� ����� ��������������
            $CI->lib_view->show_view($this->path, $name.'/edit',$data, $title);

        }

    }


    function del ($name,$id) {
        $this->reset_set();
        $CI = &get_instance ();
        $md = 'mdl_'.$name;
        $CI->load->model ($md);

        $CI->{$md}->delete ($id);

        redirect ($this->path . $name.'s'); //������ � ������ �������

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

        //���������� ������� ��������
        $config = array ();
        $config['base_url'] = base_url (). $this->path .$name.'s/index/';
        $config['total_rows'] = count ($total);
        $config['per_page'] = $CI->config->item ('cms_per_page');
        $segment = count(explode("/", $this->path)) + 2;
        $config['uri_segment'] = $segment;

        //������������� ���������
        $CI->pagination->initialize ($config);

        unset ($total); //����������� ������ �� ���� ����������

        $list = $CI->{$md}->getlist ($start_page);

        $data = array ();
        $data['list'] = $list; //����������� ������ �������
        $data['page_links'] = $CI->pagination->create_links (); //������

//        print_r($CI->session->userdata);
//        return $data;
        $CI->lib_view->show_view($this->path , $name.'/index',$data, $title);

    }

    function set_filters ($filters) {

        $CI = &get_instance ();

        //������ � ������� ��� ������
        $data = array ();
        $data['filters'] = $filters;

        $CI->session->set_userdata($data);
    }


    function set_sort ($name, $field) {

    $CI = &get_instance ();
//        $md = 'mdl_'.$name;
//        $CI->load->model ($md);

    //������ � ������� ��� ������
    $data = array ();
    $data['sort_by'] = $field;
    $data['sort_dir'] = 'ASC';

    //���� � ������ ������� ���������� - ������ �� ��������
    if ( ($CI->session->userdata ('sort_by') == $field) AND
        ($CI->session->userdata ('sort_dir') == 'ASC')) {
        $data['sort_dir'] = 'DESC';
    }

    //���������� � ������
    $CI->session->set_userdata($data);

    //�������� � ������ �������
    redirect ($this->path . $name.'s/');

    }


    function do_search ($name) {

        $CI = &get_instance ();

        $search = $CI->input->post ('str');
        $search_by = $CI->input->post ('field');

        //���� ������ �� ������ ��� ������ - ������ ��������
        if (empty ($search)) {
            redirect ('admin/'.$name.'s/');
        }

        //������������ ������ ��� ������

        //������ � ������� ��� ������
        $data = array ();
        $data['search'] = $search;
        $data['search_by'] = $search_by;

        //���������� � ������
        $CI->session->set_userdata($data);

        //�������� � ������ �������
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