<?php
include_once 'autoload.php';
function verif($username){
    $workerRepository = new WorkerRepository();
    $clientRepository = new ClientRepository();
    $client=$clientRepository->findByUsername($username);
    $worker=$workerRepository->findByUsername($username);
    if($client==null && $worker==null){
        return true;
    }
    return false;
}
if($_POST['password']==$_POST['confirmpassword'] && verif($_POST['username'])==true ){
    $clientRepository = new ClientRepository();
    $clientRepository->ajouterClient($_POST['fullname'],$_POST['username'],$_POST['email'],$_POST['phone'],$_POST['password'],$_POST['gender']);
    header("location:Login.php");}
else if(verif($_POST['username'])==false){
    session_start();
    $_SESSION['exist']="Username exists Please try another one";
    header("location:SignUp.php");
}
else{
    session_start();
    $_SESSION['wrongconfirmation']="Wrong Confirmation of Password Please Reconfirm it Correctly";
    header("location:SignUp.php");
}