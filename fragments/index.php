<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="../assets/css/animated.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
      <style>
          .dropbtn {
              background-color: #3498DB;
              color: white;
              padding: 16px;
              font-size: 16px;
              border: none;
              cursor: pointer;
          }

          .dropbtn:hover, .dropbtn:focus {
              background-color: tomato;
          }

          .dropdown {
              position: relative;
              display: inline-block;
          }

          .dropdown-content {
              display: none;
              position: absolute;
              background-color: #f1f1f1;
              min-width: 160px;
              overflow: auto;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
          }

          .dropdown-content a {
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
          }

          .dropdown a:hover {background-color: #ddd;}

          .show {display: block;}
      </style>
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
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#about">About Us</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Services</a></li>
                <?php
                session_start();

                if(!isset($_SESSION['username'])){ ?>
              <li class="scroll-to-section"><div class="dropdown">
                      <div class="dropdown">
                          <button onclick="myFunction()" class="dropbtn" style="width:100px;height: 35px;margin-top: 5px;padding-bottom:30px;padding-top: 10px;align-content: center;border-radius: 23px">Sign up</button>
                          <div id="myDropdown" class="dropdown-content">
                              <a href="SignUpClient.php">As Client</a>
                              <a href="SignUpWorker.php">As Worker</a>
                          </div>
                      </div></li>
              <li class="scroll-to-section"><div class="main-red-button"><a href="Login.php">Log in</a></div></li>
              <?php } else{ ?>
                    <li class="scroll-to-section"><a href="Profile.php" class="fa fa-user" ></a></li>

                    <li class="scroll-to-section"><a href="../search/index.php" class="fa fa-globe" ></a></li>
                    <li class="scroll-to-section"><a href="messaging.php" class="fa fa-envelope" ></a></li>


                <li class="scroll-to-section"><div class="main-red-button"><a href="Logout.php">Log out</a></div></li>
                <?php  } ?>
            </ul>
              <script>
                  /* When the user clicks on the button,
                  toggle between hiding and showing the dropdown content */
                  function myFunction() {
                      document.getElementById("myDropdown").classList.toggle("show");
                  }

                  // Close the dropdown if the user clicks outside of it
                  window.onclick = function(event) {
                      if (!event.target.matches('.dropbtn')) {
                          var dropdowns = document.getElementsByClassName("dropdown-content");
                          var i;
                          for (i = 0; i < dropdowns.length; i++) {
                              var openDropdown = dropdowns[i];
                              if (openDropdown.classList.contains('show')) {
                                  openDropdown.classList.remove('show');
                              }
                          }
                      }
                  }
              </script>

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
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="row">
                      <div class="col-lg-6 align-self-center">
                          <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                              <h6>Welcome to Khedma space</h6>
                              <h2>We deliver the <em>BEST</em> services right to your <span>hands</span></h2>
                              <p>Khedma.tn is a professional linker between workers & clients </p>

                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                              <img src="../assets/images/banner-right-image.png" alt="team meeting">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div id="about" class="about-us section">
      <div class="container">
          <div class="row">
              <div class="col-lg-4">
                  <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                      <img src="../assets/images/about-left-image.png" alt="person graphic">
                  </div>
              </div>
              <div class="col-lg-8 align-self-center">
                  <div class="services">
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                  <div class="icon">
                                      <img src="../assets/images/service-icon-01.png" alt="reporting">
                                  </div>
                                  <div class="right-text">
                                      <h4>Rapidity</h4>
                                      <p>Rapid search,apply,contact...</p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                                  <div class="icon">
                                      <img src="../assets/images/service-icon-02.png" alt="">
                                  </div>
                                  <div class="right-text">
                                      <h4>Diversity</h4>
                                      <p>Many services</p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                                  <div class="icon">
                                      <img src="../assets/images/service-icon-03.png" alt="">
                                  </div>
                                  <div class="right-text">
                                      <h4>Data Security</h4>
                                      <p>Users data are secured and maintained </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                                  <div class="icon">
                                      <img src="../assets/images/service-icon-04.png" alt="">
                                  </div>
                                  <div class="right-text">
                                      <h4>Simplicity</h4>
                                      <p>Simple use</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div id="portfolio" class="our-portfolio section">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 offset-lg-3">
                  <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                      <h2>See What Our Agency <em>Offers</em> &amp; What We <span>Provide</span></h2>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-3 col-sm-6">
                  <a href="#">
                      <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                          <div class="hidden-content">
                              <h4>Cleaning</h4>
                              <p>House cleaning<br>Car cleaning<br>...</p>
                          </div>
                          <div class="showed-content">
                              <img src="../assets/images/1.jpg" style="width:90px;" alt="">
                          </div>
                      </div>
                  </a>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <a href="#">
                      <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                          <div class="hidden-content">
                              <h4>Carpenting</h4>
                              <p>All types of furniture<br></p>
                          </div>
                          <div class="showed-content">
                              <img src="../assets/images/3.jpg" style="width:90px;" alt="">
                          </div>
                      </div>
                  </a>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <a href="#">
                      <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                          <div class="hidden-content">
                              <h4>Mechanical</h4>
                              <p>Car reparing<br>Car painting<br>...</p>
                          </div>
                          <div class="showed-content">
                              <img src="../assets/images/4.jpg" style="width:130px;" alt="">
                          </div>
                      </div>
                  </a>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <a href="#">
                      <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                          <div class="hidden-content">
                              <h4>Babysitting</h4>
                              <p>Baby garding for hours/days </p>
                          </div>
                          <div class="showed-content">
                              <img src="../assets/images/5.jpg" style="width:45px;" alt="">
                          </div>
                      </div>
                  </a>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <a href="#">
                      <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                          <div class="hidden-content">
                              <h4>Plumbing</h4>
                              <p></p>
                          </div>
                          <div class="showed-content">
                              <img src="../assets/images/6.jpg" style="width:60px;" alt="">
                          </div>
                      </div>
                  </a>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <a href="#">
                      <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                          <div class="hidden-content">
                              <h4>Painting</h4>
                              <p>House painting</p>
                          </div>
                          <div class="showed-content">
                              <img src="../assets/images/7.jpg" style="width:100px;" alt="">
                          </div>
                      </div>
                  </a>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <a href="#">
                      <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                          <div class="hidden-content">
                              <h4>Electricity</h4>
                              <p></p>
                          </div>
                          <div class="showed-content">
                              <img src="../assets/images/8.jpg" style="height:100px;" alt="">
                          </div>
                      </div>
                  </a>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <a href="#">
                      <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                          <div class="hidden-content">
                              <h4>Furniture Assembly</h4>
                              <p></p>
                          </div>
                          <div class="showed-content">
                              <img src="../assets/images/9.jpg" style="height: 100px;" alt="">
                          </div>
                      </div>
                  </a>
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
</html>