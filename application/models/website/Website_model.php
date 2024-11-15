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

    public function showonenews($id){
        $query = $this->db->where('id', $id)
        ->get('newsdata');
        return $query->row_array();
    }
    
}
?>
