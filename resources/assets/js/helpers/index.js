import { isEmpty } from 'lodash'
import $ from 'jquery'; 

export const setHttpToken = token => {
	if (isEmpty(token)) {
		window.axios.defaults.headers.common['Authorization'] = null
	}
	window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token
}

export const stickyElement = (anchor, elem) => {
	var window_top = $(window).scrollTop();
	var div_top = $("." + anchor).offset().top;
	if (window_top > div_top) {

		$("." + elem).animate({top: window_top - div_top + 110}, 50)
		$("." + anchor).height($("." + elem).outerHeight());
	} else {
		$("." + elem).removeClass('stick');
		$("." + anchor).height(0);
	}
}