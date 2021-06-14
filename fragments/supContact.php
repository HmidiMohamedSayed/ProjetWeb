<?php
include_once 'autoload.php';
session_start();
$tab=$_SESSION['contact'];
$mes=new Repository('messagerie');
$messages=$mes->findMessageByDoubleUsername($_GET['user'],$_SESSION['username']);
$tableau=$messages->fetch();

if($tableau==null){
    if(isset($tab[0])){
if($tab[0]==$_GET['user']){
    unset($tab[0]);
    $_SESSION['contact']=$tab;
}}
if(array_search($_GET['user'], $tab)){
unset($tab[array_search($_GET['user'], $tab)]);
$_SESSION['contact']=$tab;}
else{
    $_SESSION['contactintrouvable']="Inexistant Contact Check Your Contact List";
}}
else{
    $_SESSION['exist']="You can not Delete this Contact Because you have already a conversation with him";
}
header("location:messaging.php");