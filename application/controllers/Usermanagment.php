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
  function check_email_exists($email)
  {
    $this->form_validation->set_message('check_email_exists', 'Email is already being used by someone, choose a different one');
    if ($this->user_model->check_email_exists($email)) {
      return true;
    } else {
      return false;
    }
  }
  public function insert_client()
  {
    $this->form_validation->set_rules('role_type', 'Client', 'required|trim');
    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('error', true);
      $this->session->set_flashdata('message', validation_errors());
      redirect('dashboard/client_types');
    } else {
      $role = $this->input->post('role_type');
      // $dec_password = $this->api_key_crypt($this->input->post('password'), 'e');
      // $user_id = $this->user_model->login($email, $dec_password);
      if ($this->UserManagment_model->insert_client_types($role)) {
        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', 'Added New Client Type');
        redirect('dashboard/client_types');
      } else {
        $this->session->set_flashdata('error', true);
        $this->session->set_flashdata('message', 'Data not inserted');
        redirect('dashboard/client_types');
      }
    }
  }
  public function insert_role()
  {
    $this->form_validation->set_rules('role_type', 'Role', 'required|trim');
    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('error', true);
      $this->session->set_flashdata('message', validation_errors());
      redirect('dashboard/roles');
    } else {
      $role = $this->input->post('role_type');
      // $dec_password = $this->api_key_crypt($this->input->post('password'), 'e');
      // $user_id = $this->user_model->login($email, $dec_password);
      if ($this->UserManagment_model->insert_role($role)) {
        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', 'Added New Role');
        redirect('dashboard/roles');
      } else {
        $this->session->set_flashdata('message', 'Data not inserted');
        $this->session->set_flashdata('error', true);
        redirect('dashboard/roles');
      }
    }
  }
  public function get_roles()
  {
    echo json_encode($this->UserManagment_model->get_roles());
  }
  public function get_clients()
  {
    echo json_encode($this->UserManagment_model->get_clients());
  }
  public function update_role($id)
  {
    if (!isset($id)) {
      echo json_encode(['error' => true, 'message' => 'empty id']);
      $this->session->set_flashdata('error', true);
      $this->session->set_flashdata('message', 'Data not avalable');
      return exit;
    } else {
      if ($this->input->post('role_update')) {
        $this->form_validation->set_rules('role_type', 'Role', 'required|trim');
        if ($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error', true);
          $this->session->set_flashdata('message', validation_errors());
          redirect('dashboard/roles');
        } else {
          $message = $this->UserManagment_model->update_role($this->input->post('role_type'), $id);
          if ($message) {
            # code...
            $this->session->set_flashdata('success', true);
            $this->session->set_flashdata('message', 'Role Updated');
            echo json_encode($message);
            redirect('dashboard/roles');
          } else {
            # code...
            $this->session->set_flashdata('error', true);
            $this->session->set_flashdata('message', "Error unable to compelte task, try again later");
            redirect('dashboard/roles');
          }
        }
      } else {

        # code...
        $data = $this->UserManagment_model->get_role($id);
        echo json_encode($data);
        $this->session->set_flashdata('updating', true);
        $this->session->set_flashdata('data', $data);
      }
    }
  }
  public function update_client($id)
  {
    if (!isset($id)) {
      echo json_encode(['error' => true, 'message' => 'empty id']);
      $this->session->set_flashdata('error', true);
      $this->session->set_flashdata('message', "Data not Avalable");
      return exit;
    } else {
      if ($this->input->post('role_update')) {
        $this->form_validation->set_rules('role_type', 'Client', 'required|trim');
        if ($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error', true);
          $this->session->set_flashdata('message', validation_errors());
          redirect('dashboard/client_types');
        } else {
          $message = $this->UserManagment_model->update_client($this->input->post('role_type'), $id);
          if ($message) {
            # code...
            $this->session->set_flashdata('success', true);
            $this->session->set_flashdata('message', 'Client Type Updated');
            echo json_encode($message);
            redirect('dashboard/client_types');
          } else {
            # code...
            $this->session->set_flashdata('error', true);
            $this->session->set_flashdata('message', "Error unable to compelte task, try again later");
            redirect('dashboard/client_types');
          }
        }
      } else {

        # code...
        $data = $this->UserManagment_model->get_client($id);
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
      $this->session->set_flashdata('error', true);
      $this->session->set_flashdata('message', "Data not Avalable");
      return exit;
    } else {
      $message = $this->UserManagment_model->del_role($id);
      if ($message) {
        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', 'Role Deactivated');
        // echo json_encode($message);
        redirect('dashboard/roles');
      } else {
        $this->session->set_flashdata('error', true);
        $this->session->set_flashdata('message', 'Data not Proccesed');
        redirect('dashboard/roles');
      }
    }
  }
  public function del_client($id)
  {
    if (!isset($id)) {
      echo json_encode(['error' => true, 'message' => 'empty id']);
      $this->session->set_flashdata('error', true);
      $this->session->set_flashdata('message', "Data not Avalable");
      return exit;
    } else {
      $message = $this->UserManagment_model->del_client($id);
      if ($message) {
        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', 'Client Type Deactivated');
        // echo json_encode($message);
        redirect('dashboard/client_types');
      } else {
        $this->session->set_flashdata('error', true);
        $this->session->set_flashdata('message', 'Data not Proccesed');
        redirect('dashboard/client_types');
      }
    }
  }
  public function del_user($id)
  {
    if (!isset($id)) {
      echo json_encode(['error' => true, 'message' => 'empty id']);
      $this->session->set_flashdata('error', true);
      $this->session->set_flashdata('message', "Data not Avalable");
      return exit;
    } else {
      $message = $this->UserManagment_model->del_user($id);
      if ($message) {
        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', 'User Deactivated');
        // echo json_encode($message);
        redirect('dashboard/users');
      } else {
        $this->session->set_flashdata('error', true);
        $this->session->set_flashdata('message', 'Data not Proccesed');
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
    $this->form_validation->set_rules('email', 'Email', 'required|trim|callback_check_email_exists|valid_email');
    $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
    $this->form_validation->set_rules('dob', 'Date of Birth', 'required|trim');
    $this->form_validation->set_rules('role_type', 'Role', 'required|trim');
    // $this->form_validation->set_rules('role_type', 'Role', 'required|trim');
    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('error', true);
      $this->session->set_flashdata('message', validation_errors());
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
        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', 'Added New User');
        redirect('dashboard/users');
      } else {
        $this->session->set_flashdata('error', true);
        $this->session->set_flashdata('message', 'Data not inserted');
        redirect('dashboard/users');
      }
    }
  }
  public function active_user($id)
  {
    if (!isset($id)) {
      $this->session->set_flashdata('error', true);
      $this->session->set_flashdata('message', "Error unable to compelte task, no user found");
      redirect('dashboard/users');
    } else {
      $message = $this->UserManagment_model->active_user($id);
      if ($message) {
        # code...
        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', 'User Activated');
        echo json_encode($message);
        redirect('dashboard/users');
      } else {
        # code...
        $this->session->set_flashdata('error', true);
        $this->session->set_flashdata('error', "Error unable to compelte task, try again later");
        redirect('dashboard/users');
      }
    }
  }
  public function update_user($id)
  {
    if (!isset($id)) {
      echo json_encode(['error' => true, 'message' => 'empty id']);
      $this->session->set_flashdata('error', true);
      $this->session->set_flashdata('message', "Error unable to compelte task, no user found");
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
          $this->session->set_flashdata('error', true);
          $this->session->set_flashdata('message',strip_tags(validation_errors()));
          // echo json_encode(['error' => true, 'message' => strip_tags(validation_errors())]);
          redirect('dashboard/users');
          // $this->load->view('User_management/users');
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
            $this->session->set_flashdata('success', true);
            // echo json_encode($message);
            redirect('dashboard/users');
          } else {
            # code...
            $this->session->set_flashdata('error', true);
            $this->session->set_flashdata('message', "Error unable to compelte task, try again later");
            redirect('dashboard/users');
          }
        }
      } else {
        # code...
        $data = $this->UserManagment_model->get_user($id);
        $this->session->set_flashdata('updating', true);
        $this->session->set_flashdata('data', $data);
        echo json_encode($data[0]);
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