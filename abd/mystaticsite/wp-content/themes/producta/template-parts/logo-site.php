<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$blog_info    = get_bloginfo( 'name' );
?>
<div class="producta-logo">
	<div class="inner-logo">
		<?php if ( ( is_front_page() || is_home() ) && ! is_page() ) { 
			$tag_op = "<h1 class='site-logo'>";
			$tag_cl = "</h1>";
		}else{
			$tag_op = "<div class='site-logo'>";
			$tag_cl = "</div>";
		} ?>
		<?php echo wp_kses_post( $tag_op ); ?>
		<?php if ( has_custom_logo() ){ ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		        <img class="img-logo" src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>">
		        <span class="site-title"><?php echo get_bloginfo('name'); ?></span>
		    </a>
		<?php }else{ ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<span class="site-title"><?php echo get_bloginfo('name'); ?></span>
			</a>
		<?php } ?>
		<?php echo wp_kses_post( $tag_cl ); ?>
		<?php if ( get_theme_mod( 'producta_hide_tagline') == 'show' ) { ?>
	    <span class="tag-line"><?php echo esc_html(get_bloginfo( 'description')); ?></span>
		<?php  } ?>
	</div>
</div>