<?php
if (isset($_SESSION["authorized"])) {
	echo <<<HTML
	<div id="save-button"><p>Save</p></div>
HTML;
	echo <<<JS
	<script src="libs/tinymce/tinymce.min.js"></script>
	<script>
	tinymce.init({
		selector: ".editable", inline: true
	});
	
	$("#save-button").click(function () {
		// Save all of the elements on this page.
		let elemToSave = $(".editable");
		let payload = {};
		for (let i = 0; i < elemToSave.length; i++) {
			let elem = elemToSave[i];
			payload[elem.id] = elem.innerHTML;
		}
		console.log(payload);
		$.post({
			url: "updatesql.php",
			data: payload,
			success: function (data) {},
			error: function (data) {}
		});
		
		// Animate the save button.
		let save = $(this);
		save.children(0).animate({ opacity: "0" }, function () {
			save.html("<i class='material-icons'>checkmark</i>");
		});
		setTimeout(function () {
			save.children(0).animate({ opacity: "0" }, function () {
			save.html("<p>Save</p>");
			});
		}, 3000);
	});
	</script>
JS;
}
	?>