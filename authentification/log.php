<?php
session_start();
include_once 'autoload.php';
$workerrepository=new WorkerRepository();
$clientrepository=new ClientRepository();
$username=$_POST['username'];
$worker=$workerrepository->findByUsername($username);
$client=$clientrepository->findByUsername($username);
if($worker==null) {
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
            echo "Login Succeded";
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
        echo "Login Succeded";
    }
}
