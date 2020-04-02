<?php
/**
 * modal_kegg_network.php
 *
 * Author: igorbrandao
 *
 * The modal containing the network information
 *
 */
?>

<!-- keggNetwork preview modal -->
<div id="modal-kegg-network-info" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-keggNetwork-dialog">

        <input type="hidden" name="keggNetworkId" id="keggNetworkId" value=""/>

        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-left">
                <h2 id="keggNetworkTitle" class="modal-title">
                </h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- FAQ Content -->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <!-- Iframe with keggNetwork visualization -->
                        <iframe id="keggNetworkIframe" class="iframe-kegg-network-viewer" frameBorder="0" src=""></iframe>
                        <!-- END Iframe with keggNetwork visualization -->
                    </div>
                </div>
                <!-- END FAQ Content -->
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END Modal -->