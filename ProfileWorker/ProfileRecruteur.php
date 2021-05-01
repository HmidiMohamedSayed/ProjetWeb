<?php
include_once 'autoload.php';

?>
<!DOCTYPE html>

<head>
    <meta lang="en">
    <meta charset="UTF-8">
    <title>Document </title>
    <link href="ProfileRecruteur.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cosmo/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div id="content" class="content p-0">
            <div class="profile-header">
                <div class="profile-header-cover"></div>
                <div class="profile-header-content">
                    <div class="profile-header-img mb-4">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="mb-4" alt="" />
                    </div>

                    <div class="profile-header-info">
                        <h4 class="m-t-sm">Clyde Stanley</h4>
                        <p class="m-b-sm">UXUI + Frontend Developer</p>
                        <a href="AccountSettings.php" class="btn btn-xs btn-primary mb-2">Edit Profile</a>
                    </div>
                </div>

                <ul class="profile-header-tab nav nav-tabs">
                    <li class="nav-item"><a href="#profile-about" class="nav-link" data-toggle="tab">ABOUT</a></li>
                    <li class="nav-item"><a href="#profile-posts" class="nav-link" data-toggle="tab">POSTS</a></li>
                    <li class="nav-item"><a href="#profile-photos" class="nav-link" data-toggle="tab">PHOTOS</a></li>
                    <li class="nav-item"><a href="#profile-videos" class="nav-link" data-toggle="tab">VIDEOS</a></li>
                </ul>
            </div>

            <div class="profile-container">
                <div class="row row-space-20">
                    <div class="col-md-4 hidden-xs hidden-sm">
                        <ul class="profile-info-list" id="profile-about">
                            <li class="title">PERSONAL INFORMATION</li>
                            <?php $repo= new Repository('table_infos_worker') ;
                            $reponse=$repo->findById($_SESSION['id']);
                            while ($row = $reponse->fetch())
                            {
                            ?>
                            <li>
                                <div class="field">Occupation:</div>
                                <div class="value"><?php $row['Occupation'] ?></div>
                            </li>
                            <li>
                                <div class="field">Skills:</div>
                                <div class="value"><?php $row['Skills']   ?></div>
                            </li>
                            <li>
                                <div class="field">Date of Birth:</div>
                                <div class="value"><?php  $row['birthdate']  ?></div>
                            </li>
                            
                            <li>
                                <div class="field">Address:</div>
                                <div class="value">
                                    <address class="m-b-0">
                                        <?php $row['Address']  ?>
                                    </address>
                                </div>
                            </li>
                            <li>
                                <div class="field">Phone No.:</div>
                                <div class="value">
                                   <?php  $row['number'] ?>
                                </div>
                            </li>
                            <?php } ?>
                            <br>
                            <br>
                        </ul>
                        <ul class='profile-info-list' id='profile-posts'>
                            <li class="title">POSTS</li>
                            <?php $rep = new Repository('table_posts');
                            $reponse = $rep->findAllPosts();
                            while ($row = $reponse->fetch())

                            {
                            ?>
                                <li>
                                    <div class="field"><?php echo $row['Subject']; ?> </div>
                                    <div class="value"><?php echo $row['Description'] ;?> </div>
                                </li>
                            <?php }  ?>
                            <li>
                                <button id='add-post-btn' class='btn btn-primary' value='Add a post'>Add a post</button>
                            </li>

                            <li>

                                <form action='insertpost.php' method="POST">
                                    <div class="form-group">
                                        <label for="Subject">Subject</label>
                                        <input type="text" class="form-control" name="Subject" id="Subject" placeholder="Example">

                                    </div>
                                    <div class="form-group">
                                        <label for="Description">Description</label>
                                        <textarea type='text' name='Description' id='Description' rows='7' cols='100' placeholder="Example"></textarea>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </form>

                            </li>

                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>