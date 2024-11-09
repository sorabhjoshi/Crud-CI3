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
        $data = array(
            'Author_name' => $data['Author_name'],
            'title' => $data['title'],
            'description' => $data['description'], 
            'updated_at' => $data['updated_at']
        );
        return $this->db->insert('newsdata', $data);
    }


    public function delete_news_data($id) {
        $q = $this->db
                ->where('id', $id)
                ->delete('newsdata');
        return ($q) ? TRUE : FALSE;
    }

}
?>
