<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<div id="sidescroll">

	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
			
		<?php the_content(); ?>
				
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>