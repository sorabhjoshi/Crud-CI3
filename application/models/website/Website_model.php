<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_model extends CI_Model {

    
    public function showblogs() {
        $query = $this->db->limit(3)->get('blogdata');
        return $query->result_array();
    }

    public function shownews() {
        $query = $this->db->limit(3)->get('newsdata');
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
}
?>
