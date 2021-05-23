<?php
include_once 'autoload.php';


if (isset($_GET['post_id'])) {

    $post_id = $_GET['post_id'];

    $connect = ConnexionBD::getInstance();
    $repository = new Repository("posts");

    $post_data = $repository->findById($post_id);
} else {

    header("Location: index.php");

}

?>

<!doctype html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


    <title>post by <?= $post_data->worker_username ?> details</title>
</head>
<body>
<a href="index.php">Home</a>
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
                                                href="#">"@username"</a></div>
                                    <div class="h7 text-muted">fullname</div>
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
                        <div class="text-muted h7 mb-2"><i class="fa fa-clock-o"></i>date</div>
                        <div class="text-muted h7 mb-2"><i class="fa fa-map-marker"
                                                           aria-hidden="true"></i>location
                        </div>


                        <p class="card-text">
                            description
                        </p>
                    </div>

                    <div class="card-footer">
                        <a href="#" class="card-link collapsed"><i class="fa fa-thumbs-o-up"></i> Like</a>

                    </div>
                    <!-- comments wrapper -->
                    <!-- show comments -->
                    <div id="output"></div>
                    <!-- show comments -->

                    <!-- add comments -->
                    <div class="comment-form-container">
                        <form id="frm-comment">
                            <div class="d-flex flex-row align-items-start"><img class="rounded-circle"
                                                                                src="https://i.imgur.com/RpzrMR2.jpg"
                                                                                width="40"><textarea
                                        class="form-control ml-1 shadow-none textarea" name="comment" id="comment"
                                        placeholder="Write your comment here..."></textarea>
                            </div>
                            <div class="mt-2 text-right">

                                <input type="button" class="btn-submit" id="submitButton"
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
<script>

    $("#submitButton").click(function () {

        var str = $("#frm-comment").serialize();

        $.ajax({
            url: "comment-add.php?post_id=<?=$post_id?>",
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
        $.post("comment-list.php",
            function (data) {
                var data = JSON.parse(data);

                var comments = "";
                ;
                var list = $("<div class='comments'>");

                for (var i = 0; (i < data.length); i++) {

                    comments = "<div class='p-2'><img src='https://i.imgur.com/8RKXAIV.jpg' alt='user' width='50' class='rounded-circle'></div><div class='comment-text active w-100'><h6 class='font-medium'>" + data[i]['comment_sender_name'] + "</h6> <span class='m-b-15 d-block'>" + data[i]['comment'] + "</span></div><div class='comment-footer'><span class='text-muted float-right'></span>" + data[i]['date'] + "</div></div></div>";

                    var item = $("<div class='d-flex flex-row comment-row'>").html(comments);
                    list.append(item);


                }
                $("#output").html(list);
            });
    }
</script>
</body>

</html>