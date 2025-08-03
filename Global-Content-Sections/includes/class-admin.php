<?php
/**
 * Admin interface and functionality
 */

if (!defined('ABSPATH')) {
    exit;
}

class GCS_Admin {
    
    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_pages'));
        add_filter('manage_global_section_posts_columns', array($this, 'add_custom_columns'));
        add_action('manage_global_section_posts_custom_column', array($this, 'fill_custom_columns'), 10, 2);
        add_action('admin_notices', array($this, 'admin_notices'));
    }
    
    public function add_admin_pages() {
        add_submenu_page(
            'edit.php?post_type=global_section',
            __('Help & Documentation', 'global-content-sections'),
            __('Help', 'global-content-sections'),
            'manage_options',
            'gcs-help',
            array($this, 'help_page')
        );
    }
    
    public function help_page() {
        include GCS_PLUGIN_PATH . 'templates/admin/help-page.php';
    }

    public function add_custom_columns($columns) {
        unset($columns['date']);
        $columns['shortcode'] = __('Shortcode', 'global-content-sections');
        $columns['usage_count'] = __('Usage Count', 'global-content-sections');
        $columns['date'] = __('Date', 'global-content-sections');
        
        return $columns;
    }
    
    public function fill_custom_columns($column, $post_id) {
        switch ($column) {
            case 'shortcode':
                echo '<input type="text" value="[global_section id=&quot;' . $post_id . '&quot;]" readonly onclick="this.select();" style="width: 200px; font-size: 11px;" />';
                break;
                
            case 'usage_count':
                $usage_count = $this->get_section_usage_count($post_id);
                if ($usage_count > 0) {
                    echo '<span class="gcs-usage-count">' . $usage_count . ' ' . _n('page', 'pages', $usage_count, 'global-content-sections') . '</span>';
                } else {
                    echo '<span class="gcs-usage-count gcs-no-usage">' . __('Not used yet', 'global-content-sections') . '</span>';
                }
                break;
        }
    }
    
    private function get_section_usage_count($section_id) {
        global $wpdb;
        
        $shortcode = '[global_section id="' . $section_id . '"]';
        $shortcode_alt = "[global_section id='" . $section_id . "']";
        
        $count = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM {$wpdb->posts} 
             WHERE post_status = 'publish' 
             AND post_type NOT IN ('global_section', 'revision', 'nav_menu_item') 
             AND (post_content LIKE %s OR post_content LIKE %s)",
            '%' . $wpdb->esc_like($shortcode) . '%',
            '%' . $wpdb->esc_like($shortcode_alt) . '%'
        ));
        
        return intval($count);
    }
    
    public function admin_notices() {
        global $post_type, $pagenow;
        
        if ($post_type === 'global_section' && $pagenow === 'edit.php') {
            $dismissed = get_user_meta(get_current_user_id(), 'gcs_welcome_dismissed', true);
            
            if (!$dismissed) {
                echo '<div class="notice notice-info is-dismissible" data-notice="gcs-welcome">';
                echo '<p><strong>' . __('Welcome to Global Content Sections!', 'global-content-sections') . '</strong></p>';
                echo '<p>' . __('Create reusable content sections that automatically sync across all your pages. Perfect for Elementor users who need global content without Pro.', 'global-content-sections') . '</p>';
                echo '<p><a href="' . admin_url('edit.php?post_type=global_section&page=gcs-help') . '" class="button button-secondary">' . __('Learn How to Use', 'global-content-sections') . '</a></p>';
                echo '</div>';
                
                echo '<script>
                jQuery(document).ready(function($) {
                    $(".notice[data-notice=\'gcs-welcome\'] .notice-dismiss").on("click", function() {
                        $.post(ajaxurl, {
                            action: "gcs_dismiss_notice",
                            notice: "welcome",
                            nonce: "' . wp_create_nonce('gcs_dismiss_notice') . '"
                        });
                    });
                });
                </script>';
            }
        }
    }
    
    public function get_all_sections() {
        return get_posts(array(
            'post_type' => 'global_section',
            'posts_per_page' => -1,
            'post_status' => array('publish', 'draft', 'private'),
            'orderby' => 'title',
            'order' => 'ASC'
        ));
    }
    
    public function get_published_sections() {
        return get_posts(array(
            'post_type' => 'global_section',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC'
        ));
    }
}

add_action('wp_ajax_gcs_dismiss_notice', function() {
    check_ajax_referer('gcs_dismiss_notice', 'nonce');
    
    $notice = sanitize_text_field($_POST['notice']);
    
    if ($notice === 'welcome') {
        update_user_meta(get_current_user_id(), 'gcs_welcome_dismissed', true);
    }
    
    wp_die();
});