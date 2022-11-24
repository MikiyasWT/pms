<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model UserManagment_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Cronos
 * @param     ...
 * @return    ...
 *
 */

class UserManagment_model extends CI_Model
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
    // 
  }

  // ------------------------------------------------------------------------
  public function get_roles()
  {
    return $this->db->get('roles')->result_array();
  }
  public function insert_role($role){
    $data = array(
      'role_type' => $role,
      'created_at' => date('Y-m-d h:i:s')
    );
    return $this->db->insert('roles',$data);
  }
}

/* End of file UserManagment_model.php */
/* Location: ./application/models/UserManagment_model.php */