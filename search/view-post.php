<?php
session_start();

include_once 'fragments/autoload.php';
include_once 'fragments/server.php';


if (isset($_GET['post_id'])) {

    $post_id = $_GET['post_id'];

    $connect = ConnexionBD::getInstance();

    $repository2 = new Repository("worker");
    $post_data = getPostData($post_id);
    $worker = $repository2->findByUsername($post_data['username']);

} else {

    header("Location: index.php");

}

$post_id = $_GET['post_id'];
?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/main.css">
    <title>post by <?= $post_data['username'] ?> details</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/animated.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
                        </li>
                        <li class="scroll-to-section"><a href="saved-posts.php"><i class="fa fa-bookmark"
                                                                                   aria-hidden="true"></i>Saved</a>
                        </li>
                        <li class="scroll-to-section"><a href="#settings"><i class="fa fa-cog" aria-hidden="true"></i>Settings</a>
                        </li>

                        <li class="scroll-to-section">
                            <div class="main-red-button"><a href="#logout">Log Out</a></div>
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
<div class="main-banner wow fadeIn " id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card p-4 mt-3">
                    <!--- \\\\\\\Post-->
                    <div class="card gedf-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div class="h5 m-0"><a
                                                    href="#"><?= $post_data['username'] ?></a></div>
                                        <div class="h7 text-muted"><?= $worker->fullname ?></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                            <div class="h6 dropdown-header">Configuration</div>
                                            <a class="dropdown-item" href="#">Save</a>
                                            <a class="dropdown-item" href="#">Hide</a>
                                            <a class="dropdown-item" href="#">Report</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="text-muted h7 mb-2"><i class="fa fa-clock-o"></i><?= $post_data['date'] ?></div>
                            <div class="text-muted h7 mb-2"><i class="fa fa-map-marker"
                                                               aria-hidden="true"></i><?= $post_data['location'] ?>
                            </div>


                            <p class="card-text">
                                <?= $post_data['description'] ?>
                            </p>
                        </div>

                        <div class="card-footer">

                            <!-- like dislike system -->
                            <!-- if user likes post, style button differently -->

                            <i <?php if (userLiked($post_id)): ?>
                                class="fa fa-thumbs-up like-btn"
                            <?php else: ?>
                                class="fa fa-thumbs-o-up like-btn"
                            <?php endif ?>
                                    data-id="<?php echo $post_id ?>"></i>
                            <span class="likes"><?php echo getLikes($post_id); ?></span>
                            <!-- if user dislikes post, style button differently -->

                            <i
                                <?php if (userDisliked($post_id)): ?>
                                    class="fa fa-thumbs-down dislike-btn"
                                <?php else: ?>
                                    class="fa fa-thumbs-o-down dislike-btn"
                                <?php endif ?>
                                    data-id="<?php echo $post_id ?>"></i>
                            <span class="dislikes"><?php echo getDislikes($post_id); ?></span>
                            <!-- like dislike system -->

                            <!-- save unsave system -->
                            <i
                                <?php if (isSaved($post_id)): ?>
                                    class="fa fa-bookmark save"
                                <?php else: ?>
                                    class="fa fa-bookmark-o save"
                                <?php endif ?>
                                    data-id="<?php echo $post_id ?>">

                            </i>
                            <!-- save unsave system -->

                        </div>
                        <!-- comments wrapper -->
                        <!-- show comments -->
                        <div id="output"></div>
                        <!-- show comments -->

                        <!-- add comments -->
                        <div class="bg-light p-2">
                            <form id="frm-comment">
                                <div class="d-flex flex-row align-items-start">
                                    <div class='p-3'><img class="rounded-circle" width="45"
                                                          src="https://picsum.photos/50/50" alt=""></div>
                                    <label for="comment"></label><textarea
                                            class="form-control ml-1 shadow-none textarea" name="comment" id="comment"
                                            placeholder="Write your comment here..." required></textarea>
                                </div>
                                <div class="mt-2 text-right">

                                    <input type="button" class="btn btn-primary" id="submitButton"
                                           value="Publish"/>
                                </div>

                            </form>
                        </div>

                        <!-- add comments -->

                        <!-- comments wrapper///// -->
                    </div>
                </div>
                <!--- \\\\\\\Post-->


            </div>

        </div>

    </div>
</div>

<script>

    $("#submitButton").click(function () {

        var str = $("#frm-comment").serialize();

        $.ajax({
            url: "fragments/comment-add.php?post_id=<?=$post_id?>",
            data: str,
            type: 'post',
            success: function (response) {
                var result = eval('(' + response + ')');
                if (response) {

                    $("#name").val("");
                    $("#comment").val("");

                    listComment();
                } else {
                    alert("Failed to add comments !");
                    return false;
                }
            }
        });
    });

    $(document).ready(function () {
        listComment();
    });

    function listComment() {
        $.post("fragments/comment-list.php?post_id=<?=$post_id?>",
            function (data) {
                var data = JSON.parse(data);

                var comments = "";
                ;
                var list = $("<div class='comments'>");

                for (var i = 0; (i < data.length); i++) {

                    comments = "<div class='p-3'><img class='rounded-circle' width='45' src='https://picsum.photos/50/50' alt=''></div><div class='comment-text active w-100'><h5 class='font-medium'>" + data[i]['comment_sender_name'] + "</h5> <p class='m-b-15 d-block'>" + data[i]['comment'] + "</p></div><div class='comment-footer'><span class='text-muted float-right'></span>" + data[i]['date'] + "</div></div></div>";

                    var item = $("<div class='d-flex flex-row comment-row'>").html(comments);
                    list.append(item);


                }
                $("#output").html(list);
            });
    }

</script>
<script src="assets/js/scripts.js"></script>
</body>

</html>