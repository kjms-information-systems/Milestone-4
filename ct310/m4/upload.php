<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./assets/css/m3.css">
</head>
<body>

<?php
$target_dir = "./";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, your file already exists.\n";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.\n";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "csv" && $imageFileType != "txt" ) {
    echo "Sorry, only csv or txt files are allowed.\n";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Your file was not uploaded.\n";
    echo "Click <a href=\"http://www.cs.colostate.edu:8888/~jhgrins/ct310/m4/index.php/m4/management\">here</a> to try again.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo "Click <a href=\"http://www.cs.colostate.edu:8888/~jhgrins/ct310/m4/index.php/m4/vbp_modeling\">here</a> to able to select your file and view it.";
    } else {
        echo "Sorry, there was an error uploading your file.\n";
        echo "Click <a href=\"http://www.cs.colostate.edu:8888/~jhgrins/ct310/m4/index.php/m4/management\">here</a> to try again.";
    }
}
?>

