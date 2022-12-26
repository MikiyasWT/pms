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
   
  //|callback_check_project_end_date[start_date]
  public function check_project_end_date(){
    $start_date = date('Y-m-d',strtotime($_GET['start_date']));
    $end_date = date('Y-m-d',strtotime($_GET['end_date']));
    
    if(date_create($start_date) >= date_create($end_date))
    {
      
        echo false;
    }
    else
    {
        echo true;
    }
  }


  public function start_date_validator()
   {
    
    $start_date = date('Y-m-d',strtotime($_GET['start_date']));
    //echo $start_date;
    $curdate = date("Y/m/d");

    $today = date_create($curdate);
    $project_start_date = date_create($start_date);
    
    if($project_start_date >= $today)
    { 
      echo true;
    }
    else{
        echo false;
    }
}

  public function create_project()
  { 
    $this->form_validation->set_rules('client', 'Client', 'required');
    $this->form_validation->set_rules('title', 'Title', 'required|trim|alpha_numeric_spaces|min_length[3]|max_length[100]');
    $this->form_validation->set_rules('description', 'Description', 'required|trim|alpha_numeric_spaces|min_length[3]|max_length[2000]');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('end_date', 'End Date', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required|alpha');
    $this->form_validation->set_rules('project_category', 'Project Category', 'required');
    


    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('error', validation_errors());
      //redirect('dashboard/create_project');
      $this->load->view('projects/create');
    } else {
      //$created_by
    
      $client = $this->input->post('client');
      $title = $this->input->post('title');
      $description= $this->input->post('description');
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





  public function update_project($id)
  {
    $this->form_validation->set_rules('client', 'Client', 'required');
    $this->form_validation->set_rules('title', 'Title', 'required|trim|alpha_numeric_spaces|min_length[3]|max_length[100]');
    $this->form_validation->set_rules('description', 'Description', 'required|trim|alpha_numeric_spaces|min_length[3]|max_length[2000]');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('end_date', 'End Date', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required|alpha');
    $this->form_validation->set_rules('project_category', 'Project Category', 'required');
    // $this->form_validation->set_rules('role_type', 'Role', 'required|trim');
    if ($this->form_validation->run() === FALSE) {
      $data['project'] = $this->Projects_model->get_project($id);
      $data['category'] = $this->Projects_model->get_project_category_by_Id($id);
      $data['client'] = $this->Projects_model->get_project_client_by_Id($id);
      $this->session->set_flashdata('error', validation_errors());
      $this->load->view('projects/detail',$data);
    } else {
      $client = $this->input->post('client');
      $title = $this->input->post('title'); //description
      $description = $this->input->post('description');
      $start_date = $this->input->post('start_date');
      $end_date = $this->input->post('end_date');
      $status = $this->input->post('status');
      $project_category = $this->input->post('project_category');
      // $register_date = date('Y-m-d h:i:s');
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
        "modified" => date('Y-m-d h:i:s'),
        "modified_by" => $this->session->userdata('user_id'),
      );


      $result = $this->Projects_model->update_project($data,$id);
      if ($result) {
        $this->session->set_flashdata('message', 'Project Updated');
        redirect('dashboard/projects');
      } else {
        $this->session->set_flashdata('error', 'Data not Updated');
        redirect('dashboard/projects');
      }
    }
  }

  
}


/* End of file Projects.php */
/* Location: ./application/controllers/Projects.php */