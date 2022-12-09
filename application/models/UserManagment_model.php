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
    return $this->db->get('tbl_roles')->result_array();
  }
  public function get_clients()
  {
    return $this->db->get('master_client_types')->result_array();
  }
  public function get_users($postData = null)
  {
    ## Read value
    $draw = $postData['draw'];
    $start = $postData['start'];
    $rowperpage = $postData['length']; // Rows display per page
    $columnIndex = $postData['order'][0]['column']; // Column index
    $columnName = $postData['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
    $searchValue = $postData['search']['value']; // Search value
    ## Search 
    $searchQuery = "";
    if ($searchValue != '') {
      $searchQuery = " (full_name like '%" . $searchValue . "%' or email like '%" . $searchValue . "%' or phone_num like'%" . $searchValue . "%' ) ";
    }
    ## Total number of records without filtering
    $this->db->select('count(*) as allcount');
    $records = $this->db->get('tbl_users')->result();
    $totalRecords = $records[0]->allcount;
    ## Total number of record with filtering
    $this->db->select('count(*) as allcount');
    if ($searchQuery != '')
      $this->db->where($searchQuery);
    $records = $this->db->get('tbl_users')->result();
    $totalRecordwithFilter = $records[0]->allcount;

    $this->db->select('tbl_users.id, role_type, full_name, phone_num, gender, dob, email, role, register_date, user_status');
    $this->db->from('tbl_users');
    $this->db->join('tbl_roles', 'tbl_roles.id = tbl_users.role');
    if ($searchQuery != '')
      $this->db->where($searchQuery);
    $this->db->order_by($columnName, $columnSortOrder);
    $this->db->limit($rowperpage, $start);
    $records = $this->db->get()->result();
    ## Response
    $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "data" => $records
    );
    return $response;
    // $this->db->order_by('users.id', 'DESC');
    // echo $this->db->get_compiled_select();
    // exit;
    // return $this->db->get()->result();
  }
  public function get_user($id)
  {
    $this->db->select('tbl_users.id, role_type, full_name, phone_num, gender, dob, email, role, register_date, user_status');
    $this->db->from('tbl_users');
    $this->db->join('tbl_roles', 'tbl_roles.id = tbl_users.role');
    $this->db->where('tbl_users.id', $id);
    return $this->db->get()->result();
  }
  public function get_role($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('tbl_roles')->result();
    // return $this->db->get_where('tbl_roles',["id"=>$id]);
  }
  public function get_client($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('master_client_types')->result();
    // return $this->db->get_where('tbl_roles',["id"=>$id]);
  }

  public function insert_role($role)
  {
    $data = array(
      'role_type' => $role,
      'created_at' => date('Y-m-d h:i:s')
    );
    return $this->db->insert('tbl_roles', $data);
  }
  public function insert_client_types($role)
  {
    $data = array(
      'client_type' => $role,
      'created' => date('Y-m-d h:i:s')
    );
    return $this->db->insert('master_client_types', $data);
  }
  public function insert_user($data)
  {
    return $this->db->insert('tbl_users', $data);
  }
  public function active_user($id)
  {
    $this->db->set('user_status', 'active');
    $this->db->where('id', $id);
    return $this->db->update('tbl_users');
  }
  public function update_role($role, $id)
  {
    $this->db->set('role_type', $role);
    $this->db->set('role_status', 'active');
    $this->db->where('id', $id);
    return $this->db->update('tbl_roles');
  }
  public function update_client($role, $id)
  {
    $this->db->set('client_type', $role);
    $this->db->set('status', 'active');
    $this->db->where('id', $id);
    return $this->db->update('master_client_types');
  }
  public function update_user($data, $id)
  {
    $this->db->set($data);
    $this->db->where('id', $id);
    return $this->db->update('tbl_users');
  }
  public function del_role($id)
  {
    $this->db->set('role_status', 'deactive');
    $this->db->where('id', $id);
    return $this->db->update('tbl_roles');
  }
  public function del_client($id)
  {
    $this->db->set('status', 'deactive');
    $this->db->where('id', $id);
    return $this->db->update('master_client_types');
  }
  public function del_user($id)
  {
    $this->db->set('user_status', 'deactive');
    $this->db->where('id', $id);
    return $this->db->update('tbl_users');
  }
}

/* End of file UserManagment_model.php */
/* Location: ./application/models/UserManagment_model.php */