<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Register_model'); 
        $this->load->library('form_validation'); 
    }

    
    public function register() {
        $this->load->view('register'); 
    }

   
    public function register_user() {
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');  
        } else {
            
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            ];

            
            if ($this->Register_model->register($data)) {
                $this->load->view('Login' );
            } else {
                $this->load->view('Registration');  
            }
        }
    }
}


