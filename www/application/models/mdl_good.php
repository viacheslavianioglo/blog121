<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mdl_good extends CI_Model
{
    var $table = 'goods';
    var $idkey = 'good_id';
    var $add_rules = array
    (
        array
        (
        "field" => "title",
        "label" => "<b>Title</b>",
        "rules" => "required|min_length[10]"
        )  ,

        array
        (
        "field" => "price",
        "label" => "<b>Price</b>",
        "rules" => "required|numeric"
        ) ,

        array
        (
        "field" => "kind",
        "label" => "<b>Kind</b>",
        "rules" => "required"
        ),

        array
        (
        "field" => "dlink",
        "label" => "<b>Dlink</b>",
        "rules" => "required|min_length[5]"
        ),

        array
        (
            "field" => "shipping"
        )

    );



    function add($data)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->add_rules);
        if ($this->form_validation->run())
        {
            $data_f = array();
            foreach($this->add_rules as $rule)
            {
                $f = $rule['field'];
                if (isset ($data[$f]))
                {
                     $data_f[$f] = $data[$f];
                }
            }

            array_walk($data_f, function(&$item, $key){
                if ($item == "on") $item = 1;
            });

//            echo "<pre>";
//            print_r($data_f);
//            echo "</pre>";
            $this->db->insert($this->table, $data_f);
            return $this->db->insert_id();
        }
        else
            return false;

    }

    function edit($id, $data)
    {
        $this->db->where($this->idkey, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where($this->idkey, $id);
        $this->db->delete($this->table);
    }

    function get($id)
    {
        $this->db->where($this->idkey, $id);
        $query = $this->db->get($this->table);
        return $query;
    }

    function getlist()
    {
        $query = $this->db->get($this->table);
        return $query;
    }
}





?>