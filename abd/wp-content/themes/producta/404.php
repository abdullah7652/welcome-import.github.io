<?php 
get_header(); 
?>
<div class="main-contaier">
    <div class="container">
    	<div class="page-content error-page">
    		<h1 class="page-title"><?php echo esc_html__( '404', 'producta' ); ?></h1>
        	<p><?php esc_html__( 'It seems we can not find what you are looking for. Perhaps searching can help.', 'producta' ); ?></p>
			<?php get_search_form(); ?>
		</div>
    </div>
</div>
<?php get_footer(); ?>
