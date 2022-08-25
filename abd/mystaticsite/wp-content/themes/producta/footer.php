</div><!-- #producta-primary -->
<footer id="producta-footer" class="footer">
    <div class="container">
        <div class="main-footer">
            <div class="row">
                <div class=" footer-1 col-sm-6 col-lg-3">
                    <div class="logo-ft site-logo">
                        <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) { ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img class="img-logo" src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">
                            <span class="site-title"><?php echo esc_html( get_bloginfo('name') ); ?></span>
                        </a>
                        <?php } ?>
                    </div>
                    <?php get_template_part( 'template-parts/social', 'network' ); ?>
                </div>
                <?php if ( is_active_sidebar('menu_footer1') ): ?>
                <div class="footer-2 col-sm-6 col-lg-3">
                    <?php dynamic_sidebar( 'menu_footer1' ); ?>
                </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar('menu_footer1') ): ?>
                <div class="footer-3 col-sm-6 col-lg-3">
                    <?php dynamic_sidebar( 'menu_footer2' ); ?>
                </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar('newsletter_footer') ): ?>
                <div class="footer-4 col-sm-6 col-lg-3">
                    <?php dynamic_sidebar( 'newsletter_footer' ); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="footer-copyright">
            <?php echo wp_kses_post(get_theme_mod('producta_footer_copyright_text')); ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>    
</body>
</html>