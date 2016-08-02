jQuery(document).ready(function($) {
	"use strict";

	/* window */
	var window_width, window_height, scroll_top;

	/* admin bar */
	var adminbar = $('#wpadminbar');
	var adminbar_height = 0;

	/* header menu */
	var header = $('#cshero-header');
	var header_top = 0;

	/* scroll status */
	var scroll_status = '';

	/**
	 * window load event.
	 *
	 * Bind an event handler to the "load" JavaScript event.
	 * @author Fox
	 */
	$(window).on('load', function() {

		/** current scroll */
		scroll_top = $(window).scrollTop();

		/** current window width */
		window_width = $(window).width();

		/** current window height */
		window_height = $(window).height();

		/* get admin bar height */
		adminbar_height = adminbar.length > 0 ? adminbar.outerHeight(true) : 0 ;

		/* get top header menu */
		header_top = header.length > 0 ? header.offset().top - adminbar_height : 0 ;

		/* check sticky menu. */
		if(CMSOptions.menu_sticky == '1'){
			cms_stiky_menu(scroll_top);
		}

		/* check video size */
		cms_auto_video_width();

		/* check mobile menu */
		cms_mobile_menu();

		/* page loading */
		cms_page_loading();

		/* Encroll */
		cms_enscroll();

		/* CMS Add Class */
		cms_add_class();

		demos();

		/* check back to top */
		if(CMSOptions.back_to_top == '1'){
			/* add html. */
			$('body').append('<div id="back_to_top" class="back_to_top"><span class="go_up"></span></div><!-- #back-to-top -->');
			cms_back_to_top();
		}
		$(".cms-carousel-attorney-layout1").css('opacity','1');
		$(".view-demos").css('opacity','1');
		$(".vc_row-o-full-height").addClass('row-show').css('opacity','1');
	});

	/**
	 * reload event.
	 *
	 * Bind an event handler to the "navigate".
	 */
	window.onbeforeunload = function(){ cms_page_loading(1); }

	/**
	 * resize event.
	 *
	 * Bind an event handler to the "resize" JavaScript event, or trigger that event on an element.
	 * @author Fox
	 */
	$(window).on('resize', function(event, ui) {
		/** current window width */
		window_width = $(event.target).width();

		/** current window height */
		window_height = $(window).height();

		/** current scroll */
		scroll_top = $(window).scrollTop();

		/* check sticky menu. */
		if(CMSOptions.menu_sticky == '1'){
			cms_stiky_menu(scroll_top);
		}

		/* check mobile menu */
		cms_mobile_menu();

		/* check video size */
		cms_auto_video_width();

		/* Encroll */
		cms_enscroll();

		demos();
	});

	/**
	 * scroll event.
	 *
	 * Bind an event handler to the "scroll" JavaScript event, or trigger that event on an element.
	 * @author Fox
	 */
	var lastScrollTop = 0;

	$(window).on('scroll', function() {
		/** current scroll */
		scroll_top = $(window).scrollTop();
		/** check scroll up or down. */
		if(scroll_top < lastScrollTop) {
			/* scroll up. */
			scroll_status = 'up';
		} else {
			/* scroll down. */
			scroll_status = 'down';
		}

		lastScrollTop = scroll_top;

		/* check sticky menu. */
		if(CMSOptions.menu_sticky == '1'){
			cms_stiky_menu();
		}

		/* check back to top */
		cms_back_to_top();
	});

	/**
	 * Stiky menu
	 *
	 * Show or hide sticky menu.
	 * @author Fox
	 * @since 1.0.0
	 */
	function cms_stiky_menu() {
		if (header_top < scroll_top) {
			switch (true) {
				case (window_width > 0):
					header.addClass('header-fixed');
					break;
			}
		} else {
			header.removeClass('header-fixed');
		}
	}

	/**
	 * Mobile menu
	 *
	 * Show or hide mobile menu.
	 * @author Fox
	 * @since 1.0.0
	 */

	$('body').on('click', '#cshero-menu-mobile', function(){
		var navigation = $(this).parent().find('#cshero-header-navigation');
		if(!navigation.hasClass('collapse')){
			navigation.addClass('collapse');
		} else {
			navigation.removeClass('collapse');
		}
	});
	/**
	 * Page Loading.
	 */
	function cms_page_loading($load) {
		switch ($load) {
		case 1:
			$('#cms-loadding').css('display','block')
			break;
		default:
			$('#cms-loadding').css('display','none')
			break;
		}
	}
	/* check mobile screen. */
	function cms_mobile_menu() {
		var menu = $('#cshero-header-navigation');

		/* active mobile menu. */
		switch (true) {
		case (window_width <= 992 && window_width >= 768):
			menu.removeClass('phones-nav').addClass('tablets-nav');
			/* */
			cms_mobile_menu_group(menu);
			break;
		case (window_width <= 768):
			menu.removeClass('tablets-nav').addClass('phones-nav');
			break;
		default:
			menu.removeClass('mobile-nav tablets-nav');
			menu.find('li').removeClass('mobile-group');
			break;
		}
	}
	function demos() {
		var demo_content_h = $('.view-demos-content').height();
		$('.view-demos').css('margin-bottom',-demo_content_h+'px');
		$('.view-demos .open').on('click', function() {
	    	$('.view-demos').toggleClass('opened');
	    })
	}
	/**
	 * One page
	 *
	 * @author Fox
	 */
	if(CMSOptions.one_page == true){

		var one_page_options = {'filter' : '.onepage'};

		if(CMSOptions.one_page_speed != undefined) one_page_options.speed = parseInt(CMSOptions.one_page_speed);
		if(CMSOptions.one_page_easing != undefined) one_page_options.easing =  CMSOptions.one_page_easing;
		$('#site-navigation').singlePageNav(one_page_options);
	}

	/* Group Sub Menu */
	function cms_mobile_menu_group(nav) {
		nav.each(function(){
			$(this).find('li').each(function(){
				if($(this).find('ul:first').length > 0){
					$(this).addClass('mobile-group');
				}
			});
		});
	}

    /* CMS Gallery Popup */
    $('.cms-gallery-item').magnificPopup({
	  delegate: 'a.p-view', // child items selector, by clicking on it popup will open
	  type: 'image',
	  gallery: {
	     enabled: true
	  },
	  mainClass: 'mfp-fade'
	});

    /* CMS Modal Popup */
	$('.popup-modal').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#name',

		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});

	/**
	 * Parallax.
	 *
	 * @author Fox
	 * @since 1.0.0
	 */
	var cms_parallax = $('.cms_parallax');
	if(cms_parallax.length > 0){
		cms_parallax.each(function() {
			"use strict";
			var speed = $(this).attr('data-speed');

			speed = (speed != undefined && speed != '') ? speed : 0.1 ;

			$(this).parallax("50%", speed);
		});
	}

	/** smoothscroll */


	/**
	 * Back To Top
	 *
	 * @author Fox
	 * @since 1.0.0
	 */
	$('body').on('click', '#back_to_top', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1500);
    });

    /* Show Tooltip */
    $('.cs-social.default [data-rel="tooltip"]').tooltip();
    $('.single-gallery-wrap [data-rel="tooltip"]').tooltip();
	/* Replae placeholder input mail newsletter */
	$('#sidebar #searchform').find("input[type='text']").each(function(ev) {
	    if(!$(this).val()) {
	        $(this).attr("placeholder", "Search...");
	    }
	});
	$('#searchform').find("input[type='text']").each(function(ev) {
	    if(!$(this).val()) {
	        $(this).attr("placeholder", "Type and hit enter ...");
	    }
	});
	$('.cshero-popup-search #searchform').find("input[type='text']").each(function(ev) {
	    if(!$(this).val()) {
	        $(this).attr("placeholder", "Geben Sie ihr Suchbegriff ein, gefolgt von der Eingabetaste");
	    }
	});
	/* Show or Hide Buttom  */
	function cms_back_to_top(){
		/* Back To Top */
        if (scroll_top < window_height) {
        	$('#back_to_top').addClass('off').removeClass('on');
        } else {
        	$('#back_to_top').removeClass('off').addClass('on');
        }
	}

	/* Hide search form. */
	$(document).on('click',function(e){

		if(e.target.className == 'cshero-popup-search open')

		$('.cshero-popup-search').removeClass('open');
    });

	/**
	 * Auto width video iframe
	 *
	 * Youtube Vimeo.
	 * @author Fox
	 */
	function cms_auto_video_width() {
		$('.entry-video iframe').each(function(){
			var v_width = $(this).width();

			v_width = v_width / (16/9);
			$(this).attr('height',v_width + 35);
		})
	}
	/**
	 * Enscroll
	 *
	 *
	 * @author Fox
	 */
	function cms_enscroll() {
		$('.cshero-hidden-sidebar .sidebar-inner').enscroll();
	}

	/**
	 * Add Class
	 *
	 *
	 * @author Fox
	 */
	function cms_add_class() {
	    $(".cart-contents").on('click',function(){
			$('.widget_shopping_cart').toggleClass('open');
	    })
	    $(".nav-button-icon .fa-search").on('click',function(){
			$('.cshero-popup-search').toggleClass('open');
	    })
	    $(".nav-button-icon .fa-shopping-cart").on('click',function(){
			$('.widget_shopping_cart').toggleClass('open');
	    })

	    $("#cshero-header-navigation .hidden-sidebar").on('click',function(){
			$('.cshero-hidden-sidebar').toggleClass('open');
			$('#cms-trust').toggleClass('hidden-sidebar-active');
	    })
	}
	/* Woo - Add class */
    $('.plus').on('click', function(){
    	$(this).parent().find('input[type="number"]').get(0).stepUp();
    });
    $('.minus').on('click', function(){
    	$(this).parent().find('input[type="number"]').get(0).stepDown();
    });
	/* Remove Search Popup & Hidden Sidebar */
	$(document).on('keyup',function(evt) {
	    if (evt.keyCode == 27) {
	       $('.cshero-popup-search').removeClass('open');
	       $('.cshero-hidden-sidebar').removeClass('open');
	       $('#cms-trust').removeClass('hidden-sidebar-active');
	    }
	});
	$('.sidebar-close').on('click',function(){
    	$('.cshero-hidden-sidebar').removeClass('open');
    	$('#cms-trust').removeClass('hidden-sidebar-active');
    });
});
