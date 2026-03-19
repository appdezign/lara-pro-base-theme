import AOS from 'aos';
import 'aos/dist/aos.css';

import axios from 'axios';
import lazySizes from 'lazysizes';
import {jarallax, jarallaxVideo} from 'jarallax';

import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import SmoothScroll from 'smooth-scroll';

import lightGallery from 'lightgallery';
import 'lightgallery/css/lightgallery-bundle.css';
import lgThumbnail from 'lightgallery/plugins/thumbnail'
import lgVideo from 'lightgallery/plugins/video';
import lgZoom from 'lightgallery/plugins/zoom';
import lgFullscreen from 'lightgallery/plugins/fullscreen';

/**
 * Page Loader
 */
(function () {
	window.onload = function () {
		const preloader = document.querySelector('.page-loading');
		if (preloader === null) return;
		preloader.classList.remove('active');
		setTimeout(function () {
			preloader.remove();
		}, 1000);
	};
})();

(function () {
	const searchButton = document.querySelector('.js-search-btn');
	if (searchButton) {
		searchButton.addEventListener('click', function (e) {
			const searchbar = document.querySelector('.js-searchbar');
			const inputfield = document.querySelector('#searchfield');
			if (searchbar.classList.contains('searchbar-open')) {
				searchbar.classList.remove('searchbar-open');
			} else {
				searchbar.classList.add('searchbar-open');
				inputfield.focus();
			}
		});
	}
})();

(function () {
	AOS.init({
		offset: 80,
		delay: 0,
		duration: 800,
		easing: 'ease-out-quad',
		once: true,
	});
})();

(function () {
	// initiate jarallax
	jarallax(document.querySelectorAll(".jarallax"));
	// loading slider content gracefully
	const sliderContent = document.querySelectorAll('.js-slider-content');
	sliderContent.forEach(sContent => {
		sContent.style.display = 'block';
	});

})();


/**
 * Sticky Navbar
 * Enable sticky behavior of navigation bar on page scroll
 */
(function () {

	let navbar = document.querySelector('.js-navbar-sticky');

	if (navbar == null) return;

	let navbarClass = navbar.classList,
		navbarH = navbar.offsetHeight,
		scrollOffset = 120;

	if (navbarClass.contains('position-absolute')) {
		window.addEventListener('scroll', (e) => {
			if (e.currentTarget.pageYOffset > scrollOffset) {
				navbar.classList.add('navbar-stuck');
			} else {
				navbar.classList.remove('navbar-stuck');
			}
		});
	} else {
		window.addEventListener('scroll', (e) => {
			if (e.currentTarget.pageYOffset > scrollOffset) {
				document.body.style.paddingTop = navbarH + 'px';
				navbar.classList.add('navbar-stuck');
			} else {
				document.body.style.paddingTop = '';
				navbar.classList.remove('navbar-stuck');
			}
		});
	}

})();


(function () {

	let selector = '[data-scroll]',
		fixedHeader = '[data-scroll-header]',
		scroll = new SmoothScroll(selector, {
			speed: 800,
			speedAsDuration: true,
			offset: (anchor, toggle) => {
				return toggle.dataset.scrollOffset || 40;
			},
			header: fixedHeader,
			updateURL: false
		});

})();

/**
 * Animate scroll to top button in/off view
 */
(function () {

	let element = document.querySelector('.btn-scroll-top'),
		scrollOffset = 600;

	if (element == null) return;

	let offsetFromTop = parseInt(scrollOffset, 10);

	window.addEventListener('scroll', (e) => {
		if (e.currentTarget.pageYOffset > offsetFromTop) {
			element.classList.add('show');
		} else {
			element.classList.remove('show');
		}
	});
})();


/**
 * Toggling password visibility in password input
 */
(function () {

	let elements = document.querySelectorAll('.password-toggle');

	for (let i = 0; i < elements.length; i++) {
		let passInput = elements[i].querySelector('.form-control'),
			passToggle = elements[i].querySelector('.password-toggle-btn');

		passToggle.addEventListener('click', (e) => {

			if (e.target.type !== 'checkbox') return;
			if (e.target.checked) {
				passInput.type = 'text';
			} else {
				passInput.type = 'password';
			}

		}, false);
	}
})();

/**
 * Content carousel with extensive options to control behaviour and appearance
 * @requires https://github.com/nolimits4web/swiper
 */
