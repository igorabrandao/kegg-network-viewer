<!-- Page content -->
<div id="page-content">
    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                    <h1>Welcome <strong>Admin</strong><br><small>You Look Awesome!</small></h1>
                </div>
                <!-- END Main Title -->

                <!-- Top Stats -->
                <div class="col-md-8 col-lg-6">
                    <div class="row text-center">
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                $<strong>93.7k</strong><br>
                                <small><i class="fa fa-thumbs-o-up"></i> Great</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                <strong>167k</strong><br>
                                <small><i class="fa fa-heart-o"></i> Likes</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                <strong>101</strong><br>
                                <small><i class="fa fa-calendar-o"></i> Events</small>
                            </h2>
                        </div>
                        <!-- We hide the last stat to fit the other 3 on small devices -->
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                                <strong>27&deg; C</strong><br>
                                <small><i class="fa fa-map-marker"></i> Sydney</small>
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
    <!-- END Dashboard Header -->

    <!-- Mini Top Stats Row -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="page_ready_article.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        New <strong>Article</strong><br>
                        <small>Mountain Trip</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="page_comp_charts.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="gi gi-usd"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        + <strong>250%</strong><br>
                        <small>Sales Today</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="page_ready_inbox.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                        <i class="gi gi-envelope"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        5 <strong>Messages</strong>
                        <small>Support Center</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="page_comp_gallery.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                        <i class="gi gi-picture"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        +30 <strong>Photos</strong>
                        <small>Gallery</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6">
            <!-- Widget -->
            <a href="page_comp_charts.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                        <i class="gi gi-wallet"></i>
                    </div>
                    <div class="pull-right">
                        <!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                        <span id="mini-chart-sales"></span>
                    </div>
                    <h3 class="widget-content animation-pullDown visible-lg">
                        Latest <strong>Sales</strong>
                        <small>Per hour</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6">
            <!-- Widget -->
            <a href="page_widgets_stats.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                        <i class="gi gi-crown"></i>
                    </div>
                    <div class="pull-right">
                        <!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                        <span id="mini-chart-brand"></span>
                    </div>
                    <h3 class="widget-content animation-pullDown visible-lg">
                        Our <strong>Brand</strong>
                        <small>Popularity over time</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
    </div>
    <!-- END Mini Top Stats Row -->

    <!-- Widgets Row -->
    <div class="row">
        <div class="col-md-6">
            <!-- Timeline Widget -->
            <div class="widget">
                <div class="widget-extra themed-background-dark">
                    <div class="widget-options">
                        <div class="btn-group btn-group-xs">
                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit Widget"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Quick Settings"><i class="fa fa-cog"></i></a>
                        </div>
                    </div>
                    <h3 class="widget-content-light">
                        Latest <strong>News</strong>
                        <small><a href="page_ready_timeline.php"><strong>View all</strong></a></small>
                    </h3>
                </div>
                <div class="widget-extra">
                    <!-- Timeline Content -->
                    <div class="timeline">
                        <ul class="timeline-list">
                            <li class="active">
                                <div class="timeline-icon"><i class="gi gi-airplane"></i></div>
                                <div class="timeline-time"><small>just now</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.php"><strong>Jordan Carter</strong></a></p>
                                    <p class="push-bit">The trip was an amazing and a life changing experience!!</p>
                                    <p class="push-bit"><a href="page_ready_article.php" class="btn btn-xs btn-primary"><i class="fa fa-file"></i> Read the article</a></p>
                                    <div class="row push">
                                        <div class="col-sm-6 col-md-4">
                                            <a href="img/placeholders/photos/photo1.jpg" data-toggle="lightbox-image">
                                                <img src="<?php echo HOME_URI;?>/assets/img/placeholders/photos/photo1.jpg" alt="image">
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <a href="img/placeholders/photos/photo22.jpg" data-toggle="lightbox-image">
                                                <img src="<?php echo HOME_URI;?>/assets/img/placeholders/photos/photo22.jpg" alt="image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon themed-background-fire themed-border-fire"><i class="fa fa-file-text"></i></div>
                                <div class="timeline-time"><small>5 min ago</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.php"><strong>Administrator</strong></a></p>
                                    <strong>Free courses</strong> for all our customers at A1 Conference Room - 9:00 <strong>am</strong> tomorrow!
                                </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon"><i class="gi gi-drink"></i></div>
                                <div class="timeline-time"><small>3 hours ago</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.php"><strong>Ella Winter</strong></a></p>
                                    <p class="push-bit"><strong>Happy Hour!</strong> Free drinks at <a href="javascript:void(0)">Cafe-Bar</a> all day long!</p>
                                    <div id="gmap-timeline" class="gmap"></div>
                                </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon"><i class="fa fa-cutlery"></i></div>
                                <div class="timeline-time"><small>yesterday</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.php"><strong>Patricia Woods</strong></a></p>
                                    <p class="push-bit">Today I had the lunch of my life! It was delicious!</p>
                                    <div class="row push">
                                        <div class="col-sm-6 col-md-4">
                                            <a href="img/placeholders/photos/photo23.jpg" data-toggle="lightbox-image">
                                                <img src="<?php echo HOME_URI;?>/assets/img/placeholders/photos/photo23.jpg" alt="image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon themed-background-fire themed-border-fire"><i class="fa fa-smile-o"></i></div>
                                <div class="timeline-time"><small>2 days ago</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.php"><strong>Administrator</strong></a></p>
                                    To thank you all for your support we would like to let you know that you will receive free feature updates for life! You are awesome!
                                </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon"><i class="fa fa-pencil"></i></div>
                                <div class="timeline-time"><small>1 week ago</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.php"><strong>Nicole Ward</strong></a></p>
                                    <p class="push-bit">Consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate.</p>
                                    Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum.
                                </div>
                            </li>
                            <li class="text-center">
                                <a href="javascript:void(0)" class="btn btn-xs btn-default">View more..</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Timeline Content -->
                </div>
            </div>
            <!-- END Timeline Widget -->
        </div>
        <div class="col-md-6">
            <!-- Your Plan Widget -->
            <div class="widget">
                <div class="widget-extra themed-background-dark">
                    <div class="widget-options">
                        <div class="btn-group btn-group-xs">
                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit Widget"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Quick Settings"><i class="fa fa-cog"></i></a>
                        </div>
                    </div>
                    <h3 class="widget-content-light">
                        Your <strong>VIP Plan</strong>
                        <small><a href="page_ready_pricing_tables.php"><strong>Upgrade</strong></a></small>
                    </h3>
                </div>
                <div class="widget-extra-full">
                    <div class="row text-center">
                        <div class="col-xs-6 col-lg-3">
                            <h3>
                                <strong>35</strong> <small>/50</small><br>
                                <small><i class="fa fa-folder-open-o"></i> Projects</small>
                            </h3>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <h3>
                                <strong>25</strong> <small>/100GB</small><br>
                                <small><i class="fa fa-hdd-o"></i> Storage</small>
                            </h3>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <h3>
                                <strong>65</strong> <small>/1k</small><br>
                                <small><i class="fa fa-building-o"></i> Clients</small>
                            </h3>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <h3>
                                <strong>10</strong> <small>k</small><br>
                                <small><i class="fa fa-envelope-o"></i> Emails</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Your Plan Widget -->

            <!-- Charts Widget -->
            <div class="widget">
                <div class="widget-advanced widget-advanced-alt">
                    <!-- Widget Header -->
                    <div class="widget-header text-center themed-background">
                        <h3 class="widget-content-light text-left pull-left animation-pullDown">
                            <strong>Sales</strong> &amp; <strong>Earnings</strong><br>
                            <small>Last Year</small>
                        </h3>
                        <!-- Flot Charts (initialized in js/pages/index.js), for more examples you can check out http://www.flotcharts.org/ -->
                        <div id="dash-widget-chart" class="chart"></div>
                    </div>
                    <!-- END Widget Header -->

                    <!-- Widget Main -->
                    <div class="widget-main">
                        <div class="row text-center">
                            <div class="col-xs-4">
                                <h3 class="animation-hatch"><strong>7.500</strong><br><small>Clients</small></h3>
                            </div>
                            <div class="col-xs-4">
                                <h3 class="animation-hatch"><strong>10.970</strong><br><small>Sales</small></h3>
                            </div>
                            <div class="col-xs-4">
                                <h3 class="animation-hatch">$<strong>31.230</strong><br><small>Earnings</small></h3>
                            </div>
                        </div>
                    </div>
                    <!-- END Widget Main -->
                </div>
            </div>
            <!-- END Charts Widget -->

            <!-- Weather Widget -->
            <div class="widget">
                <div class="widget-advanced widget-advanced-alt">
                    <!-- Widget Header -->
                    <div class="widget-header text-left">
                        <!-- For best results use an image with at least 150 pixels in height (with the width relative to how big your widget will be!) - Here I'm using a 1200x150 pixels image -->
                        <img src="<?php echo HOME_URI;?>/assets/img/placeholders/headers/widget5_header.jpg" alt="background" class="widget-background animation-pulseSlow">
                        <h3 class="widget-content widget-content-image widget-content-light clearfix">
                            <span class="widget-icon pull-right">
                                <i class="fa fa-sun-o animation-pulse"></i>
                            </span>
                            Weather <strong>Station</strong><br>
                            <small><i class="fa fa-location-arrow"></i> The Mountain</small>
                        </h3>
                    </div>
                    <!-- END Widget Header -->

                    <!-- Widget Main -->
                    <div class="widget-main">
                        <div class="row text-center">
                            <div class="col-xs-6 col-lg-3">
                                <h3>
                                    <strong>10&deg;</strong> <small>C</small><br>
                                    <small>Sunny</small>
                                </h3>
                            </div>
                            <div class="col-xs-6 col-lg-3">
                                <h3>
                                    <strong>80</strong> <small>%</small><br>
                                    <small>Humidity</small>
                                </h3>
                            </div>
                            <div class="col-xs-6 col-lg-3">
                                <h3>
                                    <strong>60</strong> <small>km/h</small><br>
                                    <small>Wind</small>
                                </h3>
                            </div>
                            <div class="col-xs-6 col-lg-3">
                                <h3>
                                    <strong>5</strong> <small>km</small><br>
                                    <small>Visibility</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- END Widget Main -->
                </div>
            </div>
            <!-- END Weather Widget-->

            <!-- Advanced Gallery Widget -->
            <div class="widget">
                <div class="widget-advanced">
                    <!-- Widget Header -->
                    <div class="widget-header text-center themed-background-dark">
                        <h3 class="widget-content-light clearfix">
                            Awesome <strong>Gallery</strong><br>
                            <small>4 Photos</small>
                        </h3>
                    </div>
                    <!-- END Widget Header -->

                    <!-- Widget Main -->
                    <div class="widget-main">
                        <a href="page_comp_gallery.php" class="widget-image-container">
                            <span class="widget-icon themed-background"><i class="gi gi-picture"></i></span>
                        </a>
                        <div class="gallery gallery-widget" data-toggle="lightbox-gallery">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3">
                                    <a href="img/placeholders/photos/photo15.jpg" class="gallery-link" title="Image Info">
                                        <img src="<?php echo HOME_URI;?>/assets/img/placeholders/photos/photo15.jpg" alt="image">
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <a href="img/placeholders/photos/photo5.jpg" class="gallery-link" title="Image Info">
                                        <img src="<?php echo HOME_URI;?>/assets/img/placeholders/photos/photo5.jpg" alt="image">
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <a href="img/placeholders/photos/photo6.jpg" class="gallery-link" title="Image Info">
                                        <img src="<?php echo HOME_URI;?>/assets/img/placeholders/photos/photo6.jpg" alt="image">
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <a href="img/placeholders/photos/photo13.jpg" class="gallery-link" title="Image Info">
                                        <img src="<?php echo HOME_URI;?>/assets/img/placeholders/photos/photo13.jpg" alt="image">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Widget Main -->
                </div>
            </div>
            <!-- END Advanced Gallery Widget -->
        </div>
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