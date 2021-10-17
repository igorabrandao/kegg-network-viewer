<?php

// Check if the pathway code was informed
if (isset($_GET['pathwayCode']) && strcmp($_GET['pathwayCode'], "") != 0) {
    // Get the pathway code
    $pathway_code = encrypt_decrypt('decrypt', $_GET['pathwayCode']);

    // Load pathway information
    $pathway_info = $pathway_model->get_pathway_info($pathway_code);
    $pathway_info = $pathway_info[0];

    // Load the organism list
    $organism_list = $organism_model->get_organisms_list();

    // Find the network file name
    $network_filename = '';

    // Generate the network itself
    $pathway_model->generate_network($pathway_code, '');

    // Retrieve the filename
    foreach (glob(NETWORK_ABSPATH . "ec/" . "*" . $pathway_info["code"] . ".*") as $filename) {
        $network_filename = basename($filename);
    }

    /*//! Check if the unprotected file exists and give access permission to read
        if (file_exists(RPROJECT_PATH . RSCRIPT_OUTPUT . '/' . $pathway_code . ".html")) {
            // Retrieve the filename
            foreach (glob(NETWORK_ABSPATH . "*" . $pathway_info["code"] . ".*") as $filename) {  
                $network_filename = basename($filename);
            }
        } else {
            echo "<br>Could not generate the network into path: " . RPROJECT_PATH . RSCRIPT_OUTPUT . '/' . $pathway_code . ".html";
        }*/
} else {
?><script>
        alert("There is an error related to the pathway code. Please try again.");
        window.location.href = "<?php echo HOME_URI; ?>";
    </script> <?php
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
                        <small><strong><?php echo $pathway_info["class"]; ?></small></strong>
                    </h1>
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
                                <strong><?php echo $pathway_info["others_number"]; ?></strong><br>
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
        <img src="<?php echo HOME_URI; ?>/assets/img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
    </div>
    <!-- END Dashboard Header -->

    <!-- Widgets Row -->

    <!-- Filter Block -->
    <div class="row" data-step="11" data-intro="" id="network-preview-filter">
        <div class="col-md-12">
            <!-- Select Components Block -->
            <div class="block">
                <!-- Select Components Title -->
                <div class="block-title">
                    <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
                    <div class="block-options pull-right"></div>
                    <h2><strong>Filters</strong></h2>
                </div>
                <!-- END Select Components Title -->

                <!-- Select Components Content -->
                <div class="block-content">
                    <form action="page_forms_components.html" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                        <div class="form-group">
                            <label class="col-md-1 control-label" style="text-align: left;" for="organismChooser">Organisms:</label>
                            <div class="col-md-8">
                                <select id="organismChooser" name="organismChooser" class="select-chosen" data-placeholder="Choose organisms.." style="width: 250px;" multiple>
                                    <option value="ec" selected="selected">ec - Canonical (default)</option>
                                    <?php
                                    // Run through posts list
                                    foreach ($organism_list as $org) {
                                        echo '<option value="' . $org["organism"] . '">' . $org["organism"] . " - " . $org["specie"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Filter</button>
                            </div>
                        </div>
                    </form>
                    <p style="font-style: italic;">Note: Just working for <strong>ec, hsa & mmu </strong> organisms.</p>
                </div>
                <!-- END Select Components Content -->
            </div>
            <!-- END Select Components Block -->
        </div>
    </div>
    <!-- END Filter Block -->

    <!-- Custom message Block -->
    <div class="row" data-step="11" data-intro="" id="customMessageBlock" style="display: none;">
        <div class="col-md-12">
            <div class="block">
                <!-- Content -->
                <div class="block-content center">
                    <p><strong>None selected organism. Choose at least 1 to preview the pathway.</strong></p>
                </div>
                <!-- END Content -->
            </div>
        </div>
    </div>
    <!-- END Custom message Block -->

    <!-- Preview section -->
    <div id="previewSection">
        <div class="row" data-step="10" data-intro="" id="networkPreviewRow" name="networkPreviewRow">
            <div class="col-md-12" id="networkPreviewBlock" name="networkPreviewBlock">
                <!-- Pathway Viewer Widget -->
                <div class="block">
                    <!-- Select Components Title -->
                    <div class="block-title themed-background-dark-night" style="color: #ffffff;">
                        <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
                        <div class="block-options pull-right">
                            <div class="btn-group btn-group-sm">
                                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary dropdown-toggle enable-tooltip" data-toggle="dropdown" title="Saving options">
                                    <i class="gi gi-floppy_save"></i> <span class="caret"></span></a>
                                <ul class="dropdown-menu text-left">
                                    <li id="exportNetworkButtonPng"><a href="javascript:void(0)"><i class="fi fi-png pull-right"></i>PNG</a></li>
                                    <li id="exportNetworkButtonJpeg"><a href="javascript:void(0)"><i class="fi fi-jpg pull-right"></i>JPEG</a></li>
                                    <li id="exportNetworkButtonPdf"><a href="javascript:void(0)"><i class="fi fi-pdf pull-right"></i></i>PDF</a></li>
                                    <li id="exportNetworkButtonSvg" class="disabled"><a href="javascript:void(0)"><i class="fi fi-svg pull-right"></i></i>SVG</a></li>
                                    <li id="exportNetworkButtonJson" class="disabled"><a href="javascript:void(0)"><i class="fi fi-xml pull-right"></i>XML/JSON</a></li>
                                </ul>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary enable-tooltip" title="Show/hide" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary enable-tooltip" title="Fullscreen" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
                        </div>
                        <h2>Pathway <strong>Viewer</strong></h2>
                    </div>
                    <!-- END Select Components Title -->

                    <!-- Select Components Content -->
                    <div class="block-content">
                        <!-- Iframe with pathway visualization -->
                        <iframe id="networkIframe" name="networkIframe" class="iframe-network-viewer" frameBorder="0" src="<?php echo HOME_URI . '/resources/networks/ec/' . $network_filename; ?>"></iframe>
                        <!-- END Iframe with pathway visualization -->
                    </div>
                </div>
                <!-- END Pathway Viewer Widget -->
            </div>
        </div>
    </div>
    <!-- END Preview Section -->
</div>
<!-- END Page Content -->

<?php include ABSPATH . '/views/_includes/page_footer.php'; ?>
<?php include ABSPATH . '/views/_includes/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="<?php echo HOME_URI; ?>/assets/js/pages/index.js"></script>


<script type="text/javascript">
    const previewSectionName = 'networkPreviewBlock';
    const maxPreviewPerRow = 4;
    const previewFileBasename = "<?php echo HOME_URI . '/resources/networks/???/' . $network_filename; ?>";

    /** 
     * Plugin to alter a given element property via wildcard
     */
    $.fn.alterClass = function(removals, additions) {
        var self = this;

        if (removals.indexOf('*') === -1) {
            // Use native jQuery methods if there is no wildcard matching
            self.removeClass(removals);
            return !additions ? self : self.addClass(additions);
        }

        var patt = new RegExp('\\s' +
            removals.replace(/\*/g, '[A-Za-z0-9-_]+').split(' ').join('\\s|\\s') +
            '\\s', 'g');

        self.each(function(i, it) {
            var cn = ' ' + it.className + ' ';
            while (patt.test(cn)) {
                cn = cn.replace(patt, ' ');
            }
            it.className = $.trim(cn);
        });

        return !additions ? self : self.addClass(additions);
    };

    /**
     * Function to read the iframe canvas
     */
    let readIframeCanvas = function() {
        // Select the iframe object
        let networkIframe = document.getElementById("networkIframe");

        // Select the canvas inside the iframe object
        let canvas = networkIframe.contentWindow.document.getElementsByTagName("canvas")[0];

        return canvas;
    };

    /**
     * Function to download the exported image
     */
    let downloadImage = function(img_, ext_) {
        // Genetate the downloadable image via link
        let a = $("<a>")
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
    $(document).on("click", "#exportNetworkButtonPng", function() {
        // Read the iframe canvas
        let canvas = readIframeCanvas();

        // Conver the canvas to png image
        let img = canvas.toDataURL("image/png");

        // Download the image
        downloadImage(img, "png");
    });

    // JPEG
    $(document).on("click", "#exportNetworkButtonJpeg", function() {
        // Read the iframe canvas
        let canvas = readIframeCanvas();

        // Conver the canvas to png image
        let img = canvas.toDataURL('image/jpeg', 1.0);

        // Download the image
        downloadImage(img, "jpeg");
    });

    // PDF
    $(document).on("click", "#exportNetworkButtonPdf", function() {
        // Select the iframe object
        let networkIframe = document.getElementById("networkIframe");

        // Select the pdf download button
        let pdfButton = networkIframe.contentWindow.document.getElementsByTagName("button")[0];
        pdfButton.style.visibility = "hidden";

        // Click the pdf donwload button
        pdfButton.click();
    });

    // SVG
    $(document).on("click", "#exportNetworkButtonSvg", function() {
        console.log('SVG exporting not implemented yet...');

        /*// Read the iframe canvas
        let canvas = readIframeCanvas()
        
        // Get the canvas context
        let context = canvas.getContext("2d");

        // Serialize your SVG
        let mySerializedSVG = context.getSerializedSvg(true); //true here, if you need to convert named to numbered entities.

        // If you really need to you can access the shadow inline SVG created by calling:
        let svg = ctx.getSvg();

        let svgString = canvas.outerHTML;
        let dataUrl = 'data:image/svg+xml,'+encodeURIComponent(svgString);
        console.log(dataUrl);*/
    });

    // JSON
    $(document).on("click", "#exportNetworkButtonJson", function() {
        console.log('Json exporting not implemented yet...');
    });

    /**
     * Function to get the selected organisms
     */
    const getSelectedOrgs = function() {
        // Get the number of selected orgs
        return $('#organismChooser option:selected');
    }

    /**
     * Method to create a new grid according to the selected organism
     */
    const createNewPreview = function(org_, idx_) {
        // Clone the preview layout
        const newPreview = document.querySelector('#' + previewSectionName).cloneNode(true);
        const currentRow = Math.ceil((idx_ + 1) / maxPreviewPerRow) - 1;

        // Change the id attribute of the newly created element
        newPreview.setAttribute('id', previewSectionName + idx_);

        // Append the newly created element on element previewSection
        if (idx_ % maxPreviewPerRow == 0) {
            // Create a new row
            const newRow = document.querySelector('#networkPreviewRow').cloneNode(false);

            // Change the id attribute of the newly created element
            const newRowId = 'networkPreviewRow' + currentRow;
            newRow.setAttribute('id', newRowId);

            // Add the row to the preview section
            document.querySelector('#previewSection').appendChild(newRow);

            // Add the preview in the current row
            document.querySelector('#' + newRowId).appendChild(newPreview);
        } else {
            // Add the preview in the current row
            if (currentRow == 0) {
                document.querySelector('#networkPreviewRow').appendChild(newPreview);
            } else {
                document.querySelector('#networkPreviewRow' + currentRow).appendChild(newPreview);
            }
        }

        // Update the preview iframe src
        const previewIframe = document.getElementsByName("networkIframe")[idx];

        if (previewIframe) {
            previewIframe.src = previewFileBasename.replace('???', org_);
        }
    }

    /**
     * Method to remove an existing grid according to its index
     */
    const removePreview = function(idx_) {
        // Remove the preview layout
        document.querySelector('#' + previewSectionName + idx_).remove();
    }

    /**
     * Method to resize the grids according to the number of grids
     */
    const resizeGridLayout = function(previewId_, itensPerRow_) {
        const defaultGrid = 12;
        const newGrid = (defaultGrid / itensPerRow_);

        if ($("#" + previewId_).length) {
            $("#" + previewId_).alterClass('col-md-*', 'col-md-' + newGrid);
        }
    }

    // Handle the org selector change pipeline
    $(document).on("change", "#organismChooser", function(ev_) {
        const selectedOrg = getSelectedOrgs();

        if (selectedOrg.length > 0) {
            // Display the selected pathway(s)
            $('#' + previewSectionName).css('display', 'block');
            $('#customMessageBlock').css('display', 'none');

            // If the number of previews > current orgs selection count, remove it!
            const previews = $('div[name="' + previewSectionName + '"]');

            for (idx = (previews.length - 1); idx > 0; idx--) {
                removePreview(idx);
            }

            // Create the previews
            if (selectedOrg.length == 1) {
                resizeGridLayout(previewSectionName, 1);
            } else {
                for (idx = 1; idx < selectedOrg.length; idx++) {
                    // Create a new preview
                    createNewPreview(selectedOrg[idx].value, idx); // TODO: use the selected org

                    // Count the previews per row
                    const currentRow = Math.ceil((idx + 1) / maxPreviewPerRow) - 1;
                    const previewPerRow = idx < maxPreviewPerRow ? (idx + 1) : (Math.abs(idx - (maxPreviewPerRow * currentRow)) + 1);

                    if (currentRow == 0) {
                        resizeGridLayout(previewSectionName, previewPerRow);
                        resizeGridLayout(previewSectionName + '1', previewPerRow);
                        resizeGridLayout(previewSectionName + '2', previewPerRow);
                        resizeGridLayout(previewSectionName + '3', previewPerRow);
                    } else {
                        resizeGridLayout(previewSectionName + (currentRow * maxPreviewPerRow).toString(), previewPerRow);
                        resizeGridLayout(previewSectionName + (currentRow * maxPreviewPerRow + 1).toString(), previewPerRow);
                        resizeGridLayout(previewSectionName + (currentRow * maxPreviewPerRow + 2).toString(), previewPerRow);
                        resizeGridLayout(previewSectionName + (currentRow * maxPreviewPerRow + 2).toString(), previewPerRow);
                    }
                }
            }
        } else {
            // Display the custom message
            $('#' + previewSectionName).css('display', 'none');
            $('#customMessageBlock').css('display', 'block');
        }
    });

    // Hide the iframe button
    let networkIframe = document.getElementById("networkIframe");

    setTimeout(() => {
        networkIframe.contentWindow.document.getElementsByTagName("button")[0].style.visibility = "hidden"
    }, 3000);
</script>