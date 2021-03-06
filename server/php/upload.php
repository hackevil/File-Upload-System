<?php

$directoy = "uploads/";
$target_file   = $directoy . basename($_FILES["fileToUpload"]["name"]);
$uploadOk      = true;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if (!file_exists($directoy)) {
    mkdir($directoy, 0777, true);    
}

if (count(glob($directoy . "*")) === 0 ) { 
    echo '<span id="empty">This folder is empty!</span>'; 
}

if (isset($_GET['delete'])) {
        unlink($_GET['delete']);
    if (count(glob($directoy . "*")) === 0 ) { 
      echo '<span id="empty">This folder is empty!</span>'; 
  }
}

if ($handle = opendir($directoy)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo '
            <ul class="file-row">
              <li class="type"><img src="assets/img/file-icon.png"></li>
              <li class="name"><a href="' . $directoy . $entry . '" download>' . $entry . '</a><br /></li>
              <li class="btn-section-1"><a href="' . $directoy . $entry . '"><img src="assets/img/view-icon.png"></a><a href="' . $directoy . $entry . '" download><img src="assets/img/download-icon.png"></a></li>
              <li class="date">' . date("d/m/y H:i:s", filemtime($directoy . $entry)) . '</li>
              <li class="size">' . filesize($directoy . $entry) .'KB </li>
              <li class="btn-section-2"><a href="?delete=' . $directoy . $entry . '"><img src="assets/img/bin-icon.png"></a></li>
            </ul>' . "\n";   
        }
    }
    closedir($handle);
}

if (isset($_POST["submit"])) {
    
    $total = count($_FILES['fileToUpload']['name']);

    for($i=0; $i<$total; $i++) {
      $tmpFilePath = $_FILES['fileToUpload']['tmp_name'][$i];

      if ($tmpFilePath != "") {
        $newFilePath = "uploads/" . $_FILES['fileToUpload']['name'][$i];

         if(move_uploaded_file($tmpFilePath, $newFilePath)) {
          	header('upload.php');
        }  else {
            echo '<script>alert("Error uploading file");</script>';
        }
      }
   }
}

echo '
  <ul class="custom-menu">
    <li data-action="download-option" id="file-download-cm"><img id="cm-icon" src="assets/img/file-icon.png">Download File</li>
    <li data-action="upload-option" id="file-upload-cm"><img id="cm-icon" src="assets/img/file-icon.png">Upload Files</li>
  </ul>';
 

?>


