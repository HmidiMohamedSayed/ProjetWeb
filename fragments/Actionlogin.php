<?php
session_start();
include_once 'autoload.php';
$repow=new Repository('worker');
$repoc=new Repository('client');
$repoa=new Repository('admin');
$username=$_POST['username'];
$admins=$repoa->findByUsername($username);
$_SESSION['username']=$username;
$worker=$repow->findByUsername($username);
$client=$repoc->findByUsername($username);
if($admins){
    header("location:../admin/index.php");
}
elseif($worker==null) {
    if ($client==null){
        $_SESSION['notfoundusername']="Username Not Found Please Verify Your Credentials";
        header("location:Login.php");
    }
    else{$bool=false;
       foreach($client as $key=>$value){
           if($key=='password'){
               if($value==$_POST['password']){
                   $bool=true;
               }
           }
       }
        if($bool==false) {
            $_SESSION['wrongpassword'] = "Wrong Password Please Verify Your Password";
            header("location:Login.php");
        }
        if($bool==true){
            
            header("location:index.php");
        }

    }
    }
else{

    $bool=false;
    foreach($worker as $key=>$value){
        if($key=='password'){
            if($value==$_POST['password']){
                $bool=true;
            }
        }
    }
    if($bool==false) {
        $_SESSION['wrongpassword'] = "Wrong Password Please Verify Your Password";
        header("location:Login.php");
    }
    if($bool==true){
        header('location:ProfileWorker.php');
    }
}
