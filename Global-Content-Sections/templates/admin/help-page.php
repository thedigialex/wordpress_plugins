<?php
/**
 * Help page template
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="wrap gcs-help-page">
    <h1><?php _e('Global Content Sections - Help & Documentation', 'global-content-sections'); ?></h1>
    
    <div class="gcs-help-content">
        
        <div class="gcs-help-section">
            <h2><?php _e('🚀 Quick Start Guide', 'global-content-sections'); ?></h2>
            <div class="gcs-steps-container">
                <div class="gcs-step">
                    <div class="gcs-step-number">1</div>
                    <div class="gcs-step-content">
                        <h3><?php _e('Create a Global Section', 'global-content-sections'); ?></h3>
                        <p><?php _e('Go to Global Sections → Add New Section. Add your content using the WordPress editor - text, images, buttons, anything you want to reuse across your site.', 'global-content-sections'); ?></p>
                    </div>
                </div>
                
                <div class="gcs-step">
                    <div class="gcs-step-number">2</div>
                    <div class="gcs-step-content">
                        <h3><?php _e('Publish & Copy Shortcode', 'global-content-sections'); ?></h3>
                        <p><?php _e('Publish your section and copy the shortcode from the sidebar (looks like [global_section id="123"]).', 'global-content-sections'); ?></p>
                    </div>
                </div>
                
                <div class="gcs-step">
                    <div class="gcs-step-number">3</div>
                    <div class="gcs-step-content">
                        <h3><?php _e('Add to Elementor', 'global-content-sections'); ?></h3>
                        <p><?php _e('In Elementor, add a "Shortcode" widget to your page and paste the shortcode. The content will appear immediately.', 'global-content-sections'); ?></p>
                    </div>
                </div>
                
                <div class="gcs-step">
                    <div class="gcs-step-number">4</div>
                    <div class="gcs-step-content">
                        <h3><?php _e('Edit Once, Update Everywhere', 'global-content-sections'); ?></h3>
                        <p><?php _e('When you need to make changes, just edit the original Global Section. All pages using that shortcode will update automatically!', 'global-content-sections'); ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="gcs-help-grid">
            <div class="gcs-help-card">
                <h3><?php _e('💡 Best Practices', 'global-content-sections'); ?></h3>
                <ul>
                    <li><?php _e('Use descriptive names for your sections (e.g., "Header Contact Info", "Footer Copyright")', 'global-content-sections'); ?></li>
                    <li><?php _e('Keep sections focused - one purpose per section works best', 'global-content-sections'); ?></li>
                    <li><?php _e('Test sections on different devices to ensure responsive design', 'global-content-sections'); ?></li>
                    <li><?php _e('Use the "All Shortcodes" page to manage all your sections in one place', 'global-content-sections'); ?></li>
                </ul>
            </div>
            
            <div class="gcs-help-card">
                <h3><?php _e('🔧 Troubleshooting', 'global-content-sections'); ?></h3>
                <ul>
                    <li><strong><?php _e('Section not showing:', 'global-content-sections'); ?></strong> <?php _e('Make sure the section is published, not just saved as draft.', 'global-content-sections'); ?></li>
                    <li><strong><?php _e('Content looks wrong:', 'global-content-sections'); ?></strong> <?php _e('Check if your theme or Elementor has conflicting CSS styles.', 'global-content-sections'); ?></li>
                    <li><strong><?php _e('Shortcode shows as text:', 'global-content-sections'); ?></strong> <?php _e('Make sure you are using Elementor\'s "Shortcode" widget, not a text widget.', 'global-content-sections'); ?></li>
                    <li><strong><?php _e('Changes not updating:', 'global-content-sections'); ?></strong> <?php _e('Clear any caching plugins and refresh the page.', 'global-content-sections'); ?></li>
                </ul>
            </div>
            
            <div class="gcs-help-card">
                <h3><?php _e('📋 Common Use Cases', 'global-content-sections'); ?></h3>
                <ul>
                    <li><?php _e('Contact information that appears on multiple pages', 'global-content-sections'); ?></li>
                    <li><?php _e('Special offers or announcements', 'global-content-sections'); ?></li>
                    <li><?php _e('Company logos and branding elements', 'global-content-sections'); ?></li>
                    <li><?php _e('Call-to-action buttons with consistent messaging', 'global-content-sections'); ?></li>
                    <li><?php _e('Footer content and copyright notices', 'global-content-sections'); ?></li>
                    <li><?php _e('Social media links and icons', 'global-content-sections'); ?></li>
                </ul>
            </div>
            
            <div class="gcs-help-card">
                <h3><?php _e('⚡ Pro Tips', 'global-content-sections'); ?></h3>
                <ul>
                    <li><?php _e('You can use the same shortcode multiple times on the same page', 'global-content-sections'); ?></li>
                    <li><?php _e('Global sections work with any WordPress theme, not just Elementor', 'global-content-sections'); ?></li>
                    <li><?php _e('Use WordPress\' revision system to track changes to your sections', 'global-content-sections'); ?></li>
                    <li><?php _e('Create a "staging" section to test changes before updating the live version', 'global-content-sections'); ?></li>
                </ul>
            </div>
        </div>
        
        <div class="gcs-help-section">
            <h2><?php _e('📝 Frequently Asked Questions', 'global-content-sections'); ?></h2>
            
            <div class="gcs-faq">
                <div class="gcs-faq-item">
                    <h4><?php _e('Q: Can I use these sections outside of Elementor?', 'global-content-sections'); ?></h4>
                    <p><?php _e('A: Yes! The shortcodes work in any WordPress page, post, or widget that supports shortcodes. You can use them in the classic editor, Gutenberg blocks, or other page builders.', 'global-content-sections'); ?></p>
                </div>
                
                <div class="gcs-faq-item">
                    <h4><?php _e('Q: What happens if I delete a global section that is being used?', 'global-content-sections'); ?></h4>
                    <p><?php _e('A: The shortcode will display an error message to logged-in users who can edit posts, and will be invisible to regular visitors. Make sure to remove the shortcodes from your pages before deleting sections.', 'global-content-sections'); ?></p>
                </div>
                
                <div class="gcs-faq-item">
                    <h4><?php _e('Q: Can I include other shortcodes inside a global section?', 'global-content-sections'); ?></h4>
                    <p><?php _e('A: Yes! Global sections support nested shortcodes. You can include contact forms, galleries, or any other shortcodes within your global sections.', 'global-content-sections'); ?></p>
                </div>
                
                <div class="gcs-faq-item">
                    <h4><?php _e('Q: Will this work with caching plugins?', 'global-content-sections'); ?></h4>
                    <p><?php _e('A: Yes, but you may need to clear your cache after updating a global section to see changes immediately. Most caching plugins will automatically update within a few minutes.', 'global-content-sections'); ?></p>
                </div>
                
                <div class="gcs-faq-item">
                    <h4><?php _e('Q: Is there a limit to how many global sections I can create?', 'global-content-sections'); ?></h4>
                    <p><?php _e('A: No limit! Create as many global sections as you need. The plugin is designed to handle dozens or even hundreds of sections efficiently.', 'global-content-sections'); ?></p>
                </div>
            </div>
        </div>
        
    </div>
</div>

<style>
.gcs-help-page {
    max-width: 1000px;
}

.gcs-help-content {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    margin-top: 20px;
}

.gcs-help-section {
    margin-bottom: 40px;
}

.gcs-help-section h2 {
    color: #1e1e1e;
    border-bottom: 2px solid #0073aa;
    padding-bottom: 10px;
    margin-bottom: 25px;
}

.gcs-steps-container {
    display: grid;
    gap: 20px;
    margin: 30px 0;
}

.gcs-step {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 6px;
    border-left: 4px solid #0073aa;
}

.gcs-step-number {
    flex-shrink: 0;
    width: 30px;
    height: 30px;
    background: #0073aa;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 14px;
}

.gcs-step-content h3 {
    margin: 0 0 8px 0;
    color: #1e1e1e;
}

.gcs-step-content p {
    margin: 0;
    color: #555;
    line-height: 1.5;
}

.gcs-help-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.gcs-help-card {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 6px;
    border: 1px solid #e1e5e9;
}

.gcs-help-card h3 {
    margin-top: 0;
    color: #1e1e1e;
}

.gcs-help-card ul {
    margin: 0;
    padding-left: 20px;
}

.gcs-help-card li {
    margin-bottom: 8px;
    line-height: 1.4;
}

.gcs-faq {
    margin: 20px 0;
}

.gcs-faq-item {
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.gcs-faq-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.gcs-faq-item h4 {
    margin: 0 0 10px 0;
    color: #0073aa;
    font-size: 16px;
}

.gcs-faq-item p {
    margin: 0;
    color: #555;
    line-height: 1.5;
}

.gcs-support-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 30px;
    border-radius: 8px;
    margin-top: 40px;
}

.gcs-support-section h2 {
    color: white;
    border-bottom-color: rgba(255,255,255,0.3);
}

@media (max-width: 768px) {
    .gcs-help-content {
        padding: 20px;
    }
    
    .gcs-step {
        flex-direction: column;
        text-align: center;
    }
    
    .gcs-help-grid,
    .gcs-support-grid {
        grid-template-columns: 1fr;
    }
}
</style>