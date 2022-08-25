<?php
// Register meta box
function producta_page_meta_box() {
    add_meta_box( 'producta-page-options', __( 'Page Options', 'producta' ), 'producta_page_call_back', 'page', 'normal' );
}

add_action( 'add_meta_boxes', 'producta_page_meta_box' );

// Add field
function producta_page_call_back( $post ) {
    $header_trans = get_post_meta( $post->ID, '__producta_header_trans', true );
    ?>
    <div class="producta-row">
        <label for="producta-header-trans">
            <input type="checkbox" name="__producta_header_trans" id="producta-header-trans" value="yes" <?php checked( $header_trans, 'yes' ); ?> />
            <?php echo esc_html__( 'Header Trans?', 'producta' ); ?>
        </label>
    </div>
    <?php
}

// Save field
function producta_save_page_meta( $post_id, $post ) {
	// check current use permissions
	$post_type = get_post_type_object( $post->post_type );

	if ( isset( $_POST[ '__producta_header_trans' ] ) ) {
		update_post_meta( $post_id, '__producta_header_trans', sanitize_text_field( $_POST[ '__producta_header_trans' ] ) );
	}

	return $post_id;
}

add_action( 'save_post', 'producta_save_page_meta', 10, 2 );
