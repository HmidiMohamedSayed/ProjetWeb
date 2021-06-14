<?php
session_start();
include 'autoload.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require '../classes/Exception.php';
require '../classes/PHPMailer.php';
require '../classes/SMTP.php';
//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'khedma.tn.9@gmail.com';
$mail->Password = 'khedma.tn2021';
$mail->Port = 587;
$mail->setFrom('khedma.tn.9@gmail.com');
$repo=new Repository('worker');
$email=$repo->getemail($_SESSION['username']);
$mail->addAddress($email->email);

$mail->Subject = "Confirmation d'Email";
$mail->isHTML(true);
$mail->Body="
<html>
<head>
  <meta name='viewport' content='width=device-width, initial-scale=1.0' />
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  <title>Verify your email address</title>
  <style type='text/css' rel='stylesheet' media='all'>
    /* Base ------------------------------ */
    *:not(br):not(tr):not(html) {
      font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }
    body {
      width: 100% !important;
      height: 100%;
      margin: 0;
      line-height: 1.4;
      background-color: #F5F7F9;
      color: #839197;
      -webkit-text-size-adjust: none;
    }
    a {
      color: #414EF9;
    }

    /* Layout ------------------------------ */
    .email-wrapper {
      width: 100%;
      margin: 0;
      padding: 0;
      background-color: #F5F7F9;
    }
    .email-content {
      width: 100%;
      margin: 0;
      padding: 0;
    }

    /* Masthead ----------------------- */
    .email-masthead {
      padding: 25px 0;
      text-align: center;
    }
    .email-masthead_logo {
      max-width: 400px;
      border: 0;
    }
    .email-masthead_name {
      font-size: 16px;
      font-weight: bold;
      color: #839197;
      text-decoration: none;
      text-shadow: 0 1px 0 white;
    }

    /* Body ------------------------------ */
    .email-body {
      width: 100%;
      margin: 0;
      padding: 0;
      border-top: 1px solid #E7EAEC;
      border-bottom: 1px solid #E7EAEC;
      background-color: #FFFFFF;
    }
    .email-body_inner {
      width: 570px;
      margin: 0 auto;
      padding: 0;
    }
    .email-footer {
      width: 570px;
      margin: 0 auto;
      padding: 0;
      text-align: center;
    }
    .email-footer p {
      color: #839197;
    }
    .body-action {
      width: 100%;
      margin: 30px auto;
      padding: 0;
      text-align: center;
    }
    .body-sub {
      margin-top: 25px;
      padding-top: 25px;
      border-top: 1px solid #E7EAEC;
    }
    .content-cell {
      padding: 35px;
    }
    .align-right {
      text-align: right;
    }

    /* Type ------------------------------ */
    h1 {
      margin-top: 0;
      color: #292E31;
      font-size: 19px;
      font-weight: bold;
      text-align: left;
    }
    h2 {
      margin-top: 0;
      color: #292E31;
      font-size: 16px;
      font-weight: bold;
      text-align: left;
    }
    h3 {
      margin-top: 0;
      color: #292E31;
      font-size: 14px;
      font-weight: bold;
      text-align: left;
    }
    p {
      margin-top: 0;
      color: #839197;
      font-size: 16px;
      line-height: 1.5em;
      text-align: left;
    }
    p.sub {
      font-size: 12px;
    }
    p.center {
      text-align: center;
    }

    /* Buttons ------------------------------ */
    .button {
      display: inline-block;
      width: 200px;
      background-color: #414EF9;
      border-radius: 3px;
      color: #ffffff;
      font-size: 15px;
      line-height: 45px;
      text-align: center;
      text-decoration: none;
      -webkit-text-size-adjust: none;
      mso-hide: all;
    }
    .button--green {
      background-color: #28DB67;
    }
    .button--red {
      background-color: #FF3665;
    }
    .button--blue {
      background-color: #414EF9;
    }

    /*Media Queries ------------------------------ */
    @media only screen and (max-width: 600px) {
      .email-body_inner,
      .email-footer {
        width: 100% !important;
      }
    }
    @media only screen and (max-width: 500px) {
      .button {
        width: 100% !important;
      }
    }
  </style>
</head>
<body>
  <table class='email-wrapper' width='100%' cellpadding='0' cellspacing='0'>
    <tr>
      <td align='center'>
        <table class='email-content' width='100%' cellpadding='0' cellspacing='0'>
     
          <tr>
            <td class='email-masthead'>
              <a class='email-masthead_name'>KHEDMA</a>
            </td>
          </tr>
       
          <tr>
            <td class='email-body' width='100%'>
              <table class='email-body_inner' align='center' width='570' cellpadding='0' cellspacing='0'>
              
                <tr>
                  <td class='content-cell'>
                    <h1>Verify your email address</h1>
                    <p>Thanks for signing up for Khedma! We're excited to have you as an early user.</p>
                    <!-- Action -->
                    <table class='body-action' align='center' width='100%' cellpadding='0' cellspacing='0'>
                      <tr>
                        <td align='center'>
                          <div>
    
                            <a href='http://localhost/Web/Webproject/fragments/AccountSettings.php?email=verified' class='button button--blue' style='color:white'>Verify Email</a>
                          </div>
                        </td>
                      </tr>
                    </table>
                    <p>Thanks,<br>Khedma Team</p>
                    <!-- Sub copy -->
                    
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
";
$mail->send();
header('location:AccountSettings.php');
?>