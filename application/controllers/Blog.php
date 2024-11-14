<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('website/Website_model'); // Loading the model
    }

    public function Home() {  
        $data['users'] = $this->Website_model->showblogs();
    $data['news'] = $this->Website_model->shownews();  // Combine blog data and news data into $data array
    $this->load->view('Blog_Website/Home', $data);
    }

    public function AboutPage() {
        $this->load->view('Blog_Website/About');
    }

    public function NewsArticles() {  
        $data['news'] = $this->Website_model->showallnews(); // Combine blog data and news data into $data array
    $this->load->view('Blog_Website/News', $data);
    }
    public function Blogs() {  
        $data['users'] = $this->Website_model->showallblogs(); // Combine blog data and news data into $data array
    $this->load->view('Blog_Website/Blogs', $data);
    }

    public function ContactUS() {  
        // Combine blog data and news data into $data array
    $this->load->view('Blog_Website/Contact');
    }
    
    
}
