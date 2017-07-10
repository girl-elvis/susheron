	<div class="push"></div>
</div>
<div id="toolbox">
	<div class="addthis_toolbox addthis_default_style">
		<a class="addthis_button_linkedin"><img src="<?php bloginfo('template_url'); ?>/images/linkedin.png"></a>
  		<a class="addthis_button_email"><img src="<?php bloginfo('template_url'); ?>/images/email.png"></a>
  		<a class="addthis_button_more"><img src="<?php bloginfo('template_url'); ?>/images/netvibes.png"></a>
	</div>
	<div class="copyright">
		Copyright &copy; Susanna Heron. All rights reserved DACS <?php echo date('Y'); ?>.
	</div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.lazyload.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/custom.js"></script>

<script type="text/javascript">
// Info panel controls
function toggleAndChangeText() {
	$('.info').toggle();
	if ($('.info').css('display') == 'none') { // if panel is hidden, show "<info" with transparent bg
		$('.trigger').html('<h1><span class="arrow"><i class="fa fa-caret-left fa-fw"></i></span>info</h1>').removeClass('close').addClass('open');
		$('.panel').removeClass('color').addClass('clear');
	}
	else { // if panel is visible, show "info>" with opaque bg
		$('.trigger').html('<h1>hide info<span class="arrow"><i class="fa fa-caret-right fa-fw"></i></span></h1>').removeClass('open').addClass('close');
		$('.panel').removeClass('clear').addClass('color');
	}
}
function toggleAndChangePDF() {
	$('.about_pdf').toggle();
	if ($('.about_pdf').css('display') == 'none') { // if panel is hidden, show "<info" with transparent bg
		$('.about_trigger').html('<h1><span class="arrow">&#x25C0;</span>info</h1>').removeClass('close').addClass('open');
	}
	else { // if panel is visible, show "info>" with opaque bg
		$('.about_trigger').html('<h1>info<span class="arrow">&#x25B6;</span></h1>').removeClass('open').addClass('close');
	}
}
// NAV HIGHLIGHT on single posts
$('#top_nav a').each(function() { // check each nav link
	var linkTitle = $(this).text(); // get link text

	<?php if (is_single()) { // check if on single post
		$categories = get_the_category($post->ID); // get post categories
		if($categories) {
			foreach ($categories as $category) {
				$category_title = $category->cat_name; // get post category title
			}
		}
	} ?>
	var postCategory = '<?php echo $category_title; ?>'; // switch PHP variable to jQuery
	if ( (linkTitle == 'Writing') && (postCategory == 'Selected Writing') ) {
		$(this).addClass('current');
	} else if ( (linkTitle == 'Writing') && (postCategory == 'Bibliography') ) {
		$(this).addClass('current');
	}
	if ( linkTitle == postCategory ) { // if link text and post category match
		$(this).addClass('current'); // highlight link
	}
});
// NAV HIGHLIGHT on WRITING subposts
<?php if(is_single()) { ?>
	var url = window.location.pathname;
	url = url.split("/");
	$('.about_nav .page_item h1').each(function() {
		var titleText = $(this).text();
		var titleSlug = titleText.replace(/\s+/g, '-').toLowerCase();
		if(titleSlug == url[1]) {
			$(this).parent('a').addClass('current');
		}
	});
<?php } ?>
// NAV HIGHLIGHT on WRITING pages
<?php if(is_page('Writing')) { ?>
	$('.about_nav .page_item h1').each(function() {
		var titleText = $(this).text();
		if(titleText == 'Bibliography') {
			$(this).parent('a').addClass('current');
		}
	});
<?php } ?>
</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f395f5441a76a5d"></script>

<!--WP generated footer-->
<?php wp_footer(); ?>
<!--END WP generated footer-->
</body>
</html>