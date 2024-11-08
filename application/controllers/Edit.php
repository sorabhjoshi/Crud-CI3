<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Web/Blog_model');
    }

    public function EditBlog($id) {
        $data['blog'] = $this->Blog_model->get_blog_data($id);
        $this->load->view('Blog/Utils/EditBlog', $data);
    }

    public function UpdateBlog($id) {
        $data = [
            'author_name' => $this->input->post('author_name'),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content')
        ];
        
        if ($this->Blog_model->updateblog($data, $id)) {
            redirect(base_url('Blog'));
        } else {
            redirect(base_url("Edit/EditBlog/$id"));
        }
    }
}
