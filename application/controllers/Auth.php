<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->login();
    }

    public function register()
    {
        $this->load->helper('email');
        $data['title'] = 'Register';

        $this->form_validation->set_rules('fullName', 'Full Name', 'required');
        $this->form_validation->set_rules('userName', 'User Name', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|callback_check_email_exists|valid_email');
        //$this->form_validation->set_rules('role','Role','required');
        //$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[16]|callback_check_password_expression');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[16]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$/]');
        $this->form_validation->set_rules('password2', 'ConfirmPassword', 'matches[password]');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('users/register', $data);
        } else {
            //encrypt input password
            $enc_password = $this->api_key_crypt($this->input->post('password'), 'e');
            $this->user_model->register($enc_password);
            //set message before redirect

            $this->session->set_flashdata('user_registered', 'you are now registered and can log in');
            redirect('auth/login');
        }
    }

    function check_username_exists($user_name)
    {
        $this->form_validation->set_message('check_username_exists', 'That username is taken, choose a different one');
        if ($this->user_model->check_username_exists($user_name)) {
            return true;
        } else {
            return false;
        }
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


    function check_password_expression($password)

    {

        if (1 !== preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $password)) {
            $this->form_validation->set_message('check_password_expression', '%s must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit');
            return FALSE;
        } else {
            //12345678Ab
            //Abcdefg1234
            return TRUE;
        }
    }

    //login user 
    public function login()
    {
        if (($this->session->userdata('logged_in'))) {
            redirect('dashboard');
        }

        $this->load->helper('email');
        $data['title'] = 'Log In';
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[15]|callback_check_password_expression');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('users/login', $data);
        } else {
            $email = $this->input->post('email');
            $dec_password = $this->api_key_crypt($this->input->post('password'), 'e');
            $user_id = $this->user_model->login($email, $dec_password);

            if ($user_id) {

                $user_data = array(
                    'user_id' => $user_id,
                    'logged_in' => true,
                );

                $this->session->set_userdata($user_data);
                //set message before redirect
                $this->session->set_flashdata('user_loggedin', 'you are now loggedin');
                //$this->load->view('users/home');
                redirect('dashboard');
            } else {
                //set message before redirect
                $this->session->set_flashdata('login_failed', 'invalid credentials');
                //redirect('users/login',$data);

                $data['error'] = true;
                $data['message'] = "Incorrect email or Password";

                $this->load->view('users/login', $data);
            }
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        //$this->session->unset_userdata('username');
        $this->session->sess_destroy();
        $this->session->set_flashdata('user_loggedout', 'you have logged out');

        redirect('auth/login');
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
