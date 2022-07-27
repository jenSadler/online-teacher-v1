  
        
        <?php
            $args = apply_filters('wplms-mobile-menu',array(
                'theme_location'  => 'mobile-menu',
                'container'       => '',
                'menu_class'      => 'sidemenu',
                'items_wrap' => '<ul ><li><a id="mobile_searchicon" title="Search"><i aria-hidden="true" class="fa fa-search" ></i><span class="screen-reader-only">Search</span></a></li>%3$s</ul>',
                'fallback_cb'     => 'vibe_set_menu',
            ));

            wp_nav_menu( $args );
        ?>
