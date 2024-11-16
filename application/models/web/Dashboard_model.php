<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function get_users_count() {
        return $this->db->count_all('user-data');
    }
    
    public function get_news_count() {
        return $this->db->count_all('newsdata');
    }
    
    public function get_blogs_count() {
        return $this->db->count_all('blogdata');
    }

    public function get_blog_categories() {
        $query = $this->db->query("
            SELECT 
                TRIM(LOWER(category)) AS category, 
                COUNT(*) AS count
            FROM 
                blogdata
            GROUP BY 
                TRIM(LOWER(category))
            ORDER BY 
                category ASC
        ");
        return $query->result_array();
    }
    
    
    
    
}