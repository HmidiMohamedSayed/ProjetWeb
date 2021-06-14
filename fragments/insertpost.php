<?php
include_once 'autoload.php';
session_start();
$rep = new Repository("posts");
$Description=str_replace("\n","<br />",$_POST['Description']);

$statusMsg = 'PostAddedSuccessfully';
$targetDir = __DIR__ . "../../assets/postfiles/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if (!empty($_FILES["file"]["name"])) {
    // Allow certain file formats

    $allowPicTypes = array('jpg', 'png', "jpeg", "gif");
    $allowFileTypes = array('pdf', 'docx');
    if (in_array($fileType, $allowPicTypes)) {
        // Upload file to server

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $rep->insertpostpic($_POST['Location'],$Description, $fileName,$_SESSION['username'],$_SESSION['occupation']);
            unset($_POST['upload']);
           header('location:Profile.php?statusmsg=' . $statusMsg);
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
            unset($_POST['upload']);
          header('location:Profile.php?statusmsg=' . $statusMsg);
        }
    } else if (in_array($fileType, $allowFileTypes)) {

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $rep->insertpostfile($_POST['Location'],$Description, $fileName,$_SESSION['username'],$_SESSION['occupation']);
            unset($_POST['upload']);
           header('location:Profile.php?statusmsg=' . $statusMsg);
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
            unset($_POST['upload']);
           header('location:Profile.php?statusmsg=' . $statusMsg);
        }
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        unset($_POST['upload']);
        header('location:Profile.php?statusmsg=' . $statusMsg);
    }
    unset($_POST['upload']);
} else {
 
    $rep->insertpost($_POST['Location'], $Description,$_SESSION['username'],$_SESSION['occupation']);
    unset($_POST['upload']);
    header('location:Profile.php?statusmsg=' . $statusMsg);
   
}




    
