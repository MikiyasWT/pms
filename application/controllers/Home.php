<?php

class Home extends CI_Controller{

    public function __construct()
     {
       parent::__construct();// you have missed this line.
       $this->load->library('session');

       if(!($this->session->userdata('logged_in'))) 
       { 
           redirect('auth/login');
       
       }
     } 

    public function index()
    {
        
       
        $this->load->view('users/home');
    }


    // function __construct()
    // {
    //     $this->load->library('session');
    //    //$this->session->userdata('user_data') == null
        
    //     if(FALSE === $this->session->userdata('logged_in')) 
    //     { 
    //         redirect('login');
        
    //     }
    // }
}


