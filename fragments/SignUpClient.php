<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>SignUp</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="../assets/css/animated.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <!--
    
TemplateMo 562 Space Dynamic

https://templatemo.com/tm-562-space-dynamic

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
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
                            <li class="scroll-to-section"><a href="index.php#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="index.php#about">About Us</a></li>
                            <li class="scroll-to-section"><a href="index.php#services">Services</a></li>
                            <li class="scroll-to-section"><a href="index.php#portfolio">Portfolio</a></li>
                            <?php if (!isset($_SESSION['username'])) { ?> <li class="scroll-to-section">
                                    <div class="main-red-button"><a href="Login.php">Log in</a></div>
                                </li>
                            <?php  } else { ?>
                                <li class="scroll-to-section">
                                    <div class="main-red-button"><a href="Logout.php">Log Out</a></div>
                                </li>
                            <?php } ?>
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
    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <div class="section-heading">
                        <h2>Sign Up Form </h2>
                        <p>Accurate information is a key part of motivation. </p>
                        <div class="phone-info">
                            <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="#">+216 00 000 000</a></span></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="ajoutClient.php" method="post">
                        <?php
                        session_start();
                        if(isset($_SESSION['wrongconfirmation'])){?>
                            <div class="container1" style="color: red">
                                <?php echo $_SESSION['wrongconfirmation']; ?>
                            </div>
                            <?php
                            unset($_SESSION['wrongconfirmation']);
                        }
                        ?>
                        <?php
                        if(isset($_SESSION['exist'])){?>
                            <div class="container1" style="color: red">
                                <?php echo $_SESSION['exist']; ?>
                            </div>
                            <?php
                            unset($_SESSION['exist']);
                        }
                        ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="fullname" name="fullname" id="name" placeholder="FullName" autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="surname" name="username" id="surname" placeholder="Username" autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="text" name="phonenumber"  placeholder="Phone number" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="password" name="password" placeholder="Password" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="password" name="confirmpassword" placeholder="Confirm Password" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="date" name="birthdate" placeholder="Birthdate" required="">
                                </fieldset>
                            </div>
                            
                        </div>

                        <br>
                        <div class="select-service">
                            <span class="details">Select Your Gender</span>
                            <select name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            </span>
                        </div>
                        <br>
                        <div class="col-lg-6">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-button ">Submit</button>
                            </fieldset>
                        </div>
                </div>
                <div class="contact-dec">
                    <img src="../assets/images/contact-decoration.png" style="width: 10%;float:right">
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <footer>
        <div class="container">

            <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                <p>© Copyright 2021. All Rights Reserved.

                    <br>Contact: <a rel="nofollow" href="https://mail.google.com/mail/u/khedma.9.tn@gmail.com">khedma.tn.9@gmail.com</a>
                </p>
            </div>

        </div>

    </footer>
    <!-- Scripts -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/animation.js"></script>
    <script src="../assets/js/imagesloaded.js"></script>
    <script src="../assets/js/templatemo-custom.js"></script>

</body>