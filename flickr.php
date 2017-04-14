<script type="text/javascript">
$(document).ready(function() {
    $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",
	{
		id: "8657875@N04",
		lang: "en-us",
		tags: "heron",
		format: "json"
	}, 

function displayImages(data) {
	  
        // Start putting together the HTML string
		var listItems = '';
		
		// Cyle through array of Flickr photo details
		$.each(data.items, function(i,item){

			// Get different image sizes
			var sourceM640 = (item.media.m).replace("_m.jpg", "_z.jpg");
			var sourceLarge = (item.media.m).replace("_m.jpg", "_b.jpg");

			// Here's where we piece together the HTML
			listItems 
				+= '<td><div id="flickrimg">' +
					'<a href="' + sourceLarge + '" target="_blank">' +
					'<img title="' + item.title + '" src="' + sourceM640 +
					'" alt="'; listItems += item.title + '" />' +
					'</a></div></td>';
		
		});
		// add into <tr></tr>
        $('tr').html(listItems);
    });  
});
</script>