<?php
/*
Template Name: Writing
*/
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php $subtitle = get_post_meta($post->ID, 'SUBTITLE', true); 
	$biblioID = get_page_by_title('Bibliography')->ID;
	$biblio = get_post($biblioID); ?>
	<div class="textwrap">
		<?php
		if($post->post_parent) {
			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0&link_before=<h1>&link_after=</h1>");
		} else {
			$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&link_before=<h1>&link_after=</h1>");
		}
		if ($children) { ?>
			<ul class="about_nav">
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