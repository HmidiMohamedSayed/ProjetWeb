<?php 
session_start();
include_once 'autoload.php';
$repo =  new Repository('posts');
$repo->ModifyPost($_POST['Loc'],$_POST['Des'],$_SESSION['id']);


