<?php
/**
 * The template for displaying Course Curriculum
 *
 * Override this template by copying it to yourtheme/course/single/curriculum.php
 *
 * @author 		VibeThemes
 * @package 	vibe-course-module/templates
 * @version     2.2
 */

if ( !defined( 'ABSPATH' ) ) exit;
global $post;
$id= get_the_ID();

$class='';
if(class_exists('WPLMS_tips')){
	$wplms_settings = WPLMS_tips::init();
	$settings = $wplms_settings->lms_settings;
	if(isset($settings['general']['curriculum_accordion'])){
		$class="accordion";	
	}
}


?>
<h2 class="heading">
	<span><?php  _e('Course Curriculum','vibe'); ?></span>
</h2>

<div class="course_curriculum <?php echo vibe_sanitizer($class,'text'); ?>">
<?php
do_action('wplms_course_curriculum_section',$id);

$course_curriculum = bp_course_get_full_course_curriculum($id); 

if(!empty($course_curriculum)){

	
	foreach($course_curriculum as $lesson){ 
		switch($lesson['type']){
			case 'unit':
				?>
				<tr class="course_lesson">
					<td class="curriculum-icon"><i class="icon-<?php echo vibe_sanitizer($lesson['icon'],'text'); ?>"></i><span class="screen-reader-only">Unit</span></td>
					<td><?php echo apply_filters('wplms_curriculum_course_lesson',(!empty($lesson['link'])?'<a href="'.$lesson['link'].'">':''). $lesson['title']. (!empty($lesson['link'])?'</a>':''),$lesson['id'],$id); ?></td>
					<td><?php echo vibe_sanitizer($lesson['duration']); ?></td>
				</tr>
				<?php
				do_action('wplms_curriculum_course_unit_details',$lesson);
			break;
			case 'quiz':
				?>
				<tr class="course_lesson">
					<td class="curriculum-icon"><i class="icon-<?php echo vibe_sanitizer($lesson['icon'],'text'); ?>"></i><span class="screen-reader-only">Quiz</span></td>
					<td><?php echo apply_filters('wplms_curriculum_course_quiz',(($lesson['link'])?'<a href="'.$lesson['link'].'">':''). $lesson['title'].(isset($lesson['free'])?$lesson['free']:'') . (!empty($lesson['link'])?'</a>':''),$lesson['id'],$id); ?></td>
					
					<td><?php echo vibe_sanitizer($lesson['duration']); ?></td>
				</tr>
				<?php
				do_action('wplms_curriculum_course_quiz_details',$lesson);
			break;
			case 'section':
				
				if ($lesson !== reset($course_curriculum)){
				
					echo'</tbody></table>';
				}
				echo '<h3>'.vibe_sanitizer($lesson['title'],'text').'</h3>';
				echo '<table class="table"><thead ><tr ><th>Type</th><th>Title</th><th>Expected Time</th></tr></thead><tbody>';
    			
			break;
			default:
				do_action('wplms_curriculum_course_lesson_line_html',$lesson,$id);
			break;
		
		
        		
		}

		
	}
	
echo '</tbody></table>';
}
else{
	?>
	<div class="message"><?php echo _x('No curriculum found !','Error message for no curriculum found in course curriculum ','vibe'); ?></div>
	<?php	
}
?>
</div>

<?php

?>