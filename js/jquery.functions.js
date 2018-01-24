$(document).ready(function(){

/*
 * 		Top Navigation (Dropdown Menu)
 */


	(function($) {
		$("#nav li.sub").hover(
			function() {
				$(this).find('ul:not(:animated)').fadeIn("fast");
				$('ul:first',this).css('visibility', 'visible');
			},
			function() {
				$(this).find('ul:not(:animated)').fadeOut("fast");
				$('ul:first',this).css('visibility', 'hidden');
			}
		)
	})(jQuery);

           
/*
 * 		Cycle functions (jquery.cycle.js)
 */

	// Add 'scrollVert' functionality for scroll boxe
	(function($) {

		$.fn.cycle.transitions.scrollVert = function($cont, $slides, opts) {
		    $cont.css('overflow','hidden');
		    opts.before.push(function(curr, next, opts, fwd) {
		        $(this).show();
		        var currH = curr.offsetHeight, nextH = next.offsetHeight;
		        opts.cssBefore = fwd ? { top: -nextH } : { top: nextH };
		        opts.animIn.top = 0;
		        opts.animOut.top = fwd ? currH : -currH;
		        $slides.not(curr).css(opts.cssBefore);
		    });
		    opts.cssFirst = { top: 0 };
		    opts.cssAfter = { display: 'none' }
		};

	})(jQuery);


/*
 * 		Latest News Scroller
 */

	$('#latest-news ul').cycle({ 
	    fx: 'scrollVert',
		speed: 650,
		rev: true,
		timeout: 10000,
		next:   '#latest-news ol li.next', 
	    prev:   '#latest-news ol li.previous'
	});
	
	$('#testimonials ul').cycle({ 
	    fx: 'scrollVert',
		speed: 650,
		rev: true,
		timeout: 10000,
		next:   '#testimonials ol li.next', 
	    prev:   '#testimonials ol li.previous'
	});
 
});
