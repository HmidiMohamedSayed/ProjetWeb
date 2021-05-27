<?php
session_start();

$conn = mysqli_connect("localhost","root","","dbproject");
include_once 'fragments/autoload.php';
$bdd=ConnexionBD::getInstance();
$username = $_SESSION['username'];
if(isset($_GET["post_id"])) {
    $post_id=$_GET["post_id"];
    $sql = "INSERT INTO saved_posts(username,post_id) VALUES ('" . $username . "','" . $post_id . "')";
    $result = mysqli_query($conn, $sql);
}
