<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Usermanagment
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Cronos
 * @param     ...
 * @return    ...
 *
 */

class Usermanagment extends CI_Controller
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
    // 
  }
  public function insert_role()
  {
    $this->form_validation->set_rules('role_type', 'Role', 'required|trim|alpha');
    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('error', validation_errors());
      redirect('dashboard/roles');
    } else {
      $role = $this->input->post('role_type');
      // $dec_password = $this->api_key_crypt($this->input->post('password'), 'e');
      // $user_id = $this->user_model->login($email, $dec_password);
      if ($this->UserManagment_model->insert_role($role)) {
        $this->session->set_flashdata('message', 'Added New');
        redirect('dashboard/roles');
      } else {
        $this->session->set_flashdata('error', 'Data not inserted');
        redirect('dashboard/roles');
      }
    }
  }
}
/* End of file Usermanagment.php */
/* Location: ./application/controllers/Usermanagment.php */