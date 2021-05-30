<?php
include_once 'autoload.php';
session_start();
?>
<!DOCTYPE html>

<head>
    <meta lang="en">
    <meta charset="UTF-8">
    <title>Document </title>
    <link href="ProfileWorker.css" rel="stylesheet">
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
                        <h4 class="m-t-sm"> <?php echo $_SESSION['username'];   ?></h4>
                        <br>
                        <a href="AccountSettings.php" class="btn btn-xs btn-primary mb-2">Edit Profile</a>
                        <a href="Logout.php" class="btn btn-xs btn-primary mb-2">Logout</a>

                        <a href="messaging.php" class="btn btn-xs btn-primary mb-2" style="margin-left: 600px">Messaging System</a>
                    </div>

                </div>

                <ul class="profile-header-tab nav nav-tabs">
                    <li class="nav-item"><a href="#profile-about" class="nav-link" >ABOUT</a></li>
                    <li class="nav-item"><a href="#profile-posts" class="nav-link" >POSTS</a></li>
                    <li class="nav-item"><a href="#profile-photos" class="nav-link" >PHOTOS</a></li>
                   
                </ul>
            </div>

            <div class="profile-container">
                <div class="row row-space-20">
                    <div class="col-md-4 hidden-xs hidden-sm">
                        <ul class="profile-info-list" id="profile-about">
                            <li class="title">PERSONAL INFORMATION</li>
                            <?php  $repo= new Repository('worker') ;
                            $reponse=$repo->findByUsername($_SESSION['username']);
                            
                            foreach ($reponse as $key=>$value){
                             if($key=='occupation') {  ?>
                            <li>
                                <div class="field">Occupation:</div>
                                <div class="value"><?php $_SESSION['occupation']=$value; echo $value ?></div>
                            </li>
                            <?php  }  if($key=='birthdate') {  ?>
                            <li>
                                <div class="field">Date of Birth:</div>
                                <div class="value"><?php echo $value; ?></div>
                            </li>
                            <?php } if($key=='gender') {  ?>
                            <li>
                                <div class="field">Gender:</div>
                                <div class="value">
                                    
                                        <?php echo $value;  ?>
                                   
                                </div>
                            </li>
                            <?php } ?>
                            <?php if($key=='phonenumber') {  ?>
                            <li>
                                <div class="field">Phone No.:</div>
                                <div class="value">
                                   <?php echo $value; ?>
                                </div>
                            </li>
                            <?php } ?>
                            <?php } ?>
                        </ul>
                        <ul class='profile-info-list' id='profile-posts'>
                            <li class="title">POSTS</li>
                             <!--- \\\\\\\Post-->
                             <?php $repo = new Repository('posts');
                                    $response=$repo->findPosts($_SESSION['username']);
                                    
                                    while($row=$response->fetch()){
                                    ?>
                    <div class="card gedf-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                    </div>
                                    
                                    <div class="ml-2">
                                        <div class="h5 m-0"><a href="#"><?php  echo '@'.$row['username']  ?></a></div>
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
                                            <a class="dropdown-item" href="#">Modify</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="text-muted h7 mb-2"><i class="fa fa-clock-o"></i><?php echo $row['date']  ?></div>
                            <div class="text-muted h7 mb-2"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row['location'] ?> </div>


                            <p class="card-text">
                              <?php  echo $row['description']  ?>
                            </p>
                        </div>

                    </div>
                    <?php  } ?>
                    <!-- Post /////-->
                            <li>
                                <button id='add-post-btn' class='btn btn-primary' value='Add a post'>Add a post</button>
                            </li>

                            <li>

                                <form action='insertpost.php' method="POST">
                                    <div class="form-group">
                                        <label for="Location">Location</label>
                                        <input type="text" class="form-control" name="Location" id="Location" placeholder="Example">

                                    </div>
                                    <div class="form-group">
                                        <label for="Description">Description</label>
                                        <textarea type='text' name='Description' id='Description' rows='7' cols='100' placeholder="Example"></textarea>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>