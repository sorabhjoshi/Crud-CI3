<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Web/Blog_model');
        $this->load->library('form_validation');
    }
    public function Edittags($id) {
        $data = [
            'blog' => $this->Blog_model->get_tags_data($id),
            'validation_errors' => ''
        ];
        $this->load->view('Blog/Utils/Edittags', $data);
    }
    public function EditBlog($id) {
        $data = [
            'tags' => $this->Blog_model->getAlltags(),
            'blog' => $this->Blog_model->get_blog_data($id),
            'validation_errors' => ''
        ];
        $this->load->view('Blog/Utils/EditBlog', $data);
    }
    public function Deletetags($id) {
        if ($this->Blog_model->delete_tags_data($id)) {
            redirect(base_url('Categories'));
        } else {
            echo 'Error: Could not delete the blog post.';
        }
    }
    public function DeleteBlog($id) {
        if ($this->Blog_model->delete_blog_data($id)) {
            redirect(base_url('Blog'));
        } else {
            echo 'Error: Could not delete the blog post.';
        }
    }
    public function Updatecategory($id) {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('Category', 'Category Title', 'required');
        $this->form_validation->set_rules('seo_tags', 'SEO Title', 'required');
        $this->form_validation->set_rules('meta_tags', 'Meta Keywords', 'required');
        $this->form_validation->set_rules('content', 'Meta Description', '');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Blog/Utils/Edittags', [
                'blog' => $this->Blog_model->get_tags_data($id),
                'validation_errors' => validation_errors()
            ]);
            return;
        }

        $data = [
            'category' => $this->input->post('Category'),
            'seotags' => $this->input->post('seo_tags'),
            'metatags' => $this->input->post('meta_tags'),
            'metadesc' => $this->input->post('content')
        ];
        
        
        if ($this->Blog_model->updatetags($data,$id)) {
            redirect(base_url('Categories'));
        } else {
            redirect(base_url("Edit/Edittags/$id"));
        }
    }
    public function Addcategorydata() {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('Category', 'Category Title', 'required');
        $this->form_validation->set_rules('seo_tags', 'SEO Title', 'required');
        $this->form_validation->set_rules('meta_tags', 'Meta Keywords', 'required');
        $this->form_validation->set_rules('content', 'Meta Description', '');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Addcategory');
            return;
        }

        $data = [
            'category' => $this->input->post('Category'),
            'seotags' => $this->input->post('seo_tags'),
            'metatags' => $this->input->post('meta_tags'),
            'metadesc' => $this->input->post('content')
        ];
        
        
        if ($this->Blog_model->inserttags($data)) {
            redirect(base_url('Categories'));
        } else {
            redirect(base_url('Addcategory'));
        }
    }
    public function UpdateBlog($id) {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', '');
        $this->form_validation->set_rules('category', 'Category', '');
        

        $data['author_name'] = $this->input->post('author_name');
        $data['title'] = $this->input->post('title');
        $data['slug']=generate_slug( $this->input->post('title'));
        $data['content'] = $this->input->post('content');
        $data['category'] = $this->input->post('category');
        $data['Updated_date'] = date('Y-m-d H:i:s');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Blog/Utils/EditBlog', [
                'blog' => $this->Blog_model->get_blog_data($id),
                'validation_errors' => validation_errors()
            ]);
            return;
        }
        
        if ($this->Blog_model->updateblog($data, $id)) {

            redirect(base_url('Blog'));
        } else {
            redirect(base_url("Edit/EditBlog/$id"));
        }
    }
    public function AddBlog(){
        $data = [
            'tags' => $this->Blog_model->getAlltags(),
            'validation_errors' => ''
        ];
        $this->load->view('Blog/Utils/AddBlog',$data);
    }
    public function Addcategory(){
        $this->load->view('Blog/Utils/AddCat');
    }
    public function AddBlogData($userid) {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', '');
        $this->form_validation->set_rules('category', 'Category', '');
        
        $data['User_id'] = $userid;
        $data['author_name'] = $this->input->post('author_name');
        $data['title'] = $this->input->post('title');
        $data['slug']=generate_slug( $this->input->post('title'));
        $data['content'] = $this->input->post('content');
        $data['category'] = $this->input->post('category');
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
            return;
        }
    
        $this->load->model('Blog_model');
        if ($this->Blog_model->addblog($data)) {
            $data['users'] = $this->Blog_model->getAllData();
            $this->load->view('Blog/Blog',$data);
        } else {
            $this->load->view('Utils/AddBlog', ['error_message' => 'Failed to add the blog. Please try again.']);
        }
    }
    public function getblogCat() {
        $this->load->model('web/Blog_model');
        
        // Get search, pagination, and sorting parameters from the DataTable request
        $search = $this->input->post('search')['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $draw = $this->input->post('draw');
        
        // Sorting parameters from DataTable
        $orderColumnIndex = $this->input->post('order')[0]['column']; // The index of the column to sort by
        $orderDirection = $this->input->post('order')[0]['dir']; // Sorting direction (asc or desc)
        
        // Define your column names for sorting
        $columns = ['id', 'categorytitle', 'seotitle', 'metakeywords', 'metadesc'];
        
        // Determine the column name to order by
        $orderBy = $columns[$orderColumnIndex];
        
        // Fetch filtered data with pagination, search, and sorting
        $blogs = $this->Blog_model->getFilteredblogcat($start, $length, $search, $orderBy, $orderDirection);
        
        // Get the total number of records (without filtering)
        $totalRecords = $this->Blog_model->countAllblogcat();
        
        // Get the filtered records count (with the applied search filter)
        $filteredRecords = $this->Blog_model->countFilteredblogcat($search);
        
        $counter = $start + 1;  // Start the counter from the correct number for the current page
        $data = [];
        
        foreach ($blogs as $blog) {
            $data[] = [
                $counter++,  // Increment the counter for each row
                $blog->categorytitle,
                $blog->seotitle,
                $blog->metakeywords,
                $blog->metadesc,
                "<a href='" . base_url('Edittags/' . $blog->id) . "' class='edit-btn'>Edit</a>",
                "<a href='" . base_url('Deletetags/' . $blog->id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
            ];
        }
        
        // Prepare the response in the format required by DataTables
        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            "data" => $data
        ];
        
        // Return the response as a JSON object
        echo json_encode($response);
    }
    
    
    
    
    
    
}
