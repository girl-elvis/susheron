$(document).ready(function () {
	// hide info panel
	// $('.info').hide();
	// hide about panel
	$('.about_pdf').hide();
	// Hide images
	$('img').hide();
    $('.blank img').show();

	// Image overlay
	var url = document.location.href;
	if (url == 'video/') {
        $('#overlay span').bind('mouseover', function () {
            $(this).parent('li').css({position: 'relative'});
            var img = $(this).children('img');
            $('<div />').text(' ').css({
                'height': img.height(),
                'width': img.width(),
                'background-color': 'black',
                'position': 'absolute',
                'top': 0,
                'left': 0,
                'opacity': 0.4
            }).addClass("over").prepend('<div class="overlay_arrow">&#x25B6;</div>').bind('mouseout', function () {
                $(this).remove();
            }).insertAfter(this);
        });
	} else {
        $('#overlay span').bind('mouseover', function () { // when you mouseover a thumbnail, do this
            $(this).parent('li').css({position: 'relative'});
            var img = $(this).children('img');
            $('<div />').text(' ').css({
                'height': img.height(),
                'width': img.width(),
                'background-color': 'black',
                'position': 'absolute',
                'top': 0,
                'left': 0,
                'opacity': 0.4
            }).addClass("over").bind('mouseout', function () {
                $(this).remove();
            }).insertAfter(this);
        });
	}
});

$(window).load(function () {
    $('.blank').fadeOut('slow');
	// Fade in images once loaded
	$('img').hide().not(function () {
		return this.complete && $(this).fadeIn();
	}).bind('load', function () { $(this).fadeIn(); });

    // Remove lazy load from first 15 images
    $('.drawing_thumb img').slice(0,15).each(function () {
        var origImg = $(this).attr('data-original');
        $(this).removeClass('lazy').attr('src', origImg );
    });

    // Lazy load drawing thumbnails
    $('.lazy').lazyload({ effect: 'fadeIn' });

	// Image widths
    $('.post_image').each(function () { 
        'use strict';
		var newW = ((($(this).find('img').width()) / ($(this).find('img').height())) * $(this).height()) + 'px';
		var newH = $(this).height() + 'px';
		$(this).css('width', newW);
		$(this).find('img').css('max-width', newW).css('max-height', newH);
    });
    // Image titles width
    $('.preview').each(function () {
        var imgWidth = $(this).find('.post_image').width();
        $(this).find('.titles').css('width', imgWidth);
    });

    // Drawing thumbnail SET height
	var drHeight = ($(window).height() * 0.25);
	$('.thumb_set img').css('height', drHeight);

	// General fancybox settings
	$(".fancybox").fancybox( {
		helpers : {
            title : {
                type : 'inside' // position captions inside frame
            }
        },
        beforeLoad: function() {
			this.title = $(this.element).attr('caption');
		},
		afterLoad : function () {
			this.title = (this.index + 1) + ' / ' + this.group.length + '<br />' + (this.title ? '' + this.title : '');
		}
	});
	// Hide default title tooltip
	$('a.fancybox["title"]').on('mouseenter', function(e){
		e.preventDefault();
	});

	// PDF fancybox settings
	$('.fancypdf').fancybox({
		'type': 'iframe',
		'centerOnScroll': true,
		'width': 800,
		'height': 600,
		'margin': 20,
		'autoScale': false,
		'autoDimensions': false,
	});
});

$(window).resize(function () {
	// Image widths
    $('.post_image').each(function () { 
        'use strict';
		var newW = ((($(this).find('img').width()) / ($(this).find('img').height())) * $(this).height()) + 'px';
		var newH = $(this).height() + 'px';
		$(this).css('width', newW);
		$(this).find('img').css('max-width', newW).css('max-height', newH);
    });
    // recalc image Titles widths
    $('.preview').each(function () {
        var imgWidth2 = $(this).find('.post_image').width();
        $(this).find('.titles').css('width', imgWidth2);
    });
	// recalc drawing thumbnail SET height
	var drHeight2 = ($(window).height() * 0.25);
	$('.thumb_set img').css('height', drHeight2);
});
