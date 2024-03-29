<?php
defined('BASEPATH') or exit('No direct script access allowed');
// include "../helpers/upload.php";

/**
 *
 * Controller Task
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

class Task extends CI_Controller
{
  private $upload;
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    if (!($this->session->userdata('logged_in'))) {
      redirect('auth/login');
    }
    $this->load->model('Tasks_model');
    $this->load->helper('upload');
    $this->upload = new Upload();
  }

  public function index()
  {
    echo json_encode($this->Tasks_model);
    redirect('dashboard/tasks');
  }
  public function get_status()
  {
    echo json_encode($this->Tasks_model->get_status());
  }
  public function get_tasks()
  {
    echo json_encode($this->Tasks_model->get_tasks($_GET));
  }
public function validate_date()
{
  // return 'connected';
  $e_date = date('Y/m/d h:i:s',strtotime($_GET['e_date']));
  $s_date = date('Y/m/d h:i:s',strtotime($_GET['s_date']));
  $diff = date_diff(date_create($s_date),date_create($e_date));
  echo $diff->format('%d days, %h Hours');
  // var_dump($diff);
}
  public function insert()
  {
    # code...

    $this->form_validation->set_rules('title', 'Task Title', 'required|trim|alpha_numeric_spaces|regex_match[/[a-zA-Z ][a-zA-Z ]+[a-zA-Z]$/]');
    $this->form_validation->set_rules('project', 'project', 'required|trim');
    $this->form_validation->set_rules('s_date', 'Start date', 'required|trim');
    $this->form_validation->set_rules('e_date', 'End date', "trim|required");
    $this->form_validation->set_rules('duration', 'duration', 'trim');
    $this->form_validation->set_rules('description', 'description', 'trim|alpha_numeric_spaces');
    $this->form_validation->set_rules('status', 'status', 'required|trim');
    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('error', validation_errors());
      // echo json_encode(['error' => true, 'message' => validation_errors()]);
      // redirect('dashboard/client_create');
      $this->load->view('tasks/create');
    } else {
      $title = $this->input->post('title');
      $project = $this->input->post('project');
      $s_date = $this->input->post('s_date');
      $e_date = $this->input->post('e_date');
      $duration = $this->input->post('duration');
      $status = $this->input->post('status');
      $description = $this->input->post('description');
      $res = $this->upload->upload_files();
      if (!$res[0]) {
        goto end_s;
      }
      // var_dump($this->upload->get_files());
      // exit;
      
      $data = array(
        "task_created" => date('Y-m-d h:i:s'),
        "task_created_by" => $this->session->userdata('user_id'),
        "task_title" => $title,
        "task_project" => $project,
        "task_start_day" => $s_date,
        "task_end_day" => $e_date,
        "task_description" => $description,
        "task_duration" =>$duration,
        "task_status" => $status,
        "task_resources" => $this->upload->get_files()
      );
      $result = $this->Tasks_model->insert_task($data);
      // sleep(5);
      if ($result) {
        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', 'Added New Task');
        redirect('dashboard/tasks');
      } else {
        $this->session->set_flashdata('error', true);
        $this->session->set_flashdata('message', 'Data not inserted');
        end_s:
        $str = '';
        foreach ($res[1] as $key) {
          $str .= $key . ',';
        }
        $this->session->set_flashdata('error', true);
        $this->session->set_flashdata('message', 'Resources not updated ' . $str);
        redirect('dashboard/tasks');
      }
    }
  }
  public function update($id)
  {
    # code...

    $this->form_validation->set_rules('title', 'Task Title', 'required|trim|alpha_numeric_spaces|regex_match[/[a-zA-Z ][a-zA-Z ]+[a-zA-Z]$/]');
    $this->form_validation->set_rules('project', 'project', 'required|trim');
    $this->form_validation->set_rules('s_date', 'Start date', 'required|trim');
    $this->form_validation->set_rules('e_date', 'End date', "trim|required");
    $this->form_validation->set_rules('duration', 'duration', 'trim');
    $this->form_validation->set_rules('description', 'description', 'trim|alpha_numeric_spaces');
    $this->form_validation->set_rules('status', 'status', 'required|trim');
    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('error',strip_tags(validation_errors()));
      // echo json_encode(['error' => true, 'message' => validation_errors()]);
      // redirect('dashboard/client_create');
      $data['task'] = $this->Tasks_model->get_task($id);
      $this->load->view('tasks/detail',$data);
    } else {
      $title = $this->input->post('title');
      $project = $this->input->post('project');
      $s_date = $this->input->post('s_date');
      $e_date = $this->input->post('e_date');
      $duration = $this->input->post('duration');
      $status = $this->input->post('status');
      $description = $this->input->post('description');
      $res = $this->upload->upload_files();
      if (!$res[0]) {
        goto end_s;
      }
      // var_dump($this->upload->get_files());
      // exit;
      
      $data = array(
        "task_modified" => date('Y-m-d h:i:s'),
        "task_modified_by" => $this->session->userdata('user_id'),
        "task_title" => $title,
        "task_project" => $project,
        "task_start_day" => $s_date,
        "task_end_day" => $e_date,
        "task_description" => $description,
        "task_duration" =>$duration,
        "task_status" => $status,
        "task_resources" => $this->upload->get_files()
      );
      $result = $this->Tasks_model->update($data, $id);
      // sleep(5);
      // var_dump($result);
      // exit;
      if ($result) {
        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', 'Task Updated');
        redirect('dashboard/tasks');
      } else {
        $this->session->set_flashdata('error', true);
        $this->session->set_flashdata('message', 'Data not updated');
        end_s:
        $str = '';
        foreach ($res[1] as $key) {
          $str .= $key . ',';
        }
        $this->session->set_flashdata('error', true);
        $this->session->set_flashdata('message', 'Resources not updated ' . $str);
        redirect('dashboard/tasks');
      }
    }
  }
}


/* End of file Task.php */
/* Location: ./application/controllers/Task.php */