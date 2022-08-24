<?php

if ( !defined( 'VIBE_URL' ) )
define('VIBE_URL',get_template_directory_uri());

add_action('init',function(){
$admin_role = get_role( 'instructor');
// grant the unfiltered_html capability
$admin_role->add_cap( 'unfiltered_html', true );
});

function custom_enqueue_scripts() {
	
    wp_enqueue_script( 'custom', get_theme_file_uri('/assets/js/custom.js'), array(), false, true );
	
	wp_enqueue_script( 'rating', get_theme_file_uri('/assets/js/js/rating.js'), array(), false, true );
	
	wp_enqueue_script( 'wplms.min', get_theme_file_uri('/assets/js/wplms.min.js'), array(), false, true );
	
	wp_enqueue_script( 'sidebarEffects', get_theme_file_uri('/assets/js/sidebarEffects.js'), array(), false, true );
	
}


function my_login_stylesheet() {
	wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/css/style-login.css' );
}
add_action( 'wp_enqueue_scripts', 'custom_enqueue_scripts' );
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
add_image_size( 'unitTitle', 200, 100, true );
function your_theme_js() {
    wp_enqueue_script( 'theme_js', get_stylesheet_directory_uri() . '/assets/js/old_files/buddypress.js', array( 'jquery' ), '1.0', true );
}

add_filter( 'bp_directory_course_search_form','modifyCourseForm' , 10, 3 );
function modifyCourseForm($formContent){
	
	$formContent = str_replace ( "</form>" , '<button class="search-icon" type="submit" id="course_search_submit" name="course_search_submit"><i class="fa fa-search"></i></button></form>' , $formContent );
	
		return $formContent;
}



function tribehome_enqueue_front_page_scripts() {
    if( is_front_page() )
    {

	    //Add the stylesheet into the header
		wp_enqueue_style("tribe.homepage",WP_PLUGIN_URL."/the-events-calendar/resources/tribe-events-full.css");

		wp_enqueue_style("tribe.homepage.date",WP_PLUGIN_URL."/tribe-homepage-search/css/datepicker.css");

		//Add the scripts in the footer
		wp_enqueue_script("jquery");

		wp_enqueue_script(
		"tribe.homepage.bar", WP_PLUGIN_URL."/the-events-calendar/resources/tribe-events-bar.js",
		array("jquery"), "1.3.1",1);

		wp_enqueue_script(
		"tribe.homepage.events", WP_PLUGIN_URL."/the-events-calendar/resources/tribe-events.js",
		array("jquery"), "1.3.1",1);

		wp_enqueue_script(
		"tribe.homepage.datepicker", WP_PLUGIN_URL."/tribe-homepage-search/js/bootstrap-datepicker.js",
		array("jquery"), "1.3.1",1);

		wp_enqueue_script(
		"tribe.homepage.footer", WP_PLUGIN_URL."/tribe-homepage-search/js/footer.js",
		array("jquery"), "1.3.1",1);

	}
}
add_action( 'wp_enqueue_scripts', 'tribehome_enqueue_front_page_scripts' );

add_action( 'wp_enqueue_scripts', 'your_theme_js' );



add_action('wplms_course_start_after_timeline',function($course_id){

echo '<p><i class="fa fa-book fa-fw"></i> Knowledge/Understanding<br/> <i class="fa  fa-lightbulb-o fa-fw"></i> Thinking<br/><i class="fa fa-desktop fa-fw"></i> Application<br/><i class="fa fa-comments fa-fw"></i> Communication</p><br/>'; },99999);

add_filter( 'register_post_type_args',function($args, $post_type){
if($post_type == 'unit'){
$args['exclude_from_search'] = false;
}
return $args;
},10,2);

?>
