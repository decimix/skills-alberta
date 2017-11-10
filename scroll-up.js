/*
Credit goes to Micah Miller-Eshleman.
http://micahjon.com/2016/solving-the-anchor-targets-behind-fixed-headers-bug-with-minimal-javascript/
*/

// Update this function so it returns the height of your fixed headers
function fixedHeaderOffset( screenWidth ) 
{
	if ( screenWidth < 525 ) {
		return 120;
	}
	else if ( screenWidth < 1024 ) {
		return 88;
	}
	else {
		return 40;	
	}
}

// Run on first scroll (in case the user loaded a page with a hash in the url)
window.addEventListener('scroll', onScroll);
function onScroll()
{
	window.removeEventListener('scroll', onScroll);
	scrollUpToCompensateForFixedHeader();
}

// Run on hash change (user clicked on anchor link)
if ( 'onhashchange' in window ) {
	window.addEventListener('hashchange', scrollUpToCompensateForFixedHeader);
}

function scrollUpToCompensateForFixedHeader()
{
	var width = window.innerWidth,
		hash, 
		target, 
		offset;

	// Get hash, e.g. #mathematics
	hash = window.location.hash;
	if ( hash.length < 2 ) { return; }

	// Get :target, e.g. <h2 id="mathematics">...</h2>
	target = document.getElementById( hash.slice(1) );
	if ( target === null ) { return; }

	// Get distance of :target from top of viewport. If it's near zero, we assume
	// that the user was just scrolled to the :target.
	if ( target.getBoundingClientRect().top < 2 ) {
		window.scrollBy(0, -fixedHeaderOffset());
	}
}