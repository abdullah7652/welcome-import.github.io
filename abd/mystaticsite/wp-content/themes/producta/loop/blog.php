<?php if ( have_posts() ) { ?>
    <div class="producta-blogs <?php echo esc_attr( $args['blog_class'] ); ?>">
        <div class="row g-xl-5">
            <?php while ( have_posts() ) { 
                the_post();
            ?>    
                <article <?php post_class($args['post_class'] . ' item-post'); ?>>
                     <div class="post-inner">
                        <?php get_template_part('template-parts/post', 'format'); ?>
                        <div class="post-info">
                            <div class="inner-info">                                    
                                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="post-content"><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), $args['word'] , '...' ) ); ?></div>
                                <a href="<?php the_permalink()?>" class="post-link"><?php echo esc_html__('Read more', 'producta')?></a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php } ?>
        </div>
    </div>
    <?php producta_pagination(); ?>
<?php } ?>