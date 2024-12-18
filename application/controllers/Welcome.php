<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('web/Users_model');
		$this->load->model('web/Blog_model');
		$this->load->model('web/News_model');
		$this->load->model('web/Pages_model');
		$this->load->model('website/Website_model');
		$this->load->model('web/Dashboard_model');
		$this->load->library('form_validation');
    }
	
	public function pageshow($slug) {
		$data['pages'] = $this->Pages_model->getpage($slug); // Fetch page data using the slug
		$this->load->view('Blog_Website/Page', $data); // Load the view and pass the data
	}
	
	public function index() {
		$data['pages'] = $this->Pages_model->getAlltags();
		$this->load->view('Blog_Website/', $data);
	}
	public function checklogin(){
		if (!$this->session->userdata('id')) {
			redirect('LogoutUser');
		}
	}
	
	public function AddPage()
	{$data = [
		'validation_errors' => ''
	];
		$this->load->view('Blog/Utils/AddPage',$data);
	}
	public function AddPageData($userid)
	{
		
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', '');
        
        $data['User_id'] = $userid;
        $data['authorname'] = $this->input->post('author_name');
        $data['title'] = $this->input->post('title');
        $data['slug']=generate_slug( $this->input->post('title'));
        $data['content'] = $this->input->post('content');
        $data['Create_Date'] = date('Y-m-d');
    
        
        if ($this->form_validation->run() == FALSE) {
			
            $this->load->view('Utils/AddPage', $data);
			
            return;
        }
		
        if ($this->Pages_model->addblog($data)) {
			
        redirect( base_url('Pages' ));
        } else {
			
            $this->load->view('Blog/Utils/AddPage', ['error_message' => 'Failed to add the blog. Please try again.']);
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
	
	public function AddCompanyData()
	{ 
		$this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('Company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('Email', 'E-mail', 'required');
        $this->form_validation->set_rules('Companytype', 'Company type', '');
        
        
        $data['Company_name'] = $this->input->post('Company_name');
        $data['Email'] = $this->input->post('Email');
        $data['Companytype'] = $this->input->post('Companytype');

		if ($this->form_validation->run() == FALSE) {
            $this->load->view('Utils/AddBlog', $data);
            return;
        }

        if ($this->Website_model->addcomdata($data)) {
			redirect(base_url('Company'));
        } else {
            $this->load->view('Utils/AddCompany', ['error_message' => 'Failed to add the blog. Please try again.']);
        }
    
	}
	public function AddCompany()
	{ 
		$this->load->view('Blog/Utils/AddCompany');
	}
	public function Categories()
	{ 
		$data['users'] = $this->Blog_model->getAlltags();
		$this->load->view('Blog/Categories',$data);
	}
	public function NewsCategories()
	{ 
		$data['users'] = $this->News_model->getAlltags();
		$this->load->view('Blog/NewsCategories',$data);
	}
	
	public function Company()
	{ 
		
		$this->load->view('Blog/Company');
	}
	public function Pages()
	{ 
		
		$this->load->view('Blog/Pages');
	}
	
	public function dashboard(){
		$this->checklogin() ;
        $data['category'] = $this->Dashboard_model->get_blog_categories();
		$data['users'] = $this->Dashboard_model->get_users_count();
        $data['news'] = $this->Dashboard_model->get_news_count();
        $data['blogs'] = $this->Dashboard_model->get_blogs_count();
		$this->load->view('Blog/Dashboard',$data);
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
	
	public function getpagesData() {
		$this->load->model('web/Pages_model');
		
		
		$search = $this->input->post('search')['value'];
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$draw = $this->input->post('draw');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		
		$order_column = $_POST['order'][0]['column']; 
		$order_dir = $_POST['order'][0]['dir']; 
		
		
		$columns = ['id', 'author', 'title', 'createddate']; 
		$order_by = $columns[$order_column]; 
	
		
		$blogs = $this->Pages_model->getFilteredBlogs($start, $length, $search, $order_by, $order_dir,$start_date,$end_date);
		$totalRecords = $this->Pages_model->countAllBlogs();
		$filteredRecords = $this->Pages_model->countFilteredBlogs($search, $start_date, $end_date);
	
		$counter = $start + 1;
		$data = [];
		foreach ($blogs as $blog) {
			$data[] = [
				$counter++,
				$blog->user_id,
				htmlspecialchars($blog->author),
				htmlspecialchars($blog->title),
				htmlspecialchars($blog->createddate),
				"<a href='" . base_url('Editpages/' . $blog->id) . "' class='edit-btn'>Edit</a>",
				"<a href='" . base_url('Deletepages/' . $blog->id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
			];
		}
		$response = [
			"draw" => intval($draw),
			"recordsTotal" => $totalRecords,
			"recordsFiltered" => $filteredRecords,
			"data" => $data
		];
		echo json_encode($response);
	}
	public function getUsersAjax()
    {
        $this->load->model('Users_model');

        $search = $this->input->post('search')['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $draw = $this->input->post('draw');
        $order_column = $this->input->post('order')[0]['column'];
        $order_dir = $this->input->post('order')[0]['dir'];
        $columns = ['id', 'name', 'email', 'UserType', 'City', 'Phone_no'];

        $order_by = $columns[$order_column];
        $users = $this->Users_model->getFilteredUsers($start, $length, $search, $order_by, $order_dir);

        $totalRecords = $this->Users_model->countAllUsers();
        $filteredRecords = $this->Users_model->countFilteredUsers($search);

        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            "data" => $users
        ];

        echo json_encode($response);
    }
	public function getBlogData() {
		$this->load->model('web/Blog_model');
		
		
		$search = $this->input->post('search')['value'];
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$draw = $this->input->post('draw');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		
		$order_column = $_POST['order'][0]['column']; 
		$order_dir = $_POST['order'][0]['dir']; 
		
		
		$columns = ['id', 'category', 'title', 'created_date', 'updated_date']; 
		$order_by = $columns[$order_column]; 
	
		
		$blogs = $this->Blog_model->getFilteredBlogs($start, $length, $search, $order_by, $order_dir,$start_date,$end_date);
		$totalRecords = $this->Blog_model->countAllBlogs();
		$filteredRecords = $this->Blog_model->countFilteredBlogs($search, $start_date, $end_date);
	
		$counter = $start + 1;
		$data = [];
		foreach ($blogs as $blog) {
			$data[] = [
				$counter++,
				$blog->User_id,
				htmlspecialchars($blog->Author_name),
				htmlspecialchars($blog->Title),
				htmlspecialchars($blog->category),
				htmlspecialchars($blog->Created_date),
				htmlspecialchars($blog->Updated_date),
				"<a href='" . base_url('EditBlog/' . $blog->id) . "' class='edit-btn'>Edit</a>",
				"<a href='" . base_url('DeleteBlog/' . $blog->id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
			];
		}
		$response = [
			"draw" => intval($draw),
			"recordsTotal" => $totalRecords,
			"recordsFiltered" => $filteredRecords,
			"data" => $data
		];
		echo json_encode($response);
	}
	
	public function getNewsData() {
		$this->load->model('web/News_model');
		$search = $this->input->post('search')['value'];
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$draw = $this->input->post('draw');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		
		$orderColumn = $this->input->post('order')[0]['column']; 
		$orderDirection = $this->input->post('order')[0]['dir']; 
	
		$blogs = $this->News_model->getFilterednews($start, $length, $search, $orderColumn, $orderDirection,$start_date,$end_date);
		$totalRecords = $this->News_model->countAllnews();
		$filteredRecords = $this->News_model->countFilterednews($search, $start_date, $end_date);
		$counter = $start + 1;
		$data = [];
	
		foreach ($blogs as $blog) {
			$data[] = [
				$counter++,
				$blog->user_id,
				htmlspecialchars($blog->Author_name),
				htmlspecialchars($blog->title),
				htmlspecialchars($blog->category),
				htmlspecialchars($blog->created_at),
				htmlspecialchars($blog->updated_at),
				"<a href='" . base_url('EditNews/' . $blog->id) . "' class='edit-btn'>Edit</a>",
				"<a href='" . base_url('DeleteNews/' . $blog->id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
			];
		}
	
		$response = [
			"draw" => intval($draw),
			"recordsTotal" => $totalRecords,
			"recordsFiltered" => $filteredRecords,
			"data" => $data
		];
		echo json_encode($response);
	}
	public function saveCompanyAddress()
{
    log_message('error', 'POST Data: ' . print_r($this->input->post(), true));

    $companyid = $this->input->post('company_id');
    $ids = $this->input->post('id');
    $addresses = $this->input->post('Address');
    $latitudes = $this->input->post('Latitude');
    $longitudes = $this->input->post('Longitude');
    $mobiles = $this->input->post('Mobile');

    $data = [];
    for ($i = 0; $i < count($addresses); $i++) {
        $data[] = [
            'companyid' => $companyid,
            'id' => $ids[$i], // Use 'id' only for checking
            'address' => $addresses[$i],
            'lat' => $latitudes[$i],
            'long' => $longitudes[$i],
            'mobile' => $mobiles[$i]
        ];
    }

    try {
        foreach ($data as $row) {
            // Check if the row exists using 'id'
            $this->db->where('id', $row['id']);
            $existing_row = $this->db->get('companyaddress')->row();

            // Remove 'id' from the row before inserting or updating
            unset($row['id']);

            if ($existing_row) {
                // Update the existing row
                $this->db->where('id', $existing_row->id); // Use existing ID
                $this->db->update('companyaddress', $row);
            } else {
                // Insert a new row without 'id'
                $this->db->insert('companyaddress', $row);
            }
        }

        echo json_encode(['status' => 'success', 'message' => 'Data saved successfully']);
    } catch (Exception $e) {
        log_message('error', 'Error saving company address: ' . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to save data.']);
    }
}
public function deleteCompanyAddress()
{
    $address_id = $this->input->post('address_id');

    try {
        // Delete the address by ID
        $this->db->where('id', $address_id);
        $this->db->delete('companyaddress');

        echo json_encode(['status' => 'success', 'message' => 'Address deleted successfully']);
    } catch (Exception $e) {
        log_message('error', 'Error deleting company address: ' . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete address.']);
    }
}










	

	public function getAddressData() {
		$company_id = $this->input->post('company_id');
		$addressData = $this->Website_model->getAddressByCompanyId($company_id);
		if ($addressData) {
			echo json_encode(['status' => 'success', 'data' => $addressData]);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No address data found']);
		}
	}
	
	public function getComData() {
		
		
		
		$search = $this->input->post('search')['value'];
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$draw = $this->input->post('draw');
		
		
		$order_column = $_POST['order'][0]['column']; 
		$order_dir = $_POST['order'][0]['dir']; 
		
		
		$columns = ['id', 'name', 'email', 'type']; 
		$order_by = $columns[$order_column]; 
	
		
		$blogs = $this->Website_model->getFilteredBlogs($start, $length, $search, $order_by, $order_dir);
		$totalRecords = $this->Website_model->countAllBlogs();
		$filteredRecords = $this->Website_model->countFilteredBlogs($search);
	
		$counter = $start + 1;
		$data = [];
		foreach ($blogs as $blog) {
			$data[] = [
				$counter++,
				htmlspecialchars($blog->name),
				htmlspecialchars($blog->email),
				htmlspecialchars($blog->type),
				"<button class='btn btn-primary view-address-btn' data-company-id='" . $blog->id . "'>View Address</button>", 
				"<a href='" . base_url('EditCompany/' . $blog->id) . "' class='edit-btn'>Edit</a>",
				"<a href='" . base_url('DeleteCompany/' . $blog->id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
			];
		}
		$response = [
			"draw" => intval($draw),
			"recordsTotal" => $totalRecords,
			"recordsFiltered" => $filteredRecords,
			"data" => $data
		];
		echo json_encode($response);
	}
	public function getCompanyAddress()
    {
        $company_id = $this->input->post('company_id');
        $data = $this->Website_model->getCompanyAddress($company_id);

        if ($data) {
            echo json_encode(['status' => 'success', 'data' => $data]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No data found']);
        }
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
