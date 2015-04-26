jQuery(document).ready(function() {

	/* Mobile Menu --- */
	jQuery('.mobile-nav-toggle').click(function(e) {
		e.preventDefault();
		jQuery('body').toggleClass('mobile-nav-active');
	});


	/* Grid Isotope --- */
	var $gridContainer = jQuery('.primary-grid'), 
		filters = {}, tempFilters = [];

	$gridContainer.isotope({ itemSelector : 'li' });
	jQuery(window).smartresize(function(){ $gridContainer.isotope( 'reLayout' ); });

	jQuery('.primary-filter a').click(function(e){
		e.preventDefault();
		jQuery(this).parent().parent().find('a').removeClass('selected');
		jQuery(this).addClass('selected');
		$gridContainer.isotope({ filter: jQuery(this).attr('data-filter') });

		setTimeout(function(){ jQuery(window).scroll(); }, 850); // For Infinite Scroll
	});

	jQuery('.venue-filter a').click(function(e){
		e.preventDefault();
		jQuery(this).parent().parent().find('a').removeClass('selected');
		jQuery(this).addClass('selected');

		filters[ 'category' ] = jQuery('.venue-filter.category a.selected').attr('data-filter');
		filters[ 'location' ] = jQuery('.venue-filter.location a.selected').attr('data-filter');
		filters[ 'size' ] = jQuery('.venue-filter.size a.selected').attr('data-filter');

		tempFilters = [];
		for ( var prop in filters ) tempFilters.push( filters[ prop ] );
		$gridContainer.isotope({ filter: tempFilters.join('') });

		setTimeout(function(){ jQuery(window).scroll(); }, 850); // For Infinite Scroll
	});


	/* Infinite Scrolling --- */
	var content = '.infinite-content',
		grid = '.infinite-grid',
		nav = '.infinite-pagination',
		loadingArray = {
			selector: ".load-more",
			img: "",
			finishedMsg: "<span>You've reached the end.</span>",
			msgText: "<div class=\"spinner\"><div class=\"mask\"><div class=\"maskedCircle\"></div></div></div>Loading ...",
		};
		
	jQuery(content).infinitescroll({
		navSelector: nav,
		nextSelector: nav+" a:last",
		itemSelector: content+" .post",
		prefill: true,
		bufferPx: 80,
		loading: loadingArray
	}, function(e){
		jQuery(e).hide().slideDown();
	});
	jQuery(grid).infinitescroll({
		navSelector: nav,
		nextSelector: nav+" a:last",
		itemSelector: grid+">li",
		prefill: true,
		bufferPx: 80,
		loading: loadingArray
	}, function(e){
		var length = e.length, elements = "";
		elements = jQuery(e).clone().wrap('div');
		jQuery(e).remove();
		$gridContainer.isotope('insert', elements);

	});
	jQuery(nav).hide();


	/* Content Slider --- */
	jQuery('.content-slider').royalSlider({
		autoHeight: true,
		arrowsNav: false,
		autoPlay: {
    		// autoplay options go gere
    		enabled: true,
    		pauseOnHover: true,
    		delay:	5000
    	},
		fadeinLoadedSlide: false,
		controlNavigationSpacing: 0,
		controlNavigation: 'bullets',
		imageScaleMode: 'none',
		imageAlignCenter:false,
		loop: true,
		loopRewind: true,
		keyboardNavEnabled: false,
		usePreloader: false
	});


	/* Google Maps Links --- */
	jQuery('h4 address').each(function () {
		var link = '<a href="http://maps.google.com/maps?q=' + encodeURIComponent( jQuery(this).text() ) + '" target="_blank">' + jQuery(this).text() + '</a>';
		jQuery(this).html(link);
	});

});

//Fix z-index youtube video embedding
jQuery(document).ready(function (){
    jQuery('iframe').each(function(){
        var url = jQuery(this).attr("src");
        jQuery(this).attr("src",url+"?wmode=transparent");
    });
});
