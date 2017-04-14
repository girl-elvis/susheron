<?php
/*
Template Name: Holding
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
	body { color: #fff; }
	.loading { background-image: url('http://susannaheron.com/wp-content/themes/SH_theme/images/ajax-loader-dark.gif'); }
	</style>
<? } 
//light image
if( strpos( $backgroundImage,'/light/' ) !== false )
{ ?>
	<style type="text/css">
  	body { color: #000; }
	.loading { background-image: url('http://susannaheron.com/wp-content/themes/SH_theme/images/ajax-loader.gif'); }
	</style>
<? } ?>

<style type="text/css">
	.holding {
		position: relative;
		width: 500px;
		margin: 0 auto;
		text-align: center;
		padding-top: 25%;
	}
</style>
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
	<div class="holding">
		<li style="font: 35px 'p22-underground-sc';" >SUSANNA HERON</span>
		<li style="font-size: 15px; font-style: italic;">temporarily down for maintenance</li>
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