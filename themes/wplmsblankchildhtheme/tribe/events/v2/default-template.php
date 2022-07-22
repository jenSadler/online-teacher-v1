<?php
/**
 * View: Default Template for Events
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/default-template.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 */

use Tribe\Events\Views\V2\Template_Bootstrap;

get_header(vibe_get_header());?>


<section id="title">
	    <div class="container">
        <div class="row">
             <div class="col-md-12">
                <div class="pagetitle center">
                	<h1>Events</h1>
					<div class="dir-search" role="search">
	
   <form action="/events/" method="get" id="search-course-form">
		<label><input type="text" name="s" id="course_search" placeholder="Lunch and Learn, Seminar"></label>
		<input type="submit" id="course_search_submit" name="course_search_submit" value="Search">
		<button class="search-icon" type="submit" id="course_search_submit" name="course_search_submit"><i class="fa fa-search"></i></button>
	</form> 
	</div>

		             </div>
            </div>
        </div>
    </div>
</section>
<?php 
echo tribe( Template_Bootstrap::class )->get_view_html();

get_footer();
