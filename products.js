$(init);

function init() {
	// Cycle to next image on click.
	let img = $("#product img");
	img.click(cycleImage);
	setInterval(cycleImage, 5000);
};

function cycleImage() {
	let img = $("#product img");
	img.animate({ opacity: "0" }, function () {
		let src = img[0].src.split("/");
		let product = src[src.length - 2];
		let fileNum = parseInt(src[src.length - 1]) + 1;
		// Don't allow fileNums greater than 3.
		if (fileNum > 3) {
			fileNum = 1;
		}
		let path = "images/products/" + product + "/" + fileNum + ".jpg";
		img[0].src = path;
		img.animate({ opacity: "1" });
	});
}