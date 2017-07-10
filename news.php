<?php
/*
Template Name: News
*/
?>
<?php get_header(); ?>
<div id="page-wrap">
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
		if (has_post_thumbnail() ) { ?>
			<div>
				<div id="news_preview">
					<div class="news_titles">
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
					<h1><?php echo $subtitle; ?></h1>
					<a href="<?php echo get_permalink( $page->ID ); ?>"><ul id="overlay">
						<li><span>
							<?php echo the_post_thumbnail('newspreview'); ?>
						</span></li>
					</ul></a>
					<?php the_excerpt(); ?>
					<?php if ($projects) { ?>
						<h1 style="margin-top: 10px;">related works</h1>
						<?php foreach ($projects as $project) : // $project == post title SLUG
							$args=array(
							  'name' => $project,
							  'post_type' => 'post',
							  'post_status' => 'publish',
							  'showposts' => 1,
							  'caller_get_posts'=> 1
							);
							$rel_posts = get_posts($args);
							$project_id = $rel_posts[0]->ID; // get project ID
							$proj_cat = get_the_category($project_id); // get related post category
							//echo $project_id.', ',$proj_cat[0]->slug; ?>
							<li class="related"><a href="http://susannaheron.com/<?php if($proj_cat) { echo $proj_cat[0]->slug.'/'; } ?><?php echo $project; ?>"><?php echo get_the_title($project_id); ?></a></li>
						<?php endforeach;
					} ?>
				</div>
			</div>
		<?php } else { ?>
			<div>	
				<div id="news_preview">
					<div class="news_titles">
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
					<h1><?php echo $subtitle; ?></h1>
					<?php the_excerpt(); ?>
					<?php if ($projects) { ?>
						<h1 style="margin-top: 10px;">related works</h1>
						<?php foreach ($projects as $project) : // $project == post title SLUG
							$args=array(
							  'name' => $project,
							  'post_type' => 'post',
							  'post_status' => 'publish',
							  'showposts' => 1,
							  'caller_get_posts'=> 1
							);
							$rel_posts = get_posts($args);
							$project_id = $rel_posts[0]->ID; // get project ID
							$proj_cat = get_the_category($project_id); // get related post category
							//echo $project_id.', ',$proj_cat[0]->slug; ?>
							<li class="related"><a href="http://susannaheron.com/<?php if($proj_cat) { echo $proj_cat[0]->slug.'/'; } ?><?php echo $project; ?>"><?php echo get_the_title($project_id); ?></a></li>
						<?php endforeach;
					} ?>
				</div>
			</div>
		<?php } 
	endforeach; ?>
	</div></div>
</div>
<?php get_footer(); ?>