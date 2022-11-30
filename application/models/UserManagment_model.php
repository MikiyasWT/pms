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
  public function get_users($postData = null)
  {
    $this->db->select('users.id, role_type, full_name, phone_num, gender, dob, email, role, register_date, user_status');
    $this->db->from('users');
    $this->db->join('roles', 'roles.id = users.role');
    $this->db->order_by('users.id', 'DESC');
    // echo $this->db->get_compiled_select();
    // exit;
    return $this->db->get()->result();
  }
  public function get_user($id)
  {
    $this->db->select('users.id, role_type, full_name, phone_num, gender, dob, email, role, register_date, user_status');
    $this->db->from('users');
    $this->db->join('roles', 'roles.id = users.role');
    $this->db->where('users.id', $id);
    return $this->db->get()->result();
  }
  public function get_role($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('roles')->result();
    // return $this->db->get_where('roles',["id"=>$id]);
  }
  public function insert_role($role)
  {
    $data = array(
      'role_type' => $role,
      'created_at' => date('Y-m-d h:i:s')
    );
    return $this->db->insert('roles', $data);
  }
  public function insert_user($data)
  {
    return $this->db->insert('users', $data);
  }
  public function active_user($id)
  {
    $this->db->set('user_status', 'active');
    $this->db->where('id', $id);
    return $this->db->update('users');
  }
  public function update_role($role, $id)
  {
    $this->db->set('role_type', $role);
    $this->db->set('role_status', 'active');
    $this->db->where('id', $id);
    return $this->db->update('roles');
  }
  public function update_user($data, $id)
  {
    $this->db->set($data);
    $this->db->where('id', $id);
    return $this->db->update('users');
  }
  public function del_role($id)
  {
    $this->db->set('role_status', 'deactivated');
    $this->db->where('id', $id);
    return $this->db->update('roles');
  }
  public function del_user($id)
  {
    $this->db->set('user_status', 'deactive');
    $this->db->where('id', $id);
    return $this->db->update('users');
  }
}

/* End of file UserManagment_model.php */
/* Location: ./application/models/UserManagment_model.php */