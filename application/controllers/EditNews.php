<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditNews extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Web/News_model');
        $this->load->library('form_validation');
    }

    public function LoadNewsdata($id) {
        $data['blog'] = $this->News_model->edit_news_data($id);
        $this->load->view('Blog/Utils/EditNews', $data);
    }
     
    public function UpdateNewsdata($id) {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', '');

        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('Blog/Utils/EditNews', [
                'blog' => $this->News_model->edit_news_data($id),
                'validation_errors' => validation_errors()
            ]);
            return;
        }
        $data = [
            'Author_name' => $this->input->post('author_name'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('content'),
            'Updated_at' => date('Y-m-d H:i:s')
        ];
        
        if ($this->News_model->updatenews($data, $id)) {
            
            redirect(base_url('News'));
        } else {
            
            redirect(base_url("EditNews/$id"));
        }
    }

    public function DeleteNews($id) {
        $query = $this->News_model->delete_news_data($id);
        if ($query) {
            redirect(base_url('News'));
        }else{
            'Deletion error';
        }
        
    }

    public function AddNewsInterface() {
        $this->load->view('Blog/Utils/AddNews');
    }

    public function AddingNews($userid) {
        // Set validation rules for the form fields
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', '');  // Ensure content is required
    
        
        $data = [
            'user_id'=> $userid,
            'Author_name' => $this->input->post('author_name'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('content'),
            'updated_at' => date('Y-m-d H:i:s'),
            'Create_Date' => date('Y-m-d H:i:s')
        ];
    
        
        if ($_FILES['image']['name']) {
            $config['upload_path'] = './uploads/news_images/';  
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = time() . '_' . $_FILES['image']['name'];  
            
            $this->load->library('upload', $config);
    
            
            if (!$this->upload->do_upload('image')) {
                
                $data['upload_error'] = $this->upload->display_errors();
                $this->load->view('Utils/AddNews', $data);
                return;  
            } else {
                
                $upload_data = $this->upload->data();
                $data['image_path'] = $upload_data['file_name'];
                
            }
        }
    
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Utils/AddNews', $data);
            return;  
        } else {
            
            
            $this->load->model('News_model');
            if ($this->News_model->addnews($data)) {
                
                $this->session->set_flashdata('success', 'News added successfully!');
                redirect(base_url('News'));
            } else {
                
                $this->session->set_flashdata('error', 'Failed to add news. Please try again.');
                redirect(base_url('AddNews'));
            }
        }
    }
    
    
    
    

   
}
