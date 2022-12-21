<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Projects_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Projects_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    $this->db->select('id,title');
    return $this->db->get('tbl_projects')->result_array();
  }

  // ------------------------------------------------------------------------

}

/* End of file Projects_model.php */
/* Location: ./application/models/Projects_model.php */