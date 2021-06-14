<?php
include_once 'autoload.php';
$id = $_POST['post_id'];
var_dump($id);
$repo = new Repository('posts');
$repo->DeletePost($id);
header('location:Profile.php')
?>