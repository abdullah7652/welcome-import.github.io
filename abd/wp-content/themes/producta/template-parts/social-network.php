<?php 
    $empty = false;
    $facebook_url   = get_theme_mod('producta_facebook_url');
    $twitter_url    = get_theme_mod('producta_twitter_url');
    $instagram_url  = get_theme_mod('producta_instagram_url');
    $pinterest_url  = get_theme_mod('producta_pinterest_url');
    $linkedin_url   = get_theme_mod('producta_linkedin_url');
    $youtube_url   = get_theme_mod('producta_youtube_url');
    $vimeo_url   = get_theme_mod('producta_vimeo_url');

    if ( $facebook_url == '' && $twitter_url == '' && $instagram_url =='' && $pinterest_url == '' && $linkedin_url == '' && $youtube_url == '' && $vimeo_url == '') {
        $empty = true;
    }
    if ( ! $empty ) { ?>
        <div class="social-network">
            <?php if( $facebook_url ) { ?>
            <a href="<?php echo esc_url($facebook_url); ?>">
                <i class="fab fa-facebook-f"></i>
            </a>
            <?php } ?>
            <?php if ( $twitter_url ){ ?>
            <a href="<?php echo esc_url($twitter_url); ?>">
                <i class="fab fa-twitter"></i>
            </a>
            <?php } ?>
            <?php if( $pinterest_url ){ ?>
            <a href="<?php echo esc_url($pinterest_url); ?>">
                <i class="fab fa-pinterest"></i>
            </a>
            <?php } ?>
            <?php if( $instagram_url ){ ?>
            <a href="<?php echo esc_url($instagram_url); ?>">
                <i class="fab fa-instagram"></i>
            </a>
            <?php } ?>
            <?php if( $linkedin_url ){ ?>
            <a href="<?php echo esc_url($linkedin_url); ?>">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <?php } ?>
            <?php if( $youtube_url ){ ?>
            <a href="<?php echo esc_url($youtube_url); ?>">
                <i class="fab fa-youtube"></i>
            </a>
            <?php } ?>
            <?php if( $vimeo_url ){ ?>
            <a href="<?php echo esc_url($vimeo_url); ?>">
                <i class="fab fa-vimeo-v"></i>
            </a>
            <?php } ?>
        </div>
        <?php
    }
 ?>