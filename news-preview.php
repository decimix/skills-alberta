<?php
	try {
		$conn = new PDO("mysql:host=localhost;dbname=website;charset=utf8", "root", "LEDLighting");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM news");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$articles = $result;
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
?>

<?php
	for ($i = 0; $i < sizeof($articles); $i++) {
		$j = $i + 1;
		$title = $articles[$i]["title"];
		$preview = $articles[$i]["preview"];
		echo <<<HTML
		<section id="$j">
			<h2>$title</h2>
			<div id="$j-news-preview-text" class="editable">$preview</div>
			<a href="news.php?article=$j">Read more...</a>
		</section>
HTML;
	}
?>
