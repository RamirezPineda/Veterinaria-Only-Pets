<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    Añadir Mascota
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="formMascotasInput" action="{{ route('mascotas.store') }}"
                        method="post">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label fs-5">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                                {!! $errors->first('nombre', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                            <div class="col-md-6">
                                <label for="especie" class="form-label fs-5">Especie</label>
                                <input type="text" class="form-control" id="especie" name="especie" required>
                                {!! $errors->first('especie', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <label for="raza" class="form-label fs-5">raza</label>
                                        <input type="text" class="form-control" id="raza" name="raza" required>
                                        {!! $errors->first('raza', '<span class="help-block text-danger">*:message</span>') !!}
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="fecha_de_nacimiento" class="form-label fs-5">Fecha de
                                            nacimiento</label>
                                        <input type="date" class="form-control" id="fecha_de_nacimiento"
                                            name="fecha_de_nacimiento" required>
                                        {!! $errors->first('fecha_de_nacimiento', '<span class="help-block text-danger">*:message</span>') !!}
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="sexo" class="form-label fs-5">Sexo</label>
                                        <div class="row px-5">
                                            <div class="col-sm-5 form-check pl-2">
                                                <input class="form-check-input" type="radio" id="flexRadioDefault1"
                                                    value="Macho" name="sexo">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Macho
                                                </label>
                                            </div>
                                            <div class="col-sm-5 form-check">
                                                <input class="form-check-input" type="radio" id="flexRadioDefault2"
                                                    value="Hembra" name="sexo">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Hembra
                                                </label>
                                            </div>
                                        </div>
                                        {!! $errors->first('sexo', '<span class="help-block text-danger">*:message</span>') !!}
                                    </div>
                                
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <label for="duenho" class="form-label fs-5">Dueños</label>
                                        <select class=" form-control" id="duenhos" name="duenhos[]"
                                            name="duenho" multiple="multiple">
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

                                    <div class="col-md-12 mt-3">
                                        <label for="descripción" class="form-label fs-5">Descripción</label>
                                        <textarea type="text" class="form-control" form="formMascotasInput" id="descripcion" placeholder="Color, etc" name="descripcion"></textarea>
                                        {!! $errors->first('descripcion', '<span class="help-block text-danger">*:message</span>') !!}
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="foto" class="form-label fs-5">Foto</label>
                                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                                        {!! $errors->first('foto', '<span class="help-block text-danger">*:message</span>') !!}
                                        <label class="mt-4 form-label fs-5" id="cargandoLabel" style="display: none;">Procesando imagen...</label>
                                    </div>

                                    <input type="text" hidden id="foto_url" name="foto_url">
                                </div>
                            </div>

                            <div class="row" id="informacionDiv" style="display: none;">
                                <div class="col-md-12 mt-3" >
                                    <label for="informacion" class="form-label fs-5">Información de la raza</label>
                                    <textarea type="text" rows="5" class="form-control" id="informacion" name="informacion" style="background-color: #f0e68c"></textarea>
                                </div>
                            </div>

                        </div>


                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="formMascotasInput" class="btn btn-danger btn-lg">Añadir</button>
            </div>
        </div>
    </div>
</div>


<script>

    const baseUrl = 'https://service-sw2.onrender.com/api'

    const inputRaza = document.getElementById('raza');
    inputRaza.value = '';
    const inputFotoUrl = document.getElementById('foto_url');
    inputFotoUrl.value = '';

    const textAreaInformacionDiv = document.getElementById('informacionDiv');
    textAreaInformacionDiv.style.display = 'none';

    const inputFoto = document.getElementById('foto');
    const form = document.getElementById('formMascotasInput');
    const cargandoLabel = document.getElementById('cargandoLabel');
    cargandoLabel.value = 'Procesando imagen...'

    // Escuchar el evento de cambio en el input
    inputFoto.addEventListener('change', function() {

        if (inputFoto.files == null || inputFoto.files.length == 0) {
            console.log('canceladoo')
           return; 
        }

        const archivo = inputFoto.files[0];

        // Imprimir información sobre el archivo en la consola
        console.log('Nombre del archivo:', archivo.name);
        console.log('Tipo de archivo:', archivo.type);
        console.log('Tamaño del archivo:', archivo.size, 'bytes');

        const formData = new FormData(form);
        formData.append('foto', archivo);

        inputFoto.disabled = true;
        cargandoLabel.style.display = 'block';

        fetch('/upload-file', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                console.log('ocurrio un errorrrrr')
                throw new Error('Error en la solicitud a la API');
                // return response.json();
            }
            return response.json();
        })
        .then(data => {
            const foto_url = data.foto_url;
            console.log('Respuesta de la API:', data.foto_url);

            inputFotoUrl.value = foto_url;

            fetch(baseUrl + '/recognition/breed', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ image_url: foto_url })
            }).then(res => res.json()).then(data => {
                console.log('data fastapi')
                console.log(data)

                let razasData = data[0].label.split(/,\s*/); // 1er raza
                let razas = razasData[0] + ' (' + Math.round(data[0].score * 100) + '%)';

                razasData = data[1].label.split(/,\s*/); // 2da raza
                razas += ', ' + razasData[0] + ' (' + Math.round(data[1].score * 100) + '%)';

                razasData = data[2].label.split(/,\s*/); // 3era raza
                razas += ', ' + razasData[0] + ' (' + Math.round(data[2].score * 100) + '%)';

                inputRaza.value = razas;
                inputRaza.style.backgroundColor = '#f0e68c';

                const palabras = data[0].label.split(/,\s*/);
                const razaDePerro = palabras[0];

                cargandoLabel.style.display = 'block';
                cargandoLabel.value = 'Obteniendo información de la raza...'

                fetch(`${baseUrl}/breeds/${razaDePerro}`)
                .then(res => res.json()).then(data => {
                    console.log(data)
                    
                    const translatedData = "Raza:" + data.breedName
                    + "\n" + "Tipo de Raza: " + data.breedType
                    + "\n" + "Color del Pelaje: " + data.furColor
                    + "\n" + "Origen:" + data.origin
                    + "\n" + "Altura Mínima (pulgadas): " + data.minHeightInches
                    + "\n" + "Altura Máxima (pulgadas): " + data.maxHeightInches
                    + "\n" + "Peso Mínimo (libras): " + data.minWeightPounds
                    + "\n" + "Peso Máximo (libras): " + data.maxWeightPounds
                    + "\n" + "Expectativa de Vida Mínima: " + data.minLifeSpan + " años"
                    + "\n" + "Expectativa de Vida Máxima: " + data.maxLifeSpan + " años";

                    textAreaInformacionDiv.style.display = 'block';

                    const textAreaInformacion = document.getElementById('informacion');
                    textAreaInformacion.value = translatedData;

                }).finally(() => {
                    cargandoLabel.style.display = 'none';
                })

            }).catch(err => {
                console.log('error fastapi')
                console.log(err)
            }).finally(() => {
                inputFoto.disabled = false;
                cargandoLabel.style.display = 'none';
            })

        })
        .catch(error => {
            console.log('errorrrrrrrrrrrrrrrrrrr')
            console.error('Error:', error);
        });

    });
</script>