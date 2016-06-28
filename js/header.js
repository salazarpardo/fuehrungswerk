// JavaScript Document

var latestKnownScrollY = 0,
	ticking = false;

function onScroll() {
	latestKnownScrollY = (window.scrollY || window.pageYOffset);
	requestTick();
}

function requestTick() {
	if(!ticking) {
		requestAnimationFrame(update);
	}
	ticking = true;
}

function update() {
	ticking = false;
	
	var currentScrollY = latestKnownScrollY;
	if (currentScrollY >= 172) {
        jQuery('#masthead').addClass("scrolled");
    }
    if (currentScrollY < 172) {
        jQuery('#masthead').removeClass("scrolled");
    }
	
}

window.addEventListener('scroll', onScroll, false);
jQuery( document ).ready(function() {
    onScroll();
});