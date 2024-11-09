<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Web/Blog_model');
        $this->load->library('form_validation');
    }

    public function EditBlog($id) {
        $data['blog'] = $this->Blog_model->get_blog_data($id);
        $this->load->view('Blog/Utils/EditBlog', $data);
    }

    public function DeleteBlog($id) {
        $query = $this->Blog_model->delete_blog_data($id);
        if ($query) {
            redirect(base_url('Blog'));
        }else{
            'Deletion error';
        }
        
    }

    public function UpdateBlog($id) {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Content', '');

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
}
