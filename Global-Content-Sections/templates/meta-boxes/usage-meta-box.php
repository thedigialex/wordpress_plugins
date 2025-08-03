<?php
/**
 * Usage instructions meta box template
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="gcs-usage-instructions">
    <h4><?php _e('How to Use This Global Section:', 'global-content-sections'); ?></h4>
    
    <ol class="gcs-steps">
        <li>
            <strong><?php _e('Edit your content above', 'global-content-sections'); ?></strong>
            <p><?php _e('Add text, images, buttons, or any content you want to reuse.', 'global-content-sections'); ?></p>
        </li>
        
        <li>
            <strong><?php _e('Save/Update this section', 'global-content-sections'); ?></strong>
            <p><?php _e('Make sure to publish the section for it to work.', 'global-content-sections'); ?></p>
        </li>
        
        <li>
            <strong><?php _e('Copy the shortcode', 'global-content-sections'); ?></strong>
            <p><?php _e('Use the shortcode from the box above.', 'global-content-sections'); ?></p>
        </li>
        
        <li>
            <strong><?php _e('Add to Elementor', 'global-content-sections'); ?></strong>
            <p><?php _e('In Elementor, add a "Shortcode" widget and paste the shortcode.', 'global-content-sections'); ?></p>
        </li>
        
        <li>
            <strong><?php _e('Automatic updates', 'global-content-sections'); ?></strong>
            <p><?php _e('When you update this section, all pages using it will update automatically!', 'global-content-sections'); ?></p>
        </li>
    </ol>
    
    <div class="gcs-tip">
        <h4><?php _e('💡 Pro Tip:', 'global-content-sections'); ?></h4>
        <p><?php _e('You can use the same shortcode on multiple pages. Every time you edit this section, all instances will update simultaneously - perfect for headers, footers, contact info, or any content you need to keep consistent across your site.', 'global-content-sections'); ?></p>
    </div>
</div>

<style>
.gcs-usage-instructions {
    font-size: 13px;
}

.gcs-steps {
    margin: 15px 0;
    padding-left: 20px;
}

.gcs-steps li {
    margin-bottom: 12px;
    line-height: 1.4;
}

.gcs-steps li strong {
    display: block;
    margin-bottom: 3px;
    color: #1e1e1e;
}

.gcs-steps li p {
    margin: 0;
    color: #666;
    font-size: 12px;
}

.gcs-tip {
    background: #f0f6fc;
    border: 1px solid #c8e1ff;
    border-radius: 4px;
    padding: 12px;
    margin-top: 15px;
}

.gcs-tip h4 {
    margin: 0 0 8px 0;
    font-size: 13px;
    color: #0073aa;
}

.gcs-tip p {
    margin: 0;
    font-size: 12px;
    line-height: 1.4;
    color: #444;
}
</style>