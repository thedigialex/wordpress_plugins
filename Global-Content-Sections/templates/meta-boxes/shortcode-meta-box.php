<?php
/**
 * Shortcode meta box template
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="gcs-shortcode-meta-box">
    <p><strong><?php _e('Copy this shortcode:', 'global-content-sections'); ?></strong></p>
    
    <div class="gcs-shortcode-wrapper">
        <input 
            type="text" 
            value="[global_section id=&quot;<?php echo $post->ID; ?>&quot;]" 
            readonly 
            class="gcs-shortcode-input"
            onclick="this.select();" 
        />
        <button type="button" class="button button-small gcs-copy-shortcode" data-shortcode="[global_section id=&quot;<?php echo $post->ID; ?>&quot;]">
            <?php _e('Copy', 'global-content-sections'); ?>
        </button>
    </div>
    
    <p class="description">
        <?php _e('Use this shortcode in Elementor\'s Shortcode widget to display this section.', 'global-content-sections'); ?>
    </p>
    
    <?php if ($post->post_status !== 'publish'): ?>
        <div class="gcs-notice gcs-notice-warning">
            <p><strong><?php _e('Note:', 'global-content-sections'); ?></strong> <?php _e('This section must be published before it will display on your pages.', 'global-content-sections'); ?></p>
        </div>
    <?php endif; ?>
</div>

<style>
.gcs-shortcode-wrapper {
    display: flex;
    gap: 5px;
    margin: 10px 0;
}

.gcs-shortcode-input {
    flex: 1;
    font-family: monospace;
    font-size: 12px;
    padding: 5px;
}

.gcs-copy-shortcode {
    flex-shrink: 0;
}

.gcs-notice {
    margin: 10px 0;
    padding: 8px 12px;
    border-left: 4px solid;
    background: #fff;
}

.gcs-notice-warning {
    border-left-color: #ffb900;
    background: #fff8e5;
}
</style>