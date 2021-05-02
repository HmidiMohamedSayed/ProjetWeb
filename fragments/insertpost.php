<?php
include_once 'autoload.php';

$rep = new Repository("table_posts");
$rep->insertpost($_POST['Location'],$_POST['Description']);
header('location:ProfileWorker.php');
?>