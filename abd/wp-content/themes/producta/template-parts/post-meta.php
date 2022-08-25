<div class="post-meta">
	<div class="ath-post">
		<?php echo esc_html__( 'by: ', 'producta' ) ?><span><?php the_author() ?></span>
	</div>
	<div class="date-post"><?php echo wp_kses_post( get_the_date('d F Y') ); ?></div>
</div>