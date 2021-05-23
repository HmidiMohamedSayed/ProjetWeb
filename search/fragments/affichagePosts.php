<?php

/*needed to submit a new comment*/
session_start();

//$username = $_POST['username'];
$username = "ztothelz";

/*--------------------------------*/


include_once 'autoload.php';

$bdd = ConnexionBD::getInstance();

$repository1 = new Repository("posts");


//$repository3 = new Repository("worker");

function afficher($category)
{
    global $repository1;
//    global $repository3;


    $posts = $repository1->findByCategory($category);


    foreach ($posts

             as $post) {
//  $worker = $repository3->findByUsername($post->username);

        ?>

        <div class="container-fluid gedf-wrapper">
            <div class="row">
                <div class="col-md-12 gedf-main">

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
                                                    href="#"><?= "@" . $post->worker_username ?></a></div>
                                        <div class="h7 text-muted"><?= $post->worker_fullname ?></div>
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
                            <div class="text-muted h7 mb-2"><i class="fa fa-clock-o"></i><?= $post->date ?></div>
                            <div class="text-muted h7 mb-2"><i class="fa fa-map-marker"
                                                               aria-hidden="true"></i><?= $post->location ?></div>


                            <p class="card-text">
                                <?= $post->description ?>
                            </p>
                        </div>

                        <div class="card-footer">
                            <a href="#" class="card-link collapsed"><i class="fa fa-thumbs-o-up"></i> Like</a>
                            <a href="view-post.php?post_id=<?=$post->id?>" class="card-link collapsed"><i
                                        class="fa fa-commenting-o"></i> Show comments</a>
                        </div>
                    </div>
                </div>
                <!--- \\\\\\\Post-->
            </div>
        </div>


        <?php
    }

}


?>

