<?php
include_once 'autoload.php';
function afficherComments($postid)
{
    $repository2 = new Repository("comments");
    $comments = $repository2->getAllComments($postid);
    if (($comments)) { ?>

        <?php foreach ($comments as $comment):
            ?>
            <!-- comment -->

            <div class="d-flex flex-row comment-row">
                <div class="p-2"><img src="https://i.imgur.com/8RKXAIV.jpg" alt="user" width="50"
                                      class="rounded-circle"></div>
                <div class="comment-text active w-100">
                    <h6 class="font-medium"><?= $comment->username ?></h6> <span
                            class="m-b-15 d-block"><?= $comment->body ?></span>
                    <div class="comment-footer"><span
                                class="text-muted float-right"><?= date("F j, Y ", strtotime($comment->created_at)); ?></span>
                    </div>
                </div>
            </div>
            <!-- // comment -->
        <?php endforeach ?>
    <?php } else { ?>
        <div class="alert alert-light" role="alert">
            Be the first to comment on this post
        </div>
        <?php
    } ?>
    <!-- add comment -->
    <div class="add_comment">
        <form action="../comment-add.php?post_id=<?=$postid?>" method="post">
            <div class="d-flex flex-row align-items-start"><img class="rounded-circle"
                                                                src="https://i.imgur.com/RpzrMR2.jpg"
                                                                width="40"><textarea
                        class="form-control ml-1 shadow-none textarea" name="body"
                        placeholder="Write your comment here..."></textarea></div>
            <div class="mt-2 text-right">
                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Post Comment" />
            </div>

        </form>
    </div>
    <!-- add comment//// -->
<?php }

?>


