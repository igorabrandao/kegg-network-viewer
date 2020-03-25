<?php

    // Check if the pathway code was informed
    if ( isset($_GET['pathwayCode']) && strcmp($_GET['pathwayCode'], "") != 0 )
    {
        // Get the pathway code
        $pathway_code = encrypt_decrypt('decrypt', $_GET['pathwayCode']);

        // Load pathway information
        $pathway_info = $pathway_model->get_pathway_info($pathway_code);
        $pathway_info = $pathway_info[0];

        // Find the network file name
        $network_filename = '';

        foreach (glob(NETWORK_ABSPATH . "*" . $pathway_info["code"] . ".*") as $filename) {  
            $network_filename = basename($filename);
        }
    }
    else
    {
        ?><script>alert("There is an error related to the pathway code. Please try again.");
        window.location.href = "<?php echo HOME_URI; ?>";</script> <?php
        return false;
    }

?>

<!-- Page content -->
<div id="page-content">
    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row" data-step="7" data-intro="This is the Pathway general informations.">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6">
                    <h1><?php echo $pathway_info["code"]; ?> <strong><?php echo $pathway_info["name"]; ?></strong><br>
                    <small><strong><?php echo $pathway_info["class"]; ?></small></strong></h1>
                    <small><?php echo $pathway_info["description"]; ?></small></h1>
                </div>
                <!-- END Main Title -->

                <!-- Top Stats -->
                <div class="col-md-8 col-lg-6 hidden-xs hidden-sm">
                    <div class="row text-center">
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                <strong><?php echo $pathway_info["nodes"]; ?></strong><br>
                                <small>NODES</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                            <strong><?php echo $pathway_info["edges"]; ?></strong><br>
                                <small>EDGES</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                            <strong><?php echo $pathway_info["total_species"]; ?></strong><br>
                                <small>ORGANISMS</small>
                            </h2>
                        </div>
                        <!-- We hide the last stat to fit the other 3 on small devices -->
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                            <strong><?php echo $pathway_info["community"]; ?></strong><br>
                                <small>COMMUNITIES</small>
                            </h2>
                        </div>
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                            <strong><?php echo $pathway_info["mean_degree"]; ?></strong><br>
                                <small>AVG. DEGREE</small>
                            </h2>
                        </div>
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                            <strong><?php echo $pathway_info["mean_betweenness"]; ?></strong><br>
                                <small>AVG. BETWEENNESS</small>
                            </h2>
                        </div>
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                            <strong><?php echo ($pathway_info["ap_number"] + $pathway_info["hap_number"]); ?></strong><br>
                                <small>ARTICULATION POINTS</small>
                            </h2>
                        </div>
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                            <strong><?php echo ($pathway_info["hub_number"] + $pathway_info["others_number"]); ?></strong><br>
                                <small>OTHER NODES</small>
                            </h2>
                        </div>
                        
                        <div class="col-sm-12 hidden-xs" data-step="9" data-intro="Click here to see the details about the pathway.">
                            <button type="button" class="btn btn-block btn-danger" onclick="$('#modal-network-info').modal('show');">
                                Click here to see the pathway information
                            </button>
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

    <!-- Widgets Row -->
    <div class="row" data-step="10" data-intro="">
        <div class="col-md-12">
            <!-- Timeline Widget -->
            <div class="widget" data-step="8" data-intro="Use this area to interact with the network, cool hm?">
                <div class="widget-extra themed-background-dark">
                    <h3 class="widget-content-light">
                        Pathway <strong>Viewer</strong>
                    </h3>
                </div>
                <div class="widget-extra">
                    <!-- Iframe with pathway visualization -->
                    <iframe id="networkIframe" class="iframe-network-viewer" frameBorder="0"
                        src="<?php echo HOME_URI . '/resources/networks/' . $network_filename;?>"></iframe>
                    <!-- END Iframe with pathway visualization -->
                </div>
            </div>
            <!-- END Timeline Widget -->
        </div>
    </div>
    <!-- END Widgets Row -->
</div>
<!-- END Page Content -->

<?php include ABSPATH . '/views/_includes/page_footer.php'; ?>
<?php include ABSPATH . '/views/_includes/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="<?php echo HOME_URI;?>/assets/js/pages/index.js"></script>