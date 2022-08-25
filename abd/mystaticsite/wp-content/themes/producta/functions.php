<?php
# Define
define('PRODUCTA_LIBS_URI', get_template_directory_uri() . '/libs/');
define('PRODUCTA_CORE_PATH', get_template_directory() . '/core/');
define('PRODUCTA_CORE_URI', get_template_directory_uri() . '/core/');
define('PRODUCTA_CORE_CLASSES', PRODUCTA_CORE_PATH . 'classes/');
define('PRODUCTA_CORE_FUNCTIONS', PRODUCTA_CORE_PATH . 'functions/');

# Set Content Width
if ( ! isset( $content_width ) ) { $content_width = 1530; }

# After setup theme
add_action('after_setup_theme', 'producta_setup');
function producta_setup()
{
    load_theme_textdomain('producta', get_template_directory().'/languages');
    $defaults = array(
     'height'      => 155,
     'width'       => 600,
     'flex-height' => true,
     'flex-width'  => true
    );
    add_theme_support( 'custom-logo', $defaults );
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('align-wide');
	register_nav_menus(array(
        'primary' => esc_html__('Main Menu', 'producta'),
        'footer-menu-1' => esc_html__('Footer Menu 1', 'producta'),
        'footer-menu-2' => esc_html__('Footer Menu 2', 'producta')
    ));
    add_theme_support( 'custom-background' );
}

# Google Fonts
add_action( 'wp_enqueue_scripts', 'producta_enqueue_googlefonts' );
function producta_enqueue_googlefonts()
{
    $fonts_url = '';
    $Poppins = _x( 'on', 'Poppins: on or off', 'producta' );
    if( 'off' != $Poppins )
    {
        $font_families = array();
        if ( 'off' !== $Poppins ) $font_families[] = 'Poppins:400,500,600,700';
        $query_args = array('family' => urlencode(implode('|', $font_families)), 'subset' => urlencode('latin,latin-ext'));
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    wp_enqueue_style('producta-googlefonts', esc_url_raw($fonts_url), array(), null);
}

add_action( 'enqueue_block_editor_assets', 'producta_enqueue_googlefonts' );



# Enqueue Scripts
add_action( 'wp_enqueue_scripts', 'producta_load_scripts' );
function producta_load_scripts()
{
    # CSS
    wp_enqueue_style('bootstrap', PRODUCTA_LIBS_URI . 'bootstrap/bootstrap.min.css');
    wp_enqueue_style('azura-font-awesome', PRODUCTA_LIBS_URI . 'font-awesome/css/all.min.css');
    wp_enqueue_style('chosen', PRODUCTA_LIBS_URI . 'chosen/chosen.css');
    wp_enqueue_style('owl-carousel', PRODUCTA_LIBS_URI . 'owl/owl.carousel.css');
    wp_enqueue_style('producta-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('producta-theme-style', get_template_directory_uri() . '/assets/css/theme.css', '', rand(0,9999) );

    # JS
    wp_enqueue_script('jquery');
	wp_enqueue_script('fitvids', PRODUCTA_LIBS_URI . 'fitvids/fitvids.js', array(), false, true);
    wp_enqueue_script('owl-carousel', PRODUCTA_LIBS_URI . 'owl/owl.carousel.js', array(), false, true);
    wp_enqueue_script('chosen', PRODUCTA_LIBS_URI . 'chosen/chosen.js', array(), false, true);
    wp_enqueue_script('producta-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array(), false, true);
    
    if ( is_singular() && get_option('thread_comments') ) {
        wp_enqueue_script('comment-reply');
    }
}

# Register Sidebar
add_action( 'widgets_init', 'producta_widgets_init' );
function producta_widgets_init() {
    register_sidebar(array(
		'name'            => esc_html__('Sidebar', 'producta'),
		'id'              => 'sidebar',
		'before_widget'   => '<div id="%1$s" class="widget %2$s">',
		'after_widget'    => '</div>',
		'before_title'    => '<h3 class="widget-title">',
		'after_title'     => '</h3>'
	));
    register_sidebar(array(
        'name'            => esc_html__('Newsletter', 'producta'),
        'id'              => 'newsletter',
        'before_widget'   => '<div id="%1$s" class="widget %2$s">',
        'after_widget'    => '</div>',
        'before_title'    => '<h3 class="widget-title">',
        'after_title'     => '</h3>'
    ));
    register_sidebar(array(
        'name'            => esc_html__('Menu footer 1', 'producta'),
        'id'              => 'menu_footer1',
        'before_widget'   => '<div id="%1$s" class="widget %2$s">',
        'after_widget'    => '</div>',
        'before_title'    => '<h3 class="widget-title">',
        'after_title'     => '</h3>'
    ));
    register_sidebar(array(
        'name'            => esc_html__('Menu footer 2', 'producta'),
        'id'              => 'menu_footer2',
        'before_widget'   => '<div id="%1$s" class="widget %2$s">',
        'after_widget'    => '</div>',
        'before_title'    => '<h3 class="widget-title">',
        'after_title'     => '</h3>'
    ));
    register_sidebar(array(
        'name'            => esc_html__('Newsletter footer', 'producta'),
        'id'              => 'newsletter_footer',
        'before_widget'   => '<div id="%1$s" class="widget %2$s">',
        'after_widget'    => '</div>',
        'before_title'    => '<h3 class="widget-title">',
        'after_title'     => '</h3>'
    ));
}

# Check file exists
function producta_require_file( $path ) {
    if ( file_exists($path) ) {
        require $path;
    }
}

# Require file
producta_require_file( get_template_directory() . '/core/init.php' );


# Comment Layout
function producta_custom_comment($comment, $args, $depth) {
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
        <div class="comment-author">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        </div>
        <div class="comment-content">
            <div class="header-comment-body">
                <h4 class="author-name"><?php echo get_comment_author_link(); ?></h4>
                <div class="date-comment">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                    <?php printf( esc_html__('%1$s at %2$s', 'producta'), get_comment_date(),  get_comment_time() ); ?></a>
                </div>
                <div class="reply">
                    <?php edit_comment_link( esc_html__( '(Edit)', 'producta' ), '  ', '' );?>
                    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </div>
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'producta' ); ?></em>
                <br />
            <?php endif; ?>
            <div class="comment-text"><?php comment_text(); ?></div>
        </div>  
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php
}

#Pagination
function producta_pagination() {
    if ( get_the_posts_pagination() ) : ?>
    <div class="producta-pagination"><?php
        $args = array(
            'prev_text' => '<span class="fa fa-angle-left"></span>',
            'next_text' => '<span class="fa fa-angle-right"></span>'
        );
        the_posts_pagination($args);
    ?>
    </div>
    <?php
    endif;
}

# Include the TGM_Plugin_Activation class
add_action('tgmpa_register', 'producta_register_required_plugins');
function producta_register_required_plugins()
{
	$plugins = array(
        array(
            'name'   => esc_html__('Kirki', 'producta'),
            'slug'   => 'kirki'
        ),
		array(
            'name'   => esc_html__('AZTheme Toolkit', 'producta'),
            'slug'   => 'aztheme-toolkit',
        ),
        array(
            'name'   => esc_html__('Contact Form 7', 'producta'),
            'slug'   => 'contact-form-7'
        ),
        array(
			'name'   => esc_html__('MailChimp for WordPress', 'producta'),
			'slug'   => 'mailchimp-for-wp'
		),
        array(
            'name'   => esc_html__('Elementor', 'producta'),
            'slug'   => 'elementor'
        ),
	);

	$config = array(
		'id'           => 'producta',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => ''
	);
	tgmpa($plugins, $config);
}