(function () {

	// forEach function
	let forEach = (array, callback, scope) => {
		for (let i = 0; i < array.length; i++) {
			callback.call(scope, i, array[i]); // passes back stuff we need
		}
	};

	// Carousel initialisation
	let carousels = document.querySelectorAll('.js-swiper');
	forEach(carousels, (index, value) => {

		let userOptions,
			pagerOptions;
		if (value.dataset.swiperOptions != undefined) userOptions = JSON.parse(value.dataset.swiperOptions);


		// Pager
		if (userOptions.pager) {
			pagerOptions = {
				pagination: {
					el: '.pagination .list-unstyled',
					clickable: true,
					bulletActiveClass: 'active',
					bulletClass: 'page-item',
					renderBullet: function (index, className) {
						return '<li class="' + className + '"><a href="#" class="page-link btn-icon btn-sm">' + (index + 1) + '</a></li>';
					}
				}
			}
		}

		// Slider init
		let options = {...userOptions, ...pagerOptions};
		let swiper = new Swiper(value, options);


		// Tabs (linked content)
		if (userOptions.tabs) {

			swiper.on('activeIndexChange', (e) => {
				let targetTab = document.querySelector(e.slides[e.activeIndex].dataset.swiperTab),
					previousTab = document.querySelector(e.slides[e.previousIndex].dataset.swiperTab);

				previousTab.classList.remove('active');
				targetTab.classList.add('active');
			});
		}

	});

})();


/**
 * Gallery like styled lightbox component for presenting various types of media
 * @requires https://github.com/sachinchoolur/lightGallery
 */
(function () {

	let gallery = document.querySelectorAll('.gallery');

	if (gallery.length) {
		for (let i = 0; i < gallery.length; i++) {

			const thumbnails = gallery[i].dataset.thumbnails ? true : false,
				video = gallery[i].dataset.video ? true : false,
				defaultPlugins = [lgZoom, lgFullscreen],
				videoPlugin = video ? [lgVideo] : [],
				thumbnailPlugin = thumbnails ? [lgThumbnail] : [],
				plugins = [...defaultPlugins, ...videoPlugin, ...thumbnailPlugin]


			lightGallery(gallery[i], {
				selector: '.gallery-item',
				plugins: plugins,
				licenseKey: 'D4194FDD-48924833-A54AECA3-D6F8E646',
				speed: 500,
			});
		}
	}

})();


/**
 * Range slider
 * @requires https://github.com/leongersen/noUiSlider
 */
(function () {

	let rangeSliderWidget = document.querySelectorAll('.range-slider');

	for (let i = 0; i < rangeSliderWidget.length; i++) {

		let rangeSlider = rangeSliderWidget[i].querySelector('.range-slider-ui'),
			valueMinInput = rangeSliderWidget[i].querySelector('.range-slider-value-min'),
			valueMaxInput = rangeSliderWidget[i].querySelector('.range-slider-value-max');

		let options = {
			dataStartMin: parseInt(rangeSliderWidget[i].dataset.startMin, 10),
			dataStartMax: parseInt(rangeSliderWidget[i].dataset.startMax, 10),
			dataMin: parseInt(rangeSliderWidget[i].dataset.min, 10),
			dataMax: parseInt(rangeSliderWidget[i].dataset.max, 10),
			dataStep: parseInt(rangeSliderWidget[i].dataset.step, 10),
			dataPips: rangeSliderWidget[i].dataset.pips
		}

		let start = (options.dataStartMax) ? [options.dataStartMin, options.dataStartMax] : [options.dataStartMin],
			connect = (options.dataStartMax) ? true : 'lower';

		noUiSlider.create(rangeSlider, {
			start: start,
			connect: connect,
			step: options.dataStep,
			pips: options.dataPips ? {mode: 'count', values: 5} : false,
			tooltips: true,
			range: {
				'min': options.dataMin,
				'max': options.dataMax
			},
			format: {
				to: function (value) {
					return '$' + parseInt(value, 10);
				},
				from: function (value) {
					return Number(value);
				}
			}
		});

		rangeSlider.noUiSlider.on('update', (values, handle) => {
			let value = values[handle];
			value = value.replace(/\D/g, '');
			if (handle) {
				if (valueMaxInput) {
					valueMaxInput.value = Math.round(value);
				}
			} else {
				if (valueMinInput) {
					valueMinInput.value = Math.round(value);
				}
			}
		});

		if (valueMinInput) {
			valueMinInput.addEventListener('change', function () {
				rangeSlider.noUiSlider.set([this.value, null]);
			});
		}

		if (valueMaxInput) {
			valueMaxInput.addEventListener('change', function () {
				rangeSlider.noUiSlider.set([null, this.value]);
			});
		}
	}

})();


/**
 * Form validation
 */
(function () {
	'use strict'

	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	var forms = document.querySelectorAll('.needs-validation:not(.needs-custom-validation)')

	// Loop over them and prevent submission
	Array.prototype.slice.call(forms)
		.forEach(function (form) {
			form.addEventListener('submit', function (event) {
				if (!form.checkValidity()) {
					event.preventDefault()
					event.stopPropagation()

					var errorElements = document.querySelectorAll(
						"input.form-control:invalid");
					var errorElement = errorElements[0];

					errorElement.scrollIntoView({
						behavior: 'smooth',
					})

				}

				form.classList.add('was-validated')
			}, false)
		})
})();

