<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_model extends CI_Model {

    
    public function showblogs() {
        $query = $this->db->get('blogdata');
        return $query->result_array();
    }

    public function shownews() {
        $query = $this->db->get('newsdata');
        return $query->result_array();
    }
    
    public function showallnews() {
        $query = $this->db->get('newsdata');
        return $query->result_array();
    }

    public function showallblogs() {
        $query = $this->db->get('blogdata');
        return $query->result_array();
    }
    public function showoneblog($id){
        $query = $this->db->where('id', $id)
        ->get('blogdata');
        return $query->row_array();
    }
    
    public function shownewscategory($cat){
        $query = $this->db->where('category', $cat)
        ->get('newsdata');
        return $query->result_array();
    }
    public function showcategory($cat){
        $query = $this->db->where('category', $cat)
        ->get('blogdata');
        return $query->result_array();
    }

    public function showonenews($id){
        $query = $this->db->where('id', $id)
        ->get('newsdata');
        return $query->row_array();
    }
    public function addcomdata($data){
        $data = array(
            'name' => $data['Company_name'],
            'email' => $data['Email'],
            'type' => $data['Companytype'],
           
        );
        
        $result = $this->db->insert('companydata', $data);
        
        if ($result) {
            return true;
        } else {
            return FALSE;
        }
    }
    public function getFilteredBlogs($start, $length, $search, $order_by, $order_dir) {
        
        if (!empty($search)) {
            $this->db->group_start(); 
            $this->db->like('name', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('type', $search);
            $this->db->group_end(); 
        }
        
     
        if (!empty($order_by) && !empty($order_dir)) {
            $this->db->order_by($order_by, $order_dir); 
        } else {
            $this->db->order_by('id', 'asc'); 
        }
    
       
        $this->db->limit($length, $start);
    
        
        $query = $this->db->get('companydata');
        
       
        return $query->result();
    }
    
    
    public function countAllBlogs() {
        return $this->db->count_all('companydata'); 
    }
    
    public function countFilteredBlogs($search, $start_date = null, $end_date = null) {
        if (!empty($search)) {
            $this->db->like('name', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('type', $search);
        }
        
        return $this->db->count_all_results('companydata'); 
    }
    public function getAddressByCompanyId($company_id) {
        // Assuming you have a table `company_addresses` where address data is stored
        $this->db->select('address, lat, long, mobile');
        $this->db->from('companyaddress');
        $this->db->where('companyid', $company_id);
        $query = $this->db->get();

        // Check if data is found
        if ($query->num_rows() > 0) {
            return $query->result_array();  // Return data as an array
        } else {
            return false;  // No data found
        }
    }
    public function get_company_data($id) {
        $q = $this->db
        ->select('*')
        ->where('id', $id)
        ->get('companydata');

    return $q->row_array(); 
    }
    public function getCompanyAddress($company_id)
    {
        $this->db->select('*');
        $this->db->from('companyaddress');
        $this->db->where('company_id', $company_id);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function delete_com_data($id){
        $result = $this->db->where('id', $id)
        ->delete('companydata');
        if ($result) {
            return true;
        } else {
            return FALSE;
        }
    }
    public function insertCompanyAddresses($data)
{
    return $this->db->insert_batch('companyaddress', $data);
}

    public function updatecompany($data,$id){
        $data = array(
            'name' => $data['Company_name'],
            'email' => $data['Email'],
            'type' => $data['Companytype'],
           
        );
        
        $result = $this->db->where('id', $id)
        ->update('companydata', $data);
        if ($result) {
            return true;
        } else {
            return FALSE;
        }
    }
    
}
?>
