<?php

if ( function_exists('producta_require_file') )
{
    # Load Classes
    producta_require_file( PRODUCTA_CORE_CLASSES . 'class-tgm-plugin-activation.php' );
    
    # Load Functions
    producta_require_file( PRODUCTA_CORE_FUNCTIONS . 'customizer/producta_customizer_settings.php' );
    producta_require_file( PRODUCTA_CORE_FUNCTIONS . 'customizer/producta_customizer_style.php' );
    producta_require_file( PRODUCTA_CORE_FUNCTIONS . 'producta_resize_image.php' );

	# Widgets
    producta_require_file( PRODUCTA_CORE_PATH . 'widgets/producta_popular_posts.php' );

    #Meta
    producta_require_file( PRODUCTA_CORE_PATH . 'metabox/metabox.php' );
}