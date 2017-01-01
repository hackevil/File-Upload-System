<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Matthew">
	<meta name="Keywords" content="File, Upload, System">
	<meta name="Description" content="Turns your web host into a file upload system">

	<title>File Upload System</title>

	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>

</head>
<body>

	<div id="wrapper">

		<div id="header">
		</div>

		<div id="top-bar">
			<img id="upload-icon" src="assets/img/add-icon.png">
		</div>

		<div id="directory-wrapper">

			<ul class="attributes-row">
				<li class="name">Name</li>
				<li class="date">Date Modified</li>
				<li class="size">Size</li>
			</ul>

			<?php include 'server/php/upload.php'; ?>
		</div>

		<form id="upload-form" method="post" enctype="multipart/form-data" style="visibility: hidden;">
		    <input type="file" name="fileToUpload[]" id="fileToUpload[]" onchange="submitting(this)" multiple />
		    <input type="submit" value="Upload" id="submit-file" name="submit" />
		</form>

	</div>


	<script src="js/script.js"></script>

</body>
</html>