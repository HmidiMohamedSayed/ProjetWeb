<?php
include_once 'autoload.php';

$rep = new Repository("posts");
$rep->insertpost($_POST['Location'],$_POST['Description']);
header('location:ProfileWorker.php');
?>