/**
 * Input fields formatter
 * @requires https://github.com/nosir/cleave.js
 */
(function () {

	let input = document.querySelectorAll('[data-format]');
	if (input.length === 0) return;

	for (let i = 0; i < input.length; i++) {

		let targetInput = input[i],
			cardIcon = targetInput.parentNode.querySelector('.credit-card-icon'),
			options,
			formatter;
		if (targetInput.dataset.format != undefined) options = JSON.parse(targetInput.dataset.format);

		if (cardIcon) {
			formatter = new Cleave(targetInput, {
				...options, onCreditCardTypeChanged: (type) => {
					cardIcon.className = 'credit-card-icon ' + type;
				}
			});
		} else {
			formatter = new Cleave(targetInput, options);
		}
	}

})();

/**
 * Tooltip
 * @requires https://getbootstrap.com
 * @requires https://popper.js.org/
 */
(function () {

	let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));

	let tooltipList = tooltipTriggerList.map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl, {trigger: 'hover'}));

})();

/**
 * Popover
 * @requires https://getbootstrap.com
 * @requires https://popper.js.org/
 */
(function () {

	let popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));

	let popoverList = popoverTriggerList.map((popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl));

})();


/**
 * Toast
 * @requires https://getbootstrap.com
 */
(function () {

	let toastElList = [].slice.call(document.querySelectorAll('.toast'));

	let toastList = toastElList.map((toastEl) => new bootstrap.Toast(toastEl));

})();


/**
 * Open YouTube video in lightbox
 * @requires https://github.com/sachinchoolur/lightGallery
 */
(function () {

	let button = document.querySelectorAll('[data-bs-toggle="video"]');
	if (button.length) {
		for (let i = 0; i < button.length; i++) {

			lightGallery(button[i], {
				selector: 'this',
				plugins: [lgVideo],
				licenseKey: 'D4194FDD-48924833-A54AECA3-D6F8E646',
				download: false,
				youtubePlayerParams: {
					modestbranding: 1,
					showinfo: 0,
					rel: 0
				},
				vimeoPlayerParams: {
					byline: 0,
					portrait: 0,
					color: '6366f1'
				}
			});
		}
	}

})();


/**
 * Tabs
 */
(function () {
	document.addEventListener('DOMContentLoaded', function () {
		// Mobile dropdown toggle
		const mobileDropdownButton = document.querySelector('.mobile-menu-dropdown-toggle');
		const mobileDropdownMenu = document.querySelector('.mobile-menu-dropdown-content');

		if (mobileDropdownButton) {
			mobileDropdownButton.addEventListener('click', function () {
				mobileDropdownMenu.classList.toggle('hidden');
			});
		}
	});
})();


(function () {

	document.addEventListener('DOMContentLoaded', function () {
		const tabButtons = document.querySelectorAll('.tab-button');
		const tabContents = document.querySelectorAll('.tab-content');

		tabButtons.forEach(button => {
			button.addEventListener('click', function () {
				const targetTab = this.dataset.tab;

				// Remove active state from all buttons
				tabButtons.forEach(btn => {
					btn.classList.remove('active');
					btn.setAttribute('aria-selected', 'false');
				});

				// Add active state to clicked button
				this.classList.add('active');
				this.setAttribute('aria-selected', 'true');

				// Hide all tab contents
				tabContents.forEach(content => {
					content.classList.remove('active');
				});

				// Show the target tab content
				const targetContent = document.getElementById('panel' + targetTab.slice(-1));
				if (targetContent) {
					targetContent.classList.add('active');
				}
			});
		});
	});

})();


(function () {

	document.addEventListener('DOMContentLoaded', function () {

		const togglePassword1 = document.querySelector('.js-toggle-password1');
		const togglePassword2 = document.querySelector('.js-toggle-password2');
		const passwordInput1 = document.querySelector('#password');
		const passwordInput2 = document.querySelector('#password_confirmation');

		if (togglePassword1) {
			togglePassword1.addEventListener('click', function (e) {
				if (togglePassword1.classList.contains('active')) {
					togglePassword1.classList.remove('active');
					passwordInput1.type = "password";
				} else {
					togglePassword1.classList.add('active');
					passwordInput1.type = "text";
				}
			});
		}

		if (togglePassword2) {
			togglePassword2.addEventListener('click', function (e) {
				if (togglePassword2.classList.contains('active')) {
					togglePassword2.classList.remove('active');
					passwordInput2.type = "password";
				} else {
					togglePassword2.classList.add('active');
					passwordInput2.type = "text";
				}
			});
		}
	});

})();