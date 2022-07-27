<?php
//Header File
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div id="global" class="global">
    
    <div class="pusher">
        <?php
            $fix=vibe_get_option('header_fix');
        ?>
        <header class="sleek <?php if(isset($fix) && $fix){echo 'fix';} ?>">
		
            <div class="<?php echo vibe_get_container(); ?>">
                <div class="row">
					
                    <div class="col-md-9 col-sm-4 col-xs-4">
						<div id="logo">
                        <?php
							
                           
                            $url = apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png','header');
                            if(!empty($url)){
                        ?>
                            <a href="<?php echo vibe_site_url('','logo'); ?>"><img src="<?php  echo vibe_sanitizer($url,'url'); ?>"  /></a>
                        <?php
                            }
                          ?>
							</div>
							<?php

                            $args = apply_filters('wplms-main-menu',array(
                                 'theme_location'  => 'main-menu',
                                 'container'       => 'nav',
                                 'menu_class'      => 'menu',
                                 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li><a id="new_searchicon" title="Search"><i aria-hidden="true" class="fa fa-search" ></i><span class="screen-reader-only">Search</span></a></li></ul>',
                                 'walker'          => new vibe_walker,
                                 'fallback_cb'     => 'vibe_set_menu'
                             ));
                            wp_nav_menu( $args ); 
                        ?>
                    </div>
                    <div class="col-md-3 col-sm-8 col-xs-8">
						
                        <ul class="topmenu">
                            <?php
                            if ( function_exists('bp_loggedin_user_link') && is_user_logged_in() ) :
                                ?>
                                    <li><a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin"><?php $n=vbp_current_user_notification_count(); echo ((isset($n) && $n)?'<em></em>':''); bp_loggedin_user_avatar( 'type=full' ); ?><span><?php bp_loggedin_user_fullname(); ?></span></a></li>
                            <?php
                            else :
                                ?>  
                                <li><a href="#login" rel="nofollow" class=" vbplogin"><span><?php _e('LOGIN','vibe'); ?></span></a></li>          
                                    <?php
                            endif;        
                            
                           
                            ?>
                        </ul>
						
                        <?php
                            $style = vibe_get_login_style();
                            if(empty($style)){
                                $style='default_login';
                            }
                        ?>
                        <div id="vibe_bp_login" class="<?php echo vibe_sanitizer($style,'text'); ?>">
                        <?php
                            vibe_include_template("login/$style.php");
                         ?>
                       </div>
							
                    </div>
					</div>
				</div>
						
						<nav role="navigation" aria-label="Main menu">
					  <button aria-expanded="true" id="trigger" class="mobile-button">
						<span class="lines"></span>
					  </button>
					 <div class="mobile-hidden">
						<?php get_template_part('mobile','sidebar');   ?> 
						  </div>
					</nav>
					
                
					
					
            
		
        </header>
	

   
		