<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

    
    public function getFilteredBlogs($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
        if (!empty($search)) {
            $this->db->group_start(); 
            $this->db->like('author', $search);
            $this->db->or_like('title', $search);
            $this->db->or_like('description', $search);
            $this->db->group_end(); 
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('createddate >=', $start_date);
            $this->db->where('createddate <=', $end_date);
        }
     
        if (!empty($order_by) && !empty($order_dir)) {
            $this->db->order_by($order_by, $order_dir); 
        } else {
            $this->db->order_by('id', 'asc'); 
        }
    
       
        $this->db->limit($length, $start);
    
        
        $query = $this->db->get('pages');
        
       
        return $query->result();
    }
    
    
    public function countAllBlogs() {
        return $this->db->count_all('pages'); 
    }
    
    public function countFilteredBlogs($search, $start_date = null, $end_date = null) {
        if (!empty($search)) {
            $this->db->like('author', $search);
            $this->db->or_like('title', $search);
            $this->db->or_like('description', $search);
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('createddate >=', $start_date);
            $this->db->where('createddate <=', $end_date);
        }
        return $this->db->count_all_results('pages'); 
    }

    public function addblog($data) {
        $data = array(
            'User_id' => $data['User_id'],
            'author' => $data['authorname'],
            'title' => $data['title'],
            'slug' => $data['slug'],
            'description' => $data['content'],
            'createdDate' => $data['Create_Date'],
        );
        
        $result = $this->db->insert('pages', $data);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function get_pages_data($id) {
        $q = $this->db
            ->select('*')
            ->where('id', $id)
            ->get('pages');

        return $q->row_array();  
    }

    public function updatepages($data,$id) {
        $data = array(
            'author' => $data['author'],
            'title' => $data['title'],
            'slug' => $data['slug'],
            'description' => $data['content'],
            'createddate' => $data['Create_Date']
        );
        $this->db->where('id', $id);
        $result = $this->db->update('pages', $data);
        if ($result) {
         return TRUE;
        } else {
            return FALSE;
        }
          
    }
    public function getAlltags() {
        $query = $this->db->get('pages');  // Adjust the table name if needed
        return $query->result_array(); // Return results as an array
    }
    public function getpage($slug) {
        $query = $this->db
        ->select('*')
        ->where('slug',$slug)
        ->from('pages')
        
        ->get();

    return $query->result_array();  
    }
    
    public function delete_pages_data($id) {
        $q = $this->db
                ->where('id', $id)
                ->delete('pages');
        return ($q) ? TRUE : FALSE;
    }
}