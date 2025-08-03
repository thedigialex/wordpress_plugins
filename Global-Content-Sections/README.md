# Global Content Sections

A WordPress plugin that creates reusable, synchronized content sections perfect for Elementor users who need global content without Elementor Pro.

## 🚀 Features

- **True Synchronization**: Edit once, update everywhere automatically
- **Unlimited Sections**: Create as many global sections as you need
- **Elementor Compatible**: Works seamlessly with Elementor's Shortcode widget
- **Universal Compatibility**: Works with any theme or page builder that supports shortcodes
- **User-Friendly Interface**: Clean, intuitive admin interface
- **Performance Optimized**: Lightweight and fast-loading
- **Error Handling**: Helpful error messages for troubleshooting

## 📁 Installation

### Manual Installation

1. Download or clone this repository
2. Upload the `global-content-sections` folder to `/wp-content/plugins/`
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Start creating your global sections!

### File Structure

```
global-content-sections/
├── global-content-sections.php          # Main plugin file
├── includes/
│   ├── class-global-content-sections.php    # Main class
│   ├── class-post-type.php                  # Post type registration
│   ├── class-shortcode.php                  # Shortcode functionality
│   └── class-admin.php                      # Admin interface
├── assets/
│   ├── css/
│   │   ├── admin.css                        # Admin styles
│   │   └── frontend.css                     # Frontend styles
│   └── js/
│       ├── admin.js                         # Admin scripts
│       └── frontend.js                      # Frontend scripts
├── templates/
│   ├── meta-boxes/
│   │   ├── shortcode-meta-box.php          # Shortcode display
│   │   └── usage-meta-box.php              # Usage instructions
│   └── admin/
│       ├── shortcodes-list.php             # All shortcodes page
│       └── help-page.php                   # Help documentation
└── README.md                               # This file
```

## 🎯 How to Use

### Quick Start

1. **Create a Global Section**
   - Go to `Global Sections → Add New Section`
   - Add your content using the WordPress editor
   - Publish the section

2. **Copy the Shortcode**
   - Copy the shortcode from the sidebar (e.g., `[global_section id="123"]`)

3. **Add to Elementor**
   - In Elementor, add a "Shortcode" widget
   - Paste your shortcode
   - The content appears immediately

4. **Update Anywhere**
   - Edit the original Global Section
   - All pages using that shortcode update automatically!

### Shortcode Usage

```
[global_section id="123"]
```

Replace `123` with your actual section ID.

## 💡 Use Cases

- **Contact Information**: Display consistent contact details across multiple pages
- **Special Offers**: Update promotional content site-wide from one location
- **Call-to-Action Buttons**: Maintain consistent messaging across your site
- **Footer Content**: Sync copyright notices and footer links
- **Company Branding**: Keep logos and branding elements consistent
- **Social Media Links**: Update social profiles once, reflect everywhere

## 🔧 Technical Details

### Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- Any theme (Elementor not required, but recommended)

### Hooks and Filters

The plugin provides several hooks for developers:

```php
// Filter wrapper classes
add_filter('gcs_wrapper_classes', function($classes) {
    $classes[] = 'my-custom-class';
    return $classes;
});

// Custom content processing
add_filter('the_content', 'your_custom_function');

// Section refresh event
jQuery(document).on('gcs_section_refreshed', function(e, sectionId) {
    // Your custom code here
});
```

### Caching Compatibility

The plugin works with all major caching plugins:
- WP Rocket
- W3 Total Cache
- WP Super Cache
- LiteSpeed Cache
- Cloudflare

*Note: You may need to clear cache after updating sections.*

## 🛠️ Development

### Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Coding Standards

- Follow WordPress Coding Standards
- Use proper sanitization and escaping
- Include inline documentation
- Write meaningful commit messages

## ❓ FAQ

**Q: Can I use this without Elementor?**
A: Yes! The shortcodes work in any WordPress editor that supports shortcodes.

**Q: What happens if I delete a section that's being used?**
A: The shortcode will show an error to editors and be invisible to visitors.

**Q: Can I include other shortcodes inside sections?**
A: Yes! Global sections support nested shortcodes.

**Q: Is there a limit to section count?**
A: No limit. Create as many as you need.

**Q: Will this slow down my site?**
A: No. The plugin is optimized for performance and adds minimal overhead.

## 🐛 Troubleshooting

### Common Issues

1. **Section Not Showing**
   - Ensure the section is published (not draft)
   - Check that you're using the correct shortcode
   - Verify the shortcode is in a Shortcode widget (in Elementor)

2. **Content Looks Wrong**
   - Check for theme CSS conflicts
   - Inspect element to identify styling issues
   - Clear any caching

3. **Shortcode Shows as Text**
   - Make sure you're using Elementor's "Shortcode" widget
   - Not a Text widget or HTML widget

4. **Changes Not Updating**
   - Clear cache (site cache, browser cache)
   - Check if the section is actually saved/published

## 📝 Changelog

### Version 1.0.0
- Initial release
- Core functionality for global sections
- Elementor integration
- Admin interface
- Help documentation

## 📄 License

GPL v2 or later - https://www.gnu.org/licenses/gpl-2.0.html

## 👨‍💻 Author

Created for WordPress users who need global content functionality without expensive page builder addons.

---

**Need help?** Check the Help page in your WordPress admin (Global Sections → Help) for detailed documentation and troubleshooting guides.