<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function getAllData() {
        $query = $this->db->get('blogdata'); 
        return $query->result();  
    }
    public function getAlltags() {
        $query = $this->db->get('blogcategories'); 
        return $query->result();  
    }
    
    public function get_tags_data($id) {
        $q = $this->db
            ->select('*')
            ->where('blog_id', $id)
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

    public function delete_blog_data($id) {
        $q = $this->db
                ->where('id', $id)
                ->delete('blogdata');
        return ($q) ? TRUE : FALSE;
    }
    
    public function inserttags($data) {
        $data = array(
            'blog_id' => $data['blog_id'],
            'blog_title' =>$data['blog_title'],
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
            'cateogry' => $data['category'],
            'Description' => $data['content'],
            'Updated_date' => $data['Updated_date']
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
            'User_id'=>$data['User_id'],
            'Author_name' => $data['author_name'],
            'Title' => $data['title'],
            'Description' => $data['content'],
            'Created_Date' => $data['Create_Date'],
            'Updated_date' => $data['Updated_date'],
            'Image' => $data['image_path']
        );
        
        $result = $this->db->insert('blogdata', $data);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
          
    }

    
}
?>
