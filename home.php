<?php
/*
Template Name: Home Page
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Susanna Heron</title>

<?php
//make a place to hold location of background images
$allBackgroundImages = array();

//collect all the files in images/dark/ into $allBackgroundImages
foreach( scandir( 'wp-content/themes/SH_theme/backgrounds/dark/' ) as $file )
{
  if( $file != '.' && $file != '..' )
  {
    array_push( $allBackgroundImages, 'wp-content/themes/SH_theme/backgrounds/dark/' . $file );
  }
}

//now add all the files in images/light/ into $allBackgroundImages
foreach( scandir( 'wp-content/themes/SH_theme/backgrounds/light/' ) as $file )
{
  if( $file != '.' && $file != '..' )
  {
    array_push( $allBackgroundImages, 'wp-content/themes/SH_theme/backgrounds/light/' . $file );
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
  	#home_name a:link, #home_name a:visited, #home_name a:active, #home_top_nav a:link, #home_top_nav a:visited, #home_top_nav a:active { color: #fff; text-decoration: none; border: 0; }
	#home_name a:hover, #home_top_nav a:hover { color: #F06; text-decoration: none; border: 0; }
	.loading { background-image: url('http://susannaheron.com/wp-content/themes/SH_theme/images/ajax-loader-dark.gif'); }
	</style>
<? } 
//light image
if( strpos( $backgroundImage,'/light/' ) !== false )
{ ?>
	<style type="text/css">
  	#home_name a:link, #home_name a:visited, #home_name a:active, #home_top_nav a:link, #home_top_nav a:visited, #home_top_nav a:active { color: #000; text-decoration: none; border: 0; }
	#home_name a:hover, #home_top_nav a:hover { color: #F06; text-decoration: none; border: 0; }
	.loading { background-image: url('http://susannaheron.com/wp-content/themes/SH_theme/images/ajax-loader.gif'); }
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
<body>
<body>
<div id="container">
	<div id="home_name">
		<a href="http://susannaheron.com/home/">SUSANNA HERON</a>
	</div>
	<div id="home_top_nav">	
<!-- 		<ul class="left">
			<li><a href="http://susannaheron.com/relief/">Relief</a></li>
			<li><a href="http://susannaheron.com/landscape/">Landscape</a></li>
			<li><a href="http://susannaheron.com/photography/">Photography</a></li>
			<li><a href="http://susannaheron.com/drawings/">Drawings</a></li>
			<li><a href="http://susannaheron.com/exhibitions/">Exhibitions</a></li>
		</ul>
		<ul class="right">
			<li><a href="http://susannaheron.com/photography-1978-83/">Photography 1978-83</a></li>
			<li><a href="http://susannaheron.com/jewellery-1970-82/">Jewellery 1970-82</a></li>
			<li><a href="http://susannaheron.com/writing/">Writing</a></li>
			<li><a href="http://susannaheron.com/about/">About</a></li>
			<li><a href="http://susannaheron.com/news/">News</a></li>
		</ul> -->


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