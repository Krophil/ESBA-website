(function($) {
    $(function() {
        $('.jcarousel').jcarousel();
        
        $('.jcarousel')
        .jcarousel({
            // Core configuration goes here
        })
        .jcarouselAutoscroll({
            interval: 3000,
            target: '+=1',
            autostart: true
        })
    ;
    	
    	$('.jcarousel')
			.on('jcarousel:create jcarousel:reload', function() {
				var element = $(this),
				    width = element.innerWidth();

				// This shows 1 item at a time.
				// Divide `width` to the number of items you want to display,
				// eg. `width = width / 3` to display 3 items at a time.
				element.jcarousel('items').css('width', width + 'px');
			})
			.jcarousel({
				wrap: 'circular'
			});

        $('.jcarousel-control-prev')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .jcarouselPagination();
        
    });
})(jQuery);
