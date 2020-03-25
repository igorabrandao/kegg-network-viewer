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

<!-- Protein details modal -->
<div id="modal-protein-info" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-protein-dialog">

        <input type="hidden" name="proteinId" id="proteinId" value=""/>

        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-left">
                <h2 id="proteinTitle" class="modal-title">
                </h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- FAQ Content -->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <!-- Iframe with protein visualization -->
                        <iframe id="proteinIframe" class="iframe-protein-viewer" frameBorder="0" src=""></iframe>
                        <!-- END Iframe with protein visualization -->
                    </div>
                </div>
                <!-- END FAQ Content -->
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END Modal -->