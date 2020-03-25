/*
 *  Document   : pathwayDashboard.js
 *  Author     : igorbrandao
 *  Description: Custom javascript code used in pathway Dashboard page
 */

var EcomDashboard = function() {

    return {
        init: function() {
            // =======================
            // PATHWAY CHART SIZE
            // =======================

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
                        label: 'Pathways',
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
        }
    };
}();