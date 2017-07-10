<?php
/*
Template Name: Project Category
*/
?>
<?php get_header(); ?>
	
<div id="page-wrap">
	<table><tr>
	<?php
	global $post;
	$current = $post->post_title; // get current post title
	$id = get_cat_id($current); // get category id based on title
	$postslist =
	get_posts('category='.$id.'&numberposts=-1&order=DESC&orderby=post_date&post_type=post&post_status=publish'); 
	// get all posts in that category
	if (count($postslist) != 0) { // if there are posts
		foreach ($postslist as $post) :
			setup_postdata($post); 
			if (has_post_thumbnail() ) { ?> 
				<td>
					<div class="preview">
						<?php $event_date = get_post_meta($post->ID, 'DATE', true);
						$location = get_post_meta($post->ID, 'LOCATION', true); ?>
						<div class="titles">
							<a href="<?php echo get_permalink( $page->ID ); ?>"><h1>
								<?php 
								$current = get_post_meta(get_the_ID(), 'status');
								if($current) echo ('<span class="current">' . $current[0][0] . ' </span>');
								if ($event_date) { 
								echo $event_date; 
								echo '&emsp;&emsp;';
								} 
								echo the_title(); 
								if ($location) { 
									echo ', <span class="gray">';
									echo $location;
									echo '</span>';
								} ?>
							</h1></a>
						</div>
						<div class="blank"><div class="loading"><img src="<?php bloginfo('template_url'); ?>/images/ajax-loader.gif"></div></div>
						<div class="post_image">
							<a href="<?php echo get_permalink( $page->ID ); ?>">
								<ul id="overlay">
									<li><span>
										<?php echo the_post_thumbnail('postfull'); ?>
									</span></li>
								</ul>
							</a>
						</div>
					</div>
				</td>
			<?php } else { ?> 
				<td>	
					<div class="preview">
						<?php $event_date = get_post_meta($post->ID, 'DATE', true);
						$location = get_post_meta($post->ID, 'LOCATION', true); ?>
						<div class="titles">
							<a href="<?php echo get_permalink( $page->ID ); ?>"><h1>
								<?php if ($event_date) { 
								echo $event_date; 
								echo '&emsp;&emsp;';
								} 
								echo the_title(); 
								if ($location) { 
									echo ', <span class="gray">';
									echo $location;
									echo '</span>';
								} ?>
							</h1></a>
						</div>
						<div class="post_image">
							<p>Featured Image needed</p>
						</div>
					</div>
				</td>
		<?php } endforeach; } 
	else { ?>
		<td><p>Coming soon.</p></td>
	<?php } ?>
	</tr></table>
</div>

<?php get_footer(); ?>
