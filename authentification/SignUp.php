<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Registration </title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="title">Registration</div>
    <div class="content">
        <form action="ajoutClient.php" method="post">
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

            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" placeholder="Enter your name" name="fullname" required>
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" placeholder="Enter your username" name="username" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" placeholder="Enter your number[8]" name="phone" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter your password" name="password" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" placeholder="Confirm your password" name="confirmpassword" required>
                </div>
            </div>


            <div class="select-service" >
                <span class="details">Select Your Gender</span>
                <select  name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                </span>
            </div>

            <div class="button">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</div>
</body>
</html>
