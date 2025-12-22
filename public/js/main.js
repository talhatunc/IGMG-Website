AOS.init({
	duration: 800,
	easing: 'slide'
});

$(document).ready(function ($) {

	"use strict";

	$(window).stellar({
		responsive: false,
		parallaxBackgrounds: true,
		parallaxElements: true,
		horizontalScrolling: false,
		hideDistantElements: false,
		scrollProperty: 'scroll'
	});


	// loader
	var loader = function () {
		setTimeout(function () {
			if ($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	var carousel = function () {
		$('.carousel').owlCarousel({
			loop: true,
			margin: 10,
			nav: true,
			stagePadding: 5,
			nav: true,
			navText: ['<span class="ion-md-arrow-back">', '<span class="ion-md-arrow-forward">'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 3
				}
			}
		});

		$('.nonloop-block-13').owlCarousel({
			center: false,
			items: 1,
			loop: false,
			stagePadding: 0,
			margin: 20,
			nav: true,
			navText: ['<span class="ion-md-arrow-back">', '<span class="ion-md-arrow-forward">'],
			responsive: {
				600: {
					margin: 20,
					items: 2
				},
				1000: {
					margin: 20,
					items: 2
				},
				1200: {
					margin: 20,
					items: 3
				}
			}
		});

		$('.loop-block-31').owlCarousel({
			loop: true,
			mouseDrag: true,
			touchDrag: true,
			margin: 0,
			items: 1,
			autoplay: true,
			stagePadding: 0,
			nav: true,
			navText: ['<span class="ion-md-arrow-back">', '<span class="ion-md-arrow-forward">'],
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
		});

		$('.nonloop-block-11').owlCarousel({
			center: false,
			items: 1,
			loop: false,
			stagePadding: 0,
			margin: 30,
			nav: true,
			navText: ['<span class="ion-md-arrow-back">', '<span class="ion-md-arrow-forward">'],
			responsive: {
				600: {
					stagePadding: 0,
					items: 1
				},
				800: {
					stagePadding: 0,
					items: 2
				},
				1000: {
					stagePadding: 0,
					items: 3
				}
			}
		});

		$('.nonloop').owlCarousel({
			center: true,
			items: 2,
			loop: false,
			margin: 10,
			nav: true,
			navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
			responsive: {
				600: {
					items: 2
				}
			}
		});
	};
	carousel();

	// scroll
	var scrollWindow = function () {
		$(window).scroll(function () {
			var $w = $(this),
				st = $w.scrollTop(),
				navbar = $('.ftco_navbar'),
				sd = $('.js-scroll-wrap');

			if (st > 150) {
				if (!navbar.hasClass('scrolled')) {
					navbar.addClass('scrolled');
					$('#ftco-logo').attr('src', '/images/logo.png');
				}
			}
			if (st < 150) {
				if (navbar.hasClass('scrolled')) {
					navbar.removeClass('scrolled sleep');
					$('#ftco-logo').attr('src', '/images/logo-white.png');
				}
			}
			if (st > 350) {
				if (!navbar.hasClass('awake')) {
					navbar.addClass('awake');
				}

				if (sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if (st < 350) {
				if (navbar.hasClass('awake')) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if (sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();





	var contentWayPoint = function () {
		var i = 0;
		$('.ftco-animate').waypoint(function (direction) {

			if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {

				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function () {

					$('body .ftco-animate.item-animate').each(function (k) {
						var el = $(this);
						setTimeout(function () {
							var effect = el.data('animate-effect');
							if (effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if (effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if (effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						}, k * 50, 'easeInOutExpo');
					});

				}, 100);

			}

		}, { offset: '95%' });
	};
	contentWayPoint();

	// navigation
	var OnePageNav = function () {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']:not(.dropdown-toggle)").on('click', function (e) {
			e.preventDefault();

			var hash = this.hash,
				navToggler = $('.navbar-toggler');
			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 700, 'easeInOutExpo', function () {
				window.location.hash = hash;
			});


			if (navToggler.is(':visible')) {
				navToggler.click();
			}
		});
		$('body').on('activate.bs.scrollspy', function () {
			console.log('nice');
		})
	};
	OnePageNav();


	// magnific popup
	$('.image-popup').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		}
	});

	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,

		fixedContentPos: false
	});

	$('#checkin_date, #checkout_date').datepicker({
		'format': 'd MM, yyyy',
		'autoclose': true
	});


	var svgTurkeyMap = document.getElementById("svg-turkey-map");
	if (svgTurkeyMap) {
		var svgTurkeyMapPaths = svgTurkeyMap.getElementsByTagName("path");
		var cityName = document.getElementById("city-name");

		for (var i = 0; i < svgTurkeyMapPaths.length; i++) {

			svgTurkeyMapPaths[i].addEventListener("mousemove", function (e) {
				if (this.getAttribute("class") === "city-active") {
					cityName.classList.add("show-city-name--active");
					cityName.style.left = (e.clientX + 20 + "px");
					cityName.style.top = (e.clientY + 20 + "px")
					cityName.innerHTML = this.getAttribute("title");
				}
			});

			svgTurkeyMapPaths[i].addEventListener("mouseleave", function () {
				cityName.classList.remove("show-city-name--active");
			});

		}
	}

	var svgTurkeyMap1 = document.getElementById("svg-turkey-map-1");
	if (svgTurkeyMap1) {
		var svgTurkeyMapPaths1 = svgTurkeyMap1.getElementsByTagName("path");
		var cityName1 = document.getElementById("city-name-hasene");

		for (var i = 0; i < svgTurkeyMapPaths1.length; i++) {

			svgTurkeyMapPaths1[i].addEventListener("mousemove", function (e) {
				if (this.getAttribute("class") === "city-active-h") {
					cityName1.classList.add("show-city-name--active");
					cityName1.style.left = (e.clientX + 20 + "px");
					cityName1.style.top = (e.clientY + 20 + "px")
					cityName1.innerHTML = this.getAttribute("title");
				}
			});

			svgTurkeyMapPaths1[i].addEventListener("mouseleave", function () {
				cityName1.classList.remove("show-city-name--active");
			});

		}
	}


	// Counter Animation
	var counterAnimated = false;
	var $sectionCounter = $('#section-counter');

	function checkCounter() {
		if (counterAnimated || $sectionCounter.length === 0) return;

		var elemTop = $sectionCounter.offset().top;
		var docViewBottom = $(window).scrollTop() + $(window).height();

		// Trigger when the section is 50px into the viewport
		if (docViewBottom > elemTop + 50) {
			//console.log('Counter section in view, starting animation');
			var $counter = $('.counter');
			$counter.each(function () {
				var $this = $(this);
				var num = parseInt($this.data('number'));

				$this.animateNumber(
					{
						number: num,
						numberStep: function (now, tween) {
							var target = $(tween.elem);
							var rounded_now = Math.round(now);
							target.text(rounded_now.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
						}
					}, 2500
				);
			});
			counterAnimated = true;
		}
	}

	$(window).scroll(checkCounter);
	checkCounter(); // Check on load

});
