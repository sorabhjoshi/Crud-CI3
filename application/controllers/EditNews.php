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
    public function Editnewstags($id) {
        $data['blog'] = $this->News_model->getsinglenewstags($id);

        $this->load->view('Blog/Utils/EditNewsTags', $data);
    } 
    public function AddNewsCategory($id) {
        $data['blog'] = $this->News_model->edit_news_data($id);
        $this->load->view('Blog/Utils/AddNewsTags',$data);
    }
    
    public function AddNewsSeo($id) {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('seotitle', 'SEO Title', 'required');
        $this->form_validation->set_rules('metakeywords', 'Meta Keywords', 'required');
        $this->form_validation->set_rules('metadesc', 'Meta Description', '');

        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('Blog/Utils/AddNewsTags', [
                'blog' => $this->News_model->edit_news_data($id),
                'validation_errors' => validation_errors()
            ]);
            return;
        }
        $news_data = $this->News_model->edit_news_data($id);
        $data = [
            'news_id' => $id,
            'news_title' =>$news_data['title'],
            'seotitle' => $this->input->post('seotitle'),
            'metakeywords' => $this->input->post('metakeywords'),
            'metadesc' => $this->input->post('metadesc')
        ];
        
        if ($this->News_model->addtags($data)) {
            
            redirect(base_url('News'));
        } else {
            
            redirect(base_url("EditNews/$id"));
        }
    }
    public function UpdateNewsSeo($id) {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
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
            'seotitle' => $this->input->post('seotitle'),
            'metakeywords' => $this->input->post('metakeywords'),
            'metadesc' => $this->input->post('metadesc'),
            'Updated_at' => date('Y-m-d H:i:s')
        ];
        
        if ($this->News_model->updatenews($data, $id)) {
            
            redirect(base_url('News'));
        } else {
            
            redirect(base_url("EditNews/$id"));
        }
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
        
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        
        
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', '');  
        $this->form_validation->set_rules('seo_tags', 'SEO Title', 'required');
        $this->form_validation->set_rules('meta_tags', 'Meta Tags', '');
        $this->form_validation->set_rules('meta_desc', 'Meta Description', '');
        
        
        $data = [
            'User_id' => $userid,
            'author_name' => $this->input->post('author_name'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('content'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
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
            $this->load->view('Utils/AddNews', $data);
            return;  
        } else {
            
            $this->load->model('News_model');
            $news_id = $this->News_model->addnews($data);
    
            if ($news_id) {
                
                $tags = [
                    'news_id' => $news_id, 
                    'news_title' => $this->input->post('title'),
                    'seotitle' => $this->input->post('seo_tags'),
                    'metakeywords' => $this->input->post('meta_tags'),
                    'metadesc' => $this->input->post('meta_desc')
                ];
    
                
                if ($this->News_model->addtags($tags)) {
                    $this->session->set_flashdata('success', 'News added successfully!');
                    redirect(base_url('News'));
                } else {
                    $this->session->set_flashdata('error', 'Failed to add SEO tags.');
                    redirect(base_url('AddNews'));
                }
            } else {
                $this->session->set_flashdata('error', 'Failed to add news. Please try again.');
                redirect(base_url('AddNews'));
            }
        }
    }
    
    
    
    
    
    

   
}
