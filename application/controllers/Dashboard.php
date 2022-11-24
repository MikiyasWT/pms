<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct(); // you have missed this line.
    $this->load->library('session');
    $this->load->model('UserManagment_model');
    if (!($this->session->userdata('logged_in'))) {
      redirect('auth/login');
    }
  }

  public function index()
  {
    $this->load->view('dashboard');
  }
  public function roles()
  {
    $data['roles'] = $this->UserManagment_model->get_roles();
    $this->load->view('roles',$data);
  }
}
