(async () => {
    var requestOptions = {
        method: "GET",
        redirect: "follow",
    };

    const dataSerie3 = await fetch(
        `${urlBase}/api/getTotalVentasPorProducto`,
        requestOptions
    ).then((response) => response.json());

    const drilldownSeries3 = await fetch(
        `${urlBase}/api/getVentasPorProducto`,
        requestOptions
    ).then((response) => response.json());

    const char3 = Highcharts.chart("grafico3", {
        chart: {
            type: "line",
        },
        title: {
            text: "",
        },
        xAxis: {
            type: "category",
        },

        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                },
            },
        },

        series: [
            {
                name: "cantidad ventas",
                color: "#ff8882",
                data: dataSerie3[0],
            },
            {
                name: "ganancia ventas",
                color: "#2caffe",
                data: dataSerie3[1],
            },
        ],
        drilldown: {
            allowPointDrilldown: false,
            series: drilldownSeries3,
        },
    });

    
   
    cambiarTipoGrafico('botonColumnaGrafico3', 'column', char3);
    cambiarTipoGrafico('botonBarraGrafico3', 'bar',   char3);
    cambiarTipoGrafico('botonLineaGrafico3', 'line', char3);
})();


