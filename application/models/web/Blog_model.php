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
    

    
}
?>
