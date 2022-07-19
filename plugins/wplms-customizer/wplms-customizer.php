<?php
/*
Plugin Name: WPLMS Customizer Plugin
Plugin URI: http://www.Vibethemes.com
Description: A simple WordPress plugin to modify WPLMS template
Version: 1.0
Author: VibeThemes
Author URI: http://www.vibethemes.com
License: GPL2
*/
/*
Copyright 2014  VibeThemes  (email : vibethemes@gmail.com)

wplms_customizer program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

wplms_customizer program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with wplms_customizer program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


include_once 'classes/customizer_class.php';



if(class_exists('WPLMS_Customizer_Plugin_Class'))
{	
    // instantiate the plugin class
    $wplms_customizer = new WPLMS_Customizer_Plugin_Class();
}

add_action('wplms_course_start_after_timeline',function($course_id){

echo '<p><i class="fa fa-book fa-fw"></i> Knowledge/Understanding<br/> <i class="fa  fa-lightbulb-o fa-fw"></i> Thinking<br/><i class="fa fa-desktop fa-fw"></i> Application<br/><i class="fa fa-comments fa-fw"></i> Communication</p><br/>'; },99999);