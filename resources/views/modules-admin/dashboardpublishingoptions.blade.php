<title>Dashboard | Publication Options</title>
@include('include.dashboard')

<main id="main" class="main">

    <!-- Botón para abrir la modal de registro de la opción de publicación -->
    <button id="openTopicModal" class="btn btn-primary" onclick="showModalRegister()">
        <span>Registrar Opción de publicación</span>
        <i class="fa fa-plus"></i>
    </button>

    <!-- Barra de búsqueda -->
    <div class="search-bar">
        <input type="text" placeholder="Búsqueda rápida...">
        <button>Q</button>
    </div>

    <!-- Tabla -->
    <table class="table">
        <thead>
            <tr style="text-align: center">
                <th>Options</th>
                <th>Journal Name</th>
                <th>Journal Image</th>
                <th>Journal Link</th>
                <th>Status</th>
                <th>Register by</th>
            </tr>
        </thead>
        <tbody>
            @if(count($publishings) > 0)
            @foreach($publishings as $publishing)
            <tr>
                <td class="controls-table">
                    <div class="simon">
                        <div class="botones">
                            <form id="update{{$publishing->id}}" method="POST" action="{{ route('publishings.update', $publishing->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="button" onclick="showModalUpdate('{{$publishing->id}}')" class="custom-btn btn-1" data-publishing-id="{{$publishing->id}}" data-toggle="tooltip" data-placement="left" title="Editar">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </form>

                            <form id="status{{$publishing->id}}" method="POST" action="{{ route('publishings.status', $publishing->id) }}">
                                @csrf
                                @method('PUT')

                                <button type="button" onclick="updateStatus('{{$publishing->id}}')" class="custom-btn {{($publishing->status == 1) ? 'btn-2' : 'btn-3'}}" data-toggle="tooltip" data-placement="left" title="{{($publishing->status == 1) ? 'Desactivar' : 'Activar'}}">
                                    <i class="fa-regular {{($publishing->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                </button>
                            </form>

                        </div>

                        <div class="botones3">
                            <form id="delete{{$publishing->id}}" method="POST" action="{{route('publishings.delete',$publishing->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </td>
                <td style="text-align: left">{{$publishing->name_journal}}</td>
                <td>
                    <button class="button-ecu button-ecu-primary" onclick="showImage('{{$publishing->image_journal}}')">
                        <span>Mostrar</span>
                        <i class="fa fa-image"></i>
                    </button>
                </td>
                <td style="text-align: left;">{{$publishing->link_journal}}</td>
                <td class="text {{ ($publishing->status == 1) ? 'activo' : 'inactivo' }}">{{($publishing->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                <td>{{$publishing->registerBy}}</td>

            </tr>
            @endforeach
            {{-- <div class="pagination-topic">--}}
            {{-- {{ $dates->links() }}--}}
            {{-- </div>--}}
            @else
            <tr>
                <td colspan="9" style="text-align: center;">No hay presentacion de resumenes registrados.</td>
            </tr>
            @endif
        </tbody>
    </table>
    <!-- Modal para registrar una presentacion de resumenes -->
    <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; top: 22%">
            <div style="height: 350px; border: none;" class="modal-content">
                <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;" class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Opción de publicación

                    </span>
                    <form id="register_form" method="POST" action="{{ route('publishings.store') }}" autocomplete="off" enctype="multipart/form-data">
                        <div class="modal-body container">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Nombre de la revista</label>
                                        <input type="text" class="form-control input-skew" name="name_journal" placeholder="Ingrese el nombre de la revista" maxlength="100" minlength="5" value="{{ old('name_journal') }}" @if ($errors->has('name_journal')) autofocus @endif required>
                                        @if ($errors->has('name_journal'))
                                        <div class="error-message">{{ $errors->first('name_journal') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Subir imagen de la revista<i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload" class="form-control input-skew" name="journal_image" accept="image/jpeg, image/png" value="{{ old('journal_image') }}" @if ($errors->has('journal_image')) autofocus @endif required>
                                        @if ($errors->has('journal_image'))
                                        <div class="error-message">{{ $errors->first('journal_image') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Link de la revista</label>
                                        <input type="text" class="form-control input-skew" name="link_journal" placeholder="Ingrese el link de la revista" maxlength="150" minlength="5" value="{{ old('link_journal') }}" @if ($errors->has('link_journal')) autofocus @endif required>
                                        @if ($errors->has('link_journal'))
                                        <div class="error-message">{{ $errors->first('link_journal') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="status" value="1">
                            <input type="hidden" class="form-control" name="registerBy" value="{{ Auth::user()->id }}">
                            <div style="padding: 30px 0 0 0" class="modal-footer">
                                <button style="background-color: #0d47a1; color: white" type="reset" class="button-ecu button-ecu-secondary">
                                    <span>Limpiar</span>
                                    <i class="fa fa-eraser"></i>
                                </button>
                                <button style="background-color: #4caf50" type="submit" class="button-ecu button-ecu-primary">
                                    <span>Guardar</span>
                                    <i class="fa fa-save"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @if(count($publishings) > 0)
    @foreach($publishings as $publishing)
    <!-- Modal para actualizar una opcion de publicacion -->
    <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-update-{{$publishing->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px; top: 22%">
            <div style="height: 300px; border: none;" class="modal-content">
                <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%" class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i style="color: #0d47a1" class="bi bi-building"></i>
                        Editar la Opción de publicación

                    </span>
                    <form id="update_form" method="POST" action="{{ route('publishings.update', $publishing->id) }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Nombre de la revista</label>
                                    <input type="text" class="form-control input-skew" name="name_journal" placeholder="Ingrese el nombre de la revista" maxlength="100" minlength="5" value="{{ old('name_journal', $publishing->name_journal) }}" @if ($errors->has('name_journal')) autofocus @endif required>
                                    @if ($errors->has('name_journal'))
                                    <div class="error-message">{{ $errors->first('name_journal') }}</div>
                                    @endif
                                </div>
                            </div>


                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Subir imagen de la revista<i style="color: #e20816" class="fa fa-upload"></i></label>
                                    <input type="file" id="image_upload" class="form-control input-skew" name="journal_image" accept="image/jpeg, image/png" value="{{ old('journal_image', $publishing->journal_image) }}" @if ($errors->has('journal_image')) autofocus @endif required>
                                    @if ($errors->has('journal_image'))
                                    <div class="error-message">{{ $errors->first('journal_image') }}</div>
                                    @endif
                                    @if($publishing->journal_image)
                                    <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('storage/' . $publishing->journal_image) }}" alt="Imagen Principal" class="img-pequena">
                                    </p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Link de la revista</label>
                                    <input type="text" class="form-control input-skew" name="link_journal" placeholder="Ingrese el link de la revista" maxlength="150" minlength="5" value="{{ old('link_journal', $publishing->link_journal) }}" @if ($errors->has('link_journal')) autofocus @endif required>
                                    @if ($errors->has('link_journal'))
                                    <div class="error-message">{{ $errors->first('link_journal') }}</div>
                                    @endif
                                </div>
                            </div>

                        </div>


                        <input type="hidden" class="form-control" name="status" value="1">
                        <input type="hidden" class="form-control" name="registerBy" value="{{ Auth::user()->id }}">
                        <div style="margin-top: -2%">
                            <div style="padding: 25px 0 0 0" class="modal-footer">
                                <button style="background-color: #0d47a1; color: white" type="reset" class="button-ecu button-ecu-secondary">
                                    <span>Limpiar</span>
                                    <i class="fa fa-eraser"></i>
                                </button>
                                <button style="background-color: #4caf50" type="submit" class="button-ecu button-ecu-primary">
                                    <span>Actualizar</span>
                                    <i class="fa fa-save"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</main><!-- End #main -->
@include('include.alerts')
<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 600px; height: 400px; margin-top: 62px">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Agregar el elemento img para mostrar la imagen -->
                <img style="max-height: 320px" id="modal-image" src="" alt="Journal Image" class="img-fluid d-block mx-auto">
            </div>
        </div>
    </div>
</div>

<!-- Scripts y enlaces a bibliotecas JS (al final del archivo) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/14b19b20ff.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function showModalRegister() {
        // Abrir la modal
        $("#modal-register").modal('show');
    }

    function showModalUpdate(submissionId) {
        $('#modal-update-' + submissionId).modal('show');
    }

    function closeModal() {
        $("#modal-register").modal('hide');
        $("#modal-update").modal('hide');
    }

    function updateStatus(submissionId) {
        setTimeout(function() {
            document.getElementById('status' + submissionId).submit();
        }, 250);
    }

    function showImage(image_journal) {
        const modalImage = document.getElementById("modal-image");
        modalImage.src = "/storage/" + image_journal;
        $("#image-modal").modal('show');
    }
</script>

<script>
    function handleImageUpload(inputId) {
        document.getElementById(inputId).addEventListener('change', function () {
            var fileSize = this.files[0].size;
            var maxSize = 2048 * 1024;

            if (fileSize > maxSize) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'La imagen es demasiado grande. Por favor, seleccione una imagen más pequeña.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    customClass: {
                        popup: 'swal2-small',
                        background: 'swal2-background-red',
                    }
                });

                this.value = ''; // Clear the file input
            }
        });
    }

    handleImageUpload('image_upload');
</script>

<style>
    .swal2-small {
        width: 250px !important;
        height: 150px !important;
        font-size: 14px !important;
    }

    .swal2-background-red {
        background-color: red !important;
    }

    textarea.form-control {
        height: 75px;
    }
</style>





