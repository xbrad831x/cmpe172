<?php
$target_dir = "uploads/";
$file_name = basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	$conn = mysqli_connect("localhost","root","","workhub");
	mysqli_query($conn, "INSERT INTO `files`(`Name`) VALUES ('$file_name')");
	$msg = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    echo "<SCRIPT type='text/javascript'>
        alert('".$msg."');
        window.location.replace(\"http://localhost/src/views/documents_view.php\");
    </SCRIPT>";
} 
else 
{
    echo "Sorry, there was an error uploading your file.";
}

mysqli_close($conn);


?>