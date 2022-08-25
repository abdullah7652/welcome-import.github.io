<?php 
    get_header();
    $col = ( is_active_sidebar('sidebar') ) ? 'has-sidebar col-lg-8 col-md-12' : 'no-sidebar col-lg-12';

 ?>    
<div class="main-contaier">
    <div class="container">
        <div class="row wrapper-content g-xl-5">
            <div class="main-content <?php echo esc_attr($col); ?>">
                <?php
                while ( have_posts() ) {
                    the_post();
                ?>
                <div class="producta-post-single">
                    <article <?php post_class('post-single'); ?>>
                        <?php get_template_part('template-parts/post', 'format'); ?>
                        <div class="post-info">
                        	<h1 class="post-title"><?php the_title(); ?></h1>
	                        <div class="post-content">
	                            <?php
	                                the_content();
	                                wp_link_pages(
	                                    array(
	                                        'before'   => '<p class="page-nav">' . esc_html__( 'Pages:', 'producta' ),
	                                        'after'    => '</p>'
	                                    )
	                                );
	                            ?>
	                        </div>
	                        <?php if ( get_the_tags() ) { ?>
	                        <div class="post-tags">
	                            <span class="title"><?php echo esc_html__( 'Tags ', 'producta' ) ?></span>
	                            <?php the_tags('',' '); ?>
	                        </div>
	                        <?php } ?>
                        </div>
                    </article>
                    <?php producta_pagination(); ?>
                    <?php
                        if ( comments_open() || get_comments_number() ) :
                            comments_template('', true);
                        endif;
                    ?>
                </div>
                <?php } ?>
            </div>
            <?php if ( is_active_sidebar('sidebar') ) { ?>
            <div class="col-md-12 col-lg-4">
            <?php get_sidebar() ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
