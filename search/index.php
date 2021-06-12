<?php
include_once "fragments/affichagePosts.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    <title>Find Service</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/animated.css">



    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="#" class="logo">
                        <h4>Khed<span>ma</span></h4>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">

                        <li class="scroll-to-section"><a href="#home"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                        <li class="scroll-to-section"><a href="saved-posts.php"><i class="fa fa-bookmark" aria-hidden="true"></i>Saved</a></li>
                        <li class="scroll-to-section"><a href="#settings"><i class="fa fa-cog" aria-hidden="true"></i>Settings</a></li>

                        <li class="scroll-to-section">
                            <div class="main-red-button"><a href="#logout">Log Out</a></div>
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
        <div class="row">
            <div class="col-lg-12">
                <div class="content justify-content-center ">
                    <div class="card p-4 mt-3">
                        <h2 class="text-center">Hi! How can we help You?</h2>
                        <div class="d-flex justify-content-center px-5">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item ">
                                    <a class="nav-link" id="pills-Cleaning-tab" data-toggle="pill"
                                       href="#pills-Cleaning"
                                       role="tab" aria-controls="pills-Cleaning" aria-selected="false">Cleaning</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-Cooking-tab" data-toggle="pill" href="#pills-Cooking"
                                       role="tab" aria-controls="pills-Cooking" aria-selected="false">Cooking</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-Moving-tab" data-toggle="pill" href="#pills-Moving"
                                       role="tab"
                                       aria-controls="pills-Moving" aria-selected="false">Moving</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="pills-Babysitting-tab" data-toggle="pill"
                                       href="#pills-Babysitting" role="tab" aria-controls="pills-Babysitting"
                                       aria-selected="false">Babysitting</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-FurnitureAssembly-tab" data-toggle="pill"
                                       href="#pills-FurnitureAssembly" role="tab"
                                       aria-controls="pills-FurnitureAssembly"
                                       aria-selected="false">FurnitureAssembly</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-TVandElectronics-tab" data-toggle="pill"
                                       href="#pills-TVandElectronics" role="tab" aria-controls="pills-TVandElectronics"
                                       aria-selected="false">TVandElectronics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-Painting-tab" data-toggle="pill"
                                       href="#pills-Painting"
                                       role="tab" aria-controls="pills-Painting" aria-selected="false">Painting</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-TVandElectronics-tab" data-toggle="pill"
                                       href="#pills-Plumbing" role="tab" aria-controls="pills-Plumbing"
                                       aria-selected="false">Plumbing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-Electrical-tab" data-toggle="pill"
                                       href="#pills-Electrical"
                                       role="tab" aria-controls="pills-Electrical" aria-selected="false">Electrical</a>
                                </li>

                            </ul>

                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-Cleaning" role="tabpanel" aria-labelledby="pills-Cleaning-tab">
                                <?php

                                afficher("Cleaning");
                                ?>

                            </div>
                            <div class="tab-pane fade" id="pills-Cooking" role="tabpanel" aria-labelledby="pills-Cooking-tab">
                                <?php
                                afficher("Cooking");
                                ?>
                            </div>
                            <div class="tab-pane fade" id="pills-Moving" role="tabpanel" aria-labelledby="pills-Moving-tab">
                                <?php
                                afficher("Moving");
                                ?>

                            </div>
                            <div class="tab-pane fade" id="pills-Babysitting" role="tabpanel"
                                 aria-labelledby="pills-Babysitting-tab">
                                <?php
                                afficher("Babysitting");
                                ?>
                            </div>
                            <div class="tab-pane fade" id="pills-FurnitureAssembly" role="tabpanel"
                                 aria-labelledby="pills-FurnitureAssembly-tab">
                                <?php
                                afficher("FurnitureAssembly");
                                ?>
                            </div>
                            <div class="tab-pane fade" id="pills-TVandElectronics" role="tabpanel"
                                 aria-labelledby="pills-TVandElectronics-tab">
                                <?php
                                afficher("TVandElectronics");
                                ?>
                            </div>
                            <div class="tab-pane fade" id="pills-Painting" role="tabpanel" aria-labelledby="pills-Painting-tab">

                                <?php
                                afficher("Painting");
                                ?>
                            </div>
                            <div class="tab-pane fade" id="pills-Plumbing" role="tabpanel" aria-labelledby="pills-Plumbing-tab">

                                <?php
                                afficher("Plumbing");
                                ?>
                            </div>
                            <div class="tab-pane fade" id="pills-Electrical" role="tabpanel"
                                 aria-labelledby="pills-Electrical-tab">
                                <?php
                                afficher("Electrical");
                                ?>
                            </div>
                        </div>
                    </div>
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