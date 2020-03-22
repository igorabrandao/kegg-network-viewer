<?php
    // Get the entire pathways count
    $pathway_count = $pathway_model->get_pathways_count(1);
    $pathway_count_without_network = $pathway_model->get_pathways_count(0);
?>


<!-- Page content -->
<div id="page-content">
    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                    <h1><?php echo $template["initials"]; ?> - <strong>KEGG Pathway Viewer</strong><br>
                        <p style="font-size: 16px;"><?php echo $template["headline"]; ?></p>
                        <small>version <?php echo $template["version"]; ?></small></h1>
                </div>
                <!-- END Main Title -->

                <!-- Top Stats -->
                <div class="col-md-8 col-lg-6">
                    <div class="row text-center">
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                <strong><?php echo $pathway_count; ?></strong><br>
                                <small><i class="gi gi-share_alt"></i> Pathways with visualization</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                <strong><?php echo $pathway_count_without_network; ?></strong><br>
                                <small>Pathways without visualization</small>
                            </h2>
                        </div>
                        <!-- We hide the last stat to fit the other 3 on small devices -->
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                                <strong><?php echo $pathway_count + $pathway_count_without_network; ?></strong><br>
                                <small>Total count of pathways</small>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- END Top Stats -->
            </div>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="<?php echo HOME_URI;?>/assets/img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
    </div>

    <div class="row">
        <!-- First Column -->
        <div class="col-md-8 col-lg-8">
            <!-- Newsfeed Block -->
            <div class="block">
                <!-- Newsfeed Title -->
                <div class="block-title">
                    <h2><strong>Newsfeed</strong></h2>
                </div>
                <!-- END Newsfeed Title -->

                <!-- Newsfeed Content -->
                <div class="block-content-full">
                    <!-- You can remove the class .media-feed-hover if you don't want each event to be highlighted on mouse hover -->
                    <ul class="media-list media-feed media-feed-hover">
                        <!-- Photos Uploaded -->
                        <!-- Example effect of the following update showing up in Newsfeed (initialized in js/pages/readyProfile.js) -->
                        <li id="newsfeed-update-example" class="media display-none">
                            <a href="page_ready_user_profile.php" class="pull-left">
                                <img src="<?php echo HOME_URI;?>/assets/img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="Avatar" class="img-circle">
                            </a>
                            <div class="media-body">
                                <p class="push-bit">
                                    <span class="text-muted pull-right">
                                        <small>just now</small>
                                        <span class="text-success" data-toggle="tooltip" title="From Mobile"><i class="fa fa-mobile"></i></span>
                                    </span>
                                    <strong><a href="page_ready_user_profile.php">User</a> uploaded 2 new photos.</strong>
                                </p>
                                <div class="row push">
                                    <div class="col-sm-6 col-md-4">
                                        <a href="<?php echo HOME_URI;?>/assets/img/placeholders/photos/photo13.jpg" data-toggle="lightbox-image">
                                            <img src="<?php echo HOME_URI;?>/assets/img/placeholders/photos/photo13.jpg" alt="image">
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <a href="<?php echo HOME_URI;?>/assets/img/placeholders/photos/photo23.jpg" data-toggle="lightbox-image">
                                            <img src="<?php echo HOME_URI;?>/assets/img/placeholders/photos/photo23.jpg" alt="image">
                                        </a>
                                    </div>
                                </div>
                                <p>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-thumbs-o-up"></i> Like</a>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-comments-o"></i> Comment</a>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-share-square-o"></i> Share</a>
                                </p>
                            </div>
                        </li>
                        <!-- END Photos Uploaded -->

                        <!-- Story Published -->
                        <li class="media">
                            <a href="page_ready_user_profile.php" class="pull-left">
                                <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="Avatar" class="img-circle">
                            </a>
                            <div class="media-body">
                                <p class="push-bit">
                                    <span class="text-muted pull-right">
                                        <small>45 min now</small>
                                        <span class="text-danger" data-toggle="tooltip" title="From Web"><i class="fa fa-globe"></i></span>
                                    </span>
                                    <strong><a href="page_ready_user_profile.php">Explorer</a> published a new story.</strong>
                                </p>
                                <h5><a href="page_ready_article.php"><strong>The Mountain Trip</strong> &bull; Once in a lifetime experience</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti..</p>
                                <p>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-success"><i class="fa fa-thumbs-up"></i> You Like it</a>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-share-square-o"></i> Share</a>
                                </p>

                                <!-- Comments -->
                                <ul class="media-list push">
                                    <li class="media">
                                        <a href="page_ready_user_profile.php" class="pull-left">
                                            <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="Avatar" class="img-circle">
                                        </a>
                                        <div class="media-body">
                                            <a href="page_ready_user_profile.php"><strong>User</strong></a>
                                            <span class="text-muted"><small><em>29 min ago</em></small></span>
                                            <p>Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum.</p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <a href="page_ready_user_profile.php" class="pull-left">
                                            <img src="img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="img-circle">
                                        </a>
                                        <div class="media-body">
                                            <a href="page_ready_user_profile.php"><strong>User</strong></a>
                                            <span class="text-muted"><small><em>18 min ago</em></small></span>
                                            <p>In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend</p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <a href="page_ready_user_profile.php" class="pull-left">
                                            <img src="img/placeholders/avatars/avatar.jpg" alt="Avatar" class="img-circle">
                                        </a>
                                        <div class="media-body">
                                            <form action="page_ready_user_profile.php" method="post" onsubmit="return false;">
                                                <textarea id="profile-newsfeed-comment1" name="profile-newsfeed-comment1" class="form-control" rows="2" placeholder="Your comment.."></textarea>
                                                <button type="submit" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Post Comment</button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                                <!-- END Comments -->
                            </div>
                        </li>
                        <!-- END Story Published -->

                        <!-- Check in -->
                        <li class="media">
                            <a href="page_ready_user_profile.php" class="pull-left">
                                <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="Avatar" class="img-circle">
                            </a>
                            <div class="media-body">
                                <p class="push-bit">
                                    <span class="text-muted pull-right">
                                        <small>1 hour ago</small>
                                        <span class="text-success" data-toggle="tooltip" title="From Mobile"><i class="fa fa-mobile"></i></span>
                                    </span>
                                    <strong><a href="page_ready_user_profile.php">Adventurer</a> checked in at <a href="javascript:void(0)">Cafe-Bar</a>.</strong>
                                </p>
                                <div id="gmap-checkin" class="gmap push"></div>
                                <p>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-thumbs-o-up"></i> Like</a>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-comments-o"></i> Comment</a>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-share-square-o"></i> Share</a>
                                </p>
                            </div>
                        </li>
                        <!-- END Check in -->

                        <!-- Status Updated -->
                        <li class="media">
                            <a href="page_ready_user_profile.php" class="pull-left">
                                <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="Avatar" class="img-circle">
                            </a>
                            <div class="media-body">
                                <p class="push-bit">
                                    <span class="text-muted pull-right">
                                        <small>5 hours ago</small>
                                        <span class="text-info" data-toggle="tooltip" title="From Custom App"><i class="fa fa-wrench"></i></span>
                                    </span>
                                    <strong><a href="page_ready_user_profile.php">User</a> updated status.</strong>
                                </p>
                                <p>Hey there! First post from the new application!</p>
                                <p>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-thumbs-o-up"></i> Like</a>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-share-square-o"></i> Share</a>
                                </p>
                                <!-- Comments -->
                                <ul class="media-list push">
                                    <li class="media">
                                        <a href="page_ready_user_profile.php" class="pull-left">
                                            <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="Avatar" class="img-circle">
                                        </a>
                                        <div class="media-body">
                                            <a href="page_ready_user_profile.php"><strong>User</strong></a>
                                            <span class="text-muted"><small><em>1 hour ago</em></small></span>
                                            <p>Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum.</p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <a href="page_ready_user_profile.php" class="pull-left">
                                            <img src="img/placeholders/avatars/avatar.jpg" alt="Avatar" class="img-circle">
                                        </a>
                                        <div class="media-body">
                                            <form action="page_ready_user_profile.php" method="post" onsubmit="return false;">
                                                <textarea id="profile-newsfeed-comment" name="profile-newsfeed-comment" class="form-control" rows="2" placeholder="Your comment.."></textarea>
                                                <button type="submit" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Post Comment</button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                                <!-- END Comments -->
                            </div>
                        </li>
                        <li class="media text-center">
                            <a href="javascript:void(0)" class="btn btn-xs btn-default push">View more..</a>
                        </li>
                        <!-- END Status Updated -->
                    </ul>
                </div>
                <!-- END Newsfeed Content -->
            </div>
        </div>
        <!-- END First Column -->

        <!-- Second Column -->
        <div class="col-md-4 col-lg-4">
            <!-- Info Block -->
            <div class="block">
                <!-- Info Title -->
                <div class="block-title">
                    <h2>About <strong><?php echo $template["author"]; ?></strong> <small>&bull; <i class="fa fa-file-text text-primary"></i> <a href="javascript:void(0)" data-toggle="tooltip" title="Download Bio in PDF">Bio</a></small></h2>
                </div>
                <!-- END Info Title -->

                <!-- Info Content -->
                <table class="table table-borderless table-striped">
                    <tbody>
                        <tr>
                            <td style="width: 25%;"><strong>Info</strong></td>
                            <td>Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non.</td>
                        </tr>
                        <tr>
                            <td><strong>Founder</strong></td>
                            <td><a href="javascript:void(0)">Company Inc</a></td>
                        </tr>
                        <tr>
                            <td><strong>Education</strong></td>
                            <td><a href="javascript:void(0)">University Name</a></td>
                        </tr>
                        <tr>
                            <td><strong>Skills for this project</strong></td>
                            <td>
                                <a class="label label-info" title="R">R</a>
                                <a class="label label-warning" title="HTML">HTML</a>
                                <a class="label label-success" title="CSS">CSS</a>
                                <a class="label label-danger" title="Javascript">Javascript</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Info Content -->
            </div>
            <!-- END Info Block -->
        </div>
        <!-- END Second Column -->
    </div>
    <!-- END Newsfeed Block -->
    <!-- END Widgets Row -->
</div>
<!-- END Page Content -->

<?php include ABSPATH . '/views/_includes/page_footer.php'; ?>
<?php include ABSPATH . '/views/_includes/template_scripts.php'; ?>

<!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
<!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->
<script src="https://maps.googleapis.com/maps/api/js?key="></script>
<script src="<?php echo HOME_URI;?>/assets/js/helpers/gmaps.min.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="<?php echo HOME_URI;?>/assets/js/pages/index.js"></script>
<script>$(function(){ Index.init(); });</script>