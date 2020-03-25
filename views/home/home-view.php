<?php
    // Get the entire pathways count
    $pathway_count = $pathway_model->get_pathways_count(1);
    $pathway_count_without_network = $pathway_model->get_pathways_count(0);

    // Get the entire pathway list
    $data_value = $pathway_model->get_pathways_list();

    // Get the Top 10 biggest pathways
    $biggest_pathways = $pathway_model->get_pathways_list($has_network_ = 1, $limit_ = 10, $order_by_field_ = "nodes", $order_by_type_ = "DESC");

    // Get the Top 10 pathways with most organisms
    $most_organisms = $pathway_model->get_pathways_list($has_network_ = 1, $limit_ = 10, $order_by_field_ = "total_species", $order_by_type_ = "DESC");

    // Get the pathways with most articulation points
    $most_ap = $pathway_model->get_most_ap($has_network_ = 1, $limit_ = 10, $order_by_type_ = "DESC");

    // Get the Top 10 articulation points (AP) with most impact
    $most_ap_impact = $pathway_model->get_pathways_list($has_network_ = 1, $limit_ = 10, $order_by_field_ = "disconnected_nodes", $order_by_type_ = "DESC");

    // ========================================
    // Prepare the chart data
    // ========================================
    
    $chart_pathway_size = $pathway_model->get_chart_pathway_size();
    $chart_pathway_ap = $pathway_model->get_chart_pathway_ap();
    $chart_pathway_organism = $pathway_model->get_chart_pathway_organisms();
?>

<script type="text/javascript">
    
    // Pass the carts data to the .js file
    var pathway_chart_size_data = <?php echo json_encode($chart_pathway_size); ?>;
    var pathway_chart_ap_data = <?php echo json_encode($chart_pathway_ap); ?>;
    var pathway_chart_organism_data = <?php echo json_encode($chart_pathway_organism); ?>;

