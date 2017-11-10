<link rel="stylesheet" type="text/css" href="iconfont/material-icons.css" />

<header>
	<ul>
		<li id="title"><a href="index.php">Reginald's LED Lighting</a></li>
		<li class="hidden"><a href="index.php#about">About</a></li>
		<li class="hidden"><a href="index.php#products">Products</a></li>
		<li class="hidden"><a href="index.php#news">News</a></li>
		<li class="hidden"><a href="index.php#staff">Staff</a></li>
		<li class="hidden"><a href="index.php#contact">Contact</a></li>
		<i id="menu" class="material-icons">menu</i>
	</ul>
</header>
<div style="height: 54px"></div>

<script>
$(init);

function init() {
	// Show menu on menu button click.
	$("header i.material-icons").click(function () {
		$("header li:not(:first-child)").toggle("hidden");
	});
	// Close menu when an option is clicked.
	$("header a").click(function () {
		if (window.innerWidth <= 768) {
			$("header li:not(:first-child)").toggle("hidden");
		}
	});
}
</script>
<script src="scroll-up.js"></script>