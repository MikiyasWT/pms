<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Tasks_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Cronos
 * @link      https://github.com/cronos1967
 * @param     ...
 * @return    ...
 *
 */

class Tasks_model extends CI_Model {

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
public function insert_task($data = null)
{
  if ($data == null) {
    return 'Data no avalable';
  }
  return $this->db->insert('tbl_tasks', $data);
}
public function get_tasks($postData = null)
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
    $searchQuery = " (task_title like '%" . $searchValue . "%' or title like '%" . $searchValue . "%' ) ";
  }
  ## Total number of records without filtering
  $this->db->select('count(*) as allcount');
  $records = $this->db->get('tbl_tasks')->result();
  $totalRecords = $records[0]->allcount;
  ## Total number of record with filtering
  $this->db->select('count(*) as allcount');
  if ($searchQuery != '')
    $this->db->where($searchQuery);
  $records = $this->db->get('tbl_tasks')->result();
  $totalRecordwithFilter = $records[0]->allcount;

  $this->db->select('tbl_tasks.*,p.title as task_project,c.full_name as created_by, m.full_name as modified_by,master_status.m.status as task_status');
  $this->db->from('tbl_tasks');
  $this->db->join('master_status', 'master_status.id = tbl_tasks.task_status');
  $this->db->join('tbl_users c', 'master_clients.created_by = c.id','left');
  $this->db->join('tbl_users m', 'master_clients.modified_by = m.id','left');
  $this->db->join('tbl_projects p', 'tbl_tasks.task_project = p.id','left');
  // return $this->db->get_compiled_select();
  // exit;
  if ($searchQuery != '')
    $this->db->where($searchQuery);
  $this->db->order_by('tbl_tasks.id', 'DESC');
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
}
public function get_client($id)
{
  $this->db->select('*,master_clients.id');
  $this->db->join('master_client_types', 'master_client_types.id = master_clients.type');
  $this->db->where('master_clients.id', $id);
  // echo $this->db->get_compiled_select('master_clients');
  // exit;
  $data = $this->db->get('master_clients')->result();
  return (isset($data[0]))? $data[0] :false ;
}
  // ------------------------------------------------------------------------

}

/* End of file Tasks_model.php */
/* Location: ./application/models/Tasks_model.php */