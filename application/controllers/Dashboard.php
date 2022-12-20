<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct(); // you have missed this line.
    $this->load->library('session');
    if (!($this->session->userdata('logged_in'))) {
      redirect('auth/login');
    }
    $this->load->model('UserManagment_model');
    $this->load->model('Master_client_model');
  }

  public function index()
  {
    $this->load->view('dashboard');
  }
  public function roles()
  {
    $data['roles'] = $this->UserManagment_model->get_roles();
    $this->load->view('User_management/roles', $data);
    // ($data['roles'] == false) ?  : $this->load->view('errors/pages404');
  }
  public function users()
  {
    // $data['users'] = $this->UserManagment_model->get_users();
    // echo json_encode($data['users']);
    // $this->load->view('users',$data);
    $this->load->view('User_management/users');
  }
  public function clients()
  {
    $this->load->view('clients/view');
  }
  public function client_create()
  {
    $this->load->view('clients/create');
  }
  public function client_detail($id)
  {
    $data['mc'] = $this->Master_client_model->get_client($id);
    ($data['mc'] === false) ? $this->load->view('errors/pages404') : $this->load->view('clients/detail', $data);
    // echo '<pre>';
    // print_r($data);
  }
  public function client_types()
  {
    $data['roles'] = $this->UserManagment_model->get_clients();
    $this->load->view('User_management/client_types', $data);
  }
  public function create_tasks()
  {
    $this->load->view('tasks/create');
  }
  public function tasks()
  {
    $this->load->view('tasks/view');
  }
}
