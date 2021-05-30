<?php
include_once 'autoload.php';
session_start();
?>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->
    <title>Space Dynamic - SEO HTML5 Template</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="../assets/css/animated.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <br>
                        <a href="../Home/home.php" class="logo">
                            <h4>Khe<span>dma</span></h4>
                        </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">

                        <li class="scroll-to-section"><a href="../Home/home.php" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="#about">About Us</a></li>
                        <li class="scroll-to-section"><a href="#services">Services</a></li>
                        <li class="scroll-to-section"><a href="#portfolio">Portfolio</a></li>
                        <li class="scroll-to-section"><a href="#contact">Message Us</a></li>
                       <li class="scroll-to-section"><a href="notifications.php" class="fa fa-globe" ></a></li>


                        <li class="scroll-to-section"><div class="main-red-button"><a href="#contact">Contact Now</a></div></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>


<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                            <h6>Welcome</h6>

                            <h2><em><a href="ProfileWorker.php">@<?php echo $_SESSION['username'] ?></a></em> <br><span><?php
                                    $workerrepo=new Repository('worker');
                                    $clientrepo=new Repository('client');
                                    $worker=$workerrepo->findByUsername($_SESSION['username']);
                                    $client=$clientrepo->findByUsername($_SESSION['username']);
                                    if($client==null){
                                        foreach($worker as $key=>$value){
                                            if( $key =='email'){
                                                echo $value;
                                                ?>
                                                <br>
                                                <?php
                                            }
                                        }}
                                    else{
                                        foreach($client as $key =>$value){
                                            if( $key =='email' ){
                                                echo $value;
                                                ?>
                                                <br>
                                                <?php
                                            }
                                        }
                                    }
                                    ?></span> <?php
                                if($worker){
                                foreach ($worker as $key=>$value){
                                    if($key=='occupation') echo $value;
                                }}

                                ?></h2>

                        </div>
                    </div>
                    <div class="col-lg-6">

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
                    <h2>See Your <em> Contact</em> <span>list</span></h2>
                </div>
            </div>
        </div>
<?php
$mes=new Repository('messagerie');
$allmes=$mes->findMessage($_SESSION['username']);
if(!isset($_SESSION['contact'])){
    $_SESSION['contact']=array();
}
while ($row=$allmes->fetch()){
    if($row['destination']==$_SESSION['username']){
        if(!in_array($row['source'],$_SESSION['contact'])) {
            array_push($_SESSION['contact'], $row['source']);
        }}
    elseif ($row['source']==$_SESSION['username']){
        if(!in_array($row['destination'],$_SESSION['contact'])) {
            array_push($_SESSION['contact'], $row['destination']);
        }

    }
}
?>



        <form autocomplete="off" action="conversation.php" method="get">

            <div class="input-group">
            <div class="autocomplete" style="font-size: 20px;">
                <input id="myInput" type="text" name="name" class="form-control" placeholder="Search" width="500px">
            </div>
                <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
                </div>
            </div>
        </form>

        <script>
            function autocomplete(inp, arr) {
                /*the autocomplete function takes two arguments,
                the text field element and an array of possible autocompleted values:*/
                var currentFocus;
                /*execute a function when someone writes in the text field:*/
                inp.addEventListener("input", function(e) {
                    var a, b, i, val = this.value;
                    /*close any already open lists of autocompleted values*/
                    closeAllLists();
                    if (!val) { return false;}
                    currentFocus = -1;
                    /*create a DIV element that will contain the items (values):*/
                    a = document.createElement("DIV");
                    a.setAttribute("id", this.id + "autocomplete-list");
                    a.setAttribute("class", "autocomplete-items");
                    /*append the DIV element as a child of the autocomplete container:*/
                    this.parentNode.appendChild(a);
                    /*for each item in the array...*/
                    for (i = 0; i < arr.length; i++) {
                        /*check if the item starts with the same letters as the text field value:*/
                        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                            /*create a DIV element for each matching element:*/
                            b = document.createElement("DIV");
                            /*make the matching letters bold:*/
                            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                            b.innerHTML += arr[i].substr(val.length);
                            /*insert a input field that will hold the current array item's value:*/
                            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                            /*execute a function when someone clicks on the item value (DIV element):*/
                            b.addEventListener("click", function(e) {
                                /*insert the value for the autocomplete text field:*/
                                inp.value = this.getElementsByTagName("input")[0].value;
                                /*close the list of autocompleted values,
                                (or any other open lists of autocompleted values:*/
                                closeAllLists();
                            });
                            a.appendChild(b);
                        }
                    }
                });
                /*execute a function presses a key on the keyboard:*/
                inp.addEventListener("keydown", function(e) {
                    var x = document.getElementById(this.id + "autocomplete-list");
                    if (x) x = x.getElementsByTagName("div");
                    if (e.keyCode == 40) {
                        /*If the arrow DOWN key is pressed,
                        increase the currentFocus variable:*/
                        currentFocus++;
                        /*and and make the current item more visible:*/
                        addActive(x);
                    } else if (e.keyCode == 38) { //up
                        /*If the arrow UP key is pressed,
                        decrease the currentFocus variable:*/
                        currentFocus--;
                        /*and and make the current item more visible:*/
                        addActive(x);
                    } else if (e.keyCode == 13) {
                        /*If the ENTER key is pressed, prevent the form from being submitted,*/
                        e.preventDefault();
                        if (currentFocus > -1) {
                            /*and simulate a click on the "active" item:*/
                            if (x) x[currentFocus].click();
                        }
                    }
                });
                function addActive(x) {
                    /*a function to classify an item as "active":*/
                    if (!x) return false;
                    /*start by removing the "active" class on all items:*/
                    removeActive(x);
                    if (currentFocus >= x.length) currentFocus = 0;
                    if (currentFocus < 0) currentFocus = (x.length - 1);
                    /*add class "autocomplete-active":*/
                    x[currentFocus].classList.add("autocomplete-active");
                }
                function removeActive(x) {
                    /*a function to remove the "active" class from all autocomplete items:*/
                    for (var i = 0; i < x.length; i++) {
                        x[i].classList.remove("autocomplete-active");
                    }
                }
                function closeAllLists(elmnt) {
                    /*close all autocomplete lists in the document,
                    except the one passed as an argument:*/
                    var x = document.getElementsByClassName("autocomplete-items");
                    for (var i = 0; i < x.length; i++) {
                        if (elmnt != x[i] && elmnt != inp) {
                            x[i].parentNode.removeChild(x[i]);
                        }
                    }
                }
                /*execute a function when someone clicks in the document:*/
                document.addEventListener("click", function (e) {
                    closeAllLists(e.target);
                });
            }

            /*An array containing all the country names in the world:*/
            var countries = [];
            <?php foreach ($_SESSION['contact'] as $key=>$value) {?>
            countries.push("<?php echo $value ?>");
            <?php } ?>
            /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
            autocomplete(document.getElementById("myInput"), countries);
        </script>





