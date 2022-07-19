<?php

if ( !defined( 'VIBE_URL' ) )
define('VIBE_URL',get_template_directory_uri());

add_action('init',function(){
$admin_role = get_role( 'instructor');
// grant the unfiltered_html capability
$admin_role->add_cap( 'unfiltered_html', true );
});


add_image_size( 'unitTitle', 200, 100, true )
?>
