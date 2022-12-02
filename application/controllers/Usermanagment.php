<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Controller Usermanagment
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Cronos
 * @param     ...
 * @return    ...
 *
 */

class Usermanagment extends CI_Controller
{


  public function __construct()
  {
    parent::__construct(); // you have missed this line.
    $this->load->library('session');
    $this->load->model('UserManagment_model');
    if (!($this->session->userdata('logged_in'))) {
      redirect('auth/login');
    }
  }

  public function index()
  {
    // 
  }
  public function insert_role()
  {
    $this->form_validation->set_rules('role_type', 'Role', 'required|trim');
    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('error', validation_errors());
      redirect('dashboard/roles');
    } else {
      $role = $this->input->post('role_type');
      // $dec_password = $this->api_key_crypt($this->input->post('password'), 'e');
      // $user_id = $this->user_model->login($email, $dec_password);
      if ($this->UserManagment_model->insert_role($role)) {
        $this->session->set_flashdata('message', 'Added New');
        redirect('dashboard/roles');
      } else {
        $this->session->set_flashdata('error', 'Data not inserted');
        redirect('dashboard/roles');
      }
    }
  }
  public function get_roles()
  {
    echo json_encode($this->UserManagment_model->get_roles());
  }
  public function update_role($id)
  {
    if (!isset($id)) {
      echo json_encode(['error' => true, 'message' => 'empty id']);
      return exit;
    } else {
      if ($this->input->post('role_update')) {
        $this->form_validation->set_rules('role_type', 'Role', 'required|trim');
        if ($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error', validation_errors());
          redirect('dashboard/roles');
        } else {
          $message = $this->UserManagment_model->update_role($this->input->post('role_type'), $id);
          if ($message) {
            # code...
            $this->session->set_flashdata('message', 'Role Updated');
            echo json_encode($message);
            redirect('dashboard/roles');
          } else {
            # code...
            $this->session->set_flashdata('error', "Error unable to compelte task, try again later");
            redirect('dashboard/roles');
          }
        }
      } else {

        # code...
        $data = $this->UserManagment_model->get_role($id);
        $this->session->set_flashdata('updating', true);
        $this->session->set_flashdata('data', $data[0]);
        echo json_encode($data[0]);
      }
    }
  }
  public function del_role($id)
  {
    if (!isset($id)) {
      echo json_encode(['error' => true, 'message' => 'empty id']);
      return exit;
    } else {
      $message = $this->UserManagment_model->del_role($id);
      if ($message) {
        $this->session->set_flashdata('message', 'Deactivated');
        echo json_encode($message);
        redirect('dashboard/roles');
      } else {
        $this->session->set_flashdata('error', 'Data not Proccesed');
        redirect('dashboard/roles');
      }
    }
  }
  public function del_user($id)
  {
    if (!isset($id)) {
      echo json_encode(['error' => true, 'message' => 'empty id']);
      return exit;
    } else {
      $message = $this->UserManagment_model->del_user($id);
      if ($message) {
        $this->session->set_flashdata('message', 'Deactivated');
        // echo json_encode($message);
        redirect('dashboard/users');
      } else {
        $this->session->set_flashdata('error', 'Data not Proccesed');
        redirect('dashboard/users');
      }
    }
  }
  public function get_users()
  {
    // // POST data
    // $postData = $this->input->post();
    // Get data
    // $data['data'] = $this->UserManagment_model->get_users();
    // $postData = $_GET;
    // var_dump($postData);
    // exit;
    echo json_encode($this->UserManagment_model->get_users($_GET));
  }
  public function insert_user()
  {
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim');
    $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
    $this->form_validation->set_rules('dob', 'Date of Birth', 'required|trim');
    $this->form_validation->set_rules('role_type', 'Role', 'required|trim');
    // $this->form_validation->set_rules('role_type', 'Role', 'required|trim');
    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('error', validation_errors());
      echo json_encode(['error' => true, 'message' => validation_errors()]);
      redirect('dashboard/users');
    } else {
      $name = $this->input->post('name');
      $phone = $this->input->post('phone');
      $gender = $this->input->post('gender');
      $dob = $this->input->post('dob');
      $email = $this->input->post('email');
      $role = $this->input->post('role_type');
      $register_date = date('Y-m-d h:i:s');
      $data = array(
        "full_name" => $name,
        "gender" => $gender,
        "phone_num" => $phone,
        "dob" => $dob,
        "email" => $email,
        "role" => $role,
        "register_date" => $register_date,
        "password" => $this->api_key_crypt('Resmax@123', 'e')
      );
      if ($this->UserManagment_model->insert_user($data)) {
        $this->session->set_flashdata('message', 'Added New User');
        redirect('dashboard/users');
      } else {
        $this->session->set_flashdata('error', 'Data not inserted');
        redirect('dashboard/users');
      }
    }
  }
  public function active_user($id)
  {
    if (!isset($id)) {
      $this->session->set_flashdata('error', "Error unable to compelte task, no user found");
      redirect('dashboard/users');
    } else {
      $message = $this->UserManagment_model->active_user($id);
      if ($message) {
        # code...
        $this->session->set_flashdata('message', 'User Activated');
        echo json_encode($message);
        redirect('dashboard/users');
      } else {
        # code...
        $this->session->set_flashdata('error', "Error unable to compelte task, try again later");
        redirect('dashboard/users');
      }
    }
  }
  public function update_user($id)
  {
    if (!isset($id)) {
      echo json_encode(['error' => true, 'message' => 'empty id']);
      return exit;
    } else {
      if ($this->input->post('user_update')) {
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('role_type', 'Role', 'required|trim');
        if ($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error', validation_errors());
          echo json_encode(['error' => true, 'message' => validation_errors()]);
        } else {
          $name = $this->input->post('name');
          $phone = $this->input->post('phone');
          $gender = $this->input->post('gender');
          $dob = $this->input->post('dob');
          $email = $this->input->post('email');
          $role = $this->input->post('role_type');
          $user_status = $this->input->post('user_status');
          // $register_date = date('Y-m-d h:i:s');
          $data = array(
            "full_name" => $name,
            "gender" => $gender,
            "phone_num" => $phone,
            "dob" => $dob,
            "email" => $email,
            "role" => $role,
            "user_status" => $user_status
          );
          $message = $this->UserManagment_model->update_user($data, $id);
          if ($message) {
            # code...
            $this->session->set_flashdata('message', 'User Updated');
            // echo json_encode($message);
            redirect('dashboard/users');
          } else {
            # code...
            $this->session->set_flashdata('error', "Error unable to compelte task, try again later");
            redirect('dashboard/users');
          }
        }
      } else {
        # code...
        $data = $this->UserManagment_model->get_user($id)[0];
        $this->session->set_flashdata('updating', true);
        $this->session->set_flashdata('data', $data);
        echo json_encode($data);
      }
    }
  }
  public function api_key_crypt($string, $action)
  {
    $secret_key = '07a565b377ff6ecf93167a3eb1647086';
    $secret_iv = '4cd41f88ed43d2c035e67bfd9c383962';

    $output = '';
    $encrypt_method = "AES-256-CBC";
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'e') {
      $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    } else if ($action == 'd') {
      $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
  }
}
/* End of file Usermanagment.php */
/* Location: ./application/controllers/Usermanagment.php */