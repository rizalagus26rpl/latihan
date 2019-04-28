<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Login_Model');
    }

    public function index()
	{ 
		$this->load->view('login');
	}

	public function Login()
    {
        $this->form_validation->set_rules('Username', 'Username', 'trim|required');
        $this->form_validation->set_rules('Password', 'Password', 'trim|required');

        if($this->form_validation->run() == TRUE){
            if($this->Login_Model->CekUser() == TRUE) {
                redirect(base_url('index.php'));
            } else {
                $this->session->set_flashdata('notif', "Username atau Password Salah");
                redirect(base_url('index.php/login'));
            } 
        } else {
            $this->session->set_flashdata('notif', validation_errors());
            redirect(base_url('index.php/login'));
        }
    }
    
    public function Logout()
    {
        $this->session->sess_destroy();
        $this->load->view('login');
    }
}
