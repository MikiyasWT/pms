<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Projects
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Project extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();

    $this->load->library('session');
    $this->load->model('Projects_model');
    if (!($this->session->userdata('logged_in'))) {
      redirect('auth/login');
    }
  }

  public function index()
  {
    // 
  }
  public function create_project()
  {
    $this->form_validation->set_rules('client', 'Client', 'required');
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('end_date', 'End Date', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');
    $this->form_validation->set_rules('project_category', 'Project Category', 'required');
    
    

    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('error', validation_errors());
      redirect('dashboard/projects');
    } else {
      //$created_by
    
      $client = $this->input->post('client');
      $title = $this->input->post('title');
      $description = $this->input->post('descrption');
      $start_date = $this->input->post('start_date');
      $end_date = $this->input->post('end_date');
      $status = $this->input->post('status');
      $project_category = $this->input->post('project_category');

      $data = array(
        "client" => $client,
        "title" => $title,
        "description" => $description,
        "start_date" => $start_date,
        "end_date " => $end_date ,
        "status" => $status,
        "project_category" => $project_category,
        "created" => date('Y-m-d h:i:s'),
        "created_by" => $this->session->userdata('user_id'),
      );

      if ($this->Projects_model->create_new_project($data)) {
        $this->session->set_flashdata('message', 'New Projected created');
        redirect('dashboard/projects');
      } else {
        $this->session->set_flashdata('error', 'project not created');
        redirect('dashboard/projects');
      }
    }
  }


  public function create_project_category(){
    $this->form_validation->set_rules('category', 'Category', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('error', validation_errors());
      echo json_encode(['error' => true, 'message' => validation_errors()]);
      redirect('dashboard/project');
    }
    else {
      $categories = $this->input->post('category');
      $status = $this->input->post('status');

      $data = array(
        "categories" => $categories,
        "status" => $status    
      );

      if ($this->Projects_model->add_project_category($data)) {
        $this->session->set_flashdata('message', 'a New Category is added');
        redirect('dashboard/projects');
      } else {
        $this->session->set_flashdata('error', 'failed to add Category');
        redirect('dashboard/projects');
      }
    }

  }

  public function getProjectCategories(){
    
    echo json_encode($this->Projects_model->get_project_categories());
  } 


  public function get_projects()
  {
    echo json_encode($this->Projects_model->get_projects($_GET));
  }

  
}


/* End of file Projects.php */
/* Location: ./application/controllers/Projects.php */