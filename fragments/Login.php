<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Login.css">
<script src="Login.js"></script>
</head>
<body>

    <div class="wrapper">
        <div class="container">
            <h1>Login </h1>
            
            <form class="form" action="Actionlogin.php" method="post">
                <?php
                session_start();
                if(isset($_SESSION['notfoundusername'])){?>
                    <div class="container1" style="color: red">
                        <?php echo $_SESSION['notfoundusername']; ?>
                    </div>
                <?php
                unset($_SESSION['notfoundusername']);
                }
                ?>
                <input type="text" placeholder="Username" name="username">
                <?php
                  if(isset($_SESSION['wrongpassword'])){?>
                    <div class="container1" style="color: red">
                        <?php echo $_SESSION['wrongpassword']; ?>
                    </div>
                    <?php
                    unset($_SESSION['wrongpassword']);
                }
                ?>
                <input type="password" placeholder="Password" name="password">
                <label class="container1">Remember Me ?
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                  </label>
                <button type="submit" id="login-button">Login</button>
            </form>
        </div>
    </div>
<script src="Login.js"></script>
</body>
</html>