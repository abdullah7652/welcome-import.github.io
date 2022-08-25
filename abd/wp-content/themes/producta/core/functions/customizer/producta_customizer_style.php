<?php
function producta_custom_css() {	
    $custom_css = "";

    if (get_theme_mod( 'producta_accent_color' )) {
        $producta_accent_color = esc_attr( get_theme_mod('producta_accent_color') );
        $custom_css .= "
            :root {
              --accent-color: {$producta_accent_color};
            }
        ";
    }

    if (get_theme_mod( 'producta_secondary_color' )) {
        $producta_secondary_color = esc_attr( get_theme_mod('producta_secondary_color') );
        $custom_css .= "
            :root {
              --color-secondary: {$producta_secondary_color};
            }
        ";
    }

    wp_add_inline_style( 'producta-theme-style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'producta_custom_css', 15 );
