<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    // public function getUser($username, $pass)
    // {
    //     $res = $this->db->get_where(
    //         'user',
    //         array('user_name' => $username, 'user_password' => $pass),
    //         1
    //     );
    //     return $res->result();
    // }

    // public function getOpd($username)
    // {
    //     $this->db->select('user_opd');
    //     $res = $this->db->get_where(
    //         'user',
    //         array('user_name' => $username),
    //         1
    //     );
    //     return $res->result();
    // }

    public function gets()
    {
        return $this->db->get('user')->result();
    }

    public function get_login($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('user', $data);
    }

    public function last_login($id)
    {
        return $this->db->update('user', ['last_login' => date('Y-m-d H:i:s', now())], ['id' => $id]);
    }

    public function reset_password($id)
    {
        return $this->db->update('user', password_hash('00000', PASSWORD_BCRYPT), ['id' => $id]);
    }
}
