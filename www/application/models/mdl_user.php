<?php



if (!defined('BASEPATH')) exit('No direct script access allowed');

class mdl_user extends Crud {
	
	var $table = 'users';
	public $idkey = 'user_id';
    private $uid;
	
	var $add_rules  = array (

		array (
			'field' => 'login',
			'label' => 'Login',
			'rules' => 'required|az_numeric|uniq[users.login]',
		),

		array (
			'field' => 'pass',
			'label' => 'Password',
			'rules'	=> 'required|max_length[40]'
		),

		array (
			'field' => 'repeat_pass',
			'label' => 'Repeat Password',
			'rules'	=> 'required|matches[pass]',
            'dbfield' => 'false'
		),


	);

    var $login_rules  = array (

        array (
            'field' => 'login',
            'label' => 'Login',
            'rules' => 'required|az_numeric|is_banned[users.login]',
        ),

        array (
            'field' => 'pass',
            'label' => 'Password',
            'rules'	=> 'required|max_length[40]'
        ),
    );
	

	var $edit_rules = array (

        array (
            'field' => 'pass',
            'label' => 'Password',
            'rules'	=> 'required|max_length[40]'
        ),


        array (
            'field' => 'repeat_pass',
            'label' => 'Repeat Password',
            'rules'	=> 'required|matches[pass]',
            'dbfield' => 'false'
        ),


        array (
            'field' => 'avatar',
            'label' => 'Avatar',
            'rules'	=> 'required|max_length[1000]'
        )
	
	);

    var $edit_table_rules = array (

        array (
            'field' => 'banned',
            'label' => 'Banned',
            'rules'	=> 'required'
        )

    );


    function login () {

        $this->load->helper('security');

        $data = $this->input->post();

        $this->form_validation->set_rules($this->login_rules);
        if ($this->form_validation->run())
        {
            $login = $data['login'];
            $pass = $data['pass'];

            $user = $this->get_by_login($login);

            if ($user == null)
                return false;

            if ($user['pass'] !== ($pass))
                return false;

            $this->open_user_session($login, $pass);

            return true;
        }
    }


    function register () {


        if (parent::add())
        {
            $data = $this->input->post();
            $login = $data['login'];
            $pass = $data['pass'];

            $this->open_user_session($login, $pass);
            return true;
        }
        else
            return false;
    }




    function logout () {
        $uid = null;
        $sid =  $this->session->userdata('sid');
        $this->session->unset_userdata("sid");
        $this->session->unset_userdata($sid);
    }


    public function get_user($id_user = null)
    {
        if ($id_user == null)
            $id_user = $this->get_uid();

        if ($id_user == null)
            return null;

        return parent::get(array('user_id' =>  $id_user));
    }


    public function get_uid()
    {
        if ($this->uid != null)
            return $this->uid;

        $sid = $this->get_sid();

        if ($sid == null)
            return null;

        $this->uid =  $this->session->userdata($sid);
        return $this->uid;
    }

    private function get_sid()
    {
        $sid =  $this->session->userdata('sid');
        return $sid;
    }


    private function open_user_session($login, $pass)
    {
        $sid = $this->the_hash($login, $pass);

        $user = $this->get_by_login($login);

        $ses['sid'] = $sid;
        $ses[$sid] = $user['user_id'];
        $this->session->set_userdata($ses);

        return $sid;
    }


    public function get_by_login($login)
    {
        $this->db->where('login', $login);
        $query = $this->db->get($this->table);
        return $query->row_array ();
    }

    function the_hash ($str1, $str2) {
        $hash = md5 ($str1.$str2.$_SERVER['REMOTE_ADDR'].'CICMS');
        return $hash;
    }


    function update_user_from_admin_table($params)
    {
        $edit_vals = array ('banned');
        $data = $this->input->post();

        $data_f = array();
        foreach($edit_vals as $val)  {
            if ( isset ($data[$val])) {
                $data_f[$val] = $data[$val];
            }
        }
        $this->db->where($params);
        $this->db->update($this->table, $data_f);
        return true;

    }


	
	
}


?>