<?php

if ( !defined( 'VIBE_URL' ) )
define('VIBE_URL',get_template_directory_uri());

add_action('init',function(){
$admin_role = get_role( 'instructor');
// grant the unfiltered_html capability
$admin_role->add_cap( 'unfiltered_html', true );
});


add_image_size( 'unitTitle', 200, 100, true );
function your_theme_js() {
    wp_enqueue_script( 'theme_js', get_stylesheet_directory_uri() . '/assets/js/old_files/buddypress.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'your_theme_js' );
?>
