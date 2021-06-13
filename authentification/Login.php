<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">    <title>Login</title>
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
        <div class="row">
            <div class="col-lg-4">
                <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <img src="../assets/images/about-left-image.png" alt="person graphic">
                </div>
            </div>

            <div class="col-xl align-self-center text-center">
                <h1>Login</h1>

                <form class="form-group" action="log.php" method="post">
                    <?php
                    if (isset($_SESSION['notfoundusername'])) {
                        ?>

                        <div  style="color: whitesmoke">
                            <?php echo $_SESSION['notfoundusername']; ?>
                        </div>
                        <?php
                        unset($_SESSION['notfoundusername']);
                    }
                    ?>
                    <div class="form-group">
                        <label>
                            <input type="text" class="form-control-lg" placeholder="Username" name="username">
                        </label>
                        <?php
                        if (isset($_SESSION['wrongpassword'])) {
                            ?>
                            <div  style="color: whitesmoke">
                                <?php echo $_SESSION['wrongpassword']; ?>
                            </div>
                            <?php
                            unset($_SESSION['wrongpassword']);
                        }
                        ?>
                    </div>

                    <div class="form-group">

                        <label>
                            <input type="password" class="form-control-lg" placeholder="Password" name="password">
                        </label>
                    </div>
                    <div class="form">
                        <label class="">Remember Me ?
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                        <button type="submit" class="btn btn-primary btn-xl">Login</button>
                </form>
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