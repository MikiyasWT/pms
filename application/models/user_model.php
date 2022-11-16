<?php
  class User_model extends CI_Model {

    public function register($enc_password){
        
        $data = array(
            'full_name' => $this->input->post('fullName'),
            'user_name' => $this->input->post('userName'),
            'email' => $this->input->post('email'),
            'role' => 1,
            'password' => $enc_password
        );

         return $this->db->insert('users',$data);
    }

    public function check_username_exists($user_name){
        $query = $this->db->get_where('users',array(
            'user_name' => $user_name
        ));

        if(empty($query->row_array())){
           return true;
        }
        else {
            return false;
        }
    }

    public function check_email_exists($email){
        $query = $this->db->get_where('users',array(
            'email' => $email
        ));

        if(empty($query->row_array())){
            return true;
         }
         else {
             return false;
         }
         
    } 

    public function login($email , $dec_password){
       $this->db->where('email',$email );
       $this->db->where('password' , $dec_password);

       $result =$this->db->get('users');

       if($result->num_rows() == 1){
           return $result->row(0)->id;
       }

       else {
        return false;
       }
    }
  }