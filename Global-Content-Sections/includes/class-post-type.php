<?php
/**
 * Post Type Registration and Management
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class GCS_Post_Type {
    
    public function __construct() {
        add_action('init', array($this, 'register_post_type'));
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('save_post', array($this, 'save_meta_boxes'));
    }
    
    public function register_post_type() {
        $labels = array(
            'name'                  => __('Global Sections', 'global-content-sections'),
            'singular_name'         => __('Global Section', 'global-content-sections'),
            'menu_name'             => __('Global Sections', 'global-content-sections'),
            'name_admin_bar'        => __('Global Section', 'global-content-sections'),
            'add_new'               => __('Add New', 'global-content-sections'),
            'add_new_item'          => __('Add New Global Section', 'global-content-sections'),
            'new_item'              => __('New Global Section', 'global-content-sections'),
            'edit_item'             => __('Edit Global Section', 'global-content-sections'),
            'view_item'             => __('View Global Section', 'global-content-sections'),
            'all_items'             => __('All Global Sections', 'global-content-sections'),
            'search_items'          => __('Search Global Sections', 'global-content-sections'),
            'parent_item_colon'     => __('Parent Global Sections:', 'global-content-sections'),
            'not_found'             => __('No global sections found.', 'global-content-sections'),
            'not_found_in_trash'    => __('No global sections found in Trash.', 'global-content-sections'),
        );
        
        $args = array(
            'labels'                => $labels,
            'description'           => __('Reusable content sections that sync across pages', 'global-content-sections'),
            'public'                => false,
            'publicly_queryable'    => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'query_var'             => false,
            'rewrite'               => false,
            'capability_type'       => 'post',
            'has_archive'           => false,
            'hierarchical'          => false,
            'menu_position'         => 25,
            'menu_icon'             => 'dashicons-admin-page',
            'supports'              => array('title', 'editor', 'revisions'),
            'show_in_rest'          => true, 
        );
        
        register_post_type('global_section', $args);
    }
    
    public function add_meta_boxes() {
        add_meta_box(
            'gcs-shortcode-display',
            __('Shortcode', 'global-content-sections'),
            array($this, 'shortcode_meta_box'),
            'global_section',
            'side',
            'high'
        );
        
        add_meta_box(
            'gcs-usage-instructions',
            __('Usage Instructions', 'global-content-sections'),
            array($this, 'usage_meta_box'),
            'global_section',
            'side',
            'default'
        );
        
        add_meta_box(
            'gcs-section-info',
            __('Section Information', 'global-content-sections'),
            array($this, 'info_meta_box'),
            'global_section',
            'side',
            'low'
        );
    }
    
    public function shortcode_meta_box($post) {
        include GCS_PLUGIN_PATH . 'templates/meta-boxes/shortcode-meta-box.php';
    }
    
    public function usage_meta_box($post) {
        include GCS_PLUGIN_PATH . 'templates/meta-boxes/usage-meta-box.php';
    }
    
    public function info_meta_box($post) {
        $created = get_the_date('F j, Y \a\t g:i a', $post);
        $modified = get_the_modified_date('F j, Y \a\t g:i a', $post);
        $status = get_post_status($post);
        
        echo '<div class="gcs-section-info">';
        echo '<p><strong>' . __('Created:', 'global-content-sections') . '</strong><br>' . $created . '</p>';
        echo '<p><strong>' . __('Last Modified:', 'global-content-sections') . '</strong><br>' . $modified . '</p>';
        echo '<p><strong>' . __('Status:', 'global-content-sections') . '</strong><br>' . ucfirst($status) . '</p>';
        echo '</div>';
    }
    
    public function save_meta_boxes($post_id) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
        
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        
        if (get_post_type($post_id) !== 'global_section') {
            return;
        }
    }
}