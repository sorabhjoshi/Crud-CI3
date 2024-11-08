<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

    public function getAllData() {
        $query = $this->db->get('newsdata'); 
        return $query->result(); 
    }

}
?>
