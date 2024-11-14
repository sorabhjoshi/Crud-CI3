<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Web/Blog_model');
        $this->load->library('form_validation');
    }

    public function EditBlog($id) {
        $data = [
            'blog' => $this->Blog_model->get_blog_data($id),
            'validation_errors' => ''
        ];
        $this->load->view('Blog/Utils/EditBlog', $data);
    }

    public function DeleteBlog($id) {
        if ($this->Blog_model->delete_blog_data($id)) {
            redirect(base_url('Blog'));
        } else {
            echo 'Error: Could not delete the blog post.';
        }
    }

    public function UpdateBlog($id) {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', '');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Blog/Utils/EditBlog', [
                'blog' => $this->Blog_model->get_blog_data($id),
                'validation_errors' => validation_errors()
            ]);
            return;
        }

        $data = [
            'author_name' => $this->input->post('author_name'),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'Updated_date' => date('Y-m-d H:i:s')
        ];
        
        if ($this->Blog_model->updateblog($data, $id)) {
            redirect(base_url('Blog'));
        } else {
            redirect(base_url("Edit/EditBlog/$id"));
        }
    }

    public function AddBlog(){
        $this->load->view('Blog/Utils/AddBlog');
    }

    public function AddBlogData($userid) {
        
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', '');
        
        $data['User_id'] = $userid;
        $data['author_name'] = $this->input->post('author_name');
        $data['title'] = $this->input->post('title');
        $data['content'] = $this->input->post('content');
        $data['Create_Date'] = date('Y-m-d H:i:s');  
        $data['Updated_date'] = date('Y-m-d H:i:s');  
        
     
        if ($_FILES['image']['name']) {
            $config['upload_path'] = './uploads/blog_images/';  
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = time() . '_' . $_FILES['image']['name'];  
            
            $this->load->library('upload', $config);
    
         
            if (!$this->upload->do_upload('image')) {
                
                $data['upload_error'] = $this->upload->display_errors();
                $this->load->view('Utils/AddBlog', $data);
                return;
            } else {
              
                $upload_data = $this->upload->data();
                $data['image_path'] = $upload_data['file_name'];
            }
        }
        
   
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Utils/AddBlog', $data);
        } else {
           
            $this->load->model('Blog_model');
            if ($this->Blog_model->addblog($data)) {
                
                redirect('Blog', 'refresh');
            } else {
                
                $this->load->view('Utils/AddBlog', ['error_message' => 'Failed to add the blog. Please try again.']);
            }
        }
    }
    
    
    
    
}
