<?php
include_once 'autoload.php';
$client=new Repository('client');
$worker=new Repository('worker');
$responseClient=$client->findByUsername($_POST['contact']);
$responseWorker=$worker->findByUsername($_POST['contact']);
if($responseClient==null && $responseWorker==null){
    session_start();
    $_SESSION['contactintrouvable']="inexistant contact";
    header("location:messaging.php");
}
else{
    session_start();
    if(!isset($_SESSION['contact'])){
        $tab=array($_POST['contact']);
    $_SESSION['contact']=$tab;
    }
    else{
        if(!in_array($_POST['contact'],$_SESSION['contact'])){
    array_push($_SESSION['contact'],$_POST['contact']);}
        else{
            $_SESSION['existantcontact']="Existant Contact";
        }
}
header("location:messaging.php");
}