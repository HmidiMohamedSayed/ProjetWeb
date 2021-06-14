<?php
include_once 'autoload.php';
session_start();
?>
<!DOCTYPE html>

<head>
    <meta lang="en">
    <meta charset="UTF-8">
    <title>Document </title>
    <link href="../assets/css/Profile.css" rel="stylesheet">
    <link href="../assets/css/reviews.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="../assets/css/animated.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/unreadcomments.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="thumbnail-gallery.css">

    <!-- Ratings -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">


</head>

<body>
<?php

if(!isset($_SESSION['username'])){
    header("location:Login.php");
}

?>
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <h4>KHE<span>DMA</span></h4>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="index.php#About">About Us</a></li>
                            <li class="scroll-to-section"><a href="index.php#portfolio">Services</a></li>
                            <li class="scroll-to-section"><a href="../search/index.php" class="fa fa-globe" ></a></li>
                            <li class="scroll-to-section"><a href="messaging.php" class="fa fa-envelope" ></a></li>
                            <li class="scroll-to-section">
                                <div class="main-red-button"><a href="Logout.php">Log Out</a></div>
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

    <div class="container">
        <div id="content" class="content p-0">
            <div class="profile-header">
                <div class="profile-header-cover"></div>
                <div class="profile-header-content">
                    <div class="profile-header-img mb-4">
                        <?php
                        $repoc = new Repository('client');
                        $repow = new Repository('worker');
                        if (isset($_GET['username'])) {
                            $client = $repoc->findByUsername($_GET['username']);
                            $worker = $repow->findByUsername($_GET['username']);
                        } else {
                            $client = $repoc->findByUsername($_SESSION['username']);
                            $worker = $repow->findByUsername($_SESSION['username']);
                        }
                        if ($client != NULL) $filename = $repoc->getfilename($client->username);
                        else if ($worker != NULL) $filename = $repow->getfilename($worker->username);
                        else  header("location:index.php");
                        if ($filename->picture != NULL) {
                        ?>
                            <img src="../assets/images/<?= $filename->picture ?>" class="mb-4" alt="" />
                        <?php } else { ?>
                            <img src="../assets/images/default-profile-picture.jpg" id="default-profile-picture" class="mb-4" alt="" />
                        <?php } ?>
                    </div>
                   
                    <div class="profile-header-info">
                        <h4 class="m-t-sm"> <?php if ($worker != NULL) echo $worker->username;
                                            else if ($client != NULL) echo $client->username;   ?></h4>
                        <br>
                        <?php  
                           if (isset($_GET['username']) & $worker != NULL) {
                            $rep = new Repository('ratings');
                            $res = $rep->getaveragerating($_GET['username']);
                            if ($res->averagerating != NULL) {
                        ?>
                         
                                <h4> <?= $res->averagerating ?> <i class="fa fa-star" style="color:gold;font-size: 22px; ;" aria-hidden="true"></i> </h4>
                            <?php  } else { ?>
                                <h5>Not rated yet </h5>
                            <?php  } ?>
                        
                        
                        <?php } if (!isset($_GET['username'])) { ?><div class="main-blue-button"><a href="AccountSettings.php">Edit Profile</a></div>
                        <?php } ?>
                    </div>
                </div>


            </div>
            <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4 align-self-center">
                                    <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
                                        <ul class="profile-info-list" id="profile-about" style="font-size: 14px;">

                                            <h3 style="color:red">Personal Informations</h3>
                                            <?php
                                            if ($client != NULL)
                                                $reponse = $repoc->findByUsername1($client->username);
                                            else if ($worker != NULL)
                                                $reponse = $repow->findByUsername1($worker->username);
                                            foreach ($reponse as $personne) {
                                            ?>
                                                <li>
                                                    <div class="field">Bio:</div>
                                                    <?php $text = str_replace([":)", ":(", ":D", ":[", "<3"], ["&#128522;", "&#128547;", "&#128512;", "&#128545;", "&#128147;"], $personne->bio)  ?>
                                                    <div class="value"><?php echo $text ?></div>
                                                </li>
                                                <?php if ($worker != NULL) {  ?>
                                                    <li>
                                                        <div class="field">Occupation:</div>
                                                        <div class="value"><?php echo $personne->occupation ?></div>
                                                    </li>
                                                <?php } ?>
                                                <li>
                                                    <div class="field">Date of Birth:</div>
                                                    <div class="value"><?php echo $personne->birthdate ?></div>
                                                </li>


                                                <li>
                                                    <div class="field">Gender:</div>
                                                    <div class="value">

                                                        <?php echo $personne->gender  ?>

                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="field">Phone No.:</div>
                                                    <div class="value">
                                                        <?php echo $personne->phonenumber ?>
                                                    </div>
                                                </li>



                                            <?php
                                                if ($worker != NULL) $_SESSION['occupation'] = $personne->occupation;
                                            } ?>
                                        </ul>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                        <img src="../assets/images/khedma.jpg" alt="team meeting">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $client1 = $repoc->findByUsername($_SESSION['username']);
            $worker1 = $repow->findByUsername($_SESSION['username']);
            if (($client1 != NULL & isset($_GET['username']) & $worker!=NULL) | ($worker1!=NULL & !isset($_GET['username']))) {  ?>
                <div class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <ul class='profile-info-list' id='profile-posts'>
                        <h3 style="color:red">Posts </h3>

                        <br>

                        <?php

                        $repo = new Repository('posts');
                        $response = $repo->findPosts($_SESSION['username']);

                        while ($row = $response->fetch()) {

                        ?>

                            <div class="card gedf-card " id="<?php echo $row['id']; ?>" >
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <?php if ($filename->picture != NULL) {  ?>
                                                <img class="rounded-circle" id="picture" src="../assets/images/<?= $filename->picture ?>">
                                            <?php  } else { ?>
                                                <img class="rounded-circle" id="picture" src="../assets/images/default-profile-picture.jpg ?>">
                                            <?php  } ?>

                                            <div class="ml-2">
                                                <div class="h5 m-0"><a href="#"><?= '@' . $row['username']  ?></a></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="dropdown">
                                                <button onclick="DeletePost(<?= $row['id'] ?> )" class="dropdown-item"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-horizontal">
                                    <?php if ($row['picture'] != NULL) { ?>
                                        <div class="img-square-wrapper">
                                            <img class="" src="../assets/postfiles/<?= $row['picture'] ?>" alt="Card image cap">
                                        </div>
                                    <?php } ?>
                                    <div class="card-body">
                                        <div class="text-muted h7 mb-2"><i class="fa fa-clock-o"></i><?php echo $row['date']  ?></div>
                                        <div class="text-muted h7 mb-2"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row['location'] ?> </div>


                                        <p class="card-text">
                                            <?php
                                            $text = str_replace("<br />", "\n", $row['description']);
                                            echo $text; ?>
                                        </p>
                                        <?php if ($row['file'] != NULL) { ?>
                                            <a href="download.php?filename=<?= $row['file'] ?>" style="color:tomato;"><?= $row['file'] ?></a>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>

                            <br>
                        <?php  } ?>
                    </ul>



                </div>
            <?php  } ?>
        </div>
    </div>

    <?php if (!isset($_GET['username']) & $worker != NULL) {  ?>
        <div id="contact0" class="contact-us ">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">

                        <div class="section-heading">
                            <h2 style="color: white;">Feel Free To Add some posts</h2>
                            <p>Your posts define you .Try to put everything the client needs to know about the work you provide ! <br> Required : A picture or a (PDF/DOCX) file ! </p>
                        </div>
                        <div class="phone-info">
                            <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="#">+21600000000</a></span></h4>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">


                        <form id="contact" action="insertpost.php" method="post" enctype="multipart/form-data">
                            <?php if (isset($_GET['statusmsg'])) {
                                if ($_GET['statusmsg'] == 'PostAddedSuccessfully') { ?>
                                    <div class="alert alert-success">
                                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                        Your post is added successfully <i class="fa fa-smile-o" aria-hidden="true"></i>
                                    </div>

                                <?php } else { ?>
                                    <div class="alert alert-danger">
                                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                        <?= $_GET['statusmsg'] ?> <i class="fa fa-smile-o" aria-hidden="true"></i>
                                    </div>

                            <?php  }
                            } ?>
                            <div class="row">

                                <div class="col-lg-6">
                                    <fieldset>
                                        <input type="name" name="Location" id="name" placeholder="Location" autocomplete="on" required>
                                    </fieldset>
                                </div>

                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="Description" type="text" class="form-control" id="message" placeholder="Description" required=""></textarea>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button ">Add</button>
                                    </fieldset>
                                </div>
                                <div class="col-lg-3">
                                    <fieldset>
                                        <button type="reset" id="form-submit" class="main-button ">Cancel</button>
                                    </fieldset>
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <input type="file" name="file" id="file" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" multiple hidden />
                                <label for="file"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                    </svg> <span style="font-size: 13px;">Choose a file&hellip;</span></label>


                            </div>
                        </form>
                    </div>



                </div>

            </div>
        </div>
    <?php  }
    if ($worker != NULL) { ?>
        <div class="container gallery-container">
            <h3 style="color:red">Gallery</h3>
            <div class="tz-gallery">
                <div class="row">
                    <?php
                    $repow=new Repository('worker');
                    $result = $repow->getpics($worker->username);
                    while ($row = $result->fetchObject()) {
                        if ($row->picture != NULL) {
                    ?>
                            <div class="col-sm-3 col-md-3">
                                <div class="thumbnail">
                                    <a class="lightbox" href="../assets/postfiles/<?= $row->picture ?>">
                                        <img src="../assets/postfiles/<?= $row->picture ?>" style="height: 250px;width: 250px;">
                                    </a>

                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>

            </div>

        </div>

    <?php  }
    if (isset($_GET['username']) & $worker != NULL) {
    ?>

        <div class="container">
            <div class="col-lg-6 offset-lg-4">
                <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <h2>Not yet <em>Convinced</em> ? <br>Check Customer <span>Reviews</span></h2>
                </div>

            </div>
            <?php $rep = new Repository('ratings');

            $res = $rep->getratings($_GET['username']);

            $result = $repoc->getpicture($_SESSION['username']);
            foreach ($res as $row) { ?>
                <ul class="hash-list cols-3 cols-1-xs pad-30-all align-center text-sm">
                    <li>
                        <?php if ($result->picture != NULL) { ?>
                            <img src="../assets/images/<?= $result->picture ?>" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
                        <?php } else {  ?>
                            <img src="../assets/images/default-profile-picture.jpg" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
                        <?php } ?>
                        <p class="fs-110 font-cond-l" contenteditable="false"><?= $row->rating ?><i class="fa fa-star" style="color:gold;font-size: 22px; ;" aria-hidden="true"></i> </p>
                        <p class="fs-110 font-cond-l" contenteditable="false"><?= $row->review ?></p>

                        <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false"><?= $row->username_client ?></h5>

                    </li>
                </ul>
            <?php  } ?>
        </div>


        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">

            <form id="contact" action="add_rate.php?username=<?= $_GET['username'] ?>" method="post">
                <h3 style="color:red"><em>Write your Review</em> </h3><br><br>
                <div class="row">
                    <div class="col-lg-12">
                      <input name="rating" hidden>
                        <div class="rateyo" id="rating" data-rateyo-rating="4" data-rateyo-num-stars="5" data-rateyo-score="3">
                        </div>
                        
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <textarea name="Review" type="text" class="form-control" id="message" placeholder="Review" required=""></textarea>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <fieldset>
                            <button type="submit" id="form-submit" class="main-button ">Add</button>
                        </fieldset>
                    </div>
                    <div class="col-lg-3">
                        <fieldset>
                            <button type="reset" id="form-submit" class="main-button ">Cancel</button>
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    <?php  }  ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script type='text/javascript'>
        function DeletePost(str) {
            var id = str;
            if (confirm("Are you sure you want to delete this post?")) {
                $.ajax({
                    type: 'POST',
                    url: 'DeletePost.php',
                    data: {
                        post_id: id
                    },
                    success: function(data) {

                        $("#" + id).remove();
                    }
                })

            }
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/animation.js"></script>
    <script src="../assets/js/imagesloaded.js"></script>
    <script src="../assets/js/templatemo-custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="Profile.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>
    <!--  Ratings -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        $(function() {
            $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
                var rating = data.rating;
                $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating :' + rating);
                $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
            });
        });
    </script>
    <footer>
        <div class="container">
           
                <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                    <p>© Copyright 2021. All Rights Reserved.

                        <br>Contact: <a rel="nofollow" href="https://mail.google.com/mail/u/khedma.9.tn@gmail.com">khedma.tn.9@gmail.com</a>
                    </p>
                </div>
            
        </div>

    </footer>
</body>