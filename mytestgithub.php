<?php
/**
 * Plugin Name: My GitHub Connected Plugin
 * Description: WordPress plugin with GitHub integration
 * Version: 1.0.0
 * Author: Your Name
 * GitHub Plugin URI: https://github.com/yourusername/your-plugin-repo
 */

// This special comment above enables GitHub Updater integration

// Plugin code here
function my_github_plugin_init() {
    // Your plugin initialization code
}
add_action('plugins_loaded', 'my_github_plugin_init');

// Add a settings page to show GitHub connection status
function my_github_plugin_menu() {
    add_options_page(
        'GitHub Plugin Settings',
        'GitHub Plugin',
        'manage_options',
        'github-plugin-settings',
        'my_github_plugin_settings_page'
    );
}
add_action('admin_menu', 'my_github_plugin_menu');

function my_github_plugin_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <div class="card">
            <h2>GitHub Connection Status</h2>
            <p>This plugin is connected to GitHub repository: 
               <code>https://github.com/yourusername/your-plugin-repo</code></p>
            <p>Last updated: <?php echo date('F j, Y, g:i a'); ?></p>
        </div>
    </div>
    <?php
}

// Hook for automatic updates if using GitHub Updater plugin
function my_github_plugin_after_update($upgrader_object, $options) {
    if ($options['action'] == 'update' && $options['type'] == 'plugin') {
        // Log update from GitHub
        error_log('GitHub plugin updated successfully');
    }
}
add_action('upgrader_process_complete', 'my_github_plugin_after_update', 10, 2);
