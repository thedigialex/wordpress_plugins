# Global Content Sections Plugin Structure

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
│       └── shortcodes-list.php             # All shortcodes page
└── README.md                               # Documentation
```
