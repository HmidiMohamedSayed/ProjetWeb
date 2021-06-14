<?php
session_start();
include_once "autoload.php";


if (!isset($_SESSION['username'])) {
    header("location:Login.php");
}


$repow = new Repository('worker');
$repoc = new Repository('client');
$worker = $repow->findByUsername1($_SESSION['username']);
$client = $repoc->findByUsername1($_SESSION['username']);
if($worker!=NULL ) {$result=$worker;$repo=$repow;}
else if($client!=NULL) { $result=$client;$repo=$repoc;}
foreach ($result as $personne) {
if (isset($_POST['password'])) {

    
        if ($_POST['Password'] == $personne->password) {
            if ($_POST["NewPassword"] == $_POST["RetypedNewPassword"]) {
                $repo->ChangePassword($_SESSION['username'], $_POST['NewPassword']);
                header('location:Profile.php#account-change-password');
            } else {
                $_SESSION['error'] = "Wrong confirmation of password!";
                header('location:AccountSettings.php#account-change-password');
            }
        } else {
            $_SESSION['error'] = "Wrong Password!";
            header('location:AccountSettings.php#account-change-password');
        }
        unset($_POST['password']);
    
} else if (isset($_POST['general'])) {
    $repo->ChangeGeneral($_POST["Name"],$_POST["E-mail"],$_SESSION['username']);
    unset($_POST['general']);
    header('location:Profile.php');
    
    
} else if (isset($_POST['info'])){ 
    $text=str_replace("\n","<br />",$_POST['bio']);
    $repo->ChangeInfo($text,$_POST['birthdate'],$_POST['phonenumber'],$_SESSION['username']);
    unset($_POST['info']);
    header('location:Profile.php');
    
}
}
if(isset($_POST["upload"])){

// Include the database configuration file
$statusMsg = '';

// File upload path
$targetDir = __DIR__ . "../../assets/images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["upload"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $repo->UploadFile($fileName,$_SESSION['username']);
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
unset($_POST['upload']);
header('location:Profile.php');
}
?>

