<?php
    get_header();

    $col = ( is_active_sidebar('sidebar') ) ? 'has-sidebar col-lg-8 col-md-12' : 'no-sidebar col-lg-12';

    $args = array();
    $args['word'] = 50;    
    $args['blog_class'] = 'blog-standard';
    $args['post_class'] = 'col-md-12';

?>
<div class="main-contaier">
    <div class="container">
        <div class="row wrapper-content g-xl-5">
            <div class="main-content <?php echo esc_attr( $col ); ?>">
                <?php
                    get_template_part( 'loop/blog', '', $args );
                ?>
            </div>
            <?php if ( is_active_sidebar('sidebar') ) { ?>
            <div class="col-md-12 col-lg-4">
				<aside id="sidebar" class="sidebar">
                    <?php dynamic_sidebar('sidebar'); ?>
                </aside>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>