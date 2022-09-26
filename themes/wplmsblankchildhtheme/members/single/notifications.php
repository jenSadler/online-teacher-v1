<?php

/**
 * BuddyPress - Users Notifications
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */
if ( !defined( 'ABSPATH' ) ) exit;
?>
<div class="row">
<div class="col-md-3">
<div class="item-list-tabs no-ajax subnav-sidebar" id="subnav" role="navigation">
	<ul>
		<?php bp_get_options_nav(); ?>
	</ul>
	</div>
</div>
	
	<div class="col-md-9">
	<h2>
		Notifications
		</h2>
	<ul>

		<li id="members-order-select" class="last filter">
			<?php bp_notifications_sort_order_form(); ?>
		</li>
	</ul>

		
	
<?php
do_action('wplms_after_single_item_list_tabs'); 
switch ( bp_current_action() ) :

	// Unread
	case 'unread' :
		bp_get_template_part( 'members/single/notifications/unread' );
		break;
	// Read
	case 'read' :
		bp_get_template_part( 'members/single/notifications/read' );
		break;
	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch; ?>
		
		</div>
	
			</div>
