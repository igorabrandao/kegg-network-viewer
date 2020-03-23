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
                    <h2><strong>How it works?</strong></h2>
                </div>
                <!-- END Newsfeed Title -->

                <!-- Newsfeed Content -->
                <div class="block-content-full">
                    <!-- You can remove the class .media-feed-hover if you don't want each event to be highlighted on mouse hover -->
                    <ul class="media-list media-feed media-feed-hover">
                        <!-- Story Published -->
                        <li class="media">
                            <div class="media-body">
                                <h4><a href="#"><strong>For the best use of this tool, follow the instructions below:</strong></a></h4>
                                <br>
                                <!-- Comments -->
                                <ul class="media-list push">
                                    <li class="media">
                                        <div class="media-body">
                                            <h4><strong>1)</strong> Access the menu <strong>"Pathways list"</strong> menu located in sidebar.</h5>
                                            <p>
                                                <a href="<?php echo HOME_URI;?>/assets/img/tutorial/tutorial01.jpg" data-toggle="lightbox-image" 
                                                title="Step 1: Access the menu Pathways list menu located in sidebar.">
                                                    <img src="<?php echo HOME_URI;?>/assets/img/tutorial/tutorial01.jpg" alt="Step 1">
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                            <h4><strong>2)</strong> In the <strong>"Pathways list"</strong> page, click in the name of the pathway of interest.</h4>
                                            <p>
                                                <a href="<?php echo HOME_URI;?>/assets/img/tutorial/tutorial02.jpg" data-toggle="lightbox-image" 
                                                    title="Step 2: In the Pathways list page, click in the name of the pathway of interest.">
                                                    <img src="<?php echo HOME_URI;?>/assets/img/tutorial/tutorial02.jpg" alt="Step 2">
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                            <h4><strong>3)</strong> The <strong>"Pathway viewer"</strong> page, offers the following options:</h4>
                                            <hr>
                                            <h4><ul class="media-list push">
                                                <li class="media"><strong>A - </strong>Open the network details card;</li>
                                                <li class="media"><strong>B - </strong>Filter, Edit, Delete, Create notes in the current network;</li>
                                                <li class="media"><strong>C - </strong>Navigate through the network visualization;</li>
                                                <li class="media"><strong>D - </strong>Adjust the network visualization zoom.</li>
                                            </ul></h4>
                                            <p>
                                                <a href="<?php echo HOME_URI;?>/assets/img/tutorial/tutorial03.jpg" data-toggle="lightbox-image" 
                                                    title="Step 3: Pathway viewer page.">
                                                    <img src="<?php echo HOME_URI;?>/assets/img/tutorial/tutorial03.jpg" alt="Step 3">
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                        <h4><strong>4)</strong> The <strong>network details card </strong> modal displays detailed informations about the current network.
                                        Click in each tab to display the information of interest.</h4>
                                            <p>
                                                <a href="<?php echo HOME_URI;?>/assets/img/tutorial/tutorial04.jpg" data-toggle="lightbox-image" 
                                                    title="Step 4: Click in each tab to display the information of interest.">
                                                    <img src="<?php echo HOME_URI;?>/assets/img/tutorial/tutorial04.jpg" alt="Step 4">
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                                <!-- END Comments -->
                            </div>
                        </li>
                        <!-- END Story Published -->
                    </ul>
                </div>
                <!-- END Newsfeed Content -->
            </div>
            <!-- END Newsfeed Block -->
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