urlBase = 'http://3.86.65.163:3000';
//urlBase = 'http://127.0.0.1:3000';

var checkbox = document.querySelector("#opcion1");
checkbox.checked = true;

var textganancia = document.querySelector("#textganancia");
var checkboxes = document.querySelectorAll('#divganancia input[type="radio"]');

checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener("change", function () {
        if (this.checked) {
            var value = this.getAttribute("value");
            textganancia.innerHTML = value + "<b> Bs. </b>";

            checkboxes.forEach(function (otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        }
    });
});



function cambiarTipoGrafico(idButton,  tipoGrafico,chart) {
    document.getElementById(idButton).addEventListener('click', function() {
        chart.update({
            chart: {
                type: tipoGrafico,
            },
        });
    });
}
