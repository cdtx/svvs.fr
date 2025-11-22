
;(function( $, window, document, undefined ) {

    $(document).ready(function() {

        if( $.plot ) {
            var PageViews = [],
                Sales = [];
            for (var i = 0; i <= 31; i++) {
                PageViews.push([i, 100 + Math.floor((Math.random() < 0.5 ? -1 : 1) * Math.random() * 25)]);
                Sales.push([i, 60 + Math.floor((Math.random() < 0.5 ? -1 : 1) * Math.random() * 40)]);
            }

            var data = [{
                data: PageViews,
                label: "Page Views",
                color: "#c75d7b"
            }, {
                data: Sales,
                label: "Sales",
                color: "#c5d52b"
            }];

            var plot = $.plot($("#mws-dashboard-chart"), data, {
                series: {
                    lines: {
                        show: true
                    },
                    points: {
                        show: true
                    }
                },
                tooltip: true,
                grid: {
                    hoverable: true,
                    borderWidth: 0
                }
            });
        }

        if( $.fn.wizard ) {
            $('#mws-wizard-form').wizard({
                element: 'fieldset', 
                buttonContainerClass: 'mws-button-row'
            });
        }

        // Data Tables
        if( $.fn.dataTable ) {
            $(".mws-datatable").dataTable({
                "aoColumns": [
                    null, 
                    null,
                    null, 
                    null, 
                    null, 
                    { "bSortable": false }
                ]
            });
        }
    });

}) (jQuery, window, document);