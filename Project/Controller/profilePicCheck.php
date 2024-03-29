<?php
require_once('../Model/guestdb.php');
session_start(); 
$target_dir = "../Assets/";
$user = $_SESSION['username'];
if (isset($_FILES["profilePic"]) && $_FILES["profilePic"]["error"] == UPLOAD_ERR_OK) {
  $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
  $uploadOk = true;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profilePic"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = true;
    } else {
      echo "File is not an image.";
      $uploadOk = false;
    }
  }
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = false;
  }
  if ($_FILES["profilePic"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = false;
  }
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = false;
  }
  if ($uploadOk) {
    if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
    $status=updateGuestPic($user,  $target_file);
    if($status){
        header('location:../View/Profile.php');
      }
        else{
            echo"db Connection error";
        }
    
    } 
else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}else {
  if ($_FILES["profilePic"]["error"] > 0) {
    switch ($_FILES["profilePic"]["error"]) {
      case 1:  echo "Upload Error: The uploaded file exceeds the upload_max_filesize directive in php.ini";
                break;
      case 2:  echo "Upload Error: The uploaded file exceeds the MAX_FILE_SIZE directive specified in the HTML form";
                break;
      case 3:  echo "Upload Error: The file was only partially uploaded";
                break;
      case 6:  echo "Upload Error: Missing a temporary folder";
                break;
      case 7:  echo "Upload Error: Failed to write file to disk";
                break;
      case 8:  echo "Upload Error: A PHP extension stopped the file upload";
                break;
    }
  } else {
    echo "No file selected";
  }
}

?>
