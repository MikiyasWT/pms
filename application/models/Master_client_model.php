<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Master_client_model
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

class Master_client_model extends CI_Model
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
  public function insert_client($data = null)
  {
    return $this->db->insert('master_clients', $data);
  }
  public function update_client($data, $id)
  {
    $this->db->set($data);
    $this->db->where('id', $id);
    return $this->db->update('master_clients');
  }

  public function getListOfClients(){
    // $this->db->select('*,master_clients.id');
    $this->db->select('name,id');
    return $this->db->get('master_clients')->result();
  }
  public function get_clients($postData = null)
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
      $searchQuery = " (name like '%" . $searchValue . "%' or email like '%" . $searchValue . "%' or phone like'%" . $searchValue . "%' or contact_person like '%" . $searchValue . "%' ) ";
    }
    ## Total number of records without filtering
    $this->db->select('count(*) as allcount');
    $records = $this->db->get('master_clients')->result();
    $totalRecords = $records[0]->allcount;
    ## Total number of record with filtering
    $this->db->select('count(*) as allcount');
    if ($searchQuery != '')
      $this->db->where($searchQuery);
    $records = $this->db->get('master_clients')->result();
    $totalRecordwithFilter = $records[0]->allcount;

    $this->db->select('*');
    $this->db->from('master_clients');
    $this->db->join('master_client_types', 'master_client_types.id = master_clients.type');
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

/* End of file Master_client_model.php */
/* Location: ./application/models/Master_client_model.php */