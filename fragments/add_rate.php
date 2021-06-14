<?php
session_start();
require 'autoload.php';

    $rating = $_POST["rating"];
    $repo= new Repository('ratings');
    $repo->setrating($rating,$_SESSION['username'],$_GET['username'],$_POST['Review']);
    header('location:Profile.php?username='.$_GET['username'])

?>