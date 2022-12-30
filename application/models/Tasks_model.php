<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

class Tasks_model extends CI_Model
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
    $this->db->select('task_id,task_title');
    return $this->db->get('Task_model')->result_array();
  }
  public function insert_task($data = null)
  {
    if ($data == null) {
      return false;
    }
    return $this->db->insert('tbl_tasks', $data);
  }
  public function update($data = null,$id = null)
  {
    if ($id == null) {
      return false;
    }
    $this->db->set($data);
    $this->db->where('task_id', $id);
    return $this->db->update('tbl_tasks');
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

    $this->db->select('tbl_tasks.*,p.title as task_project,c.full_name as created_by, m.full_name as modified_by,master_status.m_status as task_status');
    $this->db->from('tbl_tasks');
    $this->db->join('master_status', 'master_status.id = tbl_tasks.task_status');
    $this->db->join('tbl_users c', 'task_created_by = c.id', 'left');
    $this->db->join('tbl_users m', 'task_modified_by = m.id', 'left');
    $this->db->join('tbl_projects p', 'tbl_tasks.task_project = p.id', 'left');
    // return $this->db->get_compiled_select();
    // exit;
    if ($searchQuery != '')
      $this->db->where($searchQuery);
    $this->db->order_by('task_id', 'DESC');
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
  public function get_task($id)
  {
    # code...
    $this->db->select('tbl_tasks.*,p.title as task_project,c.full_name as created_by, m.full_name as modified_by,master_status.m_status as task_status');
    $this->db->from('tbl_tasks');
    $this->db->join('master_status', 'master_status.id = tbl_tasks.task_status');
    $this->db->join('tbl_users c', 'task_created_by = c.id', 'left');
    $this->db->join('tbl_users m', 'task_modified_by = m.id', 'left');
    $this->db->join('tbl_projects p', 'tbl_tasks.task_project = p.id', 'left');
    $this->db->where('task_id', $id);
    $data = $this->db->get()->result();
    return (isset($data[0]))? $data[0] :false ;
  }
public function get_status()
{
  $this->db->select('id,m_status');
  return $this->db->get('master_status')->result_array();
}
  // ------------------------------------------------------------------------

}

/* End of file Tasks_model.php */
/* Location: ./application/models/Tasks_model.php */