<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    Actualizar datos de Servicio
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="{{ 'formUpdateDatos'.$type }}" action="" method="post">
                        @method('PUT')
                        @csrf

                        <div class="col-md-4">
                            <label for="nombre" class="form-label fs-5">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                            {!! $errors->first('nombre', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="descripcion" class="form-label fs-5">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                            {!! $errors->first('descripcion', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="precio" class="form-label fs-5">Precio</label>
                            <input type="text" class="form-control" id="precio" name="precio" required>
                            {!! $errors->first('precio', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="{{ 'formUpdateDatos' . $type }}" class="btn btn-primary btn-lg">Guardar Datos</button>
            </div>
        </div>
    </div>
</div>