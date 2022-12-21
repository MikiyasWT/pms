<?php
defined('BASEPATH') or exit('No direct script access allowed');


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

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Tasks_model');
    if (!($this->session->userdata('logged_in'))) {
      redirect('auth/login');
    }
  }

  public function index()
  {
    echo json_encode($this->Tasks_model);
  }
  public function get_status()
  {
    echo json_encode($this->Tasks_model->get_status());
  }
}


/* End of file Task.php */
/* Location: ./application/controllers/Task.php */