<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    Añadir Solicitud De Servicio
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="formSolicitudesInput" action="{{ route('ventas-servicios.store') }}"
                        method="post">
                        @csrf
                        <div class="col-md-6">
                            <label for="id_cliente" class="form-label fs-5">Cliente</label>
                            <select class=" form-control" id="id_cliente"
                                name="id_cliente" required>
                                @foreach ($clientes() as $cliente)
                                <option value="{{ $cliente->id }}">
                                    {{ $cliente->persona->nombre .
                                        ' ' .
                                        $cliente->persona->apellido_paterno .
                                        ' ' .
                                        $cliente->persona->apellido_materno }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="id_mascota" class="form-label fs-5">Mascota</label>
                            <select class=" form-control" id="id_mascota"
                                name="id_mascota" required>
                                @foreach ($mascotas() as $mascota)
                                <option value="{{ $mascota->id }}">
                                    {{ $mascota->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="servicios" class="form-label fs-5">Servicios</label>
                            <select class=" form-control" id="servicios"
                                name="servicios[]" name="servicios" multiple="multiple" required onchange="calcularMontoTotal();">
                                <option  value="">Ninguno</option>
                                @foreach ($servicios() as $servicio)
                                <option value="{{ $servicio->id }}">
                                    {{ $servicio->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="concepto" class="form-label fs-5">Concepto</label>
                            <textarea type="text" class="form-control" form="formSolicitudesInput" id="concepto" name="concepto" required></textarea>
                            {!! $errors->first('concepto', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>

                        <div class="col-md-4">
                            <label for="total" class="form-label fs-5">Monto Total</label>
                            <input type="number" class="form-control" id="total" name="total" required>
                            {!! $errors->first('monto_total', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>


                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="formSolicitudesInput" class="btn btn-danger btn-lg">Añadir</button>
            </div>
        </div>
    </div>
</div>


<script>
    console.log('holaaa')
    let services = []
    fetch("/services-all")
        .then(response => {
            if (!response.ok) {
                console.log('ocurrio un errorrrrr')
                throw new Error('Error en la solicitud a la API');
                // return response.json();
            }
            return response.json();
        })
        .then(data => {
            console.log(data)
            services = data.services;
        }).catch(error => console.log(error));

    function calcularMontoTotal() {
        let total = 0;
        const servicios = document.getElementById("servicios");
        const serviciosSeleccionados = servicios.selectedOptions;

        for (let i = 0; i < serviciosSeleccionados.length; i++) {
            services.forEach(element => {
                if (element.id == serviciosSeleccionados[i].value) {
                    total = element.precio + total;
                }
            });

            // total += parseInt(serviciosSeleccionados[i].value);

        }
        document.getElementById("total").value = total;
    }

</script>