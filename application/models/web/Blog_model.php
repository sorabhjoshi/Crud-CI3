<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function getAllData() {
        $query = $this->db->get('blogdata'); 
        return $query->result();  
    }
    public function getAlltags() {
        $query = $this->db->get('blogcategories'); 
        return $query->result_array();  
    }

    public function getFilteredBlogs($start, $length, $search, $order_by, $order_dir) {
        // Apply search filter if provided
        if (!empty($search)) {
            $this->db->group_start(); // Start a group for OR conditions
            $this->db->like('Author_name', $search);
            $this->db->or_like('Title', $search);
            $this->db->or_like('category', $search);
            $this->db->group_end(); // End the group
        }
    
        // Apply sorting if provided
        if (!empty($order_by) && !empty($order_dir)) {
            $this->db->order_by($order_by, $order_dir); // Apply order by column and direction
        } else {
            $this->db->order_by('id', 'asc'); // Default ordering by 'id' if not specified
        }
    
        // Apply pagination (limit and offset)
        $this->db->limit($length, $start);
    
        // Fetch data from the database (replace 'blogdata' with your actual table name)
        $query = $this->db->get('blogdata');
        
        // Return the result as an array of objects
        return $query->result();
    }
    
    
    public function countAllBlogs() {
        return $this->db->count_all('blogdata'); // Replace 'blogdata' with your actual table name
    }
    
    public function countFilteredBlogs($search) {
        if (!empty($search)) {
            $this->db->like('Author_name', $search);
            $this->db->or_like('Title', $search);
            $this->db->or_like('category', $search);
        }
        return $this->db->count_all_results('blogdata'); // Replace 'blogdata' with your actual table name
    }
    
    
    public function get_tags_data($id) {
        $q = $this->db
            ->select('*')
            ->where('id', $id)
            ->get('blogcategories');

        return $q->row_array();  
    }
    public function get_blog_data($id) {
        $q = $this->db
            ->select('*')
            ->where('id', $id)
            ->get('blogdata');

        return $q->row_array();  
    }
    
    public function delete_tags_data($id) {
        $q = $this->db
                ->where('id', $id)
                ->delete('blogcategories');
        return ($q) ? TRUE : FALSE;
    }
    public function delete_blog_data($id) {
        $q = $this->db
                ->where('id', $id)
                ->delete('blogdata');
        return ($q) ? TRUE : FALSE;
    }
    
    
    public function updatetags($data,$id) {
        $data = array(
            'categorytitle' => $data['category'],
            'seotitle' => $data['seotags'],
            'metakeywords' => $data['metatags'],
            'metadesc' => $data['metadesc']
        );
    
        $this->db->where('id', $id);
        $result = $this->db->update('blogcategories', $data);
        return $result ? TRUE : FALSE;
        
    }
    
    public function inserttags($data) {
        $data = array(
            'categorytitle' => $data['category'],
            'seotitle' => $data['seotags'],
            'metakeywords' => $data['metatags'],
            'metadesc' => $data['metadesc']
        );
        $result = $this->db->insert('blogcategories', $data);
        if ($result) {
         return TRUE;
        } else {
            return FALSE;
        }
          
    }
    public function updateblog($data,$id) {
        $data = array(
            'Author_name' => $data['author_name'],
            'Title' => $data['title'],
            'slug' => $data['slug'],
            'Description' => $data['content'],
            'Updated_date' => $data['Updated_date'],
            'category' => $data['category']
        );
        $this->db->where('id', $id);
        $result = $this->db->update('blogdata', $data);
        if ($result) {
         return TRUE;
        } else {
            return FALSE;
        }
          
    }

    public function addblog($data) {
        $data = array(
            'User_id' => $data['User_id'],
            'Author_name' => $data['author_name'],
            'Title' => $data['title'],
            'slug' => $data['slug'],
            'Description' => $data['content'],
            'Created_Date' => $data['Create_Date'],
            'Updated_date' => $data['Updated_date'],
            'Image' => $data['image_path']
        );
        
        $result = $this->db->insert('blogdata', $data);
        
        if ($result) {
            // Get the last inserted ID
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }
    

    public function getFilteredblogcat($start, $length, $search, $orderBy, $orderDirection) {
        $this->db->select('*');
        $this->db->from('blogcategories');
        
        // Apply search filter if provided
        if (!empty($search)) {
            $this->db->like('categorytitle', $search);
            $this->db->or_like('seotitle', $search);
            $this->db->or_like('metakeywords', $search);
            $this->db->or_like('metadesc', $search);
        }
        
        // Apply ordering based on the DataTable request
        $this->db->order_by($orderBy, $orderDirection);
        
        // Apply pagination
        $this->db->limit($length, $start);
        
        $query = $this->db->get();
        return $query->result(); // Return the result as an array of objects
    }
    
    public function countAllblogcat() {
        return $this->db->count_all('blogcategories'); // Replace 'blogdata' with your actual table name
    }
    
    public function countFilteredblogcat($search) {
        if (!empty($search)) {
            $this->db->like('categorytitle', $search);
            $this->db->or_like('seotitle', $search);
            $this->db->or_like('metakeywords', $search);
        }
        return $this->db->count_all_results('blogcategories'); // Replace 'blogdata' with your actual table name
    }
}
?>
