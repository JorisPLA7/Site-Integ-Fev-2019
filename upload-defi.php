<?php
$target_dir = "Defis/";
date_default_timezone_set('Europe/Paris');
$date = date('d-M_H-i-s', time());
$target_file = $target_dir . $_POST["clan"] ."-". $_POST["name"] ."-". $date . "." . strtolower(pathinfo(basename($_FILES["file"]["name"]),PATHINFO_EXTENSION));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "mp4" && $imageFileType != "m4v" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "mov") {
    echo "Sorry, only MP4, M4V, JPG, JPEG, PNG, MOV & GIF files are allowed.";
    echo "$target_file";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        echo '<meta http-equiv="refresh" content="1; URL=index.php">';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>