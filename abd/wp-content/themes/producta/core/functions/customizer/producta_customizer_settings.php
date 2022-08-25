<?php 
/**
 * Premade a Post
 */
function producta_customize_pre_posts()
{
    $args = array(
        'posts_per_page' => -1
    );
    $posts = get_posts( $args );
    $options = array();
    $options[0] = 'Select a Post';
    foreach ( $posts as $post ) {
        $options[$post->ID] = wp_trim_words( $post->post_title, 5, '...');
    }
    wp_reset_postdata();
    return $options;
}
if (class_exists('Kirki')) {

	/**
	* Remove sections default
	*/
	function productas_changer_sections( $wp_customize ) {
	    $wp_customize->remove_section( 'title_tagline' );
	    $wp_customize->remove_section( 'colors' );
	    $wp_customize->remove_section( 'background_image' );
	    $wp_customize->remove_panel( 'tt_font_typography_panel' );
	}

	add_action( 'customize_register', 'productas_changer_sections' );

	// Custormizer setting ----------------------------------------------------------------------------------------------
	Kirki::add_config( 'producta_theme_option', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );

	/*----------------------------*/
	#Header
	/*----------------------------*/
	// Site Indentity
	Kirki::add_section( 'title_tagline', array(
	    'title'          => esc_html__( 'Site Indentity', 'producta' ),
	    'priority'       => 2,
	) );
	Kirki::add_field( 'producta_theme_option', [
		'type'        => 'radio-buttonset',
		'settings'    => 'producta_hide_tagline',
		'label'       => esc_html__( 'Display tagline?', 'producta' ),
		'section'     => 'title_tagline',
		'default'     => 'hide',
		'priority'    => 15,
		'choices'     => [
			'show'   => esc_html__( 'Show', 'producta' ),
			'hide' => esc_html__( 'Hide', 'producta' ),
		],
	] );

	/*------------------------------
			Genaral
	--------------------------------*/
	Kirki::add_panel( 'producta_style_setting', array(
	    'title'       => esc_html__( 'Site Setting', 'producta' ),
	    'priority'    => 5,
	) );	
	Kirki::add_section( 'colors', array(
	    'title'          => esc_html__( 'Color', 'producta' ),
	    'panel'          => 'producta_style_setting',
	    'priority'       => 5,
	) );
	Kirki::add_field( 'producta_theme_option', [
		'type'        => 'color',
		'settings'    => 'producta_accent_color',
		'label'       => __( 'Accent Color', 'producta' ),
		'section'     => 'colors',
		'default'     => '#e8a49c',
	] );
	Kirki::add_field( 'producta_theme_option', [
		'type'        => 'color',
		'settings'    => 'producta_secondary_color',
		'label'       => __( 'Secondary Color', 'producta' ),
		'section'     => 'colors',
		'default'     => '#ddd',
	] );
	Kirki::add_section( 'background_image', array(
	    'title'          => esc_html__( 'Background Image', 'producta' ),
	    'panel'          => 'producta_style_setting',
	    'priority'       => 10,
	) );
	/*------------------------------
			Posts Slide
	------------------------------*/
	Kirki::add_section( 'producta_posts_slide', array(
	    'title'       => esc_html__( 'Slide Posts', 'producta' ),
	    'priority'    => 8,
	) );
	Kirki::add_field( 'producta_theme_option', [
		'type'        => 'switch',
		'settings'    => 'producta_slide_posts_enable',
		'label'       => esc_html__( 'Show/hide featured post', 'producta' ),
		'section'     => 'producta_posts_slide',
		'default'     => 'on',
		'choices'     => [
			'on'  => esc_html__( 'Show', 'producta' ),
			'off' => esc_html__( 'Hide', 'producta' ),
		],
	] );
	Kirki::add_field( 'producta_theme_option', [
		'type'        => 'select',
		'settings'    => 'producta_featured_posts_ids',
		'label'       => esc_html__( 'Select Posts Slide', 'producta' ),
		'section'     => 'producta_posts_slide',
		'placeholder' => esc_html__( 'Select post...', 'producta' ),
		'multiple'    => 12,
		'choices'     => producta_customize_pre_posts()
	] );
	/* ------------------------------
			Blog Setting
	--------------------------------*/
	Kirki::add_panel( 'producta_blog', array(
	    'title'       => esc_html__( 'Blog Setting', 'producta' ),
	    'priority'    => 10,
	) );

	Kirki::add_section( 'producta_blog_layout_setting', array(
	    'title'          => esc_html__( 'Blog Layout', 'producta' ),
	    'panel'          => 'producta_blog',
	    'priority'       => 1,
	) );
	Kirki::add_field( 'producta_theme_option', [
		'type'        => 'image',
		'settings'    => 'image_banner_blog',
		'label'       => esc_html__( 'Image Banner (URL)', 'producta' ),
		'section'     => 'producta_blog_layout_setting',
		'default'     => '',
		'priority'       => 2,
	] );
	Kirki::add_field( 'producta_theme_option', [
		'type'     => 'text',
		'settings' => 'title_banner_blog',
		'label'    => esc_html__( 'Title Blog', 'producta' ),
		'section'  => 'producta_blog_layout_setting',
		'default'  => esc_html__( 'Our Blog', 'producta' ),
		'priority' => 3,
	] );
	Kirki::add_section( 'producta_archive_setting', array(
	    'title'          => esc_html__( 'Blog Archive', 'producta' ),
	    'panel'          => 'producta_blog',
	    'priority'       => 2,
	) );
	Kirki::add_field( 'producta_theme_option', [
		'type'        => 'image',
		'settings'    => 'image_banner_archive',
		'label'       => esc_html__( 'Image Banner (URL)', 'producta' ),
		'section'     => 'producta_archive_setting',
		'default'     => '',
		'priority'       => 2,
	] );

	// #Social Media
	Kirki::add_section( 'producta_social_network', array(
	    'title'          => esc_html__( 'Social Networks', 'producta' ),
	    'priority'       => 15,
	) );
	Kirki::add_field( 'producta_theme_option', [
		'type'     => 'text',
		'settings' => 'producta_facebook_url',
		'label'    => esc_html__( 'Facebook Url', 'producta' ),
		'section'  => 'producta_social_network',
		'priority' => 1,
	] );
	Kirki::add_field( 'producta_theme_option', [
		'type'     => 'text',
		'settings' => 'producta_twitter_url',
		'label'    => esc_html__( 'Twitter Url', 'producta' ),
		'section'  => 'producta_social_network',
		'priority' => 2,
	] );
	Kirki::add_field( 'producta_theme_option', [
		'type'     => 'text',
		'settings' => 'producta_instagram_url',
		'label'    => esc_html__( 'Instagram Url', 'producta' ),
		'section'  => 'producta_social_network',
		'priority' => 3,
	] );
	Kirki::add_field( 'producta_theme_option', [
		'type'     => 'text',
		'settings' => 'producta_pinterest_url',
		'label'    => esc_html__( 'Pinterest Url', 'producta' ),
		'section'  => 'producta_social_network',
		'priority' => 4,
	] );
	Kirki::add_field( 'producta_theme_option', [
		'type'     => 'text',
		'settings' => 'producta_linkedin_url',
		'label'    => esc_html__( 'Linkedin Url', 'producta' ),
		'section'  => 'producta_social_network',
		'priority' => 5,
	] );
	Kirki::add_field( 'producta_theme_option', [
		'type'     => 'text',
		'settings' => 'producta_youtube_url',
		'label'    => esc_html__( 'Youtube Url', 'producta' ),
		'section'  => 'producta_social_network',
		'priority' => 6,
	] );
	Kirki::add_field( 'producta_theme_option', [
		'type'     => 'text',
		'settings' => 'producta_vimeo_url',
		'label'    => esc_html__( 'Vimeo Url', 'producta' ),
		'section'  => 'producta_social_network',
		'priority' => 7,
	] );

	#Footer
	Kirki::add_section( 'producta_footer_setting', array(
	    'title'          => esc_html__( 'Footer', 'producta' ),
	    'priority'       => 20,
	) );
	Kirki::add_field( 'producta_theme_option', [
		'type'     => 'textarea',
		'settings' => 'producta_footer_copyright_text',
		'label'    => esc_html__( 'Copyright Text', 'producta' ),
		'section'  => 'producta_footer_setting',
	] );
}