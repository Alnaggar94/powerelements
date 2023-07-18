document.addEventListener('DOMContentLoaded',ueOffCanvas);

function ueOffCanvas() {
	const hasVScroll = window.innerWidth > document.documentElement.clientWidth;
	const isMobile 	= ('ontouchstart' in document.documentElement);
	
	document.querySelectorAll('.ue-offcanvas').forEach((ocp) => {
		let config 		= JSON.parse( ocp.getAttribute('data-ocp-config') ),
			backdrop 	= ocp.querySelector('.ue-ocp-backdrop'),
			timer 		= 0,
			pos 		= config.ocpPosition,
			panel 		= ocp.querySelector('.ue-ocp-content');

		if( ocp.classList.contains('ue-push-content') ) {
			window.addEventListener('scroll', function() {
				panel.style.top = window.scrollY + 'px';
			});
		}

		if( config.triggerSelector || config.triggerEvent == "scroll" ) {
			var disableScrolling = function() {
				if( hasVScroll ) {
					if( ! isMobile ) {
						if( ! document.querySelector('#ue-disable-scroll') ) {
							document.head.insertAdjacentHTML("beforeend",'<style type="text/css" id="ue-disable-scroll">' + 
								'body.ue-disable-scroll{margin-right: ' + 
								( window.innerWidth - document.body.clientWidth ) + 
								'px!important;}</style>');
						}
					}

					document.body.classList.add('ue-disable-scroll');
				}
			}

			var closeOffCanvasPanel = function() {
				var calltimeout = false;

				if( ocp.classList.contains('ue-push-content') ) {
					document.body.classList.remove( 'ue-ocp-toggled' );
					calltimeout = true;
				} else {
					ocp.classList.add('ue-hide-panel');
				}

				if( config.disableScroll == 'yes' ) {
					calltimeout = true;
				} else if( document.body.classList.contains('admin-bar') ) {
					calltimeout = true;
				}

				if( calltimeout ) {
					clearTimeout( timer );
					timer = setTimeout( function(){
						document.body.classList.remove('ue-disable-scroll');
						if( document.body.classList.contains('admin-bar') ) {
							document.querySelector('#wpadminbar').classList.remove('ue-hide-wp-admin-bar');
							document.getElementsByTagName('html')[0].classList.remove('ue-remove-spacing');
							document.body.style.paddingTop = '0px';
						}
						if( ocp.classList.contains('ue-push-content') ) {
							document.body.classList.remove( 'ue-offcanvas-' + panel.getAttribute('data-id') + '-' + pos );
							ocp.classList.add('ue-hide-panel');
						}
					}, config.panelTd );					
				}

				var burgerSelectors = config.triggerSelector.toString().split(",");

				burgerSelectors.forEach( (burgerSelector) => {
					let animBurger = document.querySelector(burgerSelector);
					if ( animBurger && animBurger.classList.contains('ue-animated-burger') 
						&& animBurger.querySelector('.hamburger').classList.contains("is-active") 
					)
						animBurger.querySelector('.hamburger').classList.remove("is-active");
				});

				ocp.querySelectorAll( 'video').forEach(video => {  
					video.pause();
				});

				ocp.querySelectorAll('form').forEach(form => {  
				    form.reset();
				});

				ocp.dispatchEvent(new Event('ue_ocp_close'))
			}

			var openOffCanvasPanel = function() {
				if( document.body.classList.contains('admin-bar') ) {
					if( ! ocp.classList.contains('ue-push-content') ) {
						wpadminbar.classList.add('ue-hide-wp-admin-bar');
					} else {
						let wpadminbar = document.querySelector('#wpadminbar'),
							barHeight = wpadminbar.offsetHeight;

							document.body.style.paddingTop = barHeight + 'px';
					}
				}

				if( ocp.classList.contains('ue-push-content') ) {
					let bodySelector = 'ue-offcanvas-' + panel.getAttribute('data-id') + '-' + pos;
					if( document.body.classList.contains('admin-bar') ) {
						document.getElementsByTagName('html')[0].classList.add('ue-remove-spacing');
					}

					if( ! document.querySelector('#' + bodySelector) ) {
						if( pos == 'right') {
							document.head.innerHTML += '<style type="text/css" id="' + bodySelector + '">' + 
								'body.' + bodySelector + '{' +
								'-webkit-transition: transform ' + config.panelTd + 'ms cubic-bezier(0.77, 0, 0.175, 1);'+
								'-moz-transition: transform ' + config.panelTd + 'ms cubic-bezier(0.77, 0, 0.175, 1);'+
								'transition: transform ' + config.panelTd + 'ms cubic-bezier(0.77, 0, 0.175, 1);'+
								'overflow-x: hidden' +
								'}' + 
								'body.' + bodySelector + '.ue-ocp-toggled {' +
								'-webkit-transform: translate(-' + panel.offsetWidth + 'px, 0);' +
								'-moz-transform: translate(-' + panel.offsetWidth + 'px, 0);' +
								'transform: translate(-' + panel.offsetWidth + 'px, 0);' +
								'}</style>' 
							;
						}

						if( pos == 'left') {
							document.head.insertAdjacentHTML( "afterend",
								'<style type="text/css" id="' + bodySelector + '">' + 
								'body.' + bodySelector + '{' +
								'-webkit-transition: transform ' + config.panelTd + 'ms cubic-bezier(0.77, 0, 0.175, 1);'+
								'-moz-transition: transform ' + config.panelTd + 'ms cubic-bezier(0.77, 0, 0.175, 1);'+
								'transition: transform ' + config.panelTd + 'ms cubic-bezier(0.77, 0, 0.175, 1);'+
								'overflow-x: hidden' +
								'}' + 
								'body.' + bodySelector + '.ue-ocp-toggled {' +
								'-webkit-transform: translate(' + panel.offsetWidth + 'px, 0);' +
								'-moz-transform: translate(' + panel.offsetWidth + 'px, 0);' +
								'transform: translate(' + panel.offsetWidth + 'px, 0);' +
								'}</style>' 
							);
						}

						if( pos == 'top') {
							document.head.insertAdjacentHTML( "afterend",
								'<style type="text/css" id="' + bodySelector + '">' + 
								'body.' + bodySelector + '{' +
								'-webkit-transition: transform ' + config.panelTd + 'ms cubic-bezier(0.77, 0, 0.175, 1);'+
								'-moz-transition: transform ' + config.panelTd + 'ms cubic-bezier(0.77, 0, 0.175, 1);'+
								'transition: transform ' + config.panelTd + 'ms cubic-bezier(0.77, 0, 0.175, 1);'+
								'overflow-x: hidden' +
								'}' + 
								'body.' + bodySelector + '.ue-ocp-toggled {' +
								'-webkit-transform: translate(0, -' + panel.clientHeight + 'px);' +
								'-moz-transform: translate(0, -' + panel.clientHeight + 'px);' +
								'transform: translate(0, -' + panel.clientHeight + 'px);' +
								'}</style>' 
							);
						}

						if( pos == 'bottom') {
							document.head.insertAdjacentHTML( "afterend",
								'<style type="text/css" id="' + bodySelector + '">' + 
								'body.' + bodySelector + '{' +
								'-webkit-transition: transform ' + config.panelTd + 'ms cubic-bezier(0.77, 0, 0.175, 1);'+
								'-moz-transition: transform ' + config.panelTd + 'ms cubic-bezier(0.77, 0, 0.175, 1);'+
								'transition: transform ' + config.panelTd + 'ms cubic-bezier(0.77, 0, 0.175, 1);'+
								'overflow-x: hidden' +
								'}' + 
								'body.' + bodySelector + '.ue-ocp-toggled {' +
								'-webkit-transform: translate(0,' + panel.clientHeight + 'px);' +
								'-moz-transform: translate(0,' + panel.clientHeight + 'px);' +
								'transform: translate(0,' + panel.clientHeight + 'px);' +
								'}</style>' 
							);
						}
					}
					
					document.body.classList.add( bodySelector );
					document.body.classList.add( 'ue-ocp-toggled' );
				}

				ocp.classList.remove('ue-hide-panel');

				if( config.disableScroll == 'yes' ) {
					disableScrolling();
				}
				ocp.dispatchEvent(new Event('ue_ocp_open'))
			}

			var toggleOffCanvasPanel = function(e) {
				e.preventDefault();

				if( ocp.classList.contains('ue-hide-panel') ) {
					openOffCanvasPanel();
				} else {
					closeOffCanvasPanel();
				}
			}

			window.addEventListener(
				'keyup',
				function(e) {
					if (e.keyCode === 27 && config.escBtn == 'no' ) {
						closeOffCanvasPanel();
					}
				}
			);

			if( backdrop != null && config.disableBackdropClick == 'no' ) {
				["click", "touchstart"].forEach(function(event) {
					backdrop.addEventListener(
						event,
						function(e) {
							e.preventDefault();
							closeOffCanvasPanel();
						}
					);
				}, false );
			}

			if ( 'yes' === config.closeHashLink ) {
				ocp.querySelectorAll('a[href*=\\#]').forEach(hashLink => {
					hashLink.addEventListener('click', e => {
						e.preventDefault();

						if( e.currentTarget.querySelector('.ue-menu-items-arrow') != null )
							return;

						closeOffCanvasPanel();
					})
				})
			}

			if( config.triggerEvent == "scroll" ) {
				let offset = parseInt( config.offset );
				window.addEventListener('scroll', function() {
					if ( document.body.scrollTop > offset || document.documentElement.scrollTop > offset) {
						openOffCanvasPanel();

						const panelH = panel.clientHeight;
						if( pos == 'bottom')
							document.body.style.paddingBottom = panelH + 'px';
					} else {
						closeOffCanvasPanel();
						if( pos == 'bottom')
							document.body.style.removeProperty('padding-bottom');
					}
				})
			} else {
				var triggerSelectors = config.triggerSelector.toString().split(",");

				triggerSelectors.forEach(
					function(selector) {
						if( document.querySelector( selector ) != null ) {
							document.querySelectorAll(selector ).forEach( (btnSelector) => {
								btnSelector.addEventListener( config.triggerEvent, toggleOffCanvasPanel );
								btnSelector.addEventListener( 'touchstart', toggleOffCanvasPanel );
							});
						}
					}
				);
			}
		}
	});
}