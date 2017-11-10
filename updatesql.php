<?php
session_start();

function updateIndex() {
	$news = array();
	for ($i = 1; $i <= 5; $i++) {
		if (!isset($_POST["$i-news-preview-text"])) {
			return;
		}
		$preview = filter_input(INPUT_POST, "$i-news-preview-text");
		$news[$i] = $preview;
	}

	try {
		for ($i = 1; $i <= sizeof($news); $i++) {
			$conn = new PDO("mysql:host=localhost;dbname=website;charset=utf8", "root", "LEDLighting");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("UPDATE news SET preview = ? WHERE newsId = ?");
			$stmt->execute(array($news[$i], $i));
		}
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
}

function updateNews() {
	$newsId = "";
	$content = "";
	foreach ($_POST as $key => $val) {
		$newsId = $key;
		$content = $val;
	}

	try {
		$conn = new PDO("mysql:host=localhost;dbname=website;charset=utf8", "root", "LEDLighting");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("UPDATE news SET content = ? WHERE newsId = ?");
		$stmt->execute(array($content, $newsId));
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
}

function updateProducts() {
	foreach ($_POST as $key => $val) {
		$productId = $key;
		$content = $val;
	}
	
	try {
		$conn = new PDO("mysql:host=localhost;dbname=website;charset=utf8", "root", "LEDLighting");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("UPDATE products SET content = ? WHERE productId = ?");
		$stmt->execute(array($content, $productId));
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
}

if (isset($_SESSION["authorized"])) {
	$sentFrom = $_SESSION["sentFrom"];
	if ($sentFrom === "index.php") {
		updateIndex();
	} else if ($sentFrom === "news.php") {
		updateNews();
	} else if ($sentFrom === "products.php") {
		updateProducts();
	}
}
?>
