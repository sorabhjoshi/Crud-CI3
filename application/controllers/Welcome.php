<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('web/Users_model');
		$this->load->model('web/Blog_model');
		$this->load->model('web/News_model');
    }
	public function checklogin(){
		if (!$this->session->userdata('id')) {
			redirect('LogoutUser');
		}
	}
	public function Login()
	{
		$this->load->view('Login');
	}
	public function Register()
	{
		$this->load->view('Registration');
	}
	public function dashboard(){
		$this->checklogin() ;
		$this->load->view('Blog/Dashboard');
	}
	public function about(){
		$this->checklogin() ;
		$this->load->view('Blog/About');
	}
	public function contact(){
		$this->checklogin() ;
		$this->load->view('Blog/Contact');
	}

	public function news(){
		$this->checklogin() ;
		$data['users'] = $this->News_model->getAllData();
		$this->load->view('Blog/News', $data);
	}
	public function blog() {
		$this->checklogin() ;
		$data['users'] = $this->Blog_model->getAllData();
		$this->load->view('Blog/Blog', $data);
	}
	public function logout(){
    	$this->session->sess_destroy();
		redirect('LogoutUser');
	}
	public function LogoutUser(){
		$this->load->view('Login');
	}
	
	public function myprofile(){
		$this->checklogin() ;
		$this->load->view('Blog/Myprofile');
	}
	public function updateprofile(){
		$this->checklogin() ;
		$this->load->view('Blog/UpdateProfile');
	}
	public function users(){
		$this->checklogin() ;
		$data['users'] = $this->Users_model->getAllData();
		$this->load->view('Blog/Users', $data);
	}
	
}
