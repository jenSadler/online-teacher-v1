<?php
//Header File
if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php
    wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
    <div id="global" class="global">

        <div id="pusher" class="pusher ">
            <?php $fix = vibe_get_option('header_fix'); ?>
            <header class="sleek <?php if (isset($fix) && $fix) { echo 'fix';} ?>">

                <div class="<?php echo vibe_get_container(); ?>">
                    <div class="row">

                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div id="logo">
                                <?php
                                $url = apply_filters('wplms_logo_url', VIBE_URL . '/assets/images/logo.png', 'header');
                                if (!empty($url)) {
                                ?>
                                    <a href="<?php echo vibe_site_url('', 'logo'); ?>"><img src="<?php echo vibe_sanitizer($url, 'url'); ?>" /></a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-8">
                            <nav id="main-nav" class="menu-main-menu-container" role="navigation" aria-label="Main menu">
                                <button name="menu-open" aria-haspopup="true" aria-expanded="false" aria-controls="menu-main-menu-1" class="mobile-button" id="menu-open" onClick="showMobileMenu();">

                                <i class="fa fa-bars" aria-hidden="true"></i><span class="screen-reader-only">Open navigation menu</span>

                                </button>
                                <div id="hold-main-menu-list">


                                    <ul id="menu-main-menu-1" class="menu gone">

                                        <?php

                                        $args = apply_filters('wplms-main-menu', array(
                                            'theme_location'  => 'mobile-menu',
                                            'container'       => '',
                                            'menu_class'      => '',
                                            'items_wrap' => '%3$s<li><a id="mobile_searchicon" title="Search"><i  class="fa fa-search" ></i><span class="screen-reader-only">Search</span></a></li>',
                                            'fallback_cb'     => 'vibe_set_menu',
                                        ));

                                        wp_nav_menu($args);


                                        ?></ul>
                                    <button name="menu-close" aria-haspopup="true" aria-expanded="false" aria-controls="menu-main-menu-1" class="mobile-button" id="menu-close" onClick="hideMobileMenu();">
                                    <i class="fa fa-times" ></i> <span class="screen-reader-only">Close navigation menu</span>
                                    </button>
                                </div>
                                <div class="topmenu menu">

                                    <?php
                                    if (function_exists('bp_loggedin_user_link') && is_user_logged_in()) :
                                    ?>
                                        <a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin"><?php $n = vbp_current_user_notification_count();
                                                                                                                echo ((isset($n) && $n) ? '<em></em>' : '');
                                                                                                                bp_loggedin_user_avatar('type=full'); ?><?php bp_loggedin_user_fullname(); ?></a>
                                    <?php
                                    else :
                                    ?>
                                        <a href="<?php echo get_site_url(); ?>/wp-admin.php" rel="nofollow" class=" vbplogin">Login</a>
                                    <?php
                                    endif;


                                    ?>

                                </div>



                                <?php
                                $style = vibe_get_login_style();
                                if (empty($style)) {
                                    $style = 'default_login';
                                }
                                ?>
                                <div id="vibe_bp_login" class="<?php echo vibe_sanitizer($style, 'text'); ?>">
                                    <?php
                                    vibe_include_template("login/$style.php");
                                    ?>

                                </div>

                            </nav>
                        </div>
                    </div>
                </div>





            </header>