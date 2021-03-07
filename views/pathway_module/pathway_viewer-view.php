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

        // Generate the network itself
        $pathway_model->generate_network($pathway_code, '');

        //! Check if the unprotected file exists and give access permission to read
        if (file_exists(RPROJECT_PATH . RSCRIPT_OUTPUT . '/' . $pathway_code . ".html")) {
            // Retrieve the filename
            foreach (glob(NETWORK_ABSPATH . "*" . $pathway_info["code"] . ".*") as $filename) {  
                $network_filename = basename($filename);
            }
        } else {
            echo "<br>Could not generate the network into path: " . RPROJECT_PATH . RSCRIPT_OUTPUT . '/' . $pathway_code . ".html";
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
    <div class="row" data-step="10" data-intro="" id="network-preview">
        <div class="col-md-12">
            <!-- Timeline Widget -->
            <div class="widget" data-step="8" data-intro="Use this area to interact with the network, cool hm?">
                <div class="widget-extra themed-background-dark">
                    <div class="widget-options">
                        <div class="btn-group btn-group-lg">
                            <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                            <i class="gi gi-floppy_save"></i> Export pathway as <span class="caret"></span></a>
                            <ul class="dropdown-menu text-left">
                                <li id="exportNetworkButtonPng"><a href="javascript:void(0)"><i class="fi fi-png pull-right"></i>PNG</a></li>
                                <li id="exportNetworkButtonJpeg"><a href="javascript:void(0)"><i class="fi fi-jpg pull-right"></i>JPEG</a></li>
                                <li id="exportNetworkButtonPdf"><a href="javascript:void(0)"><i class="fi fi-pdf pull-right"></i></i>PDF</a></li>
                                <li id="exportNetworkButtonSvg" class="disabled"><a href="javascript:void(0)"><i class="fi fi-svg pull-right"></i></i>SVG</a></li>
                                <li id="exportNetworkButtonJson" class="disabled"><a href="javascript:void(0)"><i class="fi fi-xml pull-right"></i>XML/JSON</a></li>
                            </ul>
                        </div>
                    </div>
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


<script type="text/javascript">

    /**
     * Function to read the iframe canvas
     */
    var readIframeCanvas = function(){
        // Select the iframe object
        var networkIframe = document.getElementById("networkIframe");

        // Select the canvas inside the iframe object
        var canvas = networkIframe.contentWindow.document.getElementsByTagName("canvas")[0];

        return canvas;
    };

    /**
     * Function to download the exported image
     */
    var downloadImage = function(img_, ext_) {
        // Genetate the downloadable image via link
        var a = $("<a>")
            .attr("href", img_)
            .attr("download", "<?php echo $pathway_info["code"]; ?>." + ext_)
            .appendTo("body");

        // Simulate a click on the link
        a[0].click();

        // Remove the link after the download
        a.remove();
    };

    // **** JS codes to handle the network export button ****

    // PNG
    $(document).on("click", "#exportNetworkButtonPng", function () {
        // Read the iframe canvas
        var canvas = readIframeCanvas();
        
        // Conver the canvas to png image
        var img = canvas.toDataURL("image/png");

        // Download the image
        downloadImage(img, "png");
    });

    // JPEG
    $(document).on("click", "#exportNetworkButtonJpeg", function () {
        // Read the iframe canvas
        var canvas = readIframeCanvas();
        
        // Conver the canvas to png image
        var img = canvas.toDataURL('image/jpeg', 1.0);

        // Download the image
        downloadImage(img, "jpeg");
    });

    // PDF
    $(document).on("click", "#exportNetworkButtonPdf", function () {
        // Select the iframe object
        var networkIframe = document.getElementById("networkIframe");

        // Select the pdf download button
        var pdfButton = networkIframe.contentWindow.document.getElementsByTagName("button")[0];
        pdfButton.style.visibility = "hidden";

        // Click the pdf donwload button
        pdfButton.click();
    });

    // SVG
    $(document).on("click", "#exportNetworkButtonSvg", function () {
        console.log('SVG exporting not implemented yet...');

        /*// Read the iframe canvas
        var canvas = readIframeCanvas()
        
        // Get the canvas context
        var context = canvas.getContext("2d");

        // Serialize your SVG
        var mySerializedSVG = context.getSerializedSvg(true); //true here, if you need to convert named to numbered entities.

        // If you really need to you can access the shadow inline SVG created by calling:
        var svg = ctx.getSvg();

        var svgString = canvas.outerHTML;
        var dataUrl = 'data:image/svg+xml,'+encodeURIComponent(svgString);
        console.log(dataUrl);*/
    });

    // JSON
    $(document).on("click", "#exportNetworkButtonJson", function () {
        console.log('Json exporting not implemented yet...');
    });
    

    // Hide the iframe button
    var networkIframe = document.getElementById("networkIframe");

    setTimeout(() => {
        networkIframe.contentWindow.document.getElementsByTagName("button")[0].style.visibility = "hidden"
    }, 3000);

</script>