<br>
<br>
<br>
<br>
        <?php
        if(isset($_SESSION['contactintrouvable'])){?>
            <div class="alert alert-danger" style="color: red">
                <?php echo $_SESSION['contactintrouvable']; ?>
            </div>
            <?php
            unset($_SESSION['contactintrouvable']);
        }
        ?>
        <?php
        if(isset($_SESSION['existantcontact'])){?>
            <div class="alert alert-danger" style="color: red">
                <?php echo $_SESSION['existantcontact']; ?>
            </div>
            <?php
            unset($_SESSION['existantcontact']);
        }
        ?>
        <?php
        if(isset($_SESSION['exist'])){?>
            <div class="alert alert-danger" style="color: red">
                <?php echo $_SESSION['exist']; ?>
            </div>
            <?php
            unset($_SESSION['exist']);
        }
        ?>
        <br>
        <br>
<br>
<br>
        <?php
if(isset($_SESSION['contact'])){
    foreach($_SESSION['contact'] as $value){
        ?>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <a href="conversation.php?name=<?= $value ?>">
                    <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="hidden-content">
                            <h4><?= $value ?></h4>
                            <p><?php
                                $worker=$workerrepo->findByUsername($value);
                                $client=$clientrepo->findByUsername($value);
                                if($client==null){
                                    foreach($worker as $key=>$value2){
                                        if( $key =='fullname' || $key =='email' || $key=='phonenumber'){
                                            echo $value2;
                                            ?>
                                            <br>
                                            <?php
                                        }
                                    }}
                                else{
                                foreach($client as $key =>$value1){
                                if($key =='fullname' || $key =='email' || $key=='phonenumber'){
                                echo $value1;
                                ?>
                            <br>
                                <?php
                                }
                                }
                                }?>
                                </p>
                            <a href="supContact.php?user=<?= $value ?> ">
                                <button class="btn btn-default btn-sm">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button></a>
                        </div>
                        <div class="showed-content">
                            <img src="../assets/images/portfolio-image.png" alt="">
                        </div>
                    </div>
                </a>
            </div>
            <?php } }?>
            <div class="col-lg-3 col-sm-6">
                    <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="hidden-content">
                            <form autocomplete="off" action="ajoutContact.php" method="post">
                                <div class="input-group">
                                        <input id="myInput2" type="text" name="contact" class="form-control" placeholder="Search" width="100px">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default btn-sm">
                                            <span class="glyphicon glyphicon-plus"></span> Add
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="showed-content">
                            <img src="../assets/images/z.jpg" alt="" width="200px">
                        </div>
                    </div>
            </div>

        </div>

    </div>
</div>


<?php
$mess=new Repository('messagerie');
$messages=$mess->findMessageByUsername($_SESSION['username']);
?>
<div id="blog" class="our-blog section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
                <div class="section-heading">
                    <h2><span>INBOX</span><br>You Have <em><br><?php

                            $mess = new Repository('messagerie');
                            $messages = $mess->findMessageByUsername($_SESSION['username']);
                            echo $messages->rowCount();

                            ?> Messages</em></h2>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
                <div class="top-dec">
                    <img src="../assets/images/blog-dec.png" alt="">
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                <div class="right-list">
                    <ul>
                        <?php
                        $messages=$mess->findMessageByUsername($_SESSION['username']);
                        $m=$messages->fetchAll();
                       for($i=0;$i<count($m);$i++){
                            ?>
                        <li>
                            <div class="left-content align-self-center">
                                <span><i class="fa fa-calendar"></i> <?php echo array_reverse($m)[$i]['date'] ?></span>
                                <a href="conversation.php?name=<?= array_reverse($m)[$i]['source'] ?>"><h4>@<?php echo array_reverse($m)[$i]['source'] ?></h4></a>
                                <p><?php echo array_reverse($m)[$i]['content'] ?></p>
                            </div>
                            <div class="right-image">
                                <a href="#"><img src="../assets/images/b.png" alt="" width="50px"></a>
                            </div>
                        </li>
                        <?php } ?>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                <p>© Copyright 2021 All Rights Reserved.

                    <br>Work: <a rel="nofollow" href="https://templatemo.com">Mj Group</a></p>
            </div>
        </div>
    </div>
</footer>


<script src="https://getbootstrap.com/dist/js/bootstrap.min.js">
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/owl-carousel.js"></script>
<script src="../assets/js/animation.js"></script>
<script src="../assets/js/imagesloaded.js"></script>
<script src="../assets/js/templatemo-custom.js"></script>


