<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->model('back_office/Employee_model');
    }

	public function index(){
		$this->load->view('back_office/auth/login');
	}


    public function login() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $email = $this->input->post('email');
            $password = $this->input->post('pass');
            $user = $this->Employee_model->check_credentials($email, $password);
			// var_dump($user);
            if ($user) {
				$this->session->set_userdata('user_data', $user);
                redirect('back_office/HomeController');
            } else {
                redirect('back_office/LoginController');
            }
        } else {
            $this->load->view('login_view');
        }
    }

	public function logout()
	{
		$this->session->unset_userdata('user_data');
		redirect('back_office/LoginController');
	}

}
