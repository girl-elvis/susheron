<?php
/*
Template Name: Drawings List
*/
?>

<?php get_header(); ?>

	<div class="panel clear">
		<a href="http://susannaheron.com/drawings" class="listorthumb"><h1><span class="arrow"><i class="fa fa-caret-left fa-fw"></i></span>Thumbnail View</h1></a>
	</div>

<div class="thumb_container">
	<ul style="float: left;">
		<?php 
		$drawingsID = get_category_by_slug('drawings')->term_id; // drawings category ID
		$drawings = get_posts('numberposts=-1&orderby=post_date&category='.$drawingsID);
		foreach ($drawings as $post) {
			/*$args = array(
				'order'          => 'ASC',
				'post_type'      => 'attachment',
				'numberposts'    => 6,
				'post_status'    => null,
				'post_parent'    => $post->ID,
				'post_mime_type' => 'image',
				'orderby'	 	 => 'menu_order',
				'order' 		 => 'ASC',
			);
			$attachments = get_posts($args);
			if ($attachments) {
				foreach ($attachments as $attachment) {
					$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
					$image_title = $attachment->post_title; ?>
					<li class="list">
						<a href="<?php echo the_permalink(); ?>"><?php echo $image_title; ?></a>
					</li>
				<?php }
			}*/
			$event_date = get_post_meta($post->ID, 'DATE', true); ?>
			<a href="<?php echo the_permalink(); ?>"><h1><?php echo $event_date; ?>&emsp;&emsp;<?php echo the_title(); ?></h1></a>
		<?php } ?>
	</ul>
</div>

<?php get_footer(); ?>
