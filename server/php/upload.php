<?php

$directoy      = "uploads/";
$target_file   = $directoy . basename($_FILES["fileToUpload"]["name"]);
$uploadOk      = true;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if (!file_exists($directoy)) {
    mkdir($directoy, 0777, true);    
}

if (count(glob($directoy . "*")) === 0 ) { 
    echo "<span>This folder is empty!</span>"; 
}

if ($handle = opendir($directoy)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo '<ul class="file-list"><li class="name"><a href="' . $directoy . $entry . '" download>' . $entry . '</a><br /></li><li class="date">' . date("F d Y H:i:s", filemtime($directoy . $entry)) . '</li><li class="size">' . filesize($directoy . $entry) .'KB </li></ul>' . "\n";   
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
            exit;
        }  else {
            echo '<script>alert("Error uploading file");</script>';
        }
      }
   }
}
 

?>