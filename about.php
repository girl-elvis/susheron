<?php
/*
Template Name: About
*/
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php $subtitle = get_post_meta($post->ID, 'SUBTITLE', true); ?>
	<div class="textwrap">
		<?php
		if($post->post_parent)
			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0&link_before=<h1>&link_after=</h1>");
		else
			$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&link_before=<h1>&link_after=</h1>");
		if ($children) { ?>
			<ul class="about_nav">
				<li class="page_item"><h1><a href="<?php echo get_permalink(28); ?>" <?php if(is_page(28)){ echo 'class="current"'; } ?>>Introduction</a></h1></li>
				<?php echo $children; ?>
			</ul>
		<?php } ?>
			<div class="about_txt">
				<?php the_content(); ?>
			</div>
	</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>