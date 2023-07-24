document.addEventListener("DOMContentLoaded", function(){ ueAccordionMenu(".ue-acrd-menu") });

var ueExpandSubMenuItems = function(e) {
	e.preventDefault();
	e.stopPropagation();
	
	let acrd = JSON.parse( e.currentTarget.closest('nav').getAttribute('data-acrd-config') );

	if( acrd.effect === 'yes' ) 
		doUeCollapseItems( this );

	doUeExpandItems(this);
};

var doUeCollapseItems = function(currentTarget) {
	const acrdWrap = currentTarget.closest('.ue-acrd-menu-items'),
		  subItems = ueGetParentItems(currentTarget, '.menu-item-has-children');

	acrdWrap.querySelectorAll('.acrd-menu-open' ).forEach((openedItem) => {
		if( ! subItems.includes( openedItem.closest('.menu-item-has-children') ) )
			doUeExpandItems(openedItem);
	});
};

var doUeExpandItems = function(currentTarget) {
	let config = JSON.parse( currentTarget.closest('nav').getAttribute('data-acrd-config') ),
		expended = currentTarget.getAttribute("aria-expanded") == 'false' ? 'true' : 'false',
		pressed = currentTarget.getAttribute("aria-pressed") == 'false' ? 'true' : 'false',
		hidden = currentTarget.getAttribute("aria-hidden") == 'true' ? 'false' : 'true';

	currentTarget.setAttribute( "aria-expanded", expended );
	currentTarget.setAttribute( "aria-pressed", pressed );
	currentTarget.setAttribute( "aria-hidden", hidden );

	let hasChild = currentTarget.closest('li.menu-item-has-children'),
		subMenuItem = hasChild.querySelectorAll('.sub-menu')[0],
		t;

	if( t ) {
		clearTimeout( t );
	}

	if( hidden == "false" ) {
		subMenuItem.style.removeProperty("display");
        var r = window.getComputedStyle(subMenuItem).display;
        "none" === r && (r = "block"), (subMenuItem.style.display = r);
        var i = subMenuItem.offsetHeight;
        (subMenuItem.style.overflow = "hidden"),
        (subMenuItem.style.height = 0),
        (subMenuItem.style.paddingTop = 0),
        (subMenuItem.style.paddingBottom = 0),
        (subMenuItem.style.marginTop = 0),
        (subMenuItem.style.marginBottom = 0),
        subMenuItem.offsetHeight,
        (subMenuItem.style.transitionProperty = "height, margin, padding"),
        (subMenuItem.style.transitionDuration = "".concat(parseInt(config.transition), "ms")),
        (subMenuItem.style.height = "".concat(i, "px")),
        subMenuItem.style.removeProperty("padding-top"),
        subMenuItem.style.removeProperty("padding-bottom"),
        subMenuItem.style.removeProperty("margin-top"),
        subMenuItem.style.removeProperty("margin-bottom"),
        t = window.setTimeout(function () {
            subMenuItem.style.removeProperty("height"), 
            subMenuItem.style.removeProperty("overflow"), 
            subMenuItem.style.removeProperty("transition-duration"), 
            subMenuItem.style.removeProperty("transition-property");
        }, parseInt(config.transition));

		currentTarget.classList.add('acrd-menu-open');
	} else {
		(subMenuItem.style.transitionProperty = "height, margin, padding"),
        (subMenuItem.style.transitionDuration = "".concat(parseInt(config.transition), "ms")),
        (subMenuItem.style.height = "".concat(subMenuItem.offsetHeight, "px")),
        subMenuItem.offsetHeight,
        (subMenuItem.style.overflow = "hidden"),
        (subMenuItem.style.height = 0),
        (subMenuItem.style.paddingTop = 0),
        (subMenuItem.style.paddingBottom = 0),
        (subMenuItem.style.marginTop = 0),
        (subMenuItem.style.marginBottom = 0),
        t = window.setTimeout(function () {
            (subMenuItem.style.display = "none"),
            subMenuItem.style.removeProperty("height"),
            subMenuItem.style.removeProperty("padding-top"),
            subMenuItem.style.removeProperty("padding-bottom"),
            subMenuItem.style.removeProperty("margin-top"),
            subMenuItem.style.removeProperty("margin-bottom"),
            subMenuItem.style.removeProperty("overflow"),
            subMenuItem.style.removeProperty("transition-duration"),
            subMenuItem.style.removeProperty("transition-property");
        }, parseInt(config.transition));

		currentTarget.classList.remove('acrd-menu-open');
	}
};

var ueExpandHashLinkSubMenuItems = function (e) {
	e.preventDefault();
	e.stopPropagation();

	let acrd = e.currentTarget.closest('nav').getAttribute('data-acrd-effect');
	if( acrd === 'yes' )
		doUeCollapseItems( e.target );

	arrowBtn = this.querySelector('.ue-menu-items-arrow');
	doUeExpandItems(arrowBtn);
};

function ueAccordionMenu( $selector = ".ue-acrd-menu" ) {
	document.querySelectorAll($selector).forEach(function (el) {
		let $links = el.querySelectorAll('.menu-item-has-children > a'),
			arrows = el.querySelectorAll('.ue-menu-items-arrow'),
			nav = el.querySelector('nav');

		arrows.forEach((arrow) => {
			if( ! arrow.closest('.menu-item').classList.contains('menu-item-has-children') ) {
				arrow.remove();
			}
		});
		
		$links.forEach((link) => {
			let arrowBtn = link.querySelector('.ue-menu-items-arrow'),
				parentLi = link.closest( '.menu-item-has-children' ),
				hasChild = parentLi.querySelectorAll('.sub-menu')[0];

			if( typeof arrowBtn != "undefined" || arrowBtn != null ) {
				arrowBtn.setAttribute('aria-label', 'Sub Menu of ' + link.getAttribute('data-title'));
				arrowBtn.setAttribute('aria-expanded', 'false');
				arrowBtn.setAttribute('aria-pressed', 'false');
				arrowBtn.setAttribute('aria-hidden', 'true');
			}

			if( link.getAttribute('href') === "#" ) {
				link.addEventListener('click', ueExpandHashLinkSubMenuItems);
			} else {
				arrowBtn.addEventListener('click', ueExpandSubMenuItems);
			}
		})

		const currentItems = el.querySelectorAll('.current-menu-item');
		const config = JSON.parse( nav.getAttribute('data-acrd-config') );
		if(currentItems && config.collapsed == 'no') {
			currentItems.forEach((currentItem) => {
				const ancestors = ueGetParentItems(currentItem, '.current-menu-ancestor, .menu-item-has-children');
				if(ancestors) {
					ancestors.forEach((ancestor) => {
						const link = ancestor.querySelector('a');
						arrowBtn = link.querySelector('.ue-menu-items-arrow');
						doUeExpandItems( arrowBtn )
					});
				}
			});
		}
	});
}