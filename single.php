<?php get_header(); ?>
	<?php if(in_category('news')) { // if in NEWS ?>
		<div id="page-wrap">
			<table><tr>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				setup_postdata($post);
				$event_date = get_post_meta($post->ID, 'DATE', true);
				$location = get_post_meta($post->ID, 'LOCATION', true);
				$projects = get_post_meta($post->ID, 'RELATED', false); // check for related projects ?>
				<div class="news_titles">	
					<h1>
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
					</h1>
				</div>
				<td>
					<div class="news_article"><?php if (has_post_thumbnail() ) { ?>
						<div class="news_img">
							<?php echo the_post_thumbnail('large'); ?>
						</div>
					<?php } ?>
						<?php echo the_content(); ?>
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
								<li class="related"><a href="/<?php if($proj_cat) { echo $proj_cat[0]->slug.'/'; } ?><?php echo $project; ?>"><?php echo get_the_title($project_id); ?></a></li>
							<?php endforeach;
						} ?>
					</div>
					<?php if (has_post_thumbnail() ) { ?>
						<div class="news_img">
							<?php echo the_post_thumbnail('large'); ?>
						</div>
					<?php } ?>
				</td>
				<?php endwhile; endif; ?>
			</tr></table>   <div class="morenews"><a href="/news/" class="news"><i class="fa fa-caret-left fa-fw"></i> More News</a></div>
		</div>
	<?php } else if(in_category('Selected Writing') OR in_category('Bibliography')) { // if in WRITING ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php $subtitle = get_post_meta($post->ID, 'SUBTITLE', true); ?>
			<div class="textwrap">
				<?php 
				$category = get_the_category($post->ID);
				$catTitle = $category[0]->cat_name;
				$section = get_page_by_title($catTitle);
				if($section->post_parent) {
					$children = wp_list_pages("title_li=&child_of=".$section->post_parent."&echo=0&link_before=<h1>&link_after=</h1>");
				}
				if ($children) { ?>
					<ul class="about_nav">
						<?php echo $children; ?>
					</ul>
				<?php } ?>
				<div class="about_txt">
					<h1 style="padding-bottom: 25px !important;"><?php the_title(); ?></h1>
					<?php // display link to PDF 
					$args = array(
						'post_type' => 'attachment',
						'numberposts' => -1,
						'post_status' => null,
						'post_parent' => $post->ID,
						'post_mime_type' => 'application/pdf',
					);
					$PDFs = get_posts( $args );
					if ( $PDFs ) { ?>
						<?php foreach ( $PDFs as $PDF ) { ?>
							<li class="pdf" style="padding-bottom: 10px;"><img style="vertical-align: bottom; margin-right: 5px;" src="<?php bloginfo('template_url'); ?>/images/pdf_icon.png"><a class="fancypdf" style="padding-bottom: 20px;"  href="http://docs.google.com/gview?url=<?php echo wp_get_attachment_url( $PDF->ID ); ?>&embedded=true"><?php echo $PDF->post_title; ?></a></li>
						<?php } 
					} ?>
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; endif; ?>
		</div>
	
	<?php } else { // all other categories ?>
		
		<div class="blank"><div class="loading"><img src="<?php bloginfo('template_url'); ?>/images/ajax-loader.gif"></div></div>
		<div id="page-wrap">
<div class="single_titles">
						<h1>
						<?php
								$event_date = get_post_meta($post->ID, 'DATE', true);
								$current = get_post_meta(get_the_ID(), 'status');
								if($current[0][0]) echo ('<span class="current">' . $current[0][0] . ': </span>');
							 if ($event_date) { 
								echo $event_date; 
								echo '&emsp;';
							} 
							echo the_title(); 
							if ($location) { 
								echo ', <span class="gray">';
								echo $location;
								echo '</span>';
							} ?>
						</h1>
					</div>

			<table>
	

		
			<tr>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
				$event_date = get_post_meta($post->ID, 'DATE', true);
				$location = get_post_meta($post->ID, 'LOCATION', true); ?>
					
				
				<?php if(in_category('video')) { // if in video category ?> 
					<?php $video = get_post_meta($post->ID, 'VIDEO', true); ?>
					<?php if ($video) { // if video custom field can be found
						echo "<iframe class=\"video\" src=\"http://player.vimeo.com/video/".$video."?color=dddddd\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>";
					} 
				} else { // all other categories ?>
					<!-- if video, show it first. -->
					<?php
					$video = get_post_meta(get_the_ID(), 'videolink');
					if($video) {
						 echo "<td><iframe class=\"video\" src=\"http://player.vimeo.com/video/".$video[0]."?color=dddddd\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></td>";
					}

					 // show images from post gallery
					$args = array(
						'post_type' 	=> 'attachment',
						'numberposts' 	=> -1,
						'post_status' 	=> null,
						'post_parent' 	=> $post->ID,
						'post_mime_type' => 'image',
						'orderby' 		=> 'menu_order',
						'order' 		=> 'ASC',
						);
					$attachments = get_posts( $args );
					if ( $attachments ) { 
						if (count($attachments) == 1) { ?>
							<style type="text/css">
							.trigger {
								position: relative;
								float: left;
								padding: 0px 30px 0px 30px;
								}
							.trigger.open {
								float: left;
								}
							</style>
						<?php }
						foreach ( $attachments as $attachment ) { 
							$image_url = wp_get_attachment_image_src( $attachment->ID, 'postfull' ); ?>
							<td>
							<div class="preview">
								<div class="post_image">
									<a href="<?php echo $image_url[0]; ?>" class="fancybox" rel="group" caption="<?php echo apply_filters('the_content', $attachment->post_excerpt); ?>" title="<?php echo $attachment->post_title; ?>">
									<div class="blank"></div>
									<ul id="overlay">
										<li><span>
											<?php echo wp_get_attachment_image( $attachment->ID, 'postfull' ); ?>
										</span></li>
									</ul></a>
								</div>
							</div>
							</td>
					<?php }
					} 
				}
				endwhile; endif; ?>
			</tr></table>
<div class="panel color">
			<a class="trigger close" href="javascript:toggleAndChangeText();"><h1><span class="arrow"><i class="fa fa-caret-right fa-fw"></i></span>hide info</h1></a>
			<div class="info">
				<?php $content = the_content(); echo apply_filters('the_content', $content); 
				$projects = get_post_meta($post->ID, 'RELATED', false); // check for related projects
				if ($projects) { ?>
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
						<li class="related"><a href="/<?php if($proj_cat) { echo $proj_cat[0]->slug.'/'; } ?><?php echo $project; ?>"><?php echo get_the_title($project_id); ?></a></li>
					<?php endforeach;
				} ?>
				<?php // display link to PDF 
				$args = array(
					'post_type' => 'attachment',
					'numberposts' => -1,
					'post_status' => null,
					'post_parent' => $post->ID,
					'post_mime_type' => 'application/pdf',
				);
				$PDFs = get_posts( $args );
				if ( $PDFs ) { ?>
					<h1 style="margin-top: 20px;">more info</h1>
					<?php foreach ( $PDFs as $PDF ) { ?>
						<li class="pdf"><a class="fancypdf" style="padding-top: 20px;"  href="http://docs.google.com/gview?url=<?php echo wp_get_attachment_url( $PDF->ID ); ?>&embedded=true"><?php echo $PDF->post_title; ?></a></li>
				<?php } } ?>
			</div>
		</div>
		</div>
	<?php } ?>

<?php get_footer(); ?>
