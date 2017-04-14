<?php
/*
Template Name: Drawings Page
*/
?>

<?php get_header(); ?>

<div class="panel clear">
	<a href="http://susannaheron.com/drawings/list/" class="listorthumb"><h1><span class="arrow"><i class="fa fa-caret-left fa-fw"></i></span>List View</h1></a>
</div>
<div class="thumb_container">
<div class="blank"><div class="loading"><img src="<?php bloginfo('template_url'); ?>/images/ajax-loader.gif"></div></div>
<?php 
$drawingsID = get_category_by_slug('drawings')->term_id; // drawings category ID
$drawings = get_posts('numberposts=-1&orderby=post_date&category='.$drawingsID);
foreach ($drawings as $post) {
	$args = array(
		'order'          => 'ASC',
		'post_type'      => 'attachment',
		'numberposts'    => 12,
		'post_status'    => null,
		'post_parent'    => $post->ID,
		'post_mime_type' => 'image',
		'orderby'	 	 => 'menu_order',
		'order' 		 => 'ASC',
	);
	$attachments = get_posts($args);
	if ($attachments) { 
		$event_date = get_post_meta($post->ID, 'DATE', true); ?>
		<a href="<?php echo the_permalink(); ?>">
			<div class="thumb_set">
			<h1><?php echo $event_date; ?>&emsp;&emsp;<?php echo the_title(); ?></h1>
			<?php foreach ($attachments as $attachment) { ?>
				<div class="drawing_thumb">
					<ul id="overlay">
						<li><span>
							<?php $image_attributes = wp_get_attachment_image_src($attachment->ID, 'medium'); // returns array ?>
							<img class="lazy" src="<?php bloginfo('template_url'); ?>/images/grey.gif" data-original="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>">
							<noscript><img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>"></noscript>
						</span></li>
					</ul>
				</div>
			<?php } ?>
		</div>
		</a>
	<?php }
} ?>
	
</div>

<?php get_footer(); ?>
