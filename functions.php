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

function tassets() {
	if ( is_front_page() ) {	
			wp_enqueue_style('cssreset', "http://yui.yahooapis.com/3.4.1/build/cssreset/cssreset-min.css");	
		wp_enqueue_style('homestyle', bloginfo('template_url') . "/css/home.css",'cssreset');	

		wp_enqueue_style('jquery-maximage', bloginfo('template_url') ."/css/jquery.maximage.css");		

		wp_enqueue_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js");
		wp_enqueue_script('jquery-cycle', "https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.cycle.all.js", 'jquery');
		wp_enqueue_script('jquery-maximage', "https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.maximage.all.js",  'jquery');
	} else {
			wp_enqueue_style('cssreset', "http://yui.yahooapis.com/3.4.1/build/cssreset/cssreset-min.css");	
		wp_enqueue_style('font-awesome', "//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css");
		wp_enqueue_style('style', bloginfo('template_url') . "/style.css", 'cssreset');
		wp_enqueue_style('fancybox', bloginfo('template_url') . "/css/jquery.fancybox.css");
	}
	wp_enqueue_script('typekit', "http://use.typekit.com/jyv8ncg.js", [], null, true);
	wp_add_inline_script('typekit-load', "try{Typekit.load();}catch(e){}");
}
//add_action('wp_enqueue_scripts', 'tassets');


?>