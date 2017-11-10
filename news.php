<?php
	session_start();
	$_SESSION["sentFrom"] = "news.php";
?>

<?php
	// Open the page for the relevant product.
	$articleId = filter_input(INPUT_GET, "article");
	try {
		$conn = new PDO("mysql:host=localhost;dbname=website;charset=utf8", "root", "LEDLighting");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM news WHERE newsId = ?");
		$stmt->execute(array($articleId));
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$articles = $result;
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Reginald's LED Lighting | News</title>
		<link rel="stylesheet" type="text/css" href="index.css" />
		<script src="libs/jquery-3.2.1.min.js"></script>
	</head>
	<body>
		<?php require_once("header.php"); ?>
		<?php
			$title = $articles[0]["title"];
			$content = $articles[0]["content"];
			echo <<<HTML
			<section>
				<h2>$title</h2>
				<div id="$articleId" class="editable">$content</div>
			</section>
HTML;
		?>
		<?php require_once("save.php"); ?>
	</body>
</html>
 