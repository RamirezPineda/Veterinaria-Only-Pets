<div>
    <div class="container-fluid">


        <div class="tabla" style="padding: 3rem;">
            <div class="row">
                <h1 style="text-align: center;">Historial Clinico</h1>

                <div class=" d-flex flex-row justify-content-between mt-4 mb-4">

                    <form class="" action="" id="formHistorialInput">
                        @csrf
                        <label for="foto" class="form-label fs-5">Examinar foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                        {!! $errors->first('foto', '<span class="help-block text-danger">*:message</span>') !!}
                        <label class="mt-4 form-label fs-5" id="cargandoLabel" style="display: none;">Procesando imagen...</label>
                    </form>

                    <a href="{{ route('historiales.pdf', $historial) }}" class="buttonRegistrame me-4">Exportar PDF</a>
                    {{-- <a @if (!Auth::user()->hasRole('cliente')) href="{{ route('historiales.index') }}"
                      @else
                        href="{{ route('mascotas.my') }}" @endif
                        class="buttonRegistrame">Volver Atras

                    </a> --}}
   
                </div>


                <div class="mb-4" id="informacionDiv" style="display: none">
                    <h4 id="tipoEnfermedad" class="form-label fs-5">Tipo de enfermedad: </h4>
                    
                    <div id="enfermedadBaterial" style="display: none">
                        <span class="text-rose-500 mb-2">Las enfermedades bacterianas pueden afectar a los perros y provocar diversos problemas de salud. Aquí hay algunas precauciones que puede tomar para prevenir infecciones bacterianas en perros:</span>
                        <ul class="texto-rosa-300">
                            <li><strong class="text-rose-900">Vacunación:</strong> Asegúrese de que su perro reciba todas las vacunas recomendadas. Las vacunas pueden proteger a los perros de algunas de las enfermedades bacterianas más comunes, como el moquillo, el parvovirus y la leptospirosis.</li>
                            <li><strong class="text-rose-900">Higiene:</strong> Mantenga a su perro limpio y arreglado con regularidad. Los baños y el cepillado regulares pueden ayudar a eliminar la suciedad y las bacterias del pelaje de su perro, reduciendo el riesgo de infecciones bacterianas.</li>
                            <li><strong class="text-rose-900">Ambiente limpio:</strong> Mantenga limpia y desinfectada la zona donde vive su perro. Utilice un desinfectante apto para mascotas para limpiar la ropa de cama, los juguetes y los tazones de comida y agua con regularidad.</li>
                            <li><strong class="text-rose-900">Dieta saludable:</strong> Proporcione a su perro una dieta sana y equilibrada para ayudar a mantener su sistema inmunológico. Un sistema inmunológico fuerte puede ayudar a combatir las infecciones bacterianas.</li>
                            <li><strong class="text-rose-900">Evite la exposición:</strong> Evite exponer a su perro a otros animales enfermos o ambientes contaminados. Por ejemplo, no permita que su perro beba de fuentes de agua estancada ni coma alimentos en mal estado.</li>
                            <li><strong class="text-rose-900">Revisiones veterinarias periódicas:</strong>Programe revisiones periódicas con su veterinario. Pueden buscar signos de infecciones bacterianas y recomendar medidas preventivas.</li>
                            <li><strong class="text-rose-900">Tratamientos:</strong> Si a su perro se le diagnostica una infección bacteriana, siga cuidadosamente las instrucciones de su veterinario. El tratamiento puede incluir antibióticos, descanso y cuidados de apoyo.</li>
                        </ul>
                        <span class="text-rose-500">Tomar estas precauciones puede ayudar a prevenir infecciones bacterianas en los perros y mantenerlos sanos y felices.</span>
                    </div>

                    <div id="enfermedadHipersensibilidad" style="display: none">
                        <span class="text-rose-500 mb-2">Pueden producirse hipersensibilidad o reacciones alérgicas en los perros y causar diversos síntomas, como picazón, erupciones cutáneas y dificultad para respirar. Aquí hay algunas precauciones que puede tomar para prevenir la enfermedad de hipersensibilidad en perros:</span>
                        <ul class="texto-rosa-300">
                            <li><strong class="text-rose-900">Identifique y evite los desencadenantes:</strong>Identifique cualquier alérgeno que pueda desencadenar una reacción alérgica en su perro y trate de evitarlo. Los alérgenos comunes incluyen el polen, los ácaros del polvo, ciertos alimentos y las picaduras de insectos.</li>
                            <li><strong class="text-rose-900">Proporcione una dieta saludable:</strong> una dieta sana y equilibrada puede ayudar a reforzar el sistema inmunológico de su perro y reducir el riesgo de hipersensibilidad. Hable con su veterinario sobre la mejor dieta para las necesidades específicas de su perro.</li>
                            <li><strong class="text-rose-900">Utilice productos hipoalergénicos:</strong>Utilice productos hipoalergénicos, incluidos champús y productos de limpieza, para reducir el riesgo de reacciones alérgicas en perros propensos a las alergias.</ li>
                            <li><strong class="text-rose-900">Acicalamiento regular:</strong>El aseo regular puede ayudar a reducir el riesgo de irritación e infecciones de la piel, que pueden desencadenar reacciones alérgicas en los perros.</li>
                            <li><strong class="text-rose-900">Mantenga su casa limpia:</strong> limpie su casa con regularidad para reducir el riesgo de polvo y moho, que pueden provocar alergias en los perros. Aspire regularmente y use un purificador de aire para eliminar los alérgenos del aire.</li>
                            <li><strong class="text-rose-900">Tenga cuidado con los medicamentos:</strong>tenga cuidado al darle cualquier medicamento a su perro, ya que algunos perros pueden tener reacciones alérgicas a ciertos medicamentos. Siga siempre las instrucciones de su veterinario cuando le dé medicamentos a su perro.</li>
                            <li><strong class="text-rose-900">Revisiones veterinarias periódicas:</strong>Programe revisiones periódicas con su veterinario. Pueden comprobar si hay signos de alergias y recomendar medidas preventivas.</li>
                        </ul>
                        <span class="text-rose-500">Si su perro muestra algún signo de reacción alérgica, como picazón, sarpullido o dificultad para respirar, comuníquese con su veterinario de inmediato. La detección y el tratamiento tempranos pueden ayudar a evitar que la reacción alérgica se agrave y mejorar las posibilidades de que su perro se recupere por completo.</span>                      
                    </div>

                    <div id="enfermedadHongos" style="display: none">
                        <span class="text-rose-500 mb-2">Las infecciones por hongos son un problema de salud común para los perros, especialmente en ambientes húmedos. A continuación se indican algunas precauciones que puede tomar para prevenir las infecciones por hongos en los perros:</span>
                        <ul class="texto-rosa-300">
                            <li><strong class="text-rose-900">Acicalamiento regular:</strong> El cepillado regular, como el cepillado y el baño, puede ayudar a mantener la piel y el pelaje de su perro limpios y secos. Esto puede ayudar a prevenir infecciones por hongos, especialmente en perros con pelaje grueso.</li>
                            <li><strong class="text-rose-900">Seque bien a su perro:</strong>Después de bañarlo o nadar, asegúrese de secar bien a su perro, especialmente en las áreas donde se pliega la piel. Los hongos prosperan en ambientes cálidos y húmedos, por lo que mantener seca la piel de tu perro puede ayudar a prevenir las infecciones por hongos.</li>
                            <li><strong class="text-rose-900">Evite las zonas húmedas:</strong> Evite pasear a su perro en zonas donde haya agua estancada, como charcos o estanques. Estas áreas pueden ser un caldo de cultivo para hongos, que pueden causar infecciones en los perros.</li>
                            <li><strong class="text-rose-900">Compruebe si hay lesiones en la piel:</strong> revise periódicamente la piel de su perro para detectar signos de lesiones, enrojecimiento o irritación. Las infecciones por hongos pueden causar lesiones e irritaciones en la piel, lo que puede ser un signo temprano de una infección por hongos.</li>
                            <li><strong class="text-rose-900">Proporcione una dieta saludable:</strong> una dieta equilibrada y saludable puede ayudar a mantener el sistema inmunológico de su perro fuerte y saludable. Un sistema inmunológico fuerte puede ayudar a combatir las infecciones por hongos.</li>
                            <li><strong class="text-rose-900">Evite compartir:</strong>Evite compartir la ropa de cama, los juguetes o la comida de su perro con otros perros para reducir el riesgo de contaminación cruzada.</li>
                            <li><strong class="text-rose-900">Revisiones veterinarias periódicas:</strong>Programe revisiones periódicas con su veterinario. Pueden buscar signos de infecciones por hongos y recomendar medidas preventivas.</li>
                        </ul>
                        <span class="text-rose-500">Si su perro muestra algún signo de infección por hongos, como lesiones en la piel, pérdida de cabello o picazón persistente, comuníquese con su veterinario de inmediato. La detección y el tratamiento tempranos pueden ayudar a prevenir la propagación de la infección y mejorar las posibilidades de que su perro se recupere por completo. </span>
                    </div>

                    <div id="saludable" style="display: none">
                        <span class="texto-rosa-500">
                            <strong class="text-rose-900">¡¡Felicitaciones, su perro está sano!!</strong>
                            Un perro sano es un perro feliz. Una dieta bien equilibrada, ejercicio regular y atención médica adecuada son esenciales para mantener la salud de su amigo peludo.
                            Junto con estas medidas, también es importante mantener su entorno limpio y seguro, practicar una buena higiene y evitar la exposición a sustancias nocivas. Al tomar estas precauciones, puede ayudar a garantizar que su perro se mantenga sano y feliz, permitiéndole disfrutar de la vida al máximo. Un perro sano es un compañero querido y una verdadera fuente de alegría para sus dueños.
                        </span>
                    </div>

                </div>


                @if ($historial->mascota->foto)
                <img src={{$historial->mascota->foto}} alt={{$historial->mascota->nombre}} class="mb-4" style="width: 250px; height: auto; background-size: cover;">
                @endif

                <h1>{{ $historial->mascota->nombre }}</h1>
                <h3>{{ $historial->mascota->raza }} | {{ $historial->mascota->descripcion }}</h3>
                <p>
                    <strong>Peso</strong>: @if ($historial->peso)
                        {{ $historial->peso }}
                    @else
                        ---
                    @endif <br>
                    <strong>Talla</strong>: @if ($historial->talla)
                        {{ $historial->talla }}
                    @else
                        ---
                    @endif
                </p>

                <hr>
                <div style="display: flex;">

                    <p>
                    <div style="padding: 0 1rem;">
                        <h2>Consultas:</h2>
                        <p>
                            @forelse($historial->detalle_historial as $detalle)
                                <strong>Fecha de consulta</strong>: {{ $detalle->fecha_consulta }}
                                <br>
                                <strong>Descripcion</strong>: {{ $detalle->descripcion }}
                                <br>
                                <strong>Fecha proxima consulta</strong>: {{ $detalle->fecha_prox_consulta }}
                                <br> <br>
                            @empty
                                No tiene consultas
                            @endforelse
                        </p>
                    </div>
                    </p>

                    <div style="width:1px; height:auto; background-color:silver;"></div>

                    <p>
                    <div style="padding: 0 1rem;">
                        <h2>Cirugias:</h2>
                        <p>
                            @forelse($historial->cirugia as $cirugia)
                                <strong>Nombre</strong>: {{ $cirugia->nombre }}
                                <br>
                                <strong>Fecha</strong>: {{ $cirugia->pivot->fecha }}
                                <br>
                                <strong>Hora</strong>: {{ $cirugia->pivot->hora }}
                                <br>
                                <strong>Veterinario encargado</strong>: {{ $cirugia->pivot->veterinario_encargado }}
                                <br> <br>
                            @empty
                                No tiene cirugias
                            @endforelse
                        </p>
                    </div>
                    </p>

                    <div style="width:1px; height:auto; background-color:silver;"></div>

                    <p>
                    <div style="padding: 0 1rem;">
                        <h2>Enfermedades:</h2>
                        <p>
                            @forelse($historial->enfermedad as $enfermedad)
                                <strong>Nombre</strong>: {{ $enfermedad->nombre }}
                                <br>
                                <strong>Fecha de deteccion</strong>: {{ $enfermedad->pivot->fecha_deteccion }}
                                <br>
                                <strong>Inicio de tratamiento</strong>: @if ($enfermedad->pivot->inicio_tratamiento)
                                    {{ $enfermedad->pivot->inicio_tratamiento }}
                                @else
                                    ---
                                @endif
                                <br>
                                <strong>Fin de tratamiento</strong>: @if ($enfermedad->pivot->fin_tratamiento)
                                    {{ $enfermedad->pivot->fin_tratamiento }}
                                @else
                                    ---
                                @endif
                                <br><br>
                            @empty
                                No tiene enfermedades
                            @endforelse
                        </p>
                    </div>
                    </p>

                    <div style="width:1px; height:auto; background-color:silver;"></div>

                    <p>
                    <div style="padding: 0 1rem;">
                        <h2>Vacunas:</h2>
                        <p>
                            @forelse($historial->vacuna as $vacuna)
                                <strong>Nombre</strong>: {{ $vacuna->nombre }}
                                <br>
                                <strong>Dosis</strong>: {{ $vacuna->pivot->dosis }}
                                <br>
                                <strong>Fecha de apliacion</strong>: {{ $vacuna->pivot->fecha_aplicacion }}
                                <br>
                                <strong>Fecha proxima apliacion</strong>: @if ($vacuna->pivot->fecha_prox_aplicacion)
                                    {{ $vacuna->pivot->fecha_prox_aplicacion }}
                                @else
                                    ---
                                @endif
                                <br><br>
                            @empty
                                No tiene vacunas aplicadas
                            @endforelse
                        </p>
                    </div>
                    </p>
                </div>



            </div>
            <hr>
            {{-- @can('historiales.edit') --}}


                <h2 class="mb-4 mt-4">
                    Registrar Diagnostico
                </h2>
                <form wire:submit.prevent="guardarDiagnostico">
                    <div class="row" id="registro_de_diagnostico" x-data="iniciarDatosDiagnostico()">
                        <div class="col">
                            <div class="row mb-4">
                                <div class="form-floating">
                                    <textarea name="diagnostico" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                        wire:model="diagnostico" style="height: 150px"></textarea>
                                    <label class="mx-2" for="floatingTextarea"> Diagnostico </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div class="form-check p-2">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Enfermedad
                                                </label>
                                                <input class="form-check-input" type="checkbox" wire:model="hayEnfermedad"
                                                    id="flexCheckDefault" name="hayEnfermedad" x-model="hayEnfermedad">
                                            </div>

                                            <div class="input-group" x-show="hayEnfermedad" x-collapse>
                                                <span class="input-group-text">Nombre</span>
                                                <select class="form-select" id="id_enfermedad" name="id_enfermedad" wire:model="id_enfermedad">
                                                    <option selected>Seleccione...</option>
                                                    @foreach ($enfermedades as $enfermedad)
                                                        <option value="{{ $enfermedad->id }}"> {{ $enfermedad->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <span class="input-group-text">Fecha de Detección</span>
                                                <input type="date" class="form-control" id="fecha_inicio_enfermedad"
                                                    wire:model="fecha_inicio_enfermedad" name="fecha_inicio_enfermedad">

                                                <span class="input-group-text">Inicio de Tratamiento</span>
                                                <input type="date" class="form-control"
                                                    id="inicio_tratamiento_enfermedad" min=""
                                                    wire:model="inicio_tratamiento_enfermedad" name="inicio_tratamiento_enfermedad">
                                            </div>


                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-check p-2">
                                                <label class="form-check-label" for="cirugiaCheck">
                                                    Cirugia
                                                </label>
                                                <input class="form-check-input" type="checkbox" wire:model="hayCirugia"
                                                    id="cirugiaCheck" id="hayCirugia" name="hayCirugia" x-model="hayCirugia">
                                            </div>

                                            <div class="input-group" x-show="hayCirugia" x-collapse>
                                                <span class="input-group-text">Nombre</span>
                                                <select class="form-select" id="id_cirugia" name="id_cirugia" wire:model="id_cirugia">
                                                    <option selected>Seleccione...</option>
                                                    @foreach ($cirugias as $cirugia)
                                                        <option value="{{ $cirugia->id }}"> {{ $cirugia->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <span class="input-group-text">Veterinario</span>
                                                <select class="form-select" id="cirugia" name="id_veterinario"
                                                    wire:model="id_veterinario" name="id_veterinario">
                                                    <option selected>Seleccione...</option>
                                                    @foreach ($veterinarios as $veterinario)
                                                        <option value="{{ $veterinario->id }}">
                                                            {{ $veterinario->persona->nombre . ' ' . $veterinario->persona->apellido_paterno . ' ' . $veterinario->persona->apellido_materno }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <span class="input-group-text">Fecha Programada</span>
                                                <input type="date" class="form-control" id="fecha_cirugia"
                                                    wire:model="fecha_cirugia" name="fecha_cirugia">

                                                <span class="input-group-text">Hora Programada</span>
                                                <input type="time" class="form-control" id="hora_cirugia" min=""
                                                    wire:model="hora_cirugia" name="hora_cirugia">
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-check p-2">
                                                <label class="form-check-label" for="vacunaCheck">
                                                    Vacuna
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="vacunaCheck" name="hayVacuna" x-model="hayVacuna" wire:model="hayVacuna">
                                            </div>
                                            <div class="input-group" x-show="hayVacuna" x-collapse>

                                                <span class="input-group-text"> Nombre </span>
                                                <select id="id_vacuna" class="form-select"
                                                    wire:model="id_vacuna" name="id_vacuna">
                                                    <option selected>Seleccione </option>
                                                    @foreach ($vacunas as $vacuna)
                                                        <option value="{{ $vacuna->id }}"> {{ $vacuna->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <span class="input-group-text">Dosis</span>
                                                <select class="form-select" name="dosis_vacuna" id="dosis_vacuna"
                                                    wire:model="dosis_vacuna">
                                                    <option selected>Seleccione</option>
                                                    <option value="0">Unica</option>
                                                    <option value="1">Primera</option>
                                                    <option value="2">Segunda</option>
                                                    <option value="3">Tercera</option>
                                                    <option value="4">Cuarta</option>
                                                </select>

                                                <span class="input-group-text">Fecha próxima Aplcacion</span>
                                                <input type="date" class="form-control" id="fecha_proxima_vacuna"
                                                    wire:model="fecha_proxima_vacuna" name="fecha_proxima_vacuna">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row p-5">
                                <button type="submit" class="btn btn-danger">Guardar Diagnostico</button>
                            </div>

                        </div>

                    </div>
                </form>
            {{-- @endcan --}}
        </div>

    </div>
</div>
</div>
@section('js-home')
    <script>
        function iniciarDatosDiagnostico() {
            return {
                hayEnfermedad: false,
                hayVacuna: false,
                hayCirugia: false,
            }
        }
    </script>


    <script>

    const baseUrl = 'https://service-sw2.onrender.com/api'
    
    const enfermedadBaterial = document.getElementById('enfermedadBaterial')
    const enfermedadHipersensibilidad = document.getElementById('enfermedadHipersensibilidad')
    const enfermedadHongos = document.getElementById('enfermedadHongos')
    const saludable = document.getElementById('saludable')
    
    const h2TipoEnfermedad = document.getElementById('tipoEnfermedad')
    const informacionDiv = document.getElementById('informacionDiv')
    const cargarLabel = document.getElementById('cargandoLabel')
    const inputFoto = document.getElementById('foto')
    const form = document.getElementById('formHistorialInput');
    
    h2TipoEnfermedad.innerHTML = ''
    cargandoLabel.value = 'Procesando imagen...'
    informacionDiv.style.display = 'none'

    enfermedadBaterial.style.display = 'none'
    enfermedadHipersensibilidad.style.display = 'none'
    enfermedadHongos.style.display = 'none'
    saludable.style.display = 'none'

    inputFoto.addEventListener('change', function() {

        if (inputFoto.files == null || inputFoto.files.length == 0) {
            console.log('canceladoo')
           return; 
        }

        const archivo = inputFoto.files[0];

        const formData = new FormData(form);
        formData.append('foto', archivo);

        inputFoto.disabled = true;
        cargandoLabel.style.display = 'block';

        h2TipoEnfermedad.innerHTML = ''
        enfermedadBaterial.style.display = 'none'
        enfermedadHipersensibilidad.style.display = 'none'
        enfermedadHongos.style.display = 'none'
        saludable.style.display = 'none'

        
        fetch('/upload-file', {
            method: 'POST',
            body: formData
        }).then(res => res.json())
        .then(data => {
            const foto_url = data.foto_url;
            console.log('Respuesta de la API:', data.foto_url);

            fetch(`${baseUrl}/recognition/disease`, {
                method: 'POST',
                body: JSON.stringify({ image_url: foto_url }),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(res => res.json()).then(data => {

                // precice que tipo de enfermedad es
                console.log('Respuesta de la API:', data);

                h2TipoEnfermedad.innerHTML = `Tipo de enfermedad: ${data.prediction} (${data.accuracy}%)`;
                informacionDiv.style.display = 'block'

                switch (data.prediction) {
                    case 'Bacterial':
                        enfermedadBaterial.style.display = 'block'
                        break;
                    case 'Hipersensibilidad':
                        enfermedadHipersensibilidad.style.display = 'block'
                        break;
                    case 'Hongos':
                        enfermedadHongos.style.display = 'block'
                        break;
                    case 'Saludable':
                        saludable.style.display = 'block'
                        break;
                    default:
                        saludable.style.display = 'block'
                        break;
                }


            }).catch(err => {
                console.log(err)
            }).finally(() => {
                inputFoto.disabled = false;
                cargandoLabel.style.display = 'none';
            });



        }).catch(err => {
            console.log(err)
        })

    })
    

    </script>

@endsection
