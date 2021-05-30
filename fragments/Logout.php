<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['contact']);
if(isset($_SESSION['users'])
unset($_SESSION['users']);
header('location:Login.php');