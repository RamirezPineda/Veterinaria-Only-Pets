(async () => {
    /* const selectProductos = document.getElementById('productos');
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

    selectProductos.addEventListener('change', async function() {
        const opcionSeleccionada = selectProductos.options[selectProductos.selectedIndex];
        const productoId = opcionSeleccionada.value;
        const productoNombre = opcionSeleccionada.text;
        const urlencoded = new URLSearchParams();
        var cantidadesVenta = [];
        urlencoded.append("productoId", productoId);

        const requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
            redirect: 'follow'
        };


        const data = await fetch("http://127.0.0.1:3000/api/ventasPorProducto", requestOptions)
            .then(response => response.json());

        cantidadesVenta = data.map((item) => {
            return [item.mes_anio, item.cantidad_total];
        });

        Highcharts.chart('grafico2', {
            chart: {
                type: 'pie'
            },
            title: {
                align: 'center',
                text: 'Cantidad de ventas por producto y mes'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category',
                title: {
                    text: 'fecha por mes'
                }
            },
            yAxis: {
                title: {
                    text: 'cantidad de ventas del producto'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    color: '#ff8882',
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.0f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.y:.0f}</span> ventas: <b>{point.name}</b> <br/>'
            },

            series: [{
                name: productoNombre,
                colorByPoint: false,
                data: cantidadesVenta
            }, ],
        });

    }); */

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
      };
      
    const dataGrafico2 =   await fetch(`${urlBase}/api/getGananciaVsServicio`, requestOptions)
        .then(response => response.json())

    Highcharts.chart('grafico2', {
        chart: {
            type: 'pie'
        },
        title: {
            text: ''
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y:.0f} Bs.' // Muestra el valor como etiqueta
                }
            }
        },
        series: [{
            name: 'Ganancias',
            colorByPoint: true,
            data: dataGrafico2
        }]
    });

})();