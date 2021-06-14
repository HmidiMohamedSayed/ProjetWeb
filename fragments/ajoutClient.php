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
    $repoc = new Repository('client');
    $repoc->ajouterClient($_POST['fullname'],$_POST['username'],$_POST['email'],$_POST['phonenumber'],$_POST['password'],$_POST['gender'],$_POST['birthdate']);
    header("location:Login.php");}
else if(verif($_POST['username'])==false){
    session_start();
    $_SESSION['exist']="Username exists Please try another one";
    header("location:SignUpClient.php");
}

else{
    
    session_start();
    $_SESSION['wrongconfirmation']="Wrong Confirmation of Password Please Reconfirm it Correctly";
    header("location:SignUpClient.php");
}