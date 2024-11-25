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

    public function getFilteredUsers($start, $length, $search = "", $order_by, $order_dir)
    {
        if (!empty($search)) {
            $this->db->like('name', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('City', $search);
        }
    
        
        if (!empty($order_by) && !empty($order_dir)) {
            $this->db->order_by($order_by, $order_dir); 
        } else {
            $this->db->order_by('id', 'asc'); 
        }
        $this->db->limit($length, $start);
        $query = $this->db->get('user-data');
        $users = $query->result_array();
    
        foreach ($users as &$user) {
            $user['edit'] = "<a href='".base_url('EditUser/'.$user['id'])."' class='edit-btn'>Edit</a>";
            $user['delete'] = "<a href='".base_url('DeleteUser/'.$user['id'])."' class='delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>";
        }
    
        return $users;
    }

    
public function countAllUsers()
{
    return $this->db->count_all('user-data');
}

public function countFilteredUsers($search = "")
{
    if (!empty($search)) {
        $this->db->like('name', $search);
        $this->db->or_like('email', $search);
        $this->db->or_like('City', $search);
    }
    $query = $this->db->get('user-data');
    return $query->num_rows();
}

}
?>
