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


  public function index()
  {
    $this->db->select('id,title');
    return $this->db->get('tbl_projects')->result_array();
  }


  public function add_project_category($data)
  {
    return $this->db->insert('master_categories', $data);
  }

  public function get_project_categories()
  {
    return $this->db->get('master_categories')->result_array();
  }

  public function get_project_category_by_Id($id){

   
    $this->db->select('*,master_categories.id');
    $this->db->where('master_categories.id', $id);
    // echo $this->db->get_compiled_select('master_clients');
    // exit;
    $data = $this->db->get('master_categories')->result();
    return (isset($data[0]))? $data[0] :false ;
  }

  public function get_project_client_by_Id($id){
    $this->db->select('*,master_clients.id');
    $this->db->where('master_clients.id', $id);
    // echo $this->db->get_compiled_select('master_clients');
    // exit;
    $data = $this->db->get('master_clients')->result();
    return (isset($data[0]))? $data[0] :false ;
  }

  public function create_new_project($data = null){
    return $this->db->insert('tbl_projects', $data);
  }


  //get_projects
  public function get_projects($postData = null)
  {
    // $this->db->select('tbl_projects.id,tbl_projects.created,master_clients.name,tbl_projects.modified,master_categories.categories,tbl_projects.title,tbl_projects.description,tbl_projects.start_date,tbl_projects.end_date,tbl_projects.status,tbl_projects.deleted,tbl_users.full_name');
    // $this->db->from('tbl_projects');
    // $this->db->join('master_clients', 'master_clients.id = tbl_projects.client');
    // $this->db->join('master_categories', 'master_categories.id = tbl_projects.project_category');
    // $this->db->join('tbl_users', 'tbl_users.id = tbl_projects.created_by OR tbl_users.id = tbl_projects.modified_by');
    // $records = $this->db->get_compiled_select();
    // var_dump($records);
    // exit;
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
      $searchQuery = " (title like '%" . $searchValue . "%' or client like '%" . $searchValue . "%' or project_category like'%" . $searchValue . "%' or start_date like '%" . $searchValue . "%' ) ";
    }
    ## Total number of records without filtering
    $this->db->select('count(*) as allcount');
    $records = $this->db->get('tbl_projects')->result();
    $totalRecords = $records[0]->allcount;
    ## Total number of record with filtering
    $this->db->select('count(*) as allcount');
    if ($searchQuery != '')
      $this->db->where($searchQuery);
    $records = $this->db->get('tbl_projects')->result();
    $totalRecordwithFilter = $records[0]->allcount;

    $this->db->select('tbl_projects.id,tbl_projects.created,master_clients.name,tbl_projects.modified,master_categories.categories,tbl_projects.title,tbl_projects.description,tbl_projects.start_date,tbl_projects.end_date,tbl_projects.status,tbl_projects.deleted,tbl_users.full_name');
    $this->db->from('tbl_projects');
    $this->db->join('master_clients', 'master_clients.id = tbl_projects.client');
    $this->db->join('master_categories', 'master_categories.id = tbl_projects.project_category');
    $this->db->join('tbl_users', 'tbl_users.id = tbl_projects.created_by OR tbl_users.id = tbl_projects.modified_by');
    if ($searchQuery != '')
      $this->db->where($searchQuery);
    $this->db->order_by($columnName, $columnSortOrder);
    $this->db->order_by('tbl_projects.id', 'DESC');
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


  public function get_project($id)
  {
    $this->db->select('*,tbl_projects.id');
    $this->db->where('tbl_projects.id', $id);
    // echo $this->db->get_compiled_select('master_clients');
    // exit;
    $data = $this->db->get('tbl_projects')->result();
    return (isset($data[0]))? $data[0] :false ;
  }

  public function update_project($data, $id)
  {
    $this->db->set($data);
    $this->db->where('id', $id);
    return $this->db->update('tbl_projects');
  }
}

