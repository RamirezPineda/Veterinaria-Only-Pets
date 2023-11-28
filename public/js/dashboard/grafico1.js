(async () => {

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    
    var datos = await fetch(`${urlBase}/api/ventaPorMes`, requestOptions)
        .then(response => response.json());
    
    console.log(datos);
    
    // Configuración del gráfico con múltiples series
    var configuracionDelGrafico = {
        chart: {
            type: 'column',
            zoomType: 'x'
        },
        title: {
            text: ''
        },
        xAxis: {
            type: 'datetime',
        },
        yAxis: [{
            title: {
                text: ''
            }
        }, {
            title: {
                text: ''
            },
            opposite: true
        }],
        legend: {
            enabled: true
        },
        series: [{
                name: 'Cantidad de Ventas',
                color: '#ff8882',
                data: datos[0],
                yAxis: 0, // Asociar esta serie al eje izquierdo (Cantidad de Ventas)
                dataGrouping: {
                    units: [
                        [
                            'week', // unit name
                            [4] // allowed multiples
                        ],
                       
                    ],
                    approximation: 'sum'
                }
    
            },
            {
                name: 'Ganancia Neta',
                data: datos[1],
                yAxis: 1, // Asociar esta serie al eje derecho (Precio de Venta)
                dataGrouping: {
                    units: [
                        [
                            'week', // unit name
                            [4] // allowed multiples
                        ],
                      
                    ],
                    approximation: 'sum'
                }
    
            },
            // ... más series ...
        ]
    };
    
    // Renderizar el gráfico
     Highcharts.stockChart('grafico', configuracionDelGrafico);
    
    var buttonDia = document.getElementById('btnDia');
    buttonDia.addEventListener('click', async function() {
        Highcharts.charts[0].series[0].update({
            dataGrouping: {
                    units: [
                        [
                            'day', // unit name
                            [1] // allowed multiples
                        ],
                    ],
                    approximation: 'sum'
                }
        });
        Highcharts.charts[0].series[1].update({
            dataGrouping: {
                    units: [
                        [
                            'day', // unit name
                            [1] // allowed multiples
                        ],
                    ],
                    approximation: 'sum'
                }
        });
        
    });
    var buttonSemana = document.getElementById('btnSemana');
    buttonSemana.addEventListener('click', async function() {
        Highcharts.charts[0].series[0].update({
            dataGrouping: {
                    units: [
                        [
                            'week', // unit name
                            [1] // allowed multiples
                        ],
                    ],
                    approximation: 'sum'
                }
        });
        Highcharts.charts[0].series[1].update({
            dataGrouping: {
                    units: [
                        [
                            'week', // unit name
                            [1] // allowed multiples
                        ],
                    ],
                    approximation: 'sum'
                }
        });
        
    });
    
    var buttonMes = document.getElementById('btnMes');
    buttonMes.addEventListener('click', async function() {
        Highcharts.charts[0].series[0].update({
            dataGrouping: {
                    units: [
                        [
                            'month', // unit name
                            [1] // allowed multiples
                        ],
                    ],
                    approximation: 'sum'
                }
        });
        Highcharts.charts[0].series[1].update({
            dataGrouping: {
                    units: [
                        [
                            'month', // unit name
                            [1] // allowed multiples
                        ],
                    ],
                    approximation: 'sum'
                }
        });
        
    });
    
    var buttonAnio = document.getElementById('btnAnio');
    buttonAnio.addEventListener('click', async function() {
        Highcharts.charts[0].series[0].update({
            dataGrouping: {
                    units: [
                        [
                            'month', // unit name
                            [12] // allowed multiples
                        ],
                    ],
                    approximation: 'sum'
                }
        });
        Highcharts.charts[0].series[1].update({
            dataGrouping: {
                    units: [
                        [
                            'month', // unit name
                            [12] // allowed multiples
                        ],
                    ],
                    approximation: 'sum'
                }
        });
        
    });

   
})();