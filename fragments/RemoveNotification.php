<?php
include_once 'autoload.php';
session_start();
$repo=new Repository('messagerie');
$messages=$repo->findMessageBySourceDestination($_GET['source'],$_SESSION['username']);
$m=$messages->fetchAll();
$array=[];
$n=0;
for($i=0;$i<count($m);$i++){
    $array[$n++]=$m[$i]['content'];
}
for($i=0;$i<$n;$i++) {
    $repo->makeLu($_GET['source'],$_SESSION['username'],$array[$i]);
}
header("location:messaging.php#profile");