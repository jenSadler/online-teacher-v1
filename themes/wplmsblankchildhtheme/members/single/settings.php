<?php

/**
 * BuddyPress - Users Settings
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
		<?php if ( bp_core_can_edit_settings() ) : ?>

			<?php bp_get_options_nav(); ?>

		<?php  endif; ?>
	</ul>
	<?php
do_action('wplms_after_single_item_list_tabs');?>
</div>
	</div>
	<div class="col-md-9">
<?php
switch ( bp_current_action() ) :
	case 'notifications'  :
		bp_get_template_part( 'members/single/settings/notifications'  );
		break;
	case 'capabilities'   :
		bp_get_template_part( 'members/single/settings/capabilities'   );
		break;
	case 'delete-account' : 
		bp_get_template_part( 'members/single/settings/delete-account' );
		break;
	case 'general'        :
		bp_get_template_part( 'members/single/settings/general'        );
		break;
	case 'xprofile'        :  
		bp_get_template_part( 'members/single/settings/profile'        );
		break;
	default:
		bp_get_template_part( 'members/single/plugins'                 );
		break;
endswitch;
?>
	</div></div>