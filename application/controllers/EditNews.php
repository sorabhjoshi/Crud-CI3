<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditNews extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Web/News_model');
        $this->load->library('form_validation');
    }

    public function LoadNewsdata($id) {
         $data['tags'] = $this->News_model->getAlltags();
        $data['blog'] = $this->News_model->edit_news_data($id);
        $this->load->view('Blog/Utils/EditNews', $data);
    }
    public function Editnewstags($id) {
        $data['blog'] = $this->News_model->getsinglenewstags($id);

        $this->load->view('Blog/Utils/EditNewsTags', $data);
    } 
    public function AddNewsCategory() {
        $this->load->view('Blog/Utils/AddNewsTags');
    }
    
    public function AddNewsSeo() {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('Category', 'Category Title', 'required');
        $this->form_validation->set_rules('seotitle', 'SEO Title', 'required');
        $this->form_validation->set_rules('metakeywords', 'Meta Keywords', 'required');
        $this->form_validation->set_rules('metadesc', 'Meta Description', '');

        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('Blog/Utils/AddNewsTags', [
                'validation_errors' => validation_errors()
            ]);
            return;
        }
        
        $data = [
            'category' => $this->input->post('Category'),
            'seotitle' => $this->input->post('seotitle'),
            'metakeywords' => $this->input->post('metakeywords'),
            'metadesc' => $this->input->post('metadesc')
        ];
        
        if ($this->News_model->addtags($data)) {
            redirect(base_url('NewsCategories'));
        } else {
            
            redirect(base_url("Blog_website/AddNewsCategory"));
        }
    }
    public function UpdateNewsSeo($id) {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('Category', 'Category Title', 'required');
        $this->form_validation->set_rules('seotitle', 'SEO Title', 'required');
        $this->form_validation->set_rules('metakeywords', 'Meta Keywords', 'required');
        $this->form_validation->set_rules('metadesc', 'Meta Description', '');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Blog/Utils/EditNewsTags', [
                'blog' => $this->News_model->edit_news_data($id),
                'validation_errors' => validation_errors()
            ]);
            return;
        }
        $data = [
            'categorytitle' => $this->input->post('Category'),
            'seotitle' => $this->input->post('seotitle'),
            'metakeywords' => $this->input->post('metakeywords'),
            'metadesc' => $this->input->post('metadesc')
        ];
        if ($this->News_model->updatenewstags($data, $id)) {
            
            redirect(base_url('NewsCategories'));
        } else {
            
            redirect(base_url("UpdateNewsSeo/$id"));
        }
    }
    public function UpdateNewsdata($id) {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', '');
        $this->form_validation->set_rules('Category', 'Category', 'required');

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
            'slug' => generate_slug( $this->input->post('title')),
            'category' => $this->input->post('Category'),
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
        $data = [
            'tags' => $this->News_model->getAlltags(),
            'validation_errors' => ''
        ];
        $this->load->view('Blog/Utils/AddNews',$data);
    }
    
    public function Deletenewstags($id) {
        if ($this->News_model->delete_newstags_data($id)) {
            redirect(base_url('NewsCategories'));
        } else {
            echo 'Error: Could not delete the blog post.';
        }
    }
    public function AddingNews($userid) {
        
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', '');  
        $this->form_validation->set_rules('Category', 'Category', 'required');
        
        
        $data = [
            'User_id' => $userid,
            'author_name' => $this->input->post('author_name'),
            'title' => $this->input->post('title'),
            'slug' => generate_slug( $this->input->post('title')),
            'description' => $this->input->post('content'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'Category' => $this->input->post('Category'),
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
                $data['image'] = $upload_data['file_name'];
            }
        }
    
       
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Utils/AddNews');
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
    
    
    public function getNewsCat() {
        $start = $_POST['start']; 
        $length = $_POST['length']; 
        $order_column = $_POST['order'][0]['column']; 
        $order_dir = $_POST['order'][0]['dir']; 

        $columns = ['id', 'categorytitle', 'seotitle', 'metakeywords', 'metadesc']; 
        $order_by = $columns[$order_column]; 

        
        $total_rows = $this->db->count_all('newscategories');

        $query = $this->db->select('*')
            ->from('newscategories')
            ->order_by($order_by, $order_dir) 
            ->limit($length, $start) 
            ->get();

       
        $categories = $query->result();

       
        $data = [];
        foreach ($categories as $category) {
            $data[] = [
                $category->id,
                $category->categorytitle,
                $category->seotitle,
                $category->metakeywords,
                $category->metadesc,
                '<a href="' . base_url('EditNewsCategory/' . $category->id) . '" class="edit-btn">Edit</a>',
                '<a href="' . base_url('DeleteNewsCategory/' . $category->id) . '" class="delete-btn" onclick="return confirm(\'Are you sure you want to delete this category?\')">Delete</a>'
            ];
        }

        
        echo json_encode([
            'draw' => $_POST['draw'], 
            'recordsTotal' => $total_rows,
            'recordsFiltered' => $total_rows,
            'data' => $data 
        ]);
	}
    
    

   
}
