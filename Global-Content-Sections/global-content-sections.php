<?php
/**
 * Plugin Name: Global Content Sections
 * Plugin URI: https://thedigialex.com
 * Description: Create reusable content sections that sync across all pages when updated. Perfect for Elementor users who want global content without Pro.
 * Version: 1.0.0
 * Author: TheDigiAlex
 * Author URI: https://thedigialex.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: global-content-sections
 * Domain Path: /languages
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('GCS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('GCS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('GCS_PLUGIN_VERSION', '1.0.0');

/**
 * Main plugin class
 */
class GlobalContentSectionsPlugin {
    
    private static $instance = null;
    
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
        $this->load_dependencies();
        $this->init_hooks();
    }
    
    private function load_dependencies() {
        require_once GCS_PLUGIN_PATH . 'includes/class-global-content-sections.php';
        require_once GCS_PLUGIN_PATH . 'includes/class-post-type.php';
        require_once GCS_PLUGIN_PATH . 'includes/class-shortcode.php';
        require_once GCS_PLUGIN_PATH . 'includes/class-admin.php';
    }
    
    private function init_hooks() {
        add_action('plugins_loaded', array($this, 'init'));
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
    }
    
    public function init() {
        Global_Content_Sections::get_instance();
    }
    
    public function activate() {
        flush_rewrite_rules();
    }
    
    public function deactivate() {
        flush_rewrite_rules();
    }
}

GlobalContentSectionsPlugin::get_instance();