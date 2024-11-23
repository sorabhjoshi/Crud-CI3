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
    public function getFilterednews($start, $length, $search, $orderColumn, $orderDirection) {
        if (!empty($search)) {
            $this->db->like('Author_name', $search);
            $this->db->or_like('title', $search);
            $this->db->or_like('category', $search);
        }
    
        // Handle ordering
        switch ($orderColumn) {
            case 0:
                $this->db->order_by('id', $orderDirection); 
                break;
            case 1:
                $this->db->order_by('user_id', $orderDirection);
                break;
            case 2:
                $this->db->order_by('Author_name', $orderDirection);
                break;
            case 3:
                $this->db->order_by('title', $orderDirection);
                break;
            case 4:
                $this->db->order_by('category', $orderDirection);
                break;
            case 5:
                $this->db->order_by('created_at', $orderDirection);
                break;
            case 6:
                $this->db->order_by('updated_at', $orderDirection);
                break;
        }
    
        $this->db->limit($length, $start);
        $query = $this->db->get('newsdata');
        return $query->result();
    }
    
    
    public function countAllnews() {
        return $this->db->count_all('newsdata'); 
    }
    
    public function countFilterednews($search) {
        if (!empty($search)) {
            $this->db->like('Author_name', $search);
            $this->db->or_like('title', $search);
            $this->db->or_like('category', $search);
        }
        return $this->db->count_all_results('newsdata'); // Replace 'blogdata' with your actual table name
    }






    public function getFilterednewscat($start, $length, $search) {
        if (!empty($search)) {
            $this->db->like('categorytitle', $search);
            $this->db->or_like('seotitle', $search);
            $this->db->or_like('metakeywords', $search);
        }
        $this->db->limit($length, $start);
        $query = $this->db->get('newscategories'); // Replace 'blogdata' with your actual table name
        return $query->result();
    }
    
    public function countAllnewscat() {
        return $this->db->count_all('newscategories'); // Replace 'blogdata' with your actual table name
    }
    
    public function countFilterednewscat($search) {
        if (!empty($search)) {
            $this->db->like('categorytitle', $search);
            $this->db->or_like('seotitle', $search);
            $this->db->or_like('metakeywords', $search);
        }
        return $this->db->count_all_results('newscategories'); // Replace 'blogdata' with your actual table name
    }
}
?>
