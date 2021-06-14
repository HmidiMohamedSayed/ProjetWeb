<?php
include_once 'autoload.php';
session_start();
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html><html class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>

    <script src="https://use.typekit.net/hoy3lrg.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
   <link rel="stylesheet" href="conversation.css">
    </head><body>
<!--

A concept for a chat interface.

Try writing a new message! :)


Follow me here:
Twitter: https://twitter.com/thatguyemil
Codepen: https://codepen.io/emilcarlsson/
Website: http://emilcarlsson.se/

-->

<div id="frame">
    <div id="sidepanel">
        <div id="profile">
            <div class="wrap">
                <?php
                $repoclient=new Repository('client');
                $repoworker=new Repository('worker');
                $client=$repoclient->findByUsername($_SESSION['username']);
                $worker=$repoworker->findByUsername($_SESSION['username']);
                if($client){
                    foreach ($client  as $key=>$value){
                        if($key=='picture'){
                            $pic=$value;
                        }
                    }
                }
                else{
                    foreach ($worker  as $key=>$value){
                        if($key=='picture'){
                            $pic=$value;
                        }
                    }
                }
                if($pic){
                ?>
                <img id="profile-img" src="../assets/images/<?= $pic ?>" class="online" alt="" />
                <?php } else {?>
                <img id="profile-img" src="../assets/images/default.jpg" class="online" alt="" />
                <?php } ?>
                <a href="ProfileWorker.php"><p><?= "@".$_SESSION['username'] ?></p></a>
            </div>
        </div>
        <div id="contacts">
            <ul>
                <?php foreach ($_SESSION['contact'] as $value){
                    $rep=new Repository('messagerie');
                    $mes=$rep->findMessageByDoubleUsername($value,$_SESSION['username']);
                    $messages=$mes->fetchAll();

                    ?>
                    <a href="conversation.php?name=<?= $value ?>">
                <li class="contact">
                    <div class="wrap">
                        <span class="contact-status online"></span>
                        <?php
                        $repoclient=new Repository('client');
                        $repoworker=new Repository('worker');
                        $client=$repoclient->findByUsername($value);
                        $worker=$repoworker->findByUsername($value);
                        if($client){
                        foreach ($client  as $key=>$value1){
                        if($key=='picture'){
                        $pic=$value1;
                        }
                        }
                        }
                        else{
                        foreach ($worker  as $key=>$value1){
                        if($key=='picture'){
                        $pic=$value1;
                        }
                        }
                        }
                        if($pic){
                        ?>
                        <img id="profile-img" src="../assets/images/<?= $pic ?>" class="online" alt="" />
                        <?php } else {?>
                            <img id="profile-img" src="../assets/images/default.jpg" class="online" alt="" />
                        <?php } ?>
                        <div class="meta">
                            <p class="name"><?= $value ?></p>
                            <?php if($mes->rowCount()>0 ){ ?>
                            <?php if($messages[$mes->rowCount()-1]['source']==$_SESSION['username']){ ?>
                            <p class="preview">me: <?php echo $messages[$mes->rowCount()-1]['content']; ?></p>
                            <?php } else{?>
                            <p class="preview"><?= $messages[$mes->rowCount()-1]['content']; ?></p>
                            <?php }}?>
                        </div>
                    </div>
                </li>
                    </a>
<?php } ?>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="contact-profile">
            <?php
            $repoclient=new Repository('client');
            $repoworker=new Repository('worker');
            $client=$repoclient->findByUsername($_GET['name']);
            $worker=$repoworker->findByUsername($_GET['name']);
            if($client){
                foreach ($client  as $key=>$value1){
                    if($key=='picture'){
                        $pic=$value1;
                    }
                }
            }
            else{
                foreach ($worker  as $key=>$value1){
                    if($key=='picture'){
                        $pic=$value1;
                    }
                }
            }
            if($pic){
                ?>
                <img id="profile-img" src="../assets/images/<?= $pic ?>" class="online" alt="" />
            <?php } else {?>
                <img id="profile-img" src="../assets/images/default.jpg" class="online" alt="" />
            <?php } ?>
            <p><?php
                if(isset($_GET['name'])){
                $_SESSION['users']= $_GET['name'] ;}
                echo $_SESSION['users'] ?> </p>
        </div>
        <div class="messages">
            <ul>
                <?php
                if(isset($_GET['name'])){
                    $_SESSION['users']=$_GET['name'];}
                $mes=new Repository('messagerie');
                $messages=$mes->findMessageByDoubleUsername($_SESSION['users'],$_SESSION['username']);
                while($row=$messages->fetch()){
                if($row['source']==$_SESSION['username']){

                ?><li class="sent">
                    <?php
                    $repoclient=new Repository('client');
                    $repoworker=new Repository('worker');
                    $client=$repoclient->findByUsername($_SESSION['username']);
                    $worker=$repoworker->findByUsername($_SESSION['username']);
                    if($client){
                        foreach ($client  as $key=>$value1){
                            if($key=='picture'){
                                $pic=$value1;
                            }
                        }
                    }
                    else{
                        foreach ($worker  as $key=>$value1){
                            if($key=='picture'){
                                $pic=$value1;
                            }
                        }
                    }
                    if($pic){
                        ?>
                        <img id="profile-img" src="../assets/images/<?= $pic ?>" class="online" alt="" />
                    <?php } else {?>
                        <img id="profile-img" src="../assets/images/default.jpg" class="online" alt="" />
                    <?php } ?>
                    <p><?php echo $row['content'] ?></p>
                    <?php
                    $re=new Repository('messagerie');
                    if($_SESSION['username']==$_SESSION['users']){
                    $re->makeLu($_SESSION['username'],$_SESSION['username'],$row['content']);
                    }
                    ?>
                    </li>

                <?php }  elseif ($row['source']==$_SESSION['users']){ ?>
                    <li class="replies">
                        <?php
                        $repoclient=new Repository('client');
                        $repoworker=new Repository('worker');
                        $client=$repoclient->findByUsername($_GET['name']);
                        $worker=$repoworker->findByUsername($_GET['name']);
                        if($client){
                            foreach ($client  as $key=>$value1){
                                if($key=='picture'){
                                    $pic=$value1;
                                }
                            }
                        }
                        else{
                            foreach ($worker  as $key=>$value1){
                                if($key=='picture'){
                                    $pic=$value1;
                                }
                            }
                        }
                        if($pic){
                            ?>
                            <img id="profile-img" src="../assets/images/<?= $pic ?>" class="online" alt="" />
                        <?php } else {?>
                            <img id="profile-img" src="../assets/images/default.jpg" class="online" alt="" />
                        <?php } ?>
                        <p><?php echo $row['content'] ?></p>
                        <?php  $re=new Repository('messagerie');
                            $re->makeLu($_SESSION['users'],$_SESSION['username'],$row['content']);
                        ?>
                    </li>
                <?php }
                }
                ?>
            </ul>

        </div>
        <form action="actionSend.php" method="post">

        <div class="message-input">
            <div class="wrap">
                    <input type="text" width="800px" name="message" placeholder="Write your message..." required>
                <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                <button  type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </div>
        </div>
        </form>
        <br>
    </div>
</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src="conversation.js">
</script>
</body></html>

