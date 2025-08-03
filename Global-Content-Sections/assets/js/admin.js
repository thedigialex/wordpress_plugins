// assets/js/admin.js
jQuery(document).ready(function($) {
    
    // Copy shortcode functionality
    $('.gcs-copy-shortcode, .gcs-copy-btn').on('click', function(e) {
        e.preventDefault();
        
        var button = $(this);
        var shortcode = button.data('shortcode') || button.prev('input').val();
        
        // Create temporary textarea to copy from
        var temp = $('<textarea>');
        $('body').append(temp);
        temp.val(shortcode).select();
        
        try {
            document.execCommand('copy');
            
            // Show success feedback
            var originalText = button.text();
            button.text('Copied!').addClass('copied');
            
            setTimeout(function() {
                button.text(originalText).removeClass('copied');
            }, 1500);
            
        } catch (err) {
            console.error('Failed to copy shortcode:', err);
            alert('Failed to copy. Please manually select and copy the shortcode.');
        }
        
        temp.remove();
    });
    
    // Auto-select shortcode input on click
    $('.gcs-shortcode-input').on('click', function() {
        this.select();
    });
    
    // Dismiss notices
    $('.notice[data-notice] .notice-dismiss').on('click', function() {
        var notice = $(this).closest('.notice').data('notice');
        
        if (notice) {
            $.post(ajaxurl, {
                action: 'gcs_dismiss_notice',
                notice: notice,
                nonce: gcs_admin.nonce || ''
            });
        }
    });
    
    // Add confirmation for section deletion
    $('.submitdelete').on('click', function(e) {
        if (!confirm('Are you sure you want to delete this global section? This action cannot be undone and will break any pages currently using this section.')) {
            e.preventDefault();
            return false;
        }
    });
    
    // Highlight usage count in posts list
    $('.gcs-usage-count').each(function() {
        var count = parseInt($(this).text());
        if (count > 0) {
            $(this).addClass('has-usage').css({
                'background': '#d4edda',
                'color': '#155724'
            });
        }
    });
    
    // Add tooltips to shortcode inputs
    $('.gcs-shortcode-input').attr('title', 'Click to select all, then copy');
    
    // Keyboard shortcut for copying (Ctrl+C after clicking input)
    $('.gcs-shortcode-input').on('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.keyCode === 67) { // Ctrl+C or Cmd+C
            setTimeout(function() {
                $('.gcs-copy-shortcode, .gcs-copy-btn').first().trigger('click');
            }, 10);
        }
    });
    
});

// ========================================= 

// assets/js/frontend.js
jQuery(document).ready(function($) {
    
    // Add loading class to global sections
    $('.global-content-section').addClass('gcs-loaded');
    
    // Handle responsive images in global sections
    $('.global-content-section img').each(function() {
        var img = $(this);
        
        // Add responsive class if not already present
        if (!img.hasClass('wp-image') && !img.hasClass('responsive')) {
            img.addClass('gcs-responsive-image');
        }
        
        // Ensure images are loaded
        if (this.complete) {
            img.addClass('loaded');
        } else {
            img.on('load', function() {
                $(this).addClass('loaded');
            });
        }
    });
    
    // Fix any content overflow issues
    $('.global-content-section').each(function() {
        var section = $(this);
        var sectionId = section.data('section-id');
        
        // Add section-specific class for targeted CSS
        if (sectionId) {
            section.addClass('gcs-section-' + sectionId);
        }
        
        // Ensure proper spacing
        section.find('> *:first-child').css('margin-top', '0');
        section.find('> *:last-child').css('margin-bottom', '0');
    });
    
    // Handle dynamic content loading (for caching plugins)
    $(document).on('gcs_content_updated', function(e, sectionId) {
        var section = $('.gcs-section-' + sectionId);
        if (section.length) {
            // Reinitialize any scripts that might be needed
            section.trigger('gcs_section_refreshed');
        }
    });
    
    // Debug info for admins (only if user is logged in and can edit posts)
    if (typeof gcs_frontend !== 'undefined' && gcs_frontend.debug === '1') {
        $('.global-content-section').each(function() {
            var section = $(this);
            var sectionId = section.data('section-id');
            
            console.log('Global Content Section loaded:', {
                id: sectionId,
                element: section[0]
            });
        });
    }
    
    // Smooth transitions for content updates
    $('.global-content-section').css({
        'transition': 'opacity 0.3s ease-in-out',
        'opacity': '1'
    });
    
});

// Global function to refresh a specific section (for future use)
window.refreshGlobalSection = function(sectionId) {
    if (!sectionId) return;
    
    jQuery('.gcs-section-' + sectionId).each(function() {
        var section = jQuery(this);
        section.fadeTo(200, 0.5).delay(100).fadeTo(200, 1);
        section.trigger('gcs_section_refreshed');
    });
};