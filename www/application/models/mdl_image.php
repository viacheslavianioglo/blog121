<?php


if (!defined('BASEPATH')) exit('No direct script access allowed');

class mdl_image extends Crud {
	
	var $table = 'images';
	var $idkey = 'image_id';
	

    function add($params = array())
    {
        $this->load->helper('string');

        $config['upload_path'] = 'img';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->set_allowed_types('*');
        $upload_data = array();

        if (!$this->upload->do_upload('userfile')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors());
            return false;

        } else {

            $upload_data = $this->upload->data();
            $data = array();
            $data['image_id'] = $upload_data ['raw_name'];
            $data['filename'] = $upload_data ['file_name'];
            $data['originfilename'] = $upload_data ['orig_name'];

            foreach($params as $name => $value)
            {
                $data[$name] = $value;
            }
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }

    }


	function delete($params = array())
	{
       $data = $this->get ($params);
       if( parent::delete($params) === false )
       {
           return false;
       }
        $filename = $data['filename'];
        unlink("./img/".$filename);
        return true;
	}
	
	
}


?>