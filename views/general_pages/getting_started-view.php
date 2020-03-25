<!-- Page content -->
<div id="page-content">
    <!-- Blank Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-circle_info"></i>About <?php echo $template["title"]; ?><br>
                <strong><small><?php echo $template["headline"]; ?></small></strong><br>
                <small><?php echo $template["version"]; ?></small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Home page</li>
        <li><a href="">About</a></li>
    </ul>
    <!-- END Blank Header -->

    <!-- Block -->
    <div class="block">
        <!-- Example Title -->
        <div class="block-title">
            <h2><strong>How it works?</strong></h2>
        </div>
        <!-- END Example Title -->

        <!-- Tutorial Content -->
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
        <!-- END Tutorial Block -->
    </div>
    <!-- END Block -->
</div>
<!-- END Page Content -->

<?php include ABSPATH . '/views/_includes/page_footer.php'; ?>
<?php include ABSPATH . '/views/_includes/template_scripts.php'; ?>