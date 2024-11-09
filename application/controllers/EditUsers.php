<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditUsers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Web/Users_model');
        $this->load->library('form_validation');
    }
    
    public function LoadUserdata($id) {
        $data['user'] = $this->Users_model->edit_users_data($id);
        $this->load->view('Blog/Utils/EditUser', $data);
    }  

    public function UpdateUser($id) {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone_no', 'Phone Number', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'required');
        $this->form_validation->set_rules('user_type', 'User Type', 'required|numeric');
    
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('Blog/Utils/EditUser', [
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
            redirect(base_url('Users'));
        } else {
            redirect(base_url("EditUsers/LoadUserdata/$id"));
        }
    }
    
    
    public function DeleteUser($id) {
        $query = $this->Users_model->delete_user_data($id);
        if ($query) {
            redirect(base_url('Users'));
        }else{
            'Deletion error';
        }
        
    }
   
}
