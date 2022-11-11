<?php
  class User_model extends CI_Model {

    public function register($enc_password){
        
        $data = array(
            'first_name' => $this->input->post('firstName'),
            'middle_name' => $this->input->post('middleName'),
            'last_name' => $this->input->post('lastName'),
            'email' => $this->input->post('email'),
            'user_name' => $this->input->post('userName'),
            'password' => $enc_password
        );

         return $this->db->insert('users',$data);
    }

    // public function check_username_exists($user_name){
    //     $query = $this->db->get_where('users',array(
    //         'user_name' => $user_name
    //     ));

    //     if(empty($query->row_array())){
    //        return true;
    //     }
    //     else {
    //         return false;
    //     }
    // }

    // public function check_email_exists($email){
    //     $query = $this->db->get_where('users',array(
    //         'email' => $email
    //     ));

    //     if(empty($query->row_array())){
    //         return true;
    //      }
    //      else {
    //          return false;
    //      }
         
    // } 

    public function login($user_name , $password){
       $this->db->where('user_name',$user_name );
       $this->db->where('password' , $password);

       $result =$this->db->get('users');

       if($result->num_rows() == 1){
           return $result->row(0)->id;
       }

       else {
        return false;
       }
    }
  }