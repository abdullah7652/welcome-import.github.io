<?php
    get_header();
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            if ( has_post_thumbnail() ) {
                $featured_image = wp_get_attachment_url( get_post_thumbnail_id() );
                producta_page_banner(get_the_title(), $featured_image);
            }

        ?>        
        <div class="main-contaier">
            <div class="container">
                <div class="main-content">                    
                    <article <?php post_class('producta-page'); ?>>
                        <div class="page-excerpt">
                            <?php the_content(); ?>
                            <?php wp_link_pages(array('before'=>'<p class="page-nav">' . esc_html__( 'Pages:', 'producta' ), 'after' =>'</p>')); ?>
                        </div>
                        <?php comments_template( '', true );  ?>
                    </article>
                </div>
            </div>
        </div><?php
        }
    }
	get_footer();
	