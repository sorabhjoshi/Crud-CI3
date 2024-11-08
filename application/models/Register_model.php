<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

    
    public function register($data) {
        

        
        $data = array(
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password']
        );

        
        return $this->db->insert('user-data', $data);
    }

    
    
    
}
?>