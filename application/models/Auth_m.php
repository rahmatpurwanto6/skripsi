<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{

    public function login($user)
    {
        $this->db->select('*, tbrole.role');
        $this->db->from('tbuser');
        $this->db->where('username', $user);
        $this->db->join('tbrole', 'tbrole.role_id = tbuser.role_id');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function savedata($data)
    {
        $this->db->insert('tbuser', $data);
        // $this->db->insert('tbmhs', $data2);
    }
}

/* End of file Auth_m.php */