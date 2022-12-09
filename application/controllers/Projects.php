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

class Projects extends CI_Controller
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

  }

}


/* End of file Projects.php */
/* Location: ./application/controllers/Projects.php */