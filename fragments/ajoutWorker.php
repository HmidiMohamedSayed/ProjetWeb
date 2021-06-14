<?php
include_once 'autoload.php';
function verif($username){
    $repoc = new Repository('client');
    $repow = new Repository('worker');
    $client=$repoc->findByUsername($username);
    $worker=$repow->findByUsername($username);
    if($client==null && $worker==null){
        return true;
    }
    return false;
}
if($_POST['password']==$_POST['confirmpassword'] && verif($_POST['username'])==true ){
    $Repow = new Repository('worker');
$Repow->ajouterWorker($_POST['username'],$_POST['password'],$_POST['fullname'],$_POST['email'],$_POST['phone'],$_POST['gender'],$_POST['service'],$_POST['birthdate']);
header("location:Login.php");}
else if(verif($_POST['username'])==false){
    session_start();
    $_SESSION['exist']="Username exists Please try another one";
    header("location:SignupProfile.php");
}
else{
    session_start();
    $_SESSION['wrongconfirmation']="Wrong Confirmation of Password Please Reconfirm it Correctly";
    header("location:SignupProfile.php");
}