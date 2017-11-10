<?php
	session_start();
	$_SESSION["sentFrom"] = "products.php";
	
	// Open the page for the relevant product.
	$productId = filter_input(INPUT_GET, "product");
	try {
		$conn = new PDO("mysql:host=localhost;dbname=website;charset=utf8", "root", "LEDLighting");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM products WHERE productId = ?");
		$stmt->execute(array($productId));
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$product = $result[0];
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	
	function lineBreak($str) {
		return implode("<br>", explode("\n", $str));
	}
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Reginald's LED Lighting | <?php echo $product["name"]; ?></title>
		<link rel="stylesheet" type="text/css" href="index.css" />
		<link rel="stylesheet" type="text/css" href="products.css" />
		<script src="libs/jquery-3.2.1.min.js"></script>
		<script src="products.js"></script>
	</head>
	<body>
		<?php require_once("header.php"); ?>
		<section id="product">
			<img src="images/products/<?php echo $productId; ?>/1.jpg" width="300px" height="300px" />
			<div id="<?php echo $productId; ?>" class="editable"><?php echo $product["content"]; ?></div>
			<div>
				<h2>Call (555) 555-555 to place a hold on this product now!</h2>
			</div>
		</section>
		<?php require_once("save.php"); ?>
	</body>
</html>
 