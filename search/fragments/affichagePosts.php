<?php


/*--------------------------------*/

include_once "autoload.php";
include_once 'server.php';

$bdd = ConnexionBD::getInstance();

$repository1 = new Repository("posts");
$repository2 = new Repository("worker");
$repository3 = new Repository("saved_posts");

function afficher($category)
{
    global $repository1;
    global $repository2;

    $posts = $repository1->findByCategory($category);

    foreach ($posts
             as $post) {
        $worker = $repository2->findByUsername($post->username);
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
                                                    href="#"><?= "@" . $post->username ?></a></div>
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
                            <div class="text-muted h7 mb-2"><i class="fa fa-clock-o"></i><?= $post->date ?></div>
                            <div class="text-muted h7 mb-2"><i class="fa fa-map-marker"
                                                               aria-hidden="true"></i><?= $post->location ?></div>


                            <p class="card-text">
                                <?= $post->description ?>
                            </p>
                        </div>

                        <div class="card-footer">
                            <!-- like dislike system -->
                            <!-- if user likes post, style button differently -->

                            <i <?php if (userLiked($post->id)): ?>
                                class="fa fa-thumbs-up like-btn"
                            <?php else: ?>
                                class="fa fa-thumbs-o-up like-btn"
                            <?php endif ?>
                                    data-id="<?php echo $post->id ?>"></i>
                            <span class="likes"><?php echo getLikes($post->id); ?></span>
                            <!-- if user dislikes post, style button differently -->

                            <i
                                <?php if (userDisliked($post->id)): ?>
                                    class="fa fa-thumbs-down dislike-btn"
                                <?php else: ?>
                                    class="fa fa-thumbs-o-down dislike-btn"
                                <?php endif ?>
                                    data-id="<?php echo $post->id ?>"></i>
                            <span class="dislikes"><?php echo getDislikes($post->id); ?></span>
                            <!-- like dislike system -->
                            <a href="view-post.php?post_id=<?= $post->id ?>" class="card-link collapsed"><i
                                        class="fa fa-commenting-o"></i> Show comments</a>
                            <!-- save unsave system -->
                            <i
                                <?php if (isSaved($post->id)): ?>
                                    class="fa fa-bookmark save"
                                <?php else: ?>
                                    class="fa fa-bookmark-o save"
                                <?php endif ?>
                                    data-id="<?php echo $post->id ?>">

                            </i>
                            <!-- save unsave system -->

                        </div>
                    </div>
                </div>
                <!--- \\\\\\\Post-->
            </div>
        </div>

        <?php
    }

}

function afficherSavedPosts($username)
{
    global $repository1;
    global $repository2;
    global $repository3;

    $saved_posts = $repository3->findAllByUsername($username);

    foreach ($saved_posts
             as $saved_post) {

        $post = $repository1->findById($saved_post->post_id);
        $worker = $repository2->findByUsername($post->username);
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
                                                    href="#"><?= "@" . $post->username ?></a></div>
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
                            <div class="text-muted h7 mb-2"><i class="fa fa-clock-o"></i><?= $post->date ?></div>
                            <div class="text-muted h7 mb-2"><i class="fa fa-map-marker"
                                                               aria-hidden="true"></i><?= $post->location ?></div>


                            <p class="card-text">
                                <?= $post->description ?>
                            </p>
                        </div>

                        <div class="card-footer">
                            <!-- like dislike system -->
                            <!-- if user likes post, style button differently -->

                            <i <?php if (userLiked($post->id)): ?>
                                class="fa fa-thumbs-up like-btn"
                            <?php else: ?>
                                class="fa fa-thumbs-o-up like-btn"
                            <?php endif ?>
                                    data-id="<?php echo $post->id ?>"></i>
                            <span class="likes"><?php echo getLikes($post->id); ?></span>
                            <!-- if user dislikes post, style button differently -->

                            <i
                                <?php if (userDisliked($post->id)): ?>
                                    class="fa fa-thumbs-down dislike-btn"
                                <?php else: ?>
                                    class="fa fa-thumbs-o-down dislike-btn"
                                <?php endif ?>
                                    data-id="<?php echo $post->id ?>"></i>
                            <span class="dislikes"><?php echo getDislikes($post->id); ?></span>
                            <!-- like dislike system -->
                            <a href="view-post.php?post_id=<?= $post->id ?>" class="card-link collapsed"><i
                                        class="fa fa-commenting-o"></i> Show comments</a>
                            <!-- save unsave system -->
                            <i
                                <?php if (isSaved($post->id)): ?>
                                    class="fa fa-bookmark save"
                                <?php else: ?>
                                    class="fa fa-bookmark-o save"
                                <?php endif ?>
                                    data-id="<?php echo $post->id ?>">

                            </i>
                            <!-- save unsave system -->
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

