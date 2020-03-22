<?php
/**
 * modal_network.php
 *
 * Author: igorbrandao
 *
 * The modal containing the network information
 *
 */
?>

<!-- Network details modal -->
<div id="modal-network-info" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="gi gi-share_alt"></i> 
                    <?php echo $pathway_info["code"] . ' - ' . $pathway_info["name"]; ?>
                </h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- FAQ Content -->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <!-- Intro Content -->
                        <h3 class="sub-header"><strong>Pathway details</strong></h3>
                        <div id="faq1" class="panel-group">
                            <div class="panel panel-default-dark">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q1">Network metrics</a></h4>
                                </div>
                                <div id="faq1_q1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table id="network-metrics" class="table table-striped table-vcenter">
                                            <thead>
                                                <tr>
                                                <th class="text-center" style="width: 50%;">Nodes</th>
                                                <th class="text-center" style="width: 50%;">Edges</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="info">
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["nodes"]; ?></h3>
                                                    </td>
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["edges"]; ?></h3>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <table id="network-metrics2" class="table table-striped table-vcenter">
                                            <thead>
                                                <tr>
                                                <th class="text-center" style="width: 50%;">Articulation point with highest impact</th>
                                                <th class="text-center" style="width: 50%;">Disconnected nodes when remove it</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="active">
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["node_highest_impact"]; ?></h3>
                                                    </td>
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["disconnected_nodes"]; ?></h3>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <table id="network-metrics3" class="table table-striped table-vcenter">
                                            <tr>
                                                <thead>
                                                    <th class="text-center" colspan="4" style="width: 100%;">Global metrics</th>
                                                </thead>
                                            </tr>
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 33%;">Communities</th>
                                                    <th class="text-center" style="width: 33%;">Avg. degree</th>
                                                    <th class="text-center" style="width: 33%;">Avg. betweenness</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="warning">
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["community"]; ?></h3>
                                                    </td>
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["mean_degree"]; ?></h3>
                                                    </td>
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["mean_betweenness"]; ?></h3>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <table id="network-metrics4" class="table table-striped table-vcenter">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="4" style="width: 100%;">Nodes classification</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" style="width: 25%;">Articulation points (AP)</th>
                                                    <th class="text-center" style="width: 25%;">Hub & AP</th>
                                                    <th class="text-center" style="width: 25%;">Hubs</th>
                                                    <th class="text-center" style="width: 25%;">Other nodes</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="danger">
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["ap_number"]; ?></h3>
                                                    </td>
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["hap_number"]; ?></h3>
                                                    </td>
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["hub_number"]; ?></h3>
                                                    </td>
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["others_number"]; ?></h3>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default-dark">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q2">Description</a></h4>
                                </div>
                                <div id="faq1_q2" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p><?php echo $pathway_info["description"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default-dark">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q3">Class</a></h4>
                                </div>
                                <div id="faq1_q3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php echo $pathway_info["class"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default-dark">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q4">Map</a></h4>
                                </div>
                                <div id="faq1_q4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php echo $pathway_info["pathway_map"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default-dark">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q5">Module</a></h4>
                                </div>
                                <div id="faq1_q5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php echo $pathway_info["module"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default-dark">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q6">Associated diseases</a></h4>
                                </div>
                                <div id="faq1_q6" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php echo $pathway_info["disease"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default-dark">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q7">Associated organisms count</a></h4>
                                </div>
                                <div id="faq1_q7" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table id="organism-count" class="table table-striped table-vcenter">
                                            <thead>
                                                <tr>
                                                    <th style="width: 100%;" class="text-center">Total organisms</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="info">
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["total_species"]; ?></h3>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table id="organism-count1" class="table table-striped table-vcenter">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50%;" class="text-center">Eukaryotes</th>
                                                    <th style="width: 50%;" class="text-center">Prokaryotes</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="warning">
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["eukaryotes_count"]; ?></h3>
                                                    </td>
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["prokaryotes_count"]; ?></h3>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table id="organism-count2" class="table table-striped table-vcenter">
                                            <thead>
                                                <tr>
                                                <th class="text-center" style="width: 16%;">Animals</th>
                                                <th class="text-center" style="width: 16%;">Plants</th>
                                                <th class="text-center" style="width: 16%;">Fungi</th>
                                                <th class="text-center" style="width: 16%;">Protists</th>
                                                <th class="text-center" style="width: 16%;">Bacteria</th>
                                                <th class="text-center" style="width: 16%;">Archaea</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="active">
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["animals_count"]; ?></h3>
                                                    </td>
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["plants_count"]; ?></h3>
                                                    </td>
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["fungi_count"]; ?></h3>
                                                    </td>
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["protists_count"]; ?></h3>
                                                    </td>
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["bacteria_count"]; ?></h3>
                                                    </td>
                                                    <td class='text-center hidden-xs'>
                                                        <h3 class='animation-pullDown'><?php echo $pathway_info["archaea_count"]; ?></h3>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default-dark">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q8">DBLinks</a></h4>
                                </div>
                                <div id="faq1_q8" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php echo $pathway_info["dblinks"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default-dark">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q9">KO pathway</a></h4>
                                </div>
                                <div id="faq1_q9" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php echo $pathway_info["ko_pathway"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default-dark">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q10">References</a></h4>
                                </div>
                                <div id="faq1_q10" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php echo $pathway_info["reference"]; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Intro Content -->
                    </div>
                </div>
                <!-- END FAQ Content -->
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END Modal -->