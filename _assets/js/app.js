import * as bootstrap from 'bootstrap';
import AOS from 'aos';
// import axios from 'axios';
import lazySizes from 'lazysizes';
import {jarallax, jarallaxVideo} from 'jarallax';
import Swiper from 'swiper/bundle';
import SmoothScroll from 'smooth-scroll';

import lightGallery from 'lightgallery';
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
			if (searchbar.classList.contains('searchbar--open')) {
				searchbar.classList.remove('searchbar--open');
			} else {
				searchbar.classList.add('searchbar--open');
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
 * Theme Mode Switch
 * Switching between light/dark mode. The chosen mode is saved to browser's local storage
 */
(function () {

	let modeSwitch = document.querySelector('[data-bs-toggle="mode"]');

	if (modeSwitch === null) return;

	let checkbox = modeSwitch.querySelector('.form-check-input');

	if (mode === 'dark') {
		root.classList.add('dark-mode');
		checkbox.checked = true;
	} else {
		root.classList.remove('dark-mode');
		checkbox.checked = false;
	}

	modeSwitch.addEventListener('click', (e) => {
		if (checkbox.checked) {
			root.classList.add('dark-mode');
			window.localStorage.setItem('mode', 'dark');
		} else {
			root.classList.remove('dark-mode');
			window.localStorage.setItem('mode', 'light');
		}
	});

})();

/**
 * Sticky Navbar
 * Enable sticky behavior of navigation bar on page scroll
 */
(function () {

	let navbar = document.querySelector('.navbar-sticky');

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
				download: false,
				autoplayVideoOnSlide: true,
				zoomFromOrigin: false,
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
 * Price switch
 */

const priceSwitch = (() => {

	let switcherWrapper = document.querySelectorAll('.price-switch-wrapper');

	if (switcherWrapper.length <= 0) return;

	for (let i = 0; i < switcherWrapper.length; i++) {
		let switcher = switcherWrapper[i].querySelector('[data-bs-toggle="price"]');

		switcher.addEventListener('change', (e) => {
			let checkbox = e.currentTarget.querySelector('input[type="checkbox"]'),
				monthlyPrice = e.currentTarget.closest('.price-switch-wrapper').querySelectorAll('[data-monthly-price]'),
				annualPrice = e.currentTarget.closest('.price-switch-wrapper').querySelectorAll('[data-annual-price]');

			for (let n = 0; n < monthlyPrice.length; n++) {
				if (checkbox.checked == true) {
					monthlyPrice[n].classList.add('d-none');
				} else {
					monthlyPrice[n].classList.remove('d-none');
				}
			}

			for (let m = 0; m < monthlyPrice.length; m++) {
				if (checkbox.checked == true) {
					annualPrice[m].classList.remove('d-none');
				} else {
					annualPrice[m].classList.add('d-none');
				}
			}
		});
	}

})();

const masonryGrid = (() => {

	let grid = document.querySelectorAll('.masonry-grid'),
		masonry;

	if (grid === null) return;

	for (let i = 0; i < grid.length; i++) {
		masonry = new Shuffle(grid[i], {
			itemSelector: '.masonry-grid-item',
			sizer: '.masonry-grid-item'
		});

		imagesLoaded(grid[i]).on('progress', () => {
			masonry.layout();
		});

		// Filtering
		let filtersWrap = grid[i].closest('.masonry-filterable');
		if (filtersWrap === null) return;
		let filters = filtersWrap.querySelectorAll('.masonry-filters [data-group]');

		for (let n = 0; n < filters.length; n++) {
			filters[n].addEventListener('click', function (e) {
				let current = filtersWrap.querySelector('.masonry-filters .active'),
					target = this.dataset.group;
				if (current !== null) {
					current.classList.remove('active');
				}
				this.classList.add('active');
				masonry.filter(target);
				e.preventDefault();
			});
		}
	}

})();

/**
 * Ajaxify MailChimp subscription form
 */

const subscriptionForm = (() => {

	const form = document.querySelectorAll('.subscription-form');

	if (form === null) return;

	for (let i = 0; i < form.length; i++) {

		let button = form[i].querySelector('button[type="submit"]'),
			buttonText = button.innerHTML,
			input = form[i].querySelector('.form-control'),
			antispam = form[i].querySelector('.subscription-form-antispam'),
			status = form[i].querySelector('.subscription-status');

		form[i].addEventListener('submit', function (e) {
			if (e) e.preventDefault();
			if (antispam.value !== '') return;
			register(this, button, input, buttonText, status);
		});
	}

	let register = (form, button, input, buttonText, status) => {
		button.innerHTML = 'Sending...';

		// Get url for MailChimp
		let url = form.action.replace('/post?', '/post-json?');

		// Add form data to object
		let data = '&' + input.name + '=' + encodeURIComponent(input.value);

		// Create and add post script to the DOM
		let script = document.createElement('script');
		script.src = url + '&c=callback' + data
		document.body.appendChild(script);

		// Callback function
		let callback = 'callback';
		window[callback] = (response) => {

			// Remove post script from the DOM
			delete window[callback];
			document.body.removeChild(script);

			// Change button text back to initial
			button.innerHTML = buttonText;

			// Display content and apply styling to response message conditionally
			if (response.result == 'success') {
				input.classList.remove('is-invalid');
				input.classList.add('is-valid');
				status.classList.remove('status-error');
				status.classList.add('status-success');
				status.innerHTML = response.msg;
				setTimeout(() => {
					input.classList.remove('is-valid');
					status.innerHTML = '';
					status.classList.remove('status-success');
				}, 6000)
			} else {
				input.classList.remove('is-valid');
				input.classList.add('is-invalid');
				status.classList.remove('status-success');
				status.classList.add('status-error');
				status.innerHTML = response.msg.substring(4);
				setTimeout(() => {
					input.classList.remove('is-invalid');
					status.innerHTML = '';
					status.classList.remove('status-error');
				}, 6000)
			}
		}
	}
})();


/**
 * Play Lottie animations on hover
 * @requires https://github.com/LottieFiles/lottie-player
 */

const hoverAnimation = (() => {

	const playerContainers = document.querySelectorAll('.animation-on-hover');
	playerContainers.forEach(container => {
		container.addEventListener('mouseover', () => {
			const players = container.querySelectorAll('lottie-player');
			players.forEach(player => {
				player.setDirection(1);
				player.play();
			});
		});

		container.addEventListener('mouseleave', () => {
			const players = container.querySelectorAll('lottie-player');
			players.forEach(player => {
				player.setDirection(-1);
				player.play();
			});
		});
	});

})();

/**
 * Mouse move parallax effect
 * @requires https://github.com/wagerfield/parallax
 */

const audioPlayer = (() => {

	let player = document.querySelectorAll('.audio-player');

	if (player.length === 0) return;

	for (let i = 0; i < player.length; i++) {
		const playerContainer = player[i],
			audio = playerContainer.querySelector('audio'),
			playButton = playerContainer.querySelector('.ap-play-button'),
			seekSlider = playerContainer.querySelector('.ap-seek-slider'),
			volumeSlider = playerContainer.querySelector('.ap-volume-slider'),
			durationTimeLabel = playerContainer.querySelector('.ap-duration'),
			currentTimeLabel = playerContainer.querySelector('.ap-current-time');

		let playState = 'play',
			raf = null;

		// Start / stop audio
		playButton.addEventListener('click', (e) => {
			if (playState === 'play') {
				e.currentTarget.classList.add('ap-pause');
				audio.play();
				requestAnimationFrame(whilePlaying);
				playState = 'pause';
			} else {
				e.currentTarget.classList.remove('ap-pause');
				audio.pause();
				cancelAnimationFrame(raf);
				playState = 'play';
			}
		});

		// Instantiate sliders: Seek slider + Volume slider
		const showRangeProgress = (rangeInput) => {
			if (rangeInput === seekSlider) playerContainer.style.setProperty('--seek-before-width', rangeInput.value / rangeInput.max * 100 + '%');
			else playerContainer.style.setProperty('--volume-before-width', rangeInput.value / rangeInput.max * 100 + '%');
		}

		seekSlider.addEventListener('input', (e) => {
			showRangeProgress(e.target);
		});
		volumeSlider.addEventListener('input', (e) => {
			showRangeProgress(e.target);
		});

		const calculateTime = (secs) => {
			const minutes = Math.floor(secs / 60);
			const seconds = Math.floor(secs % 60);
			const returnedSeconds = seconds < 10 ? `0${seconds}` : `${seconds}`;
			return `${minutes}:${returnedSeconds}`;
		}

		const displayDuration = () => {
			durationTimeLabel.textContent = calculateTime(audio.duration);
		}

		const setSliderMax = () => {
			seekSlider.max = Math.floor(audio.duration);
		}

		const displayBufferedAmount = () => {
			const bufferedAmount = Math.floor(audio.buffered.end(audio.buffered.length - 1));
			playerContainer.style.setProperty('--buffered-width', `${(bufferedAmount / seekSlider.max) * 100}%`);
		}

		const whilePlaying = () => {
			seekSlider.value = Math.floor(audio.currentTime);
			currentTimeLabel.textContent = calculateTime(seekSlider.value);
			playerContainer.style.setProperty('--seek-before-width', `${seekSlider.value / seekSlider.max * 100}%`);
			raf = requestAnimationFrame(whilePlaying);
		}

		if (audio.readyState > 0) {
			displayDuration();
			setSliderMax();
			displayBufferedAmount();
		} else {
			audio.addEventListener('loadedmetadata', () => {
				displayDuration();
				setSliderMax();
				displayBufferedAmount();
			});
		}

		audio.addEventListener('progress', displayBufferedAmount);

		seekSlider.addEventListener('input', () => {
			currentTimeLabel.textContent = calculateTime(seekSlider.value);
			if (!audio.paused) {
				cancelAnimationFrame(raf);
			}
		});

		seekSlider.addEventListener('change', () => {
			audio.currentTime = seekSlider.value;
			if (!audio.paused) {
				requestAnimationFrame(whilePlaying);
			}
		});

		volumeSlider.addEventListener('input', (e) => {
			const value = e.target.value;
			audio.volume = value / 100;
		});
	}

})();

