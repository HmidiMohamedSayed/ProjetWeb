<?php
include_once 'autoload.php';

$rep = new Repository("table_posts");
$rep->insertpost($_POST['Subject'],$_POST['Description']);
?>