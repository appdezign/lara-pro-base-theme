<script defer src="{{ Theme::url('vendor/cookieconsent/cookieconsent.js') }}"></script>

<script>
	window.addEventListener('load', function () {
		var cc = initCookieConsent();

		document.body.classList.add('cc_theme_lara');

		// run plugin with your configuration
		cc.run({
			current_lang: '{{ $language }}',
			// autoclear_cookies: true,                // default: false
			// page_scripts: true,                     // default: false
			// mode: 'opt-in'                          // default: 'opt-in'; value: 'opt-in' or 'opt-out'
			// delay: 0,                               // default: 0
			// auto_language: '',                      // default: null; could also be 'browser' or 'document'
			// autorun: true,                          // default: true
			// force_consent: false,                   // default: false
			// hide_from_bots: true,                   // default: true
			// remove_cookie_tables: false             // default: false
			// cookie_name: 'cc_cookie',               // default: 'cc_cookie'
			// cookie_expiration: 182,                 // default: 182 (days)
			// cookie_necessary_only_expiration: 182   // default: disabled
			// cookie_domain: location.hostname,       // default: current domain
			// cookie_path: '/',                       // default: root
			// cookie_same_site: 'Lax',                // default: 'Lax'
			// use_rfc_cookie: false,                  // default: false
			// revision: 0,                            // default: 0

			onFirstAction: function (user_preferences, cookie) {
				// callback triggered only once on the first accept/reject action
			},

			onAccept: function (cookie) {
				// callback triggered on the first accept/reject action, and after each page load
			},

			onChange: function (cookie, changed_categories) {
				// callback triggered when user changes preferences after consent has already been given
			},

			languages: {
				'nl': {
					consent_modal: {
						title: 'Wij gebruiken cookies',
						description: 'Deze website maakt gebruik van cookies om u de beste gebruikerservaring te bieden.',
						primary_btn: {
							text: 'Alles aanvaarden',
							role: 'accept_all'
						},
						secondary_btn: {
							text: 'Instellen',
							role: 'settings'
						}
					},
					settings_modal: {
						title: 'Privacy instellingen',
						save_settings_btn: 'Voorkeuren opslaan',
						accept_all_btn: 'Alles aanvaarden',
						// reject_all_btn: 'Alles afwijzen',
						close_btn_label: 'Sluiten',
						cookie_table_headers: [
							{col1: 'Name'},
							{col2: 'Domain'},
							{col3: 'Expiration'},
							{col4: 'Description'}
						],
						blocks: [
							{
								title: 'Cookies',
								description: 'Deze website maakt gebruik van cookies om u de beste gebruikerservaring te bieden. U kunt zelf kiezen welke categorie u wilt toelaten. Voor meer informatie, lees ons <a href="/{{ $language }}/privacy" class="cc-link">privacy-beleid</a>.'
							}, {
								title: 'Noodzakelijk',
								description: 'Deze cookies zijn noodzakelijk voor het correct functioneren van de website. Zonder deze cookies zal de website niet functioneren.',
								toggle: {
									value: 'necessary',
									enabled: true,
									readonly: true
								}
							}, {
								title: 'Prestaties en statistieken',
								description: 'Deze cookies worden gebruikt voor de prestaties van de website, en het vastleggen van statistieken',
								toggle: {
									value: 'analytics',
									enabled: false,
									readonly: false
								},
							}, {
								title: 'Advertenties',
								description: 'Deze cookies verzamelen gegevens over hoe u de website gebruikt, welke pagina\'s u bezoekt, en op welke links u klikt. Alle data wordt geanonimiseerd en kan niet gebruikt worden om u te identificeren',
								toggle: {
									value: 'targeting',
									enabled: false,
									readonly: false
								}
							}, {
								title: 'Meer informatie',
								description: 'Voor alle vragen over ons cookie-beleid, en uw keuzes, neem <a class="cc-link" href="/{{ $language }}/contact">contact</a> op.',
							}
						]
					}
				},

				'en': {
					consent_modal: {
						title: 'We use cookies!',
						description: 'Hi, this website uses essential cookies to ensure its proper operation and tracking cookies to understand how you interact with it. The latter will be set only after consent. <button type="button" data-cc="c-settings" class="cc-link">Let me choose</button>',
						primary_btn: {
							text: 'Accept all',
							role: 'accept_all'
						},
						secondary_btn: {
							text: 'Settings',
							role: 'settings'
						}
					},
					settings_modal: {
						title: 'Privacy Policy',
						save_settings_btn: 'Save settings',
						accept_all_btn: 'Accept all',
						// reject_all_btn: 'Reject all',
						close_btn_label: 'Close',
						cookie_table_headers: [
							{col1: 'Name'},
							{col2: 'Domain'},
							{col3: 'Expiration'},
							{col4: 'Description'}
						],
						blocks: [
							{
								title: 'Cookie usage',
								description: 'I use cookies to ensure the basic functionalities of the website and to enhance your online experience. You can choose for each category to opt-in/out whenever you want. For more details relative to cookies and other sensitive data, please read the full <a href="/{{ $language }}/privacy" class="cc-link">privacy policy</a>.'
							}, {
								title: 'Strictly necessary cookies',
								description: 'These cookies are essential for the proper functioning of my website. Without these cookies, the website would not work properly',
								toggle: {
									value: 'necessary',
									enabled: true,
									readonly: true
								}
							}, {
								title: 'Performance and Analytics cookies',
								description: 'These cookies allow the website to remember the choices you have made in the past',
								toggle: {
									value: 'analytics',
									enabled: false,
									readonly: false
								},
							}, {
								title: 'Advertisement and Targeting cookies',
								description: 'These cookies collect information about how you use the website, which pages you visited and which links you clicked on. All of the data is anonymized and cannot be used to identify you',
								toggle: {
									value: 'targeting',
									enabled: false,
									readonly: false
								}
							}, {
								title: 'More information',
								description: 'For any queries in relation to our policy on cookies and your choices, please <a class="cc-link" href="/{{ $language }}/contact">contact us</a>.',
							}
						]
					}
				}
			}
		});
	});

</script>