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
</head>
<body>

	<div id="wrapper">

		<div id="directory-wrapper">

			<ul class="attributes-row">
				<li class="name"><span>Name</span></li>
				<li class="date"><span>Date Modified</span></li>
				<li class="size"><span>Size</span></li>
			</ul>

			<?php include 'server/php/upload.php'; ?>
		</div>

		<form id="upload_form" method="post" enctype="multipart/form-data">
		    <input type="file" name="fileToUpload[]" id="fileToUpload[]" multiple />
		    <input type="submit" value="Upload" name="submit" />
		</form>

	</div>

</body>
</html>