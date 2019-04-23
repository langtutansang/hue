 (function ($) {
 "use strict";
	$('#menu1').metisMenu({
	});
	$('#menu1 li').each( (key, e) => {
		if($(e).find('a').attr('href') === window.location.pathname )
		$(e).addClass('mm-active')
	})
})(jQuery);
