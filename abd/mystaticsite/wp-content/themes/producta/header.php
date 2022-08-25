<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#content">
    <?php esc_html_e( 'Skip to content', 'producta' ); ?></a>
    <div class="body-overlay"></div>
    <?php 
         $header_trans = '';
        if ( is_page() ) {
            $trans = get_post_meta( get_the_ID(), '__producta_header_trans', true );
            if ( $trans === 'yes' ) {
                $header_trans = 'header-trans';
            }
        }
     ?>
    <header id="producta-header" class="header <?php echo esc_attr($header_trans); ?>">
        <div class="header-wrapper container">
            <div class="header-main">
                <?php get_template_part( 'template-parts/logo', 'site' ); ?>
                <div class="header-mainmenu">
                    <a href="javascript:void(0)" class="menu-touch d-md-block d-lg-none">
                        <div class="menu-toggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <div id="nav-wrapper" class="producta-main-nav nav-main">
                        <?php
                            wp_nav_menu( array (
                                'container' => false,
                                'theme_location' => 'primary',
                                'menu_class' => 'producta-main-menu',
                                'depth' => 3,
                            ) );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="content" class="producta-primary">