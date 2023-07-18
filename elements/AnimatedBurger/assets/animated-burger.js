document.addEventListener("DOMContentLoaded", ueAnimatedBurger);
function ueAnimatedBurger() {
	document.querySelectorAll(".ue-animated-burger button").forEach(function (el) {
		let eventListener = 'click',
			timer = 1;
		
		if('ontouchstart' in window) // iOS & android
			eventListener = 'touchstart';
		else if(window.navigator.msPointerEnabled) // Win8
			eventListener = 'touchstart';
		else if('ontouchstart' in document.documentElement)
			eventListener = 'touchstart';

		el.addEventListener(eventListener, function(e){
			e.preventDefault();

			e.currentTarget.classList.toggle('is-active');
			const subMenu = e.currentTarget.closest('.ue-animated-burger').querySelector('.ue-burger-sub-menu')||false;
			if( subMenu ) {
				ueSlideToggle( subMenu );
			}
		});
	});

	/* SLIDE UP */
	let ueSlideUp = (target, duration=500) => {
		target.style.transitionProperty = 'height, margin, padding';
		target.style.transitionDuration = duration + 'ms';
		target.style.boxSizing = 'border-box';
		target.style.height = target.offsetHeight + 'px';
		target.offsetHeight;
		target.style.overflow = 'hidden';
		target.style.height = 0;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		window.setTimeout( () => {
			target.classList.remove('ue-burger-sub-menu--open');
			//target.style.display = 'none';
			target.style.removeProperty('height');
			target.style.removeProperty('padding-top');
			target.style.removeProperty('padding-bottom');
			target.style.removeProperty('margin-top');
			target.style.removeProperty('margin-bottom');
			target.style.removeProperty('overflow');
			target.style.removeProperty('transition-duration');
			target.style.removeProperty('transition-property');
		}, duration);
	}

	/* SLIDE DOWN */
	let ueSlideDown = (target, duration=500) => {
		target.classList.add('ue-burger-sub-menu--open');
		let height = target.offsetHeight;
		target.style.overflow = 'hidden';
		target.style.height = 0;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		target.offsetHeight;
		target.style.boxSizing = 'border-box';
		target.style.transitionProperty = "height, margin, padding";
		target.style.transitionDuration = duration + 'ms';
		target.style.height = height + 'px';
		target.style.removeProperty('padding-top');
		target.style.removeProperty('padding-bottom');
		target.style.removeProperty('margin-top');
		target.style.removeProperty('margin-bottom');
		window.setTimeout( () => {
			target.style.removeProperty('height');
			target.style.removeProperty('overflow');
			target.style.removeProperty('transition-duration');
			target.style.removeProperty('transition-property');
		}, duration);
	}

	/* TOOGLE */
	let ueSlideToggle = (target, duration = 500) => {
		if (!target.classList.contains('ue-burger-sub-menu--open')) {
			return ueSlideDown(target, duration);
		} else {
			return ueSlideUp(target, duration);
		}
	}
}