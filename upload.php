<?php

$directoy      = "uploads/";
$target_file   = $directoy . basename($_FILES["fileToUpload"]["name"]);
$uploadOk      = true;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if (!file_exists($directoy)) {
    mkdir($directoy, 0777, true);    
}

if (count(glob($directoy . "*")) === 0 ) { 
    echo "This folder is empty!"; 
}

if ($handle = opendir($directoy)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo '<a href="' . $directoy . $entry . '" download>' . $entry . '</a><br />' . "\n";   
        }
    }
    closedir($handle);
}

if (isset($_POST["submit"])) {
    
    // Count # of uploaded files in array
    $total = count($_FILES['fileToUpload']['name']);

    // Loop through each file
    for($i=0; $i<$total; $i++) {
      //Get the temp file path
      $tmpFilePath = $_FILES['fileToUpload']['tmp_name'][$i];

      //Make sure we have a filepath
      if ($tmpFilePath != ""){
        //Setup our new file path
        $newFilePath = "uploads/" . $_FILES['fileToUpload']['name'][$i];

        //Upload the file into the temp dir
         if(move_uploaded_file($tmpFilePath, $newFilePath)) {
          	header('upload.php');
        }  else {
            echo '<script>alert("Error uploading file");</script>';
        }
      }
   }
}
 

?>
