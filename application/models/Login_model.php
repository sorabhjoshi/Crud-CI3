<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function login($data) {
     
        $this->db->where('email', $data['email']);
        $query = $this->db->get('user-data');

        if ($query->num_rows() > 0) { 
            
            $user = $query->row_array();
            if ($data['password'] == $user['password']) {
                return $user;  
            }
        }

        return false; 
    }

}
?>
