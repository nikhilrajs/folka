// Console Welcome

console.log("%cFolka Group","color: #3CA06C; font-size: 100px");

$.fn.isOnScreen = function(){
    var win = $(window); 
    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
    
    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
    
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
    
};

// Exist function
jQuery.fn.exists = function(){return this.length > 0;}

// Core functions

$(document).ready(function() {

	jQuery.fn.exists = function () { return this.length > 0; }

	$('.app-l-deliver__row').packery({
		// options
		itemSelector: '.app-l-deliver__block',
		gutter: 0
	});
	
	
	var $slider = $(".app-l-project__slider").lightSlider({
		item: 1,
		mode: "fade",
		auto: true,
        loop: true,
		controls: false,
		pause: 8000,
		onSliderLoad: function(el) {
			$(".app-l-prj__slider-wrap .lSPager").find('li.active a').append("<svg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'><circle class='app-l-path--single' id='Ellipse 2' cx='15' cy='15' r='14' stroke='#FF1C1C' stroke-width='1'/><circle class='app-l-path--double' id='Ellipse 2' cx='15' cy='15' r='14' stroke='#000' stroke-width='3'/></svg> ");
		},
		onAfterSlide: function(el) {
			if($(".app-l-prj__slider-wrap .lSPager").find('li.active a svg').length == 0){
				$(".app-l-prj__slider-wrap .lSPager").find('li.active a').append("<svg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'><circle class='app-l-path--single' id='Ellipse 2' cx='15' cy='15' r='14' stroke='#FF1C1C' stroke-width='1'/><circle class='app-l-path--double' id='Ellipse 2' cx='15' cy='15' r='14' stroke='#000' stroke-width='3'/></svg> ");	
			}
		}
	}); 

	var recentSlider = $(".app-l-r__slider-over").lightSlider({
		item: 3,
		auto: true,
        loop: true,
		controls: false,
		slideMargin: 0,
		pager: true,
		slideEndAnimation: false,
		pauseOnHover: true,
		pause: 8000,
		adaptiveHeight: true,
		onBeforeStart: function(el){
			var totalItems = $('.app-l-slider__block').length;

			if(totalItems <= 3){
				$(".app-l-r__controls").hide();
			}else{
				$(".app-l-r__controls").show();
			}
		},
		responsive : [
            {
                breakpoint:991,
                settings: {
                    item:2,

					onBeforeStart: function(el){
						if(totalItems < 2){
							$(".app-l-r__controls").hide();
						}else{
							$(".app-l-r__controls").show();
						}
					}
                }
            },
			{
                breakpoint:767,
                settings: {
                    item:1,
					onBeforeStart: function(el){
						if(totalItems <= 1){
							$(".app-l-r__controls").hide();
						}else{
							$(".app-l-r__controls").show();
						}
					}
                }
            }
        ]
	}); 
	$(window).resize(function(){
		if($('.app-l-project__slider').exists()){
			$slider.play();
		}
		if($('.app-l-r__slider-over').exists()){
			recentSlider.play();
		}
	});
	$(".app-l-r__left").click(function(){
		recentSlider.goToPrevSlide();
	});
	$(".app-l-r__right").click(function(){
		recentSlider.goToNextSlide();
	});

	$(".app-l-hamburger, .app-l-menu__close").click(function(){
		$(".app-l-menu__display").toggleClass("active");
	});


	$(document).on('keyup',function(evt) {
		if (evt.keyCode == 27) {
			$(".app-l-menu__display").removeClass("active");
		}
	});

	// Section scrolling Script

	function fixedBlocks(){
		var $item = $(".app-l-folka__mv-block");
		var $itemMission = $(".app-l-folka__mission");
		var $itemVission = $(".app-l-folka__vission");

		$(window).scroll(function(){
			if($itemMission.isOnScreen() && !$itemMission.hasClass("scroll-start")){
				$itemMission.addClass("scroll-start");
				$(window).scrollTop($itemMission.offset().top);
			}else if(!$itemMission.isOnScreen()){
				$itemMission.removeClass("scroll-start");
			}
			if($itemVission.isOnScreen() && !$itemVission.hasClass("scroll-start")){
				$itemVission.addClass("scroll-start");
				$(window).scrollTop($itemVission.offset().top);
			}else if(!$itemVission.isOnScreen()){
				$itemVission.removeClass("scroll-start");
			}
		});
	}
	
	if($('.app-l-folka__mv-block').exists()){
		fixedBlocks();
	}

	if($('.app-l-pin__slider').exists()){
		$(".app-l-pin__slider").lightSlider({
			item: 1,
			auto: true,
			loop: true,
			controls: false,
			pause: 8000,
			pauseOnHover: true,
			adaptiveHeight: true,

			onSliderLoad: function(){
				$(".app-l-pin-post").css({'height':'auto', 'overflow': 'visible'});
				$(".app-l-pin-post .app-l-loader").fadeOut(500);
			}
		}); 
	}
	
	function copyToClipboard() {
		var value  = $(location).attr('href');
		navigator.clipboard.writeText(value)
	}
	$(".app-l-copy").click(function(){
		copyToClipboard();
	});

	$(document).ready( function ($) {
		if ($(".app-l-blog__entry .container").children().first().prop('tagName') == 'IMG'){ //this check for the img tag
			
		}else{
			$(".app-l-blog__d-head").addClass("app-l-padding");
		}
	});


	var toastTrigger = document.getElementById('liveToastBtn')
	var toastLiveExample = document.getElementById('liveToast')
	if (toastTrigger) {
	toastTrigger.addEventListener('click', function () {
		var toast = new bootstrap.Toast(toastLiveExample)

		toast.show()
	})
	}

	

	// Header
	var lastScrollTop = 0;
	var $header = $(".app-l-header");
	var $catHead = $(".app-l-cat__sub-pos");

	function headerScroll(){
		if($('.app-l-blog__entry').exists()){
			var $whiteBg = $(".app-l-blog__entry").offset().top;
		}

		if($('.app-l-cat__entry').exists()){
			var $catwhiteBg = $(".app-l-cat__entry").offset().top;
		}
		
		if($('.app-l-recent-stories').exists()){
			var $blacBg = $(".app-l-recent-stories").offset().top;
		}
		
		var $footerBg = $(".app-l-footer").offset().top;
		

		var st = $(this).scrollTop();
	
			if (st > lastScrollTop && st > 0){
				$header.addClass("header-hide");
				$catHead.removeClass("app-l-cat__header-show");
			} else {
				$header.removeClass("header-hide");
				if($catHead.hasClass('scroll-to-fixed-fixed')){
					$catHead.addClass("app-l-cat__header-show");
				}else{
					$catHead.removeClass("app-l-cat__header-show");
				}
			}

			if(st > 0){
				$header.addClass("header-style");	
			}else{
				$header.removeClass("header-style");
			}

			if($('.app-l-blog__entry').exists()){
				if(st > $whiteBg ){
					$header.addClass("header-revert");
				}else{
					$header.removeClass("header-revert");
				}
			}

			if($('.app-l-cat__entry').exists()){
				if(st > $catwhiteBg ){
					$header.addClass("header-revert");
				}else{
					$header.removeClass("header-revert");
				}
			}

			if($('.app-l-recent-stories').exists()){
				if(st > $blacBg && $header.hasClass('header-revert')){
					$header.removeClass("header-revert");
				}
			}
			if($('.app-l-footer').exists()){
				if(st > $footerBg && $header.hasClass('header-revert')){
					$header.removeClass("header-revert");
				}
			}
		
		lastScrollTop = st;
	}

	$(window).scroll(function(){
		headerScroll();
	});

	var $catSlider = $(".app-l-cat__g-wrap").lightSlider({
		loop:false,
		slideMargin:20,
		pager: false,
		controls: false,
		autoWidth:true
	}); 

	
	$(".app-l-cat__gl").click(function(){
		$catSlider.goToPrevSlide();
	});
	$(".app-l-cat__gr").click(function(){
		$catSlider.goToNextSlide();
	});

	var $catReview = $(".app-l-cat__review-init").lightSlider({
		loop:false,
		slideMargin:40,
		pager: false,
		controls: false,
		autoWidth:true
	}); 

	$(".app-l-cat__rl").click(function(){
		$catReview.goToPrevSlide();
	});
	$(".app-l-cat__rr").click(function(){
		$catReview.goToNextSlide();
	});

	$(".app-l-cat__bn-init").lightSlider({
		item: 1,
		pager: true,
		controls: false,
		mode: 'fade',
		auto: true,
		loop: true
	}); 

	$(".app-l-cat__sub-links").mCustomScrollbar({
		axis:"x",
		theme:"dark",
		autoHideScrollbar: true,
		autoExpandScrollbar: true
	});

	// number list

	$(".app-l-number-list-strong > li, .app-l-number-list > li").each(function(){
		var $index = $(this).index() + 1;
		$(this).append("<span class='app-l-list__count'>"+$index+'</span>');
	});


	// scroll to fixed cat head

	$('.app-l-cat__sub-pos').scrollToFixed({
		limit : $('.app-l-recent-stories').offset().top,
		preFixed: function() { 
			$('.app-l-cat__sub-pos').removeClass("position-static");
		},
		postFixed: function() { 
			$('.app-l-cat__sub-pos').addClass("position-static");
		 },
	});

	var $catheaderHeight = $(".app-l-cat__sub-pos").outerHeight();

	$('.app-l-cat__sub-links ul li a').on('click',function (e) {
	    //e.preventDefault();
		$(".app-l-cat__sub-links ul li").removeClass('active');
		$(this).parent().addClass("active");
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html').animate({
				scrollTop: target.offset().top  - $catheaderHeight
			});
			return false;
			}
		}
	});
	
	$(window).scroll(function() {
		var windscroll = $(window).scrollTop();
		if (windscroll >= 100) {
			
			$('.app-l-cat__data-wrap .app-l-cat__data-block').each(function(i) {
				if ($(this).position().top <= windscroll + $catheaderHeight) {
					$('.app-l-cat__sub-links ul li.active').removeClass('active');
					$('.app-l-cat__sub-links ul li').eq(i).addClass('active');
				}
			});
	
		} else {
			$('.app-l-cat__sub-links ul li.active').removeClass('active');
			$('.app-l-cat__sub-links ul li:first').addClass('active');
		}
	
	}).scroll();

	Fancybox.bind('[data-fancybox="gallery"]', {
		animated : false,
		hideScrollbar : false
	});
	
	Fancybox.bind('[data-fancybox="dialog"]', {
		hideScrollbar : false,
		autoFocus : false,
		trapFocus : false,
		placeFocusBack : false
	});

	$('.app-c-select').select2({
		selectOnClose: true
	});
	$('.date-input').dateDropper({
		large: true,
		//largeDefault: true,
		theme: 'picker1',
		startFromMonday: false
	});

	$(".app-l-bn__rg .app-c-btn--grey").click(function(){
		$(".app-l-booknow .carousel__button").trigger('click');
	});

	$(".app-l-booknow__body .form-group--float").each(function(){
	    var getLabel = $(this).find(".wpcf7-form-control-wrap").next("label").detach();
        $(this).find(".wpcf7-form-control-wrap").addClass("d-block").append(getLabel);
	});
});