</script>

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
            </div>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="<?php echo HOME_URI;?>/assets/img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
    </div>

    <!-- eCommerce Dashboard Header -->
    <div class="content-header">
        <ul class="nav-horizontal text-center">
            <li class="active">
                <a href="<?php echo HOME_URI; ?>"><i class="fa fa-bar-chart"></i> <?php echo $template['initials']; ?> Statistics</a>
            </li>
            <li>
                <a href="<?php echo HOME_URI . '/pathway_module/list'; ?>"><i class="gi gi-list"></i> Pathways list</a>
            </li>
        </ul>
    </div>
    <!-- END eCommerce Dashboard Header -->

    <!-- Quick Stats -->
    <div class="row text-center">
        <div class="col-sm-6 col-lg-4">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background">
                    <h4 class="widget-content-light"><i class="gi gi-share_alt"></i> <strong>Pathways</strong> with visualization</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen"><strong><?php echo $pathway_count; ?></strong></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-4">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>Pathways</strong> without visualization</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen"><?php echo $pathway_count_without_network; ?></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-4">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>Total</strong> number of pathways</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen"><?php echo ($pathway_count + $pathway_count_without_network); ?></span></div>
            </a>
        </div>
    </div>
    <!-- END Quick Stats -->

    <!-- eShop Overview Block -->
    <div class="block full">
        <!-- eShop Overview Title -->
        <div class="block-title">
            <h2><strong>Pathways</strong> Overview</h2>
            <ul class="nav nav-tabs" data-toggle="tabs">
                <li class="active"><a href="#pathway-tabs-size">Number of nodes</a></li>
                <li><a href="#pathway-tabs-ap">Number of Articulation Points (AP)</a></li>
                <li><a href="#pathway-tabs-organisms">Number of associated organisms</a></li>
            </ul>
        </div>
        <!-- END eShop Overview Title -->

        <!-- Tabs Content -->
        <div class="tab-content">
            <!-- Pathway size overview content -->
            <div class="tab-pane active" id="pathway-tabs-size">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div id="pathway-chart-size" style="width: 100%; height: 350px;"></div>
                    </div>
                </div>
            </div>
            <!-- END Pathway size overview content -->

            <!-- Pathway AP overview content -->
            <div class="tab-pane" id="pathway-tabs-ap">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div id="pathway-chart-ap" style="width: 100%; height: 350px;"></div>
                    </div>
                </div>
            </div>
            <!-- END Pathway AP overview content -->

            <!-- Pathway organisms overview content -->
            <div class="tab-pane" id="pathway-tabs-organisms">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div id="pathway-chart-organism" style="width: 100%; height: 350px;"></div>
                    </div>
                </div>
            </div>
            <!-- END Pathway organisms overview content -->
        </div>
        <!-- END Tabs Content -->
    </div>
    <!-- END eShop Overview Block -->

    <!-- Top biggest pathways section -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Latest Orders Block -->
            <div class="block">
                <!-- Latest Orders Title -->
                <div class="block-title">
                    <h2>Top 10 <strong>Biggest Pathways</strong></h2>
                </div>
                <!-- END Latest Orders Title -->

                <!-- Latest Orders Content -->
                <table class="table table-borderless table-striped table-vcenter table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center hidden-xs" style="width: 20%;"><i class="gi gi-share_alt"></i> Code</th>
                            <th class="text-center hidden-xs" style="width: 40%;">Name</th>
                            <th class="text-center" style="width: 20%;">Nodes</th>
                            <th class="text-center" style="width: 20%;">Edges</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Run through posts list
                            foreach ( $biggest_pathways as $value )
                            {
                                // Check if the register exists
                                if ( isset($value["code"]) && strcmp($value["code"], "") != 0 )
                                {
                                    // Init row
                                    echo "<tr>";

                                    // View url
                                    $view_url = HOME_URI . '/pathway_module/viewer?pathwayCode=' . encrypt_decrypt('encrypt', $value["code"]);

                                    // Item informations
                                    echo "
                                        <td class='text-center' style='width: 100px;'><a href='" . $view_url . "'><strong>[" . $value["code"] . "] </strong></a></td>
                                        <td class='text-left' style='width: 100px;'><a href='" . $view_url . "'>" . $value["name"] . "</strong></a></td>
                                        <td class='text-center text-danger'><strong>" . $value["nodes"] . "</strong></td>
                                        <td class='text-center'>" . $value["edges"] . "</td>
                                    ";

                                }
                            }
                        ?>
                    </tbody>
                </table>
                <p style="font-style: italic;"><strong>Note: </strong> in metabolic pathways nodes represent metabolites and edges are reactions that are catalyzed by specific gene products.</p>
                <!-- END Latest Orders Content -->
            </div>
            <!-- END Latest Orders Block -->
        </div>
    </div>
    <!-- END Top biggest pathways section -->

    <!-- Top articulation points section -->
    <div class="row">
        <div class="col-lg-6">
            <!-- Top Pathways Block -->
            <div class="block">
                <!-- Top Pathways Title -->
                <div class="block-title">
                    <h2>Top 10 <strong>Pathways with most Articulation Points (AP)</strong></h2>
                </div>
                <!-- END Top Products Title -->

                <!-- Top Products Content -->
                <table class="table table-borderless table-striped table-vcenter table-bordered">
                <thead>
                        <tr>
                            <th class="text-center" style="width: 15%;"><i class="gi gi-share_alt"></i> Code</th>
                            <th class="text-center" style="width: 30%;">Name</th>
                            <th class="text-center" style="width: 14%;">Total AP (A + B)</th>
                            <th class="text-center hidden-xs" style="width: 11%;">AP (A)</th>
                            <th class="text-center hidden-xs" style="width: 11%;">HAP (B)</th>
                            <th class="text-center hidden-xs" style="width: 9%;">HUB</th>
                            <th class="text-center hidden-xs" style="width: 9%;">Other nodes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Run through posts list
                            foreach ( $most_ap as $value )
                            {
                                // Check if the register exists
                                if ( isset($value["code"]) && strcmp($value["code"], "") != 0 )
                                {
                                    // Init row
                                    echo "<tr>";

                                    // View url
                                    $view_url = HOME_URI . '/pathway_module/viewer?pathwayCode=' . encrypt_decrypt('encrypt', $value["code"]);

                                    // Item informations
                                    echo "
                                        <td class='text-center' style='width: 100px;'><a href='" . $view_url . "'><strong>[" . $value["code"] . "] </strong></a></td>
                                        <td class='text-left' style='width: 100px;'><a href='" . $view_url . "'>" . $value["name"] . "</strong></a></td>
                                        <td class='text-center text-danger'><strong>" . $value["TOTAL_AP"] . "</strong></td>
                                        <td class='text-center'>" . $value["ap_number"] . "</td>
                                        <td class='text-center'>" . $value["hap_number"] . "</td>
                                        <td class='text-center'>" . $value["hub_number"] . "</td>
                                        <td class='text-center'>" . $value["others_number"] . "</td>
                                    ";

                                }
                            }
                        ?>
                    </tbody>
                </table>
                <p style="font-style: italic;"><strong>Note: </strong> 
                    <ul>
                        <li><strong>AP</strong> -> Node classified as Articulation Point</li>
                        <li><strong>HAP</strong> -> Node highly connected and Articulation Point</li>
                        <li><strong>HUB</strong> -> Node highly connected</li>
                        <li><strong>Others</strong> -> Node without classification</li>
                    </ul>
                </p>
                <!-- END Top Pathways Content -->
            </div>
            <!-- END Top Pathways Block -->
        </div>
        <div class="col-lg-6">
            <!-- Top Pathways Block -->
            <div class="block">
                <!-- Top Pathways Title -->
                <div class="block-title">
                    <h2>Top 10 <strong>Articulation Points impact</strong></h2>
                </div>
                <!-- END Top Products Title -->

                <!-- Top Products Content -->
                <table class="table table-borderless table-striped table-vcenter table-bordered">
                <thead>
                        <tr>
                            <th class="text-center hidden-xs" style="width: 15%;"><i class="gi gi-share_alt"></i> Code</th>
                            <th class="text-center hidden-xs" style="width: 40%;">Name</th>
                            <th class="text-center hidden-xs" style="width: 30%;">Articulation Point</th>
                            <th class="text-center hidden-xs" style="width: 15%;">Impact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Run through posts list
                            foreach ( $most_ap_impact as $value )
                            {
                                // Check if the register exists
                                if ( isset($value["code"]) && strcmp($value["code"], "") != 0 )
                                {
                                    // Init row
                                    echo "<tr>";

                                    // View url
                                    $view_url = HOME_URI . '/pathway_module/viewer?pathwayCode=' . encrypt_decrypt('encrypt', $value["code"]);

                                    // Item informations
                                    echo "
                                        <td class='text-center' style='width: 100px;'><a href='" . $view_url . "'><strong>[" . $value["code"] . "] </strong></a></td>
                                        <td class='text-left' style='width: 100px;'><a href='" . $view_url . "'>" . $value["name"] . "</strong></a></td>
                                        <td class='text-center'>" . $value["node_highest_impact"] . "</td>
                                        <td class='text-center text-danger'><strong>" . $value["disconnected_nodes"] . "</strong></td>
                                    ";

                                }
                            }
                        ?>
                    </tbody>
                </table>
                <p style="font-style: italic;"><strong>Note: </strong> the articulation point (AP) impact refers to the number of nodes that are disconnected when the AP is removed.</p>
                <!-- END Top Pathways Content -->
            </div>
            <!-- END Top Pathways Block -->
        </div>
    </div>
    <!-- Top articulation points section -->

    <!-- Top pathways organisms section -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Top Pathways Block -->
            <div class="block">
                <!-- Top Pathways Title -->
                <div class="block-title">
                    <h2>Top 10 <strong>Pathways with most associated organisms</strong></h2>
                </div>
                <!-- END Top Products Title -->

                <!-- Top Products Content -->
                <table class="table table-borderless table-striped table-vcenter table-bordered">
                <thead>
                        <tr>
                            <th class="text-center hidden-xs" style="width: 8%;"><i class="gi gi-share_alt"></i> Code</th>
                            <th class="text-center hidden-xs" style="width: 25%;">Name</th>
                            <th class="text-center hidden-xs" style="width: 8%;">Organisms</th>
                            <th class="text-center hidden-xs" style="width: 8%;">Eukaryotes</th>
                            <th class="text-center hidden-xs" style="width: 8%;">Prokaryotes</th>
                            <th class="text-center hidden-xs" style="width: 8%;">Animals</th>
                            <th class="text-center hidden-xs" style="width: 8%;">Plants</th>
                            <th class="text-center hidden-xs" style="width: 8%;">Fungi</th>
                            <th class="text-center hidden-xs" style="width: 8%;">Protists</th>
                            <th class="text-center hidden-xs" style="width: 8%;">Bacteria</th>
                            <th class="text-center hidden-xs" style="width: 8%;">Archaea</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Run through posts list
                            foreach ( $most_organisms as $value )
                            {
                                // Check if the register exists
                                if ( isset($value["code"]) && strcmp($value["code"], "") != 0 )
                                {
                                    // Init row
                                    echo "<tr>";

                                    // View url
                                    $view_url = HOME_URI . '/pathway_module/viewer?pathwayCode=' . encrypt_decrypt('encrypt', $value["code"]);

                                    // Item informations
                                    echo "
                                        <td class='text-center' style='width: 100px;'><a href='" . $view_url . "'><strong>[" . $value["code"] . "] </strong></a></td>
                                        <td class='text-left' style='width: 100px;'><a href='" . $view_url . "'>" . $value["name"] . "</strong></a></td>
                                        <td class='text-center text-danger'><strong>" . $value["total_species"] . "</strong></td>
                                        <td class='text-center'>" . $value["eukaryotes_count"] . "</td>
                                        <td class='text-center'>" . $value["prokaryotes_count"] . "</td>
                                        <td class='text-center'>" . $value["animals_count"] . "</td>
                                        <td class='text-center'>" . $value["plants_count"] . "</td>
                                        <td class='text-center'>" . $value["fungi_count"] . "</td>
                                        <td class='text-center'>" . $value["protists_count"] . "</td>
                                        <td class='text-center'>" . $value["bacteria_count"] . "</td>
                                        <td class='text-center'>" . $value["archaea_count"] . "</td>
                                    ";

                                }
                            }
                        ?>
                    </tbody>
                </table>
                <!-- END Top Pathways Content -->
            </div>
            <!-- END Top Pathways Block -->
        </div>
    </div>
    <!-- END Top pathways organisms section -->

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
<script src="<?php echo HOME_URI;?>/assets/js/pages/pathwayDashboard.js"></script>
<script>$(function(){ EcomDashboard.init(); });</script>