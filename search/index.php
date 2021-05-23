<?php include_once "fragments/affichagePosts.php"?>

<!doctype html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <title>Find Service</title>
</head>
<body>
<div class="container mt-4">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card p-4 mt-3">
                <h3 class="heading mt-5 text-center">Hi! How can we help You?</h3>

                <div class="d-flex justify-content-center px-5">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link" id="pills-Cleaning-tab" data-toggle="pill" href="#pills-Cleaning"
                               role="tab" aria-controls="pills-Cleaning" aria-selected="false">Cleaning</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-Cooking-tab" data-toggle="pill" href="#pills-Cooking"
                               role="tab" aria-controls="pills-Cooking" aria-selected="false">Cooking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-Moving-tab" data-toggle="pill" href="#pills-Moving" role="tab"
                               aria-controls="pills-Moving" aria-selected="false">Moving</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="pills-Babysitting-tab" data-toggle="pill"
                               href="#pills-Babysitting" role="tab" aria-controls="pills-Babysitting"
                               aria-selected="true">Babysitting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-FurnitureAssembly-tab" data-toggle="pill"
                               href="#pills-FurnitureAssembly" role="tab" aria-controls="pills-FurnitureAssembly"
                               aria-selected="false">FurnitureAssembly</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-TVandElectronics-tab" data-toggle="pill"
                               href="#pills-TVandElectronics" role="tab" aria-controls="pills-TVandElectronics"
                               aria-selected="false">TVandElectronics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-Painting-tab" data-toggle="pill" href="#pills-Painting"
                               role="tab" aria-controls="pills-Painting" aria-selected="false">Painting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-TVandElectronics-tab" data-toggle="pill"
                               href="#pills-Plumbing" role="tab" aria-controls="pills-Plumbing" aria-selected="false">Plumbing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-Electrical-tab" data-toggle="pill" href="#pills-Electrical"
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
                    <div class="tab-pane fade" id="pills-babysitting" role="tabpanel"
                         aria-labelledby="pills-babysitting-tab">
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

</body>

</html>