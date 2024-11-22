<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Slug helper function to generate a URL-friendly slug from a title.
 *
 * @param string $string
 * @return string
 */
function generate_slug($string) {
    $slug = strtolower($string);
    $slug = preg_replace('/\s+/', '-', $slug);
    $slug = preg_replace('/[^a-z0-9-]/', '', $slug);
    $slug = rtrim($slug, '-');
    return $slug;
}