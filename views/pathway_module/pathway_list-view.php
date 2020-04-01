<?php
    // Remove!!!!
    //$pathway_model->pathway_has_network();

    // Get the entire pathway list
    $data_value = $pathway_model->get_pathways_list();
?>

<!-- Page content -->
<div id="page-content">
    <!-- Search Results Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-search"></i>Pathways List<br>
                <small>Use the list below to find informations about KEGG metabolic pathways. Click on the pathway name to access the network visualization.</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Home page</li>
        <li><a href="">Pathways list</a></li>
    </ul>
    <!-- END Search Results Header -->

    <!-- Search Styles Block -->
    <div class="block">
        <!-- Search Styles Title -->
        <div class="block-title">
            <ul class="nav nav-tabs" data-toggle="tabs">
                <li class="active"><a href="#tab-pathway-list">Pathways</a></li>
            </ul>
        </div>
        <!-- END Search Styles Title -->

        <!-- Search Styles Content -->
        <div class="tab-content" data-step="7" data-intro="This is the pathways list, here you can: <br> 
                    <ul>
                        <li>Search through any column using the textbox;</li>
                        <li>Navigate to other table rows via pagination number;</li>
                        <hr style='margin: 0;'>
                        <li>Access the detail information of a Pathway clicking in the 'PATHWAY' columns;</li>
                    </ul>">
            <!-- Projects Search -->
            <div class="tab-pane active" id="tab-pathway-list">
                <!-- Search Info - Pagination -->
                <div class="block-section clearfix">
                    <ul class="pagination remove-margin">
                        <li class="active"><span><strong><?php echo sizeof($data_value); ?></strong> Pathways found</span></li>
                    </ul>
                </div>
                <!-- END Search Info - Pagination -->

                <!-- Projects Results -->
                <table id="pathways-datatable" class="table table-striped table-vcenter" data-step="8" data-intro="">
                    <thead>
                        <tr>
                            <th ><i class="gi gi-share_alt"></i> PATHWAY</th>
                            <th class="text-center hidden-xs" style="width: 8%;">NODES</th>
                            <th class="text-center hidden-xs" style="width: 8%;">EDGES</th>
                            <th class="text-center hidden-xs" style="width: 8%;">ORGANISMS</th>
                            <th class="text-center hidden-xs" style="width: 8%;">COMMUNITIES</th>
                            <th class="text-center hidden-xs" style="width: 8%;">AVG. DEGREE</th>
                            <th class="text-center hidden-xs" style="width: 8%;">AVG. BETWEENNESS</th>
                            <th class="text-center hidden-xs" style="width: 10%;">ARTICULATION POINTS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Run through posts list
                            foreach ( $data_value as $value )
                            {
                                // Check if the register exists
                                if ( isset($value["code"]) && strcmp($value["code"], "") != 0 )
                                {
                                    // Initialize auxiliar variables
                                    $is_active = "";

                                    // Init row
                                    echo "<tr>";

                                    // View url
                                    $view_url = HOME_URI . '/pathway_module/viewer?pathwayCode=' . encrypt_decrypt('encrypt', $value["code"]) . '#network-preview';

                                    // Item informations
                                    echo "<td>

                                        <h3><a href='" . $view_url . "'><strong>" . $value["code"] . " - " . $value["name"] . "</strong></a></h3>
                                        <p>
                                            <a class='label label-default'><strong>" . substr($value['class'], 0, 100) . "</strong></a>
                                        </p>
                                        <p>
                                            <a class='label label-warning'>" . substr($value['module'], 0, 100) . "</a>
                                        </p>
                                        <p><em>" . substr($value['description'], 0, 500)  . "...</em></p>
                                        <p>
                                            <strong>
                                                Present in:
                                                <span class='text-warning'>" . $value["eukaryotes_count"] . " eukaryotes</span>&nbsp;/&nbsp;
                                                <span class='text-success'>" . $value["prokaryotes_count"] . " prokaryotes</span>
                                            </strong>
                                        </p>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["nodes"] . "</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["edges"] . "</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["total_species"] . "</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["community"] . "</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["mean_degree"] . "</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["mean_betweenness"] . "</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . ($value["ap_number"] + $value["hap_number"]) . "</h3>
                                        </td>
                                    </td>";

                                    // End content row
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <!-- END Projects Results -->
            </div>
            <!-- END Projects Search -->
        </div>
        <!-- END Search Styles Content -->
    </div>
    <!-- END Search Styles Block -->
</div>
<!-- END Page Content -->

<?php include ABSPATH . '/views/_includes/page_footer.php'; ?>
<?php include ABSPATH . '/views/_includes/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="<?php echo HOME_URI;?>/assets/js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>