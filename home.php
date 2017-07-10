<?php
/*
Template Name: Home Page
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<title>Susanna Heron</title>

<?php
//make a place to hold location of background images
$allBackgroundImages = array();
$dir =  parse_url (get_bloginfo("stylesheet_directory"));
$dir = substr(($dir["path"]), 1);
//collect all the files in images/dark/ into $allBackgroundImages
foreach( scandir( $dir . '/backgrounds/dark/' ) as $file )
{
  if( $file != '.' && $file != '..' )
  {
    array_push( $allBackgroundImages,  $dir . '/backgrounds/dark/' . $file );
  }
}

//now add all the files in images/light/ into $allBackgroundImages
foreach( scandir( $dir . '/backgrounds/light/' ) as $file )
{
  if( $file != '.' && $file != '..' )
  {
    array_push( $allBackgroundImages, $dir . '/backgrounds/light/' . $file );
  }
}

//randomise the collection of filenames
shuffle( $allBackgroundImages );

//take the first one out of the random collection
$backgroundImage = array_pop( $allBackgroundImages );

//dark image
if( strpos( $backgroundImage,'/dark/' ) !== false )
{ ?>
	<style type="text/css">
	html { background: #000 !important; }
  	#home_name a:link, #home_name a:visited, #home_name a:active, 
  	#home_top_nav a:link, #home_top_nav a:visited, #home_top_nav a:active, 
  	.homenews a:link , .homenews a:visited, .homenews a:active
  	{ color: #fff; text-decoration: none; border: 0; }
	#home_name a:hover, #home_top_nav a:hover { color: #F06; text-decoration: none; border: 0; }
	.loading { background-image: url( $dir . '/images/ajax-loader-dark.gif'); }
	</style>
<? } 
//light image
if( strpos( $backgroundImage,'/light/' ) !== false )
{ ?>
	<style type="text/css">
  	#home_name a:link, #home_name a:visited, #home_name a:active, #home_top_nav a:link, #home_top_nav a:visited, #home_top_nav a:active, 
  	.homenews a:link , .homenews a:visited, .homenews a:active { color: #000; text-decoration: none; border: 0; }
	#home_name a:hover, #home_top_nav a:hover { color: #F06; text-decoration: none; border: 0; }
	.loading { background-image: url($dir . '/images/ajax-loader.gif'); }
	</style>
<? } ?>
 
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.4.1/build/cssreset/cssreset-min.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.maximage.css" type="text/css" />

<script type="text/javascript" src="http://use.typekit.com/jyv8ncg.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.maximage.min.js"></script>

</head>
<body <?php body_class(); ?>>

<div id="container">
	<div id="home_name">
		<a href="/">SUSANNA HERON</a>
	</div>
	<div id="home_top_nav">	

<?php
wp_nav_menu( array(
    'menu' => 'Main Navigation'
) );
?>


	</div>
</div>
<div class="blank"><div class="loading"></div></div>
<div class="maximage">
	<img src="http://susannaheron.com/<?php echo $backgroundImage; ?>">
</div>
<div class="homenews">

<?php

 if( have_rows('link_to_page') ):  ?>


	    <ul>
	    <?php while ( have_rows('link_to_page') ) : the_row(); ?>   
 
                <li>
 
                    <?php $post_object = get_sub_field('page'); ?>
 
                    <?php if( $post_object ): ?>
 
                        <?php $post = $post_object; setup_postdata( $post ); ?>
 
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
 
                        <?php wp_reset_postdata(); ?>
 
                    <?php endif; ?>
 
                </li>
 
		<?php endwhile; ?>
	    </ul>
	    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>


 <?php endif; ?>






</div>
<script type="text/javascript">
$(document).ready(function () {
	$('.maximage img').hide();
});
$(window).load(function () {
	$('.maximage').maximage();
	$('.blank').fadeOut();
	$('.maximage img').fadeIn();
});
</script>
</body>
</html>