(async () => { 
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

      
      

    const dataSerie5 = await fetch(`${urlBase}/api/getTotalEnfermedadesPorRaza`,
            requestOptions)
        .then(response => response.json())

    const drilldownSeries5 = await fetch(`${urlBase}/api/getEnfermedadesPorRaza`, requestOptions)
    .then(response => response.json())


     Highcharts.chart('grafico5', {
            chart: {
                type: 'pie'
            },
            title: {
                text: ''
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Cantidad de enfermedades'
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
                name: 'cantidad de enfermedades',
                colorByPoint: true,
                data: dataSerie5
            },],
            drilldown: {
                
                series: drilldownSeries5,
            }
        });

        
        
} )();