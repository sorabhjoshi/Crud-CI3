<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

    public function getAllData() {
        $query = $this->db->get('newsdata'); 
        return $query->result(); 
    }
    public function getAlltags() {
        $query = $this->db->get('newscategories'); 
        return $query->result_array();  
    }
    public function getsinglenewstags($id){
        $q = $this->db
            ->select('*')
            ->where('id', $id)
            ->get('newscategories');

        return $q->row_array();  
    }
    public function edit_news_data($id) {
        $q = $this->db
            ->select('*')
            ->where('id', $id)
            ->get('newsdata');

        return $q->row_array();  
    }
    
    public function addtags($data) {
        $data = array(
            'categorytitle' => $data['category'],
            'seotitle' => $data['seotitle'],
            'metakeywords' => $data['metakeywords'],
            'metadesc' => $data['metadesc']
        );

            $result = $this->db->insert('newscategories', $data);
            return $result ? TRUE : FALSE;
    }
    
    public function updatenews($data,$id) {
        $this->db->where('id', $id);
        $result = $this->db->update('newsdata', $data);
        if ($result) {
         return TRUE;
        } else {
            return FALSE;
        }
          
    }
    
    public function updatenewstags($data,$id) {
        $data = array(
            'seotitle' => $data['seotitle'],
            'categorytitle' => $data['categorytitle'],
            'metakeywords' => $data['metakeywords'],
            'metadesc' => $data['metadesc']
        );
        $this->db->where('id', $id);
        $result = $this->db->update('newscategories', $data);
        if ($result) {
         return TRUE;
        } else {
            return FALSE;
        }
          
    }
    

    public function addnews($data) {
        
        $news_data = array(
            'user_id'=> $data['user_id'],
            'author_name' => $data['Author_name'],    
            'title' => $data['title'],
            'slug' => $data['slug'],
            'category' => $data['Category'],
            'description' => $data['description'],
            'created_at' => $data['Create_Date'],
            'updated_at' => $data['updated_at'],
            'image' => $data['image_path'] 
        );
        $result = $this->db->insert('newsdata', $data);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }
    

    
    public function delete_newstags_data($id) {
        $q = $this->db
                ->where('id', $id)
                ->delete('newscategories');
        return ($q) ? TRUE : FALSE;
    }
    public function delete_news_data($id) {
        $q = $this->db
                ->where('id', $id)
                ->delete('newsdata');
        return ($q) ? TRUE : FALSE;
    }

}
?>
