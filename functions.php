<?php 

if (function_exists( 'add_theme_support' ) ) {
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( $width = 175, $height = 135, $crop = true );
}

if (function_exists( 'add_image_size' ) ) {
add_image_size( 'postfull', 9999, 680 );
add_image_size( 'newspreview', 550, 360, true );
add_image_size( 'newsfull', 730, 480, true );
}



?>