<!DOCTYPE html>
<html>
<body>
<?php
if ( Auth::check()){
	?>	
<form action="../../upload.php" method="post" enctype="multipart/form-data">
    Select File to Upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php
} else {
	echo "You must be logged in to upload a file!<br>";
}
?>
</body>
</html>
