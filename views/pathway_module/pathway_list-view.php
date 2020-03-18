<!-- Page content -->
<div id="page-content">
    <!-- Search Results Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-search"></i>Pathways List<br>
                <small>Use the list below to find informations about KEGG metabolic pathways</small>
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
                <li class="active"><a href="#tab-pathway-list">Projects</a></li>
            </ul>
        </div>
        <!-- END Search Styles Title -->

        <!-- Search Styles Content -->
        <div class="tab-content">
            <!-- Projects Search -->
            <div class="tab-pane active" id="tab-pathway-list">
                <!-- Search Info - Pagination -->
                <div class="block-section clearfix">
                    <ul class="pagination remove-margin pull-right">
                        <li class="disabled"><a href="javascript:void(0)"><i class="fa fa-chevron-left"></i></a></li>
                        <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                    <ul class="pagination remove-margin">
                        <li class="active"><span><strong>10</strong> Results</span></li>
                    </ul>
                </div>
                <!-- END Search Info - Pagination -->

                <!-- Projects Results -->
                <table class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th><i class="fa fa-briefcase"></i> PATHWAY</th>
                            <th class="text-center hidden-xs" style="width: 20%;">TICKETS</th>
                            <th class="text-center hidden-xs" style="width: 20%;">SALES</th>
                            <th class="text-center" style="min-width: 120px; width: 20%;">EARNINGS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <h3><a href="javascript:void(0)"><strong>Freelancer Web Application</strong></a></h3>
                                <p>
                                    <a href="page_ready_user_profile.php" class="label label-default"><i class="fa fa-user"></i> Paul Porter</a>
                                    <a href="javascript:void(0)" class="label label-warning">PHP</a>
                                </p>
                                <p><em>Integer fermentum tincidunt auctor. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. </em></p>
                            </td>
                            <td class="text-center hidden-xs">
                                <h3 class="animation-pullDown">45</h3>
                            </td>
                            <td class="text-center hidden-xs">
                                <h3 class="animation-pullDown">3.265</h3>
                            </td>
                            <td class="text-center">
                                <h3 class="animation-pullDown text-success"><strong>$ 51.350</strong></h3>
                            </td>
                        </tr>
                        <?php
                            // Get the entire pathway list
                            $data_value = $pathway_model->get_pathways_list();

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
                                    $view_url = HOME_URI . '/pathway_module/list?pathwayCode=' . encrypt_decrypt('encrypt', $value["code"]);

                                    // Action buttons
                                    echo "<td>

                                        <h3><a href=''><strong>[" . $value["code"] . "] - " . $value["name"] . "</strong></a></h3>
                                        <p>
                                            <a class='label label-default'><i class='fa fa-user'></i> " . $value['class'] . "</a>
                                            <a class='label label-warning'>" . $value['pathway_map'] . "</a>
                                        </p>
                                            <p><em>" . substr($value['description'], 0, 150)  . "...</em></p>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>45</h3>
                                        </td>
                                        <td class='text-center hidden-xs'>
                                            <h3 class='animation-pullDown'>3.265</h3>
                                        </td>
                                        <td class='text-center'>
                                            <h3 class='animation-pullDown text-success'><strong>$ 51.350</strong></h3>
                                        </td>

                                        <button type='button' class='btn bg-info waves-effect' title='Visualizar [" . $value["TITULO"] . "]' onClick='location.href = \"$view_url\";'>
                                            <i class='material-icons'>remove_red_eye</i>
                                        </button>
                                        <button type='button' class='btn bg-warning waves-effect' title='Editar [" . $value["TITULO"] . "]' onClick='location.href = \"$edit_url\";'>
                                            <i class='material-icons'>create</i>
                                        </button>
                                        <button type='button' class='btn bg-danger waves-effect' title='Remover [" . $value["TITULO"] . "]' onClick='deletepost(" . $value["ID_POST"] . ");'>
                                            <i class='material-icons'>clear</i>
                                        </button>

                                    </td>";


                                    // EMPLOYEE'S IMAGE
                                    if ( strcmp($value["FOTO"], "") != 0 )
                                    {
                                        echo "<td style='text-align: center;' title='" . $value["TITULO"] . "' >
                                        <img style='height: 75px;' alt='" . $value["TITULO"] . "' title='" . $value["TITULO"] . "' 
                                        src='" . HOME_URI . "/resources/posts/" . $value["ID_POST"] . "/" . file_basename($value["FOTO"]) . "." . file_ext($value["FOTO"]) . "' />
                                        </td>";
                                    }
                                    else
                                    {
                                        echo "<td style='text-align: center;' title='" . $value["TITULO"] . "' >
                                        <img style='height: 75px;' alt='" . $value["TITULO"] . "' title='" . $value["TITULO"] . "' 
                                        src='" . HOME_URI . "/assets/images/animation-bg.jpg' />
                                        </td>";
                                    }

                                    // Post title
                                    echo "<td style='text-align: center;' title='" . $value["TITULO"] . "'>" . $value["TITULO"] . "</td>";

                                    // Post subtitle
                                    echo "<td style='text-align: center;' title='" . $value["SUBTITULO"] . "'>" . $value["SUBTITULO"] . "</td>";

                                    // Post timestamp
                                    echo "<td style='text-align: center;' title='" . $value["TIMESTAMP"] . "'>" . $value["TIMESTAMP"] . "</td>";

                                    // Post category
                                    echo "<td style='text-align: center;' title='" . $value["CATEGORIA"] . "'>" . $value["CATEGORIA"] . "</td>";

                                    // Is active
                                    if ( strcmp($value["DATA_FECHA"], "") == 0 )
                                    {
                                        $is_active = "ATIVO";
                                    }
                                    else
                                    {
                                        $is_active = "INATIVO";
                                    }

                                    echo "<td style='text-align: center;' title='" . $is_active . "'>" . $is_active . "</td>";

                                    // End content row
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <!-- END Projects Results -->

                <!-- Bottom Navigation -->
                <div class="block-section text-right">
                    <ul class="pagination remove-margin">
                        <li class="disabled"><a href="javascript:void(0)"><i class="fa fa-chevron-left"></i></a></li>
                        <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
                <!-- END Bottom Navigation -->
            </div>
            <!-- END Projects Search -->
        </div>
        <!-- END Search Styles Content -->
    </div>
    <!-- END Search Styles Block -->
</div>
<!-- END Page Content -->