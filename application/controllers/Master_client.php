<?php

use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Master_client
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    cronos
 * @link      https://github.com/cronos1967
 * @param     ...
 * @return    ...
 *
 */

class Master_client extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Master_client_model');
    if (!($this->session->userdata('logged_in'))) {
      redirect('auth/login');
    }
  }

  public function index()
  {
    // 
  }
  public function create_client()
  {
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim|alpha_numeric_spaces|regex_match[/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/]');
    $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|is_natural');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('address', 'address', "trim|alpha_numeric_spaces|regex_match[/^[a-zA-Z0-9\s,'-]*$/]");
    $this->form_validation->set_rules('city', 'city', 'trim|alpha_numeric_spaces|regex_match[/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/]');
    $this->form_validation->set_rules('state', 'state', 'trim|alpha_numeric_spaces|regex_match[/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/]');
    $this->form_validation->set_rules('country', 'country', 'required|trim|alpha|regex_match[/[a-zA-Z]{3,}/]');
    $this->form_validation->set_rules('type', 'Client', 'required|trim');
    $this->form_validation->set_rules('fax', 'Fax', 'trim|is_natural');
    $this->form_validation->set_rules('c_person', 'Contact Person', 'required|trim|alpha_numeric_spaces|regex_match[/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/]');
    $this->form_validation->set_rules('cp_number', 'Contact Person Phone', 'required|trim|is_natural');
    $this->form_validation->set_rules('cp_email', 'Contact Person email', 'required|trim|valid_email');
    $this->form_validation->set_rules('comments', 'Comment', 'trim|alpha_numeric_spaces');
    // $this->form_validation->set_rules('role_type', 'Role', 'required|trim');
    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('error', validation_errors());
      // echo json_encode(['error' => true, 'message' => validation_errors()]);
      // redirect('dashboard/client_create');
      $this->load->view('clients/create');
    } else {
      $name = $this->input->post('name');
      $phone = $this->input->post('phone');
      $address = $this->input->post('address');
      $city = $this->input->post('city');
      $email = $this->input->post('email');
      $state = $this->input->post('state');
      $country = $this->input->post('country');
      $type = $this->input->post('type');
      $fax = $this->input->post('fax');
      $c_person = $this->input->post('c_person');
      $cp_number = $this->input->post('cp_number');
      $cp_email = $this->input->post('cp_email');
      $comments = $this->input->post('comments');
      // $register_date = date('Y-m-d h:i:s');
      $data = array(
        "created" => date('Y-m-d h:i:s'),
        "created_by" => $this->session->userdata('user_id'),
        "name" => $name,
        "address" => $address,
        "city" => $city,
        "state" => $state,
        "country" => $country,
        "type" => $type,
        "email" => $email,
        "phone" => $phone,
        'fax' => $fax,
        "contact_person" => $c_person,
        "contact_person_number" => $cp_number,
        "contact_person_email" => $cp_email,
        "comments" => $comments
      );
      $result = $this->Master_client_model->insert_client($data);
      // sleep(5);
      if ($result) {
        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', 'Added New Client');
        redirect('dashboard/clients');
      } else {
        $this->session->set_flashdata('error', true);
        $this->session->set_flashdata('error', 'Data not inserted');
        redirect('dashboard/clients');
      }
    }
  }   

  public function get_clients()
  {
    echo json_encode($this->Master_client_model->get_clients($_GET));
  }
  
  public function getListOfClientsId(){
    
    echo json_encode($this->Master_client_model->getListOfClients());

  }

  public function get_client($id)
  {
    echo json_encode($this->Master_client_model->get_client($id));
  }
  public function update_client($id)
  {
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim|alpha_numeric_spaces|regex_match[/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/]');
    $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|is_natural');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('address', 'address', "trim|alpha_numeric_spaces|regex_match[/^[a-zA-Z0-9\s,'-]*$/]");
    $this->form_validation->set_rules('city', 'city', 'trim|alpha_numeric_spaces|regex_match[/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/]');
    $this->form_validation->set_rules('state', 'state', 'trim|alpha_numeric_spaces|regex_match[/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/]');
    $this->form_validation->set_rules('country', 'country', 'required|trim|alpha|regex_match[/[a-zA-Z]{3,}/]');
    $this->form_validation->set_rules('type', 'Client', 'required|trim');
    $this->form_validation->set_rules('fax', 'Fax', 'trim|is_natural');
    $this->form_validation->set_rules('c_person', 'Contact Person', 'required|trim|alpha_numeric_spaces|regex_match[/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/]');
    $this->form_validation->set_rules('cp_number', 'Contact Person Phone', 'required|trim|is_natural');
    $this->form_validation->set_rules('cp_email', 'Contact Person email', 'required|trim|valid_email');
    $this->form_validation->set_rules('comments', 'Comment', 'trim|alpha_numeric_spaces');
    // $this->form_validation->set_rules('role_type', 'Role', 'required|trim');
    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('error', validation_errors());
      // echo json_encode(['error' => true, 'message' => validation_errors()]);
      // redirect('dashboard/client_create');
      $data['mc'] = $this->Master_client_model->get_client($id);
      $this->load->view('clients/detail', $data);
    } else {
      $name = $this->input->post('name');
      $phone = $this->input->post('phone');
      $address = $this->input->post('address');
      $city = $this->input->post('city');
      $email = $this->input->post('email');
      $state = $this->input->post('state');
      $country = $this->input->post('country');
      $type = $this->input->post('type');
      $fax = $this->input->post('fax');
      $c_person = $this->input->post('c_person');
      $cp_number = $this->input->post('cp_number');
      $cp_email = $this->input->post('cp_email');
      $comments = $this->input->post('comments');
      // $register_date = date('Y-m-d h:i:s');
      $data = array(
        "modified" => date('Y-m-d h:i:s'),
        "modified_by" => $this->session->userdata('user_id'),
        "name" => $name,
        "address" => $address,
        "city" => $city,
        "state" => $state,
        "country" => $country,
        "type" => $type,
        "email" => $email,
        "phone" => $phone,
        'fax' => $fax,
        "contact_person" => $c_person,
        "contact_person_number" => $cp_number,
        "contact_person_email" => $cp_email,
        "comments" => $comments
      );
      $result = $this->Master_client_model->update_client($data, $id);
      if ($result) {
        $this->session->set_flashdata('message', 'Client Updated');
        $this->session->set_flashdata('success', true);
        redirect('dashboard/clients');
      } else {
        $this->session->set_flashdata('error', true);
        $this->session->set_flashdata('message', 'Data not Updated');
        redirect('dashboard/clients');
      }
    }
  }
}


/* End of file Master_client.php */
/* Location: ./application/controllers/Master_client.php */