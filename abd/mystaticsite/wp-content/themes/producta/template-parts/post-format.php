<?php 
if ( has_post_thumbnail() )
    {          
        if ( is_single() ){ 
            $featured_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            ?>
            <div class="post-format post-standard">
                <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title_attribute(); ?>" />
            </div>
        <?php }else{ 
            $featured_image = producta_resize_image( get_post_thumbnail_id(), null, 1300, 650, true );
            ?>
            <div class="post-format">
                 <a  href="<?php the_permalink()?>">
                      <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title_attribute(); ?>">
                 </a>
            </div>
        <?php }
    }
?>