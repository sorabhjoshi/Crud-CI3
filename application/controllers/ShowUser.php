<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShowUser extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Web/Users_model');
        $this->load->library('form_validation');
    }
        public function ShowUserData($id) {
        $data['user'] = $this->Users_model->edit_users_data($id);
        $this->load->view('Blog/Myprofile', $data);
    }
    
        public function ShowUserDataToEdit($id) {
        $data['user'] = $this->Users_model->edit_users_data($id);
        $this->load->view('Blog/UpdateProfile', $data);
    }
        
    public function UpdateUserData($id) {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone_no', 'Phone Number', 'required|max_length[10]');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'required|min_length[6]');
        $this->form_validation->set_rules('user_type', 'User Type', 'required|numeric');
    
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('Blog/UpdateProfile', [
                'user' => $this->Users_model->edit_users_data($id),
                'validation_errors' => validation_errors()
            ]);
            return;
        }
    
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'Phone_no' => $this->input->post('phone_no'),
            'City' => $this->input->post('city'),
            'State' => $this->input->post('state'),
            'Country' => $this->input->post('country'),
            'Pincode' => $this->input->post('pincode'),
            'UserType' => $this->input->post('user_type')
        ];
    
        if ($this->Users_model->update_user($data, $id)) {
            redirect(base_url('UserDetails/' . htmlspecialchars($this->session->userdata('id'))));
        } else {
            redirect(base_url('UserDetailsEdit/' . htmlspecialchars($this->session->userdata('id'))));
        }
    }
    
    
}
