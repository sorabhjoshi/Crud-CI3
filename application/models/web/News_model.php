<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

    public function getAllData() {
        $query = $this->db->get('newsdata'); 
        return $query->result(); 
    }

    public function edit_news_data($id) {
        $q = $this->db
            ->select('*')
            ->where('id', $id)
            ->get('newsdata');

        return $q->row_array();  
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

    public function addnews($data) {
        
        $news_data = array(
            'author_name' => $data['Author_name'],    
            'title' => $data['title'],
            'description' => $data['description'],
            'created_at' => $data['Create_Date'],
            'updated_at' => $data['updated_at'],
            'image' => $data['image_path'] 
        );
    
        
        return $this->db->insert('newsdata', $news_data);
    }
    


    public function delete_news_data($id) {
        $q = $this->db
                ->where('id', $id)
                ->delete('newsdata');
        return ($q) ? TRUE : FALSE;
    }

}
?>
