<?php
/**
 * Main Global Content Sections class
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class Global_Content_Sections {
    
    private static $instance = null;
    
    private $post_type;
    
    private $shortcode;
    
    private $admin;
    
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
        $this->init_components();
        $this->init_hooks();
    }
    
    private function init_components() {
        $this->post_type = new GCS_Post_Type();
        $this->shortcode = new GCS_Shortcode();
        $this->admin = new GCS_Admin();
    }
    
    private function init_hooks() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_assets'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
    }
    
    public function enqueue_frontend_assets() {
        wp_enqueue_style(
            'gcs-frontend-style',
            GCS_PLUGIN_URL . 'assets/css/frontend.css',
            array(),
            GCS_PLUGIN_VERSION
        );
        
        wp_enqueue_script(
            'gcs-frontend-script',
            GCS_PLUGIN_URL . 'assets/js/frontend.js',
            array('jquery'),
            GCS_PLUGIN_VERSION,
            true
        );
    }
    
    public function enqueue_admin_assets($hook) {
        global $post_type;
        
        if ($post_type === 'global_section' || strpos($hook, 'global-sections') !== false) {
            wp_enqueue_style(
                'gcs-admin-style',
                GCS_PLUGIN_URL . 'assets/css/admin.css',
                array(),
                GCS_PLUGIN_VERSION
            );
            
            wp_enqueue_script(
                'gcs-admin-script',
                GCS_PLUGIN_URL . 'assets/js/admin.js',
                array('jquery'),
                GCS_PLUGIN_VERSION,
                true
            );
        }
    }
    
    public function get_post_type() {
        return $this->post_type;
    }
    
    public function get_shortcode() {
        return $this->shortcode;
    }
    
    public function get_admin() {
        return $this->admin;
    }
}