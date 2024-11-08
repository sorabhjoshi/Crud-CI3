<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model'); 
        $this->load->library('form_validation'); 
    }

    public function login_user() {
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            echo 'Validation failed';
        } else {
            
            $data = [
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            ];

            
            if ($this->Login_model->login($data)) {
                $this->load->view('Blog/Dashboard', $data);
            } else {
                $this->load->view('Registration');
            }
        }
    }
}
