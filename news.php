<?php
/*
Template Name: News
*/
?>
<?php get_header(); ?>
<div class="textwrap">
	<div><div>
	<?php
	$newsID = get_category_by_slug('news')->term_id;
	$postslist = get_posts('category='.$newsID.'&numberposts=-1&order=DESC&orderby=post_date&post_type=post');
	foreach ($postslist as $post) :
		setup_postdata($post);
		$event_date = get_post_meta($post->ID, 'DATE', true);
		$subtitle = get_post_meta($post->ID, 'SUBTITLE', true);
		$location = get_post_meta($post->ID, 'LOCATION', true);
		$projects = get_post_meta($post->ID, 'RELATED', false); // check for related projects
		?>
			<div>
				<div id="news_preview">
					<div class="news_titles">
						<a href="<?php echo get_permalink( $page->ID ); ?>"><h1>
							<?php if ($event_date) { 
								echo $event_date; 
								echo '&emsp;';
							} 
							echo the_title(); 
							if ($location) { 
								echo ', <span class="gray">';
								echo $location;
								echo '</span>';
							} ?>
						</h1></a>
					</div>
					<h1><?php echo $subtitle; ?></h1>
					<a href="<?php echo get_permalink( $page->ID ); ?>"><ul id="overlay">
						<li><span>
							<?php echo the_post_thumbnail('newspreview'); ?>
						</span></li>
					</ul></a>
					<?php the_excerpt(); ?>
					

				</div>
			</div>
		<?php 

	endforeach; ?>
	</div></div>
</div>
<?php get_footer(); ?>