(async () => {

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

      
      

    const dataSerie6 = await fetch(`${urlBase}/api/getCantidadTotalServicioPorRaza`,
            requestOptions)
        .then(response => response.json())

    const drilldownSeries6 = await fetch(`${urlBase}/api/getCantidadServicioPorRaza`, requestOptions)
    .then(response => response.json())


     Highcharts.chart('grafico6', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Cantidad de Servicios'
                }
    
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
                name: 'cantidad de Servicios',
                colorByPoint: true,
                data: dataSerie6
            },],
            drilldown: {
                
                series: drilldownSeries6,
            }
        });


})();