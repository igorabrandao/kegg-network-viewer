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
        <div class="tab-content">
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
                <table id="example-datatable" class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th ><i class="fa fa-briefcase"></i> PATHWAY</th>
                            <th class="text-center hidden-xs" style="width: 8%;">EUKARYOTES</th>
                            <th class="text-center hidden-xs" style="width: 8%;">PROKARYOTES</th>
                            <th class="text-center hidden-xs" style="width: 8%;">ANIMALS</th>
                            <th class="text-center hidden-xs" style="width: 8%;">PLANTS</th>
                            <th class="text-center hidden-xs" style="width: 8%;">FUNGI</th>
                            <th class="text-center hidden-xs" style="width: 8%;">PROTISTS</th>
                            <th class="text-center hidden-xs" style="width: 8%;">BACTERIA</th>
                            <th class="text-center hidden-xs" style="width: 8%;">ARCHAEA</th>
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
                                    $view_url = HOME_URI . '/pathway_module/viewer?pathwayCode=' . encrypt_decrypt('encrypt', $value["code"]);

                                    // Action buttons
                                    echo "<td>

                                        <h3><a href='" . $view_url . "'><strong>[" . $value["code"] . "] - " . $value["name"] . "</strong></a></h3>
                                        <p>
                                            <a class='label label-default'>" . substr($value['class'], 0, 100) . "</a>
                                        </p>
                                        <p>
                                            <a class='label label-warning'>" . substr($value['module'], 0, 100) . "</a>
                                        </p>
                                        <p><em>" . substr($value['description'], 0, 500)  . "...</em></p>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["eukaryotes_count"] . "</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["prokaryotes_count"] . "</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["animals_count"] . "</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["plants_count"] . "</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["fungi_count"] . "</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["protists_count"] . "</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["bacteria_count"] . "</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>" . $value["archaea_count"] . "</h3>
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