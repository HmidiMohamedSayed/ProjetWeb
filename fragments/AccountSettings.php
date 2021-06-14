<?php
session_start();
include_once "autoload.php";
?>


<!DOCTYPE html>

<head>
  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../assets/css/fontawesome.css">
  <link rel="stylesheet" href="../assets/css/templatemo-space-dynamic.css">
  <link rel="stylesheet" href="../assets/css/animated.css">
  <link rel="stylesheet" href="../assets/css/owl.css">
  <link rel="stylesheet" href="../assets/css/AccountSettings.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cosmo/bootstrap.min.css">
</head>

<body>
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
              <li class="scroll-to-section"><a href="index.php#services">Services</a></li>
              <li class="scroll-to-section"><a href="index.php#portfolio">Portfolio</a></li>
              <li class="scroll-to-section"><a href="index.php#contact">Message US</a></li>
              <li class="scroll-to-section"><a href="notifications.php" class="fa fa-globe"></a></li>
              <li class="scroll-to-section">
                <div class="main-red-button"><a href="Login.php">Log Out</a></div>
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
  <br><br><br>
  <br><br>
  <div class="container light-style flex-grow-1 container-p-y">

    <a style="color:tomato" href="Profile.php" class="fa fa-arrow-circle-left fa-3x"></a>
    <h4 class="font-weight-bold py-3 mb-4">
      Account settings
    </h4>
    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href='#account-change-password'>Change password</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
          </div>
        </div>

        <div class="col-md-9">
          <?php $repow = new Repository('worker');
          $repoc = new Repository('client');
          $client = $repoc->findByUsername($_SESSION['username']);
          $worker = $repow->findByUsername($_SESSION['username']);
            if ($worker != NULL) {
             if(isset($_GET['email'])) {$repow->ConfirmEmail($_SESSION['username']);
             unset($_GET['email']);}
              $response = $repow->findByUsername1($_SESSION['username']);
              $filename = $repow->getfilename($_SESSION['username']);
              $confirmed=$repow->getconfirmed($_SESSION['username']);
            } else if ($client != NULL) {
              if(isset($_GET['email'])){$repoc->ConfirmEmail($_SESSION['username']);
                unset($_GET['email']);}
              $response = $repoc->findByUsername1($_SESSION['username']);
              $filename = $repoc->getfilename($_SESSION['username']);
              $confirmed=$repoc->getconfirmed($_SESSION['username']);
            }
        
          foreach ($response as $personne) {

          ?>
            <form method="post" enctype="multipart/form-data" id="form" action="ChangeAccountSettings.php">
              <div class="tab-content">
                <div class="tab-pane fade active show" id="account-general">

                  <div class="card-body media align-items-center">
                    <img src="../assets/images/<?= $filename->picture ?>" alt="" class="d-block ui-w-80">
                    <div class="media-body ml-4">
                      <label class="btn btn-outline-primary">
                        Choose a photo
                        <input type="file" name="file" class="account-settings-fileinput">

                      </label> &nbsp;
                      <button type="submit" name="upload" class="btn btn-outline-primary">Upload</button>
                      <br> <br>
                      <div style="color:grey;">Allowed JPG or PNG.</div>
                    </div>
                  </div>

                  <hr class="border-light m-0">

                  <div class="card-body">
                    <div class="form-group">
                      <label class="form-label">Username</label>
                      <input type="text" name="Username" class="form-control mb-1" readonly value=<?php echo $personne->username ?>>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Name</label>
                      <input type="text" name="Name" class="form-control" value=<?php echo $personne->fullname ?>>
                    </div>
                    <div class="form-group">
                      <label class="form-label">E-mail</label>
                      <input type="text" name="E-mail" class="form-control mb-1" value=<?php echo $personne->email ?>>
                      <?php 
                      if ($confirmed->confirmed == 1) { ?>
                        <div class="alert alert-success mt-3">
                          Email confirmed <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                      <?php } else { ?>

                        <div class="alert alert-warning mt-3">
                          Your email is not confirmed. Please check your inbox.<br>
                          <a href="SendEmail.php">Send confirmation</a>
                        </div>
                      <?php } ?>
                    </div>
                    <?php if($worker!=NULL){ ?>
                    <div class="form-group">
                      <label class="form-label">Occupation</label>
                      <input type="text" class="form-control" name="Occupation" value=<?php echo $personne->occupation ?> readonly>
                    </div>
                    <?php  } ?>
                    <div class="text-right mt-3">
                      <button type="submit" name="general" class="btn btn-primary">Save changes</button>&nbsp;
                      <button type="reset" class="btn btn-default">Cancel</button>
                    </div>
                  </div>

                </div>
                <div class="tab-pane fade" id="account-change-password">
                  <div class="card-body pb-2">
                    <?php if (isset($_SESSION['error'])) {  ?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error'];
                        unset($_SESSION['error']); ?>
                      </div> <?php }   ?>

                    <div class="form-group">
                      <label class="form-label">Current password</label>
                      <input type="password" name="Password" class="form-control">
                    </div>

                    <div class="form-group">
                      <label class="form-label">New password</label>
                      <input type="password" name="NewPassword" class="form-control">
                    </div>

                    <div class="form-group">
                      <label class="form-label">Repeat new password</label>
                      <input type="password" name="RetypedNewPassword" class="form-control">
                    </div>
                    <div class="text-right mt-3">
                      <button type="submit" name="password" class="btn btn-primary">Save changes</button>&nbsp;
                      <button type="reset" class="btn btn-default">Cancel</button>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="account-info">
                  <div class="card-body pb-2">

                    <div class="form-group">
                      <label class="form-label">Bio</label>
                      <textarea class="form-control" name="bio" rows="5"><?php $text = str_replace("<br />", "\n", $personne->bio);
                                                                          echo $text;  ?></textarea>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Birthday</label>
                      <input type="date" name="birthdate" class="form-control" value=<?php echo $personne->birthdate ?>>
                    </div>
                  </div>
                  <hr class="border-light m-0">
                  <div class="card-body pb-2">

                    <h6 class="mb-4">Contacts</h6>
                    <div class="form-group">
                      <label class="form-label">Phone</label>
                      <input type="text" name='phonenumber' class="form-control" value=<?php echo $personne->phonenumber ?>>
                    </div>
                    <div class="text-right mt-3">
                      <button type="submit" name="info" class="btn btn-primary">Save changes</button>&nbsp;
                      <button type="reset" class="btn btn-default">Cancel</button>
                    </div>

                  </div>

                </div>




              </div>
            <?php  } ?>
        </div>
      </div>
    </div>

    </fo rm>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
        <p>© Copyright 2021. All Rights Reserved.

          <br>Contact: <a rel="nofollow" href="https://mail.google.com/mail/u/khedma.9.tn@gmail.com">khedma.tn.9@gmail.com</a>
        </p>
      </div>
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