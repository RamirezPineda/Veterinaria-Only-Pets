(async () => { 
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };


    const dataSerie4 = await fetch(`${urlBase}/api/getTotalVentasPorServicio`,
            requestOptions)
        .then(response => response.json())

    const drilldownSeries4 = await fetch(`${urlBase}/api/getVentasPorServicio`,
            requestOptions)
        .then(response => response.json());

       const char4  = Highcharts.chart('grafico4', {
            chart: {
                type: 'line'
            },
            title: {
                text: ''
            },
            xAxis: {
                type: 'category'
            },
        
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
        
            series: [{
                name: 'cantidad ventas',
                color: "#ff8882",
                data: dataSerie4[0]
            }, {
                name: 'ganancia ventas',
                color: "#2caffe",
                data: dataSerie4[1],
            }],
            drilldown: {
                allowPointDrilldown: false,
                series: drilldownSeries4,
                
            }
        });

        cambiarTipoGrafico('botonColumnaGrafico4', 'column', char4);
        cambiarTipoGrafico('botonBarraGrafico4', 'bar',   char4);
        cambiarTipoGrafico('botonLineaGrafico4', 'line', char4);
} )();