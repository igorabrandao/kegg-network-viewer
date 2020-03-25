/*
 *  Document   : pathwayDashboard.js
 *  Author     : igorbrandao
 *  Description: Custom javascript code used in pathway Dashboard page
 */

var EcomDashboard = function() {

    return {
        init: function() {
            // ==============================================
            // PATHWAY CHART SIZE (BAR)
            // ==============================================

            // Get the elements where we will attach the charts
            var pathwayChartSize = $('#pathway-chart-size');
            var pathwayChartSizeNodes = [];
            var pathwayChartSizeEdges = [];
            var pathwayChartSizeCodes = [];

            for (var i = 0; i < pathway_chart_size_data.length; i++) {
                pathwayChartSizeNodes.push([i, pathway_chart_size_data[i]["nodes"]]);
                pathwayChartSizeEdges.push([i, pathway_chart_size_data[i]["edges"]]);
                pathwayChartSizeCodes.push([i, pathway_chart_size_data[i]["code"]]);
            }

            // Overview Chart
            $.plot(pathwayChartSize,
                [
                    {
                        label: 'Pathways node size',
                        data: pathwayChartSizeNodes,
                        bars: {show: true, lineWidth: 0, fillColor: {colors: [{opacity: 0.5}, {opacity: 0.5}]}}
                    }
                ],
                {
                    colors: ['#178F89'],
                    legend: {show: true, position: 'nw', margin: [15, 10]},
                    yaxis: {ticks: 4, tickColor: '#eeeeee'},
                    xaxis: {
                        ticks: pathwayChartSizeCodes,
                        tickColor: '#ffffff',
                        axisLabelUseCanvas: true,
                        show: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'arial,sans-serif',
                        axisLabelPadding: 100,
                        rotateTicks: 135
                    },
                    grid: {
                        borderWidth: 0,
                        hoverable: true,
                        clickable: true
                        //mouseActiveRadius: 30  //specifies how far the mouse can activate an item
                    },
                }
            );

            // Creating and attaching a tooltip to the classic chart
            var previousPoint = null, ttlabel = null;
            pathwayChartSize.on('plothover', function(event, pos, item) {
                // Check if the item is on hover
                if (item) {
                    if (previousPoint !== item.dataIndex) {
                        previousPoint = item.dataIndex;

                        // Remove the previous tooltip
                        $('#chart-tooltip').remove();

                        // Get tge bar information
                        var x = item.datapoint[0], y = item.datapoint[1];

                        // Generate the new tooltip
                        ttlabel = 'Pathway: <strong>' + pathwayChartSizeCodes[x][1] + '</strong><br>' +
                            'Nodes: <strong>' + pathwayChartSizeNodes[x][1] + '</strong><br>' +
                            'Edges: <strong>' + pathwayChartSizeEdges[x][1] + '</strong>';

                        // Append the tooltip into the chart
                        $('<div id="chart-tooltip" class="chart-tooltip">' + ttlabel + '</div>')
                            .css({top: item.pageY - 45, left: item.pageX + 5}).appendTo("body").show();
                    }
                }
                else {
                    $('#chart-tooltip').remove();
                    previousPoint = null;
                }
            });

            // ==============================================
            // PATHWAY CHART AP (BAR)
            // ==============================================

            // Get the elements where we will attach the charts
            var pathwayChartAP = $('#pathway-chart-ap');
            var pathwayChartNodeApTotal = [];
            var pathwayChartNodeAp = [];
            var pathwayChartNodeHap = [];
            var pathwayChartNodeHub = [];
            var pathwayChartNodeOthers = [];
            var pathwayChartCodesAp = [];

            for (var i = 0; i < pathway_chart_ap_data.length; i++) {
                pathwayChartNodeApTotal.push([i, pathway_chart_ap_data[i]["TOTAL_AP"]]);
                pathwayChartNodeAp.push([i, pathway_chart_ap_data[i]["ap_number"]]);
                pathwayChartNodeHap.push([i, pathway_chart_ap_data[i]["hap_number"]]);
                pathwayChartNodeHub.push([i, pathway_chart_ap_data[i]["hub_number"]]);
                pathwayChartNodeOthers.push([i, pathway_chart_ap_data[i]["others_number"]]);
                pathwayChartCodesAp.push([i, pathway_chart_ap_data[i]["code"]]);
            }

            // Overview Chart
            $.plot(pathwayChartAP,
                [
                    {
                        label: 'Pathways articulation points count',
                        data: pathwayChartNodeApTotal,
                        bars: {show: true, lineWidth: 0, fillColor: {colors: [{opacity: 0.5}, {opacity: 0.5}]}}
                    }
                ],
                {
                    colors: ['#ED553B'],
                    legend: {show: true, position: 'nw', margin: [15, 10]},
                    yaxis: {ticks: 4, tickColor: '#eeeeee'},
                    xaxis: {
                        ticks: pathwayChartCodesAp,
                        tickColor: '#ffffff',
                        axisLabelUseCanvas: true,
                        show: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'arial,sans-serif',
                        axisLabelPadding: 100,
                        rotateTicks: 135
                    },
                    grid: {
                        borderWidth: 0,
                        hoverable: true,
                        clickable: true
                        //mouseActiveRadius: 30  //specifies how far the mouse can activate an item
                    },
                }
            );

            // Creating and attaching a tooltip to the classic chart
            var previousPoint = null, ttlabel = null;
            pathwayChartAP.on('plothover', function(event, pos, item) {
                // Check if the item is on hover
                if (item) {
                    if (previousPoint !== item.dataIndex) {
                        previousPoint = item.dataIndex;

                        // Remove the previous tooltip
                        $('#chart-tooltip').remove();

                        // Get tge bar information
                        var x = item.datapoint[0], y = item.datapoint[1];

                        // Generate the new tooltip
                        ttlabel = 'Pathway: <strong>' + pathwayChartCodesAp[x][1] + '</strong><br>' +
                            'Total APs: <strong>' + pathwayChartNodeApTotal[x][1] + '</strong><br>' +
                            'Nodes AP: <strong>' + pathwayChartNodeAp[x][1] + '</strong><br>' +
                            'Nodes HAP: <strong>' + pathwayChartNodeHap[x][1] + '</strong><br>' +
                            'Nodes HUB: <strong>' + pathwayChartNodeHub[x][1] + '</strong><br>' +
                            'Nodes others: <strong>' + pathwayChartNodeOthers[x][1] + '</strong>';

                        // Append the tooltip into the chart
                        $('<div id="chart-tooltip" class="chart-tooltip">' + ttlabel + '</div>')
                            .css({top: item.pageY - 45, left: item.pageX + 5}).appendTo("body").show();
                    }
                }
                else {
                    $('#chart-tooltip').remove();
                    previousPoint = null;
                }
            });

            // ==============================================
            // PATHWAY CHART ORGANISM (BAR)
            // ==============================================

            // Get the elements where we will attach the charts
            var pathwayChartOrganism = $('#pathway-chart-organism');
            var pathwayChartOrgTotal = [];
            var pathwayChartOrgEukaryotes = [];
            var pathwayChartOrgProkaryotes = [];
            var pathwayChartOrgAnimals = [];
            var pathwayChartOrgPlants = [];
            var pathwayChartOrgFungi = [];
            var pathwayChartOrgProtists = [];
            var pathwayChartOrgbacteria = [];
            var pathwayChartOrgArchaea = [];
            var pathwayChartOrgCode = [];

            for (var i = 0; i < pathway_chart_organism_data.length; i++) {
                pathwayChartOrgTotal.push([i, pathway_chart_organism_data[i]["total_species"]]);
                pathwayChartOrgEukaryotes.push([i, pathway_chart_organism_data[i]["eukaryotes_count"]]);
                pathwayChartOrgProkaryotes.push([i, pathway_chart_organism_data[i]["prokaryotes_count"]]);
                pathwayChartOrgAnimals.push([i, pathway_chart_organism_data[i]["animals_count"]]);
                pathwayChartOrgPlants.push([i, pathway_chart_organism_data[i]["plants_count"]]);
                pathwayChartOrgFungi.push([i, pathway_chart_organism_data[i]["fungi_count"]]);
                pathwayChartOrgProtists.push([i, pathway_chart_organism_data[i]["protists_count"]]);
                pathwayChartOrgbacteria.push([i, pathway_chart_organism_data[i]["bacteria_count"]]);
                pathwayChartOrgArchaea.push([i, pathway_chart_organism_data[i]["archaea_count"]]);
                pathwayChartOrgCode.push([i, pathway_chart_ap_data[i]["code"]]);
            }

            // Overview Chart
            $.plot(pathwayChartOrganism,
                [
                    {
                        label: 'Pathways associated organisms count',
                        data: pathwayChartOrgTotal,
                        bars: {show: true, lineWidth: 0, fillColor: {colors: [{opacity: 0.5}, {opacity: 0.5}]}}
                    }
                ],
                {
                    colors: ['#173F5F'],
                    legend: {show: true, position: 'nw', margin: [15, 10]},
                    yaxis: {ticks: 4, tickColor: '#eeeeee'},
                    xaxis: {
                        ticks: pathwayChartOrgCode,
                        tickColor: '#ffffff',
                        axisLabelUseCanvas: true,
                        show: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'arial,sans-serif',
                        axisLabelPadding: 100,
                        rotateTicks: 135
                    },
                    grid: {
                        borderWidth: 0,
                        hoverable: true,
                        clickable: true
                        //mouseActiveRadius: 30  //specifies how far the mouse can activate an item
                    },
                }
            );

            // Creating and attaching a tooltip to the classic chart
            var previousPoint = null, ttlabel = null;
            pathwayChartOrganism.on('plothover', function(event, pos, item) {
                // Check if the item is on hover
                if (item) {
                    if (previousPoint !== item.dataIndex) {
                        previousPoint = item.dataIndex;

                        // Remove the previous tooltip
                        $('#chart-tooltip').remove();

                        // Get tge bar information
                        var x = item.datapoint[0], y = item.datapoint[1];

                        // Generate the new tooltip
                        ttlabel = 'Pathway: <strong>' + pathwayChartCodesAp[x][1] + '</strong><br>' +
                            '<br>' +
                            'Eukaryotes: <strong>' + pathwayChartOrgEukaryotes[x][1] + '</strong><br>' +
                            'Prokaryotes: <strong>' + pathwayChartOrgProkaryotes[x][1] + '</strong><br>' +
                            'Total organisms: <strong>' + pathwayChartOrgTotal[x][1] + '</strong><br>' +
                            '<hr style="margin: 0;"><br>' +
                            'Animals: <strong>' + pathwayChartOrgAnimals[x][1] + '</strong><br>' +
                            'Plants: <strong>' + pathwayChartOrgPlants[x][1] + '</strong><br>' +
                            'Fungi: <strong>' + pathwayChartOrgFungi[x][1] + '</strong><br>' +
                            'Protists: <strong>' + pathwayChartOrgProtists[x][1] + '</strong><br>' +
                            'Bacteria: <strong>' + pathwayChartOrgbacteria[x][1] + '</strong><br>' +
                            'Archaea: <strong>' + pathwayChartOrgArchaea[x][1] + '</strong>';

                        // Append the tooltip into the chart
                        $('<div id="chart-tooltip" class="chart-tooltip">' + ttlabel + '</div>')
                            .css({top: item.pageY - 45, left: item.pageX + 5}).appendTo("body").show();
                    }
                }
                else {
                    $('#chart-tooltip').remove();
                    previousPoint = null;
                }
            });
        }
    };
}();