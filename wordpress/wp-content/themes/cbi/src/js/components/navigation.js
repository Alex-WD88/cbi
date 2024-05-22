/*
Navigation script
*/

jQuery(document).ready(function ($) {
	$('.toggle_main_menu_link').click(function () {
		if ($('.mobile-menu').hasClass('close')) {
			$('.mobile-menu').removeClass('close');
			$('.mobile-menu').addClass('open');
		} else {
			$('.mobile-menu').removeClass('open');
			$('.mobile-menu').addClass('close');
		}

		return false;
	});
	$('.close_main_menu_link').click(function () {
		$('.mobile-menu').removeClass('open');
		$('.mobile-menu').addClass('close');

		return false;
	});

	$(window).load(function(e){
		if (window.location.hash) {
			var hash = window.location.hash;

			scrollTo($(hash));
		}
	});

	window.onScroll = function () {
		display_header_menu();
	};

	function onResize() {
		display_header_menu();

		window_width = viewport().width;
	}

	function display_header_menu() {
		if (viewport().width >= 1200) {
			if ($('.mobile-menu').hasClass('open')) {
				$('.mobile-menu').removeClass('open');
				$('.mobile-menu').addClass('close');
		}}
		if (window_width >= 1200 && viewport().width < 1200) {
			if ($('.mobile-menu').hasClass('open')) {
				$('.mobile-menu').removeClass('open');
				$('.mobile-menu').addClass('close');
			}
		}
	}

	let window_width = viewport().width;

	display_header_menu();
	$(window).resize(onResize);
	$(document).scroll(onScroll);
});