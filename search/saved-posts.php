<?php
session_start();

include_once "fragments/affichagePosts.php";

$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Your Saved Posts </title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/animated.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</head>
<body>
<?php

if(!isset($_SESSION['username'])){
    header("location:Login.php");
}

?>
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="../fragments/index.php" class="logo">
                        <h4>Khed<span>ma</span></h4>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">

                        <li class="scroll-to-section"><a href="../fragments/index.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
                        </li>
                        <li class="scroll-to-section"><a href="saved-posts.php"><i class="fa fa-bookmark"
                                                                                   aria-hidden="true"></i>Saved</a>
                        </li>
                        <li class="scroll-to-section"><a href="../fragments/messaging.php" class="fa fa-envelope" ></a></li>
                        <li class="scroll-to-section"><a href="../fragments/Profile.php" class="fa fa-user" ></a></li>


                        <li class="scroll-to-section">
                            <div class="main-red-button"><a href="../fragments/Logout.php">Log Out</a></div>
                        </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
<div class="main-banner wow fadeIn " id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card p-4 mt-3">
                    <!--- \\\\\\\Posts-->
                    <?php
                    afficherSavedPosts($username);
                    ?>
                    <!--- ///////Posts-->

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="jquery/jquery.min.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/scripts.js"></script>

</body>

</html>