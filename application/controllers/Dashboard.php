<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
            $this->load->view('dashboard');

        }else{
            $this->load->view('Login');
        }
	}
}
