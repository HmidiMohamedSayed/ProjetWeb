<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/animated.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css"
          integrity="undefined" crossorigin="anonymous">
    <title>Sign up</title>
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
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
<div id="login" class="login section">
    <div class="container">
        <div class="col align-self-center">
            <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="container ">
                    <div class="title">Registration</div>
                    <div class="content">
                        <form action="ajoutClient.php" method="post">
                            <?php
                            if (isset($_SESSION['wrongconfirmation'])) {
                                ?>
                                <div class="container1" style="color: red">
                                    <?php echo $_SESSION['wrongconfirmation']; ?>
                                </div>
                                <?php
                                unset($_SESSION['wrongconfirmation']);
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['exist'])) {
                                ?>
                                <div class="container1" style="color: red">
                                    <?php echo $_SESSION['exist']; ?>
                                </div>
                                <?php
                                unset($_SESSION['exist']);
                            }
                            ?>

                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Full Name</span>
                                    <label>
                                        <input type="text" placeholder="Enter your name" name="fullname" required>
                                    </label>
                                </div>
                                <div class="input-box">
                                    <span class="details">Username</span>
                                    <label>
                                        <input type="text" placeholder="Enter your username" name="username" required>
                                    </label>
                                </div>
                                <div class="input-box">
                                    <span class="details">Email</span>
                                    <label>
                                        <input type="email" placeholder="Enter your email" name="email" required>
                                    </label>
                                </div>
                                <div class="input-box">
                                    <span class="details">Phone Number</span>
                                    <label>
                                        <input type="text" placeholder="Enter your number[8]" name="phone" required>
                                    </label>
                                </div>
                                <div class="input-box">
                                    <span class="details">Password</span>
                                    <label>
                                        <input type="password" placeholder="Enter your password" name="password" required>
                                    </label>
                                </div>
                                <div class="input-box">
                                    <span class="details">Confirm Password</span>
                                    <label>
                                        <input type="password" placeholder="Confirm your password" name="confirmpassword"
                                               required>
                                    </label>
                                </div>
                            </div>


                            <div class="select-service">
                                <span class="details">Select Your Gender</span>
                                <label>
                                    <select name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </label>
                            </div>

                            <div class="button">
                                <input type="submit" value="Register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="../jquery/jquery.min.js"></script>
<script src="../assets/js/animation.js"></script>
<script src="../assets/js/script.js"></script>
</body>
</html>