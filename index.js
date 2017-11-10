$(init);

function init() {	
	// Fade in the page.
	fadeIn($("#home h1"));
	fadeIn($("#home h2"));
	fadeIn($("#about"));
	fadeIn($("#products"));
	fadeIn($("#news"));
	fadeIn($("#staff"));
	fadeIn($("#contact"));
	
	// Make products larger on hover.
	let products = $(".product");
	products.hover(function () {
		$(this).css({ transform: "scale(1.1)" }, 1000);		
	}, function () {
		$(this).css({ transform: "scale(1.0)" }, 1000);		
	});
	
	// Make staff photos larger on hover.
	let staff = $(".staff-member img");
	staff.hover(function () {
		$(this).css({ transform: "scale(1.1)" }, 1000);		
	}, function () {
		$(this).css({ transform: "scale(1.0)" }, 1000);		
	});
};

function fadeIn(item) {
	item.css({ opacity: "0" });
	item.animate({ opacity: "1" }, 1000);
}