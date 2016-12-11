<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Matthew">
	<meta name="Keywords" content="File, Upload, System">
	<meta name="Description" content="Turns your web host into a file upload system">

	<title>File Upload System</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

	<?php include 'upload.php'; ?>

	<br> 

	<form id="upload_form" method="post" enctype="multipart/form-data">
	    <input type="file" name="fileToUpload[]" enctype="multipart/form-data" id="fileToUpload[]" multiple />
	    <input type="submit" value="Upload" onclick="uploadFile()" name="submit" /><br /><br />
	  	<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
	  	<h3 id="status"></h3>
	  	<p id="loaded_n_total"></p>
	</form>

	<script type="text/javascript" src="js/script.js"></script>

</body>
</html>