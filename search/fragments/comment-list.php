<?php
session_start();
$post_id = $_GET['post_id'];
$conn = mysqli_connect("localhost","root","","dbproject");
$sql = "SELECT * FROM comments where post_id='$post_id' ";

$result = mysqli_query($conn, $sql);
$record_set = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($record_set, $row);
}
mysqli_free_result($result);

mysqli_close($conn);
echo json_encode($record_set);
?>