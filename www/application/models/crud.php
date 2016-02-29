<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model
{
    var $table = '';
    var $idkey = '';
    var $add_rules = array();
    var $edit_rules = array();
    var $default_values = array();

    function get_post_data($vname){
        $data = $this->input->post();

        if (! array_key_exists($vname, $this->default_values))
            return $data;

//        print_r($this->default_values[$vname]);

        foreach($this->default_values[$vname] as $key => $value){
            if (! array_key_exists($key, $data))
                $data[$key] = $value;
        }

        return $data;
    }

    function add($params = array())
    {

        $data = $this->get_post_data("add");

        $this->form_validation->set_rules($this->add_rules);
        if ($this->form_validation->run())
        {
            $data_f = array();
            foreach($this->add_rules as $rule)
            {
                $f = $rule['field'];
                if (!isset($rule['dbfield']) && isset ($data[$f]))
                {
                     $data_f[$f] = $data[$f];
                }
            }

            foreach($params as $name => $value){
                $data_f[$name] = $value;
            }

            $this->db->insert($this->table, $data_f);
            return $this->db->insert_id();
        }
        else
            return false;

    }

    function edit($params = array())
    {
        $data = $this->get_post_data("edit");
        $this->form_validation->set_rules($this->edit_rules);
        if ($this->form_validation->run())
        {
            $data_f = array();
            foreach($this->edit_rules as $rule)
            {
                $f = $rule['field'];
                if (!isset($rule['dbfield']) && isset ($data[$f]))
                {
                    $data_f[$f] = $data[$f];
                }
            }

            if (! empty($params)) {
                $this->db->where($params);
            }

            if (0 === $this->db->count_all_results($this->table))  return false;

            if (! empty($params)) {
                $this->db->where($params);
            }
            $this->db->update($this->table, $data_f);
            return true;
        }
        else
            return false;


    }

    function delete($params = array())
    {
        if (! empty($params)) {
            $this->db->where($params);
        }
        if (0 === $this->db->count_all_results($this->table))  return false;

        if (! empty($params)) {
            $this->db->where($params);
        }
        $this->db->delete($this->table);
        return true;
    }

    function get($where = array())
    {
        if (! empty($where)) {
            $this->db->where($where);
        }

        $query = $this->db->get($this->table);
        return $query->row_array ();

    }



    function getlist ($start_from = FALSE, $where = array(), $count = false)
    {
        //Ordering
        $sort_by = $this->session->userdata ('sort_by');
        $sort_dir = $this->session->userdata ('sort_dir');
        if (!empty ($sort_by)) {
            $this->db->order_by($sort_by,$sort_dir);
        }

        //Search like
        $search = $this->session->userdata ('search');
        $search_by = $this->session->userdata ('search_by');
        if (!empty ($search)) {
            $this->db->like($search_by,$search);
        }

        if (! empty($where)) {
            $this->db->where($where);
        }

        if ($count){
            return $this->db->count_all_results($this->table);
        }

        //Limit
        if ($start_from !== FALSE) {
            $this->db->limit($this->config->item ('cms_per_page'), $start_from);
        }

        $query = $this->db->get ($this->table);
        return $query->result_array ();


    }

    function count_result($where = array())
    {
       return $this->getlist(FALSE, $where, true);
    }


    function get_fulltext_search_result($match, $text, $selects)
    {
        $select = "(".  implode($selects, ",") .")";
        $sql = "SELECT $select FROM ci_" . $this->table . " WHERE MATCH ($match) AGAINST ('" . $text . "' IN BOOLEAN MODE)";
        $query = $this->db->query($sql);
        return $query->result_array ();
    }

    function set_in_filters($params = array())
    {
        foreach($params as $key => $values){
            $this->db->where_in($key, $values);
        }
    }

}





?>