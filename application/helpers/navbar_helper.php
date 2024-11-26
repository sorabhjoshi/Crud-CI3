<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
function loadNavbarData() {
    $CI =& get_instance();  
    $CI->load->model('web/Pages_model');  
    $pages = $CI->Pages_model->getAlltags();  
    $CI->load->vars('pages', $pages);  
}
