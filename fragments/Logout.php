<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['contact']);

unset($_SESSION['users']);
header('location:Login.php');