<?php
	session_start();
	$_SESSION["sentFrom"] = "index.php";
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Reginald's LED Lighting</title>
		<link rel="stylesheet" type="text/css" href="index.css" />
		<script src="libs/jquery-3.2.1.min.js"></script>
		<script src="index.js"></script>
	</head>
	<body>
		<?php require_once("header.php"); ?>
		<section id="home">
			<figure>
				<img src="images/earth.jpg" width="100%" />
			</figure>
			<figcaption>
				<h1>Reginald's LED Lighting</h1>
				<h2>Light Up Your Life</h2>
			</figcaption>
		</section>
		<section id="about" class="anchor">
			<h2>About Us</h2>
			<div id="about-text">
				<p>Canada's first Reginalds LED Lighting store started with Reginald Walter's family vacation to <a target="_blank" href="https://disneyland.disney.go.com/">Disneyland</a> in 2008. While visiting, Reginald stopped into a store full of glowing lights and decided Brooks should have one of its own.</p>
				<p>We hope that our company will expand worldwide in the next 10 years, supplying LED lighting to everyone on the globe.</p>
			</div>
		</section>
		<section id="products" class="anchor">
			<h2>Our Products</h2>
			<div id="products-list">
				<?php
				$names = array("White LED Spotlight", "Night Lamp", "Flexible LED Strip", "LED Cabinet Light", "LED Faucet Light", "Rabbit Style 3-LED Night Lamp", "Waterproof LED Solar Wall Light", "LED Solar Roof Light", "Solar Fence Light", "Waterproof LED Wall Washer");
				for ($i = 0; $i < sizeof($names); $i++) {
					$j = $i + 1;
					echo <<<HTML
					<div class="product">
						<a href="products.php?product=$j">
							<img src="images/products/$j/1.jpg" width="100%" />
							<p>$names[$i]</p>
						</a>
					</div>
HTML;
				}
				?>
			</div>
		</section>
		<div id="news" class="anchor" style="width: 0; height: 0"></div>
		<?php require_once("news-preview.php"); ?>
		<!--
		<section id="news">
			<h2>Recent News</h2>
			<p>Top 10 Benefits of Using LED Lights Instead of Conventional Lighting</p>
			<p>You certainly hear and read a lot about the advantages and benefits of the energy efficiency of LED light emitting diodes vs traditional lighting. When you compare them to other energy-saving illumination methods that are available on the market today, you will find that LED lighting is by far the most power-saving and smart solution for illumination.</p>
			<a href="news.php">Read more...</a>
		</section>
		-->
		<section id="staff" class="anchor">
			<h2>Our Dedicated Staff</h2>
			<div id="staff-list">
			<?php
				$names = array("Steve Cordoza|CEO", "Tim Fritz|Vice President", "Donna Hildebrand|Human Resources", "Tim Peterson|Research and Development", "Nancy Whipman|Reception", "Keith Winston|Sales", "Sean Grennis|Sales", "Teresa Violet|Sales");
				
				for ($i = 0; $i < sizeof($names); $i++) {
					$name = explode("|", $names[$i]);
					echo <<<HTML
					<div class="staff-member">
						<img src="images/staff/$name[0].jpg" width="100%" />
						<p>$name[0]</p>
						<p class="title">$name[1]</p>
					</div>
HTML;
				}
			?>
			</div>
		</section>
		<section id="contact" class="anchor">
			<h2>Contact Us</h2>
			<p>
				<strong>Address:</strong><br>
				<a target="_blank" href="https://www.google.ca/maps/place/304+3+Ave+E,+Brooks,+AB+T1R+0G6/@50.566744,-111.8961842,17z/data=!3m1!4b1!4m5!3m4!1s0x536d63a94fb4932f:0x2a5e8c2485885387!8m2!3d50.5667406!4d-111.8939955">
				Reginald's LED Lighting<br>
				304 3 Ave E<br>
				Brooks, AB T1R 0G6<br>
				</a>
				<br>
				<strong>Phone Number:</strong><br>
				(555) 555-5555
			</p>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2534.2486814786303!2d-111.89618418426441!3d50.56674057949154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x536d63a94fb4932f%3A0x2a5e8c2485885387!2s304+3+Ave+E%2C+Brooks%2C+AB+T1R+0G6!5e0!3m2!1sen!2sca!4v1494446673447" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</section>
		<footer>
			<p>Created: May 5, 2017</p>
			<p>Last updated: May 6, 2017</p>
			<p>
				Special thanks to:
				<a href="https://jquery.com/">jQuery</a>
				<a href="https://www.tinymce.com/">TinyMCE</a>
				<a href="https://fonts.google.com/">Google Fonts</a>
				<a href="https://material.io/icons/">Material Icons</a>
			</p>
			<p>© Kyle Hennig | contact@localhost.com | (555) 555-5555</p>
		</footer>
		<?php require_once("save.php"); ?>
	</body>
</html>
 