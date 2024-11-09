<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function getAllData() {
        $query = $this->db->get('blogdata'); 
        return $query->result();  
    }

    public function get_blog_data($id) {
        $q = $this->db
            ->select('*')
            ->where('id', $id)
            ->get('blogdata');

        return $q->row_array();  
    }

    public function delete_blog_data($id) {
        $q = $this->db
                ->where('id', $id)
                ->delete('blogdata');
        return ($q) ? TRUE : FALSE;
    }

    public function updateblog($data,$id) {
        $data = array(
            'Author_name' => $data['author_name'],
            'Title' => $data['title'],
            'Description' => $data['content'],
            'Updated_date' => $data['Updated_date']
        );
        $this->db->where('id', $id);
        $result = $this->db->update('blogdata', $data);
        if ($result) {
         return TRUE;
        } else {
            return FALSE;
        }
          
    }
}
?>
