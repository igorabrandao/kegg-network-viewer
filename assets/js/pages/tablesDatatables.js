/*
 *  Document   : tablesDatatables.js
 *  Author     : igorbrandao
 *  Description: Custom javascript code used in Tables Datatables page
 */

var TablesDatatables = function() {

    return {
        init: function() {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();

            /* Initialize Datatables */
            var table = $('#example-datatable').dataTable({
                columnDefs: [ { orderable: false, targets: [ 1, 5 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, 50, 100, 250, -1], [10, 20, 30, 50, 100, 250, 'All']],
                dom: "<'row'<'col-sm-3'l><'col-sm-3'f><'col-sm-6'p>>" + 
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                language: {
                    "lengthMenu": "Display _MENU_ pathways per page",
                    "zeroRecords": "No pathways found",
                    "info": "Showing page _PAGE_ of _PAGES_",
                    "infoEmpty": "No pathways available",
                    "infoFiltered": "(filtered from _MAX_ total pathways)"
                },
                bScrollInfinite: true,
                bScrollCollapse: true
            });

            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Search in pathways list...');
        }
    };
}();