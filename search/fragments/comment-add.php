<?php
session_start();
$conn = mysqli_connect("localhost","root","","dbproject");
$post_id = $_GET['post_id'];
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
$commentSenderName = $_SESSION['username'];
$date = date('Y-m-d H:i:s');

if (str_replace(' ', '', $comment)!=""){
$sql = "INSERT INTO comments(post_id,comment,comment_sender_name,date) VALUES ('". $post_id . "','". $comment . "','" . $commentSenderName . "','" . $date . "')";
$result = mysqli_query($conn, $sql);

if (! $result) {
    $result = mysqli_error($conn);
}
echo $result;
}
?>
