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
    
    public function edit_users_data($id) {
        $q = $this->db
            ->select('*')
            ->where('id', $id)
            ->get('user-data');

        return $q->row_array();  
    }
    
    public function update_user($data,$id) {
        $this->db->where('id', $id);
        $result = $this->db->update('user-data', $data);
        if ($result) {
         return TRUE;
        } else {
            return FALSE;
        }
          
    }

    public function delete_user_data($id) {
        $q = $this->db
                ->where('id', $id)
                ->delete('user-data');
        return ($q) ? TRUE : FALSE;
    }
}
?>
