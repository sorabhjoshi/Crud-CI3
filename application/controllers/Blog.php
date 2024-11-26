<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Web/Blog_model');
        $this->load->model('Web/News_model');
        $this->load->model('website/Website_model');
    }
    
    
    public function categoryview($cat) {  
        $data['tags'] = $this->Blog_model->getAlltags();
        $data['users'] = $this->Website_model->showcategory($cat); 
        $this->load->view('Blog_Website/Category', $data);
    }
    public function Newscategoryview($cat) {  
        $data['newsdata'] = $this->Website_model->showallnews(); 
        $data['tags'] = $this->News_model->getAlltags();
        $data['users'] = $this->Website_model->shownewscategory($cat); 
        $this->load->view('Blog_Website/NewsCategory', $data);
    }
        
    public function Home() {  
    $data['users'] = $this->Website_model->showblogs();
    $data['news'] = $this->Website_model->shownews(); 
    $this->load->view('Blog_Website/Home', $data);
    }

    public function AboutPage() {
        $this->load->view('Blog_Website/About');
    }

    public function NewsArticles() {  
        $data['tags'] = $this->News_model->getAlltags();
        $data['news'] = $this->Website_model->showallnews();
    $this->load->view('Blog_Website/News', $data);
    }
    public function Blogs() {  
        $data['tags'] = $this->Blog_model->getAlltags();
        $data['users'] = $this->Website_model->showallblogs(); 
    $this->load->view('Blog_Website/Blogs', $data);
    }

    public function ContactUS() {  
    $this->load->view('Blog_Website/Contact');
    }
    public function blogview($slug,$id){
        $data['blog'] = $this->Website_model->showoneblog($id); 
        $data['blogdata'] = $this->Website_model->showblogs($id); 
        $this->load->view('Blog_Website/Blogview',$data);
    }
    public function blogviewcat($cat,$slug,$id){
        $data['blog'] = $this->Website_model->showoneblog($id); 
        $data['blogdata'] = $this->Website_model->showblogs($id); 
        $this->load->view('Blog_Website/Blogview',$data);
    }
    public function newsviewcat($cat,$slug,$id){
        $data['news'] = $this->Website_model->showonenews($id); 
        $data['newsdata'] = $this->Website_model->shownewscategory($cat); 
        $this->load->view('Blog_Website/Newsview',$data);
    }
    public function newsview($slug,$id){
        $data['news'] = $this->Website_model->showonenews($id); 
        $data['newsdata'] = $this->Website_model->showallnews(); 
        $this->load->view('Blog_Website/Newsview',$data);
    }
    
}
