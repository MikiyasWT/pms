<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function register($enc_password)
    {
        $data = array(
            'full_name' => $this->input->post('fullName'),
            'user_name' => $this->input->post('userName'),
            'email' => $this->input->post('email'),
            'role' => 1,
            'password' => $enc_password
        );

        return $this->db->insert('users', $data);
    }

    public function check_username_exists($user_name)
    {
        $query = $this->db->get_where('users', array(
            'user_name' => $user_name
        ));

        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    public function check_email_exists($email)
    {
        $query = $this->db->get_where('users', array(
            'email' => $email
        ));

        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $dec_password)
    {
        $this->db->select('users.id, role_type, full_name, phone_num, gender, dob, email, role, register_date, user_status,role_status');
        $this->db->from('users');
        $this->db->join('roles', 'roles.id = users.role');
        $this->db->where('email', $email);
        $this->db->where('password', $dec_password);

        $result = $this->db->get();

        if ($result->num_rows() == 1) {
            // $result->row(0)->password ='';
            // var_dump($result->row(0));
            // exit;
            return $result->row(0);
        } else {
            return false;
        }
    }
}
