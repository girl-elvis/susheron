<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.4.1/build/cssreset/cssreset-min.css" />

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript" src="http://use.typekit.com/jyv8ncg.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<!--WP generated header-->
<?php wp_head(); ?>
<!--END WP generated header-->

</head>
<body>
<div id="wrapper">
<div id="bar"></div>
<div id="container">
	<div id="name">
		<a href="/">SUSANNA HERON</a>
	</div>
	<div id="top_nav">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<?php
wp_nav_menu( array(
    'menu' => 'Main Navigation'
) );
?>

			<ul class="left">
			      <?php echo $pageLeft; ?>
			</ul>
			<ul class="right">
			      <?php echo $pageRight; ?>
			</ul>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	</div>
</div>