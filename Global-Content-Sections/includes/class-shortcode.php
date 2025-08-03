<?php
/**
 * Shortcode functionality
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class GCS_Shortcode {
    
    public function __construct() {
        add_shortcode('global_section', array($this, 'render_shortcode'));
    }
    
    public function render_shortcode($atts) {
        $atts = shortcode_atts(array(
            'id' => 0
        ), $atts, 'global_section');
        
        $section_id = intval($atts['id']);
        
        if ($section_id <= 0) {
            return $this->render_error(__('Invalid section ID provided.', 'global-content-sections'));
        }
        
        $section = get_post($section_id);
        
        if (!$section || $section->post_type !== 'global_section') {
            return $this->render_error(__('Global section not found.', 'global-content-sections'));
        }
        
        if ($section->post_status !== 'publish') {
            return $this->render_error(__('Global section is not published.', 'global-content-sections'));
        }
        
        $content = $this->process_content($section->post_content);
        
        return $this->wrap_content($content, $section_id);
    }
    
    private function process_content($content) {
        $content = apply_filters('the_content', $content);
        
        $content = $this->clean_content($content);
        
        return $content;
    }
    
    private function clean_content($content) {
        $content = preg_replace('/<p[^>]*><\\/p[^>]*>/', '', $content);
        
        $content = preg_replace('/\n\s*\n/', "\n", $content);
        
        return trim($content);
    }
    
    private function wrap_content($content, $section_id) {
        $wrapper_classes = apply_filters('gcs_wrapper_classes', array(
            'global-content-section',
            'gcs-section-' . $section_id
        ));
        
        $class_string = implode(' ', $wrapper_classes);
        
        $wrapper = '<div class="' . esc_attr($class_string) . '" data-section-id="' . esc_attr($section_id) . '">';
        $wrapper .= $content;
        $wrapper .= '</div>';
        
        return $wrapper;
    }
    
    private function render_error($message) {
        if (!current_user_can('edit_posts')) {
            return '<!-- Global Content Section Error: ' . esc_html($message) . ' -->';
        }
        
        return '<div class="gcs-error" style="background: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 4px; margin: 10px 0;">' . 
               '<strong>' . __('Global Content Section Error:', 'global-content-sections') . '</strong> ' . 
               esc_html($message) . 
               '</div>';
    }
    
    public function get_section($section_id) {
        return get_post($section_id);
    }
    
    public function is_valid_section($section_id) {
        $section = $this->get_section($section_id);
        return $section && $section->post_type === 'global_section' && $section->post_status === 'publish';
    }
}