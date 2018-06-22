<script type="text/javascript">

    window.onload = function () {
        var chart_data = {!! json_encode($data->transactions) !!}
        var id_data = 'chartContainer'
        var credit_points = [];
        var debit_points = [];

        for(var i=0;i<chart_data.length;i++){

            if(chart_data[i].type === 0){
                credit_points.push({x:new Date(chart_data[i].date.replace("-",", ")),y:chart_data[i].price});
            }else if(chart_data[i].type === 1){
                debit_points.push({x:new Date(chart_data[i].date.replace("-",", ")),y:chart_data[i].price});
            }
        }
        //debit_points = credit_points;
        console.log(credit_points);
        console.log(debit_points);

        var chart = new CanvasJS.Chart(id_data, {
            title: {
                text: "{!! $data->title !!}",
                fontSize: 30
            },
            animationEnabled: true,
            axisX: {
                gridColor: "silver",
                tickColor: "silver",
                valueFormatString: "YYYY-MM-DD"
            },
            toolTip: {
                shared: true
            },
            theme: "theme1",
            axisY: {
                gridColor: "Silver",
                tickColor: "silver"
            },
            legend: {
                verticalAlign: "center",
                horizontalAlign: "right"
            },
            data: [

                {
                    type: "area",
                    showInLegend: true,
                    lineThickness: 2,
                    name: "Debit",
                    markerType: "circle",
                    color: "red",
                    dataPoints: debit_points
                },

                {
                    type: "area",
                    showInLegend: true,
                    lineThickness: 2,
                    name: "Credit",
                    markerType: "circle",
                    color: "green",
                    dataPoints: credit_points
                 }

            ],
            legend: {
                cursor: "pointer",
                itemclick: function (e) {
                    console.log("sdfsdf")
                    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    }
                    else {
                        e.dataSeries.visible = true;
                    }
                    chart.render();
                }
            }
        });

        chart.render();
    }


</script>