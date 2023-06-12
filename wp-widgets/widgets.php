<?php
// Require widget files
require plugin_dir_path(__FILE__) . 'Sefu_Newsletter.php';

// Register Widgets
add_action( 'widgets_init', function() {
    register_widget( 'SefuCore\WpWidgets\Sefu_Newsletter');
});
