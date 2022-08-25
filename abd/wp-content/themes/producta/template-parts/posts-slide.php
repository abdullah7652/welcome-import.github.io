<?php
if (true == get_theme_mod( 'producta_slide_posts_enable', true ) ) {
    $post_ids = get_theme_mod( 'producta_featured_posts_ids' );
    if ( !empty($post_ids) )
    {
        $xdquery = new WP_Query( array( 'posts_per_page' => -1, 'post_type' => 'post', 'post__in' => $post_ids ) );
        wp_reset_postdata();
        if ( $xdquery->have_posts() )
        { ?>
            <div class="ss-feature">
                <div class="posts-slide">
                    <div class="owl-carousel" data-loop="true" data-autoplay="true" data-items="1" data-center="true" data-dots="true" data-nav="false">
                        <?php
                        while ( $xdquery->have_posts() )
                        {
                            $xdquery->the_post();
                            $featured_image = get_template_directory_uri(). '/assets/images/place-holder.png';
                            if ( wp_get_attachment_url( get_post_thumbnail_id() ) ) {
                                $featured_image = wp_get_attachment_url( get_post_thumbnail_id() );
                            }  ?>
                            <div class="post">
                                <div class="post-inner">
                                    <a class="post-image" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo esc_url($featured_image); ?>');"></a>
                                    <div class="post-info">
                                        <div class="container">
                                            <div class="inner-info-post">
                                                <div class="post-cats"><?php the_category(', ') ?></div>
                                                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <div class="meta-post">
                                                    <div class="auth-avt"><?php echo get_avatar( get_the_author_meta( 'ID' ), 90 ); ?></div>
                                                    <div class="meta-info">
                                                        <div class="auth-name"><?php the_author() ?></div>
                                                        <div class="date-post"><?php the_date('d.m.Y'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="date-post">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><?php
                        } ?>
                    </div>
                </div>
            </div><?php
        }
    }
}
