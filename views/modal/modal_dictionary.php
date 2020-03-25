<?php
/**
 * modal_dictionary.php
 *
 * Author: igorbrandao
 *
 * The modal containing the common terms information
 *
 */
?>

<!-- Dictionary modal -->
<div id="modal-dictionary" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-left">
                <h2 id="proteinTitle" class="modal-title">
                    <i class="gi gi-book"></i> Common Terms
                </h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Dictionary Content -->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <p>In the table below, you'll find the most used terms in this tool:</p>

                        <!-- Dictionary table -->
                        <table id="dictionary-datatable" class="table table-borderless table-striped table-vcenter table-bordered" style="font-size: 15px;">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 30%;">Term</th>
                                    <th class="text-center" style="width: 70%;">Meaning</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-left">
                                        <strong>Metabolic pathway</strong>
                                    </td>
                                    <td class="text-left">
                                        In biochemistry, a metabolic pathway is a linked series of chemical reactions occurring within a cell.
                                        The term network is sometimes defined to mean a graph in which attributes (e.g. names) are associated with the 
                                        vertices and edges, and the subject that expresses and understands the real-world systems as a network is called network science.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <strong>Network/Graphs</strong>
                                    </td>
                                    <td class="text-left">
                                        In mathematics, graph theory is the study of graphs, which are mathematical structures used to model pairwise relations between objects.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <strong>Network visualization</strong>
                                    </td>
                                    <td class="text-left">
                                        Graph visualization is a way of representing structural information as diagrams of abstract graphs and networks. 
                                        It has important applications in networking, bioinformatics, software engineering, database and web design, 
                                        machine learning, and in visual interfaces for other technical domains.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <strong>Node</strong>
                                    </td>
                                    <td class="text-left">
                                        In mathematics, and more specifically in graph theory, a vertex (plural vertices) or node is the fundamental 
                                        unit of which graphs are formed.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <strong>Edge</strong>
                                    </td>
                                    <td class="text-left">
                                        For an undirected graph, an unordered pair of nodes that specify a line joining these two nodes are said to form 
                                        an edge. For a directed graph, the edge is an ordered pair of nodes. The terms "arc," "branch," "line," "link," 
                                        and "1-simplex" are sometimes used instead of edge.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <strong>KEGG</strong>
                                    </td>
                                    <td class="text-left">
                                        KEGG: Kyoto Encyclopedia of Genes and Genomes is a Japanese database resource for understanding high-level functions and utilities of the biological system, 
                                        such as the cell, the organism and the ecosystem, from molecular-level information, especially large-scale molecular 
                                        datasets generated by genome sequencing and other high-throughput experimental technologies.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <strong>KEGG Pathway</strong>
                                    </td>
                                    <td class="text-left">
                                        KEGG PATHWAY is a collection of manually drawn pathway maps representing the knowledge on the molecular interaction, reaction and relation.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <strong>Pathway code</strong>
                                    </td>
                                    <td class="text-left">
                                        Each pathway map is identified by the combination of 2-4 letter prefix code and 5 digit number.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <strong>Articulation point</strong>
                                    </td>
                                    <td class="text-left">
                                        In a graph, a vertex is called an articulation point if removing it and all the edges associated with it 
                                        results in the increase of the number of connected components in the graph.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <strong>Articulation point impact</strong>
                                    </td>
                                    <td class="text-left">
                                        The impact is defined as the number of vertices that get disconnected from the main (largest) surviving 
                                        connected component after the removal of the articulation point node.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <strong>AP node</strong>
                                    </td>
                                    <td class="text-left">
                                        AP is the abbreviation for Articulation point.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <strong>HAP node</strong>
                                    </td>
                                    <td class="text-left">
                                        AP is the abbreviation for Hub and Articulation point.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <strong>HUB node</strong>
                                    </td>
                                    <td class="text-left">
                                        In network science, a hub is a node with a number of links that greatly exceeds the average.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <strong>Other nodes</strong>
                                    </td>
                                    <td class="text-left">
                                        In the context of this tool, other nodes represent nodes without classification.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- END Dictionary table -->
                    </div>
                </div>
                <!-- END Dictionary Content -->
            </div>
            <!-- END Modal Body -->
        </div>
        <!-- END Modal Content -->
    </div>
</div>
<!-- END Modal -->