<?php
include_once 'autoload.php';
session_start();
$mes=new Repository('messagerie');
$mes->ajouterMessage($_SESSION['username'],$_SESSION['users'],$_POST['message']);
header("location:conversation.php?name=".$_SESSION['users']);