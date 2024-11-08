<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function getAllData() {
        $query = $this->db->get('user-data'); 
        return $query->result(); 
    }

    public function getuserdata() {
        $query = $this->db->get('user-data'); 
        return $query->result(); 
    }

}
?>
