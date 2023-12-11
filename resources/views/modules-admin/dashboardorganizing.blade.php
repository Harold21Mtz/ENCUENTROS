@if($user)
    <title>Dashboard | Organizing</title>
    @include('include.dashboard')

    <main id="main" class="main">

        <!-- Botón para abrir la modal de organizacion -->
        <button id="openOrganizingModal" class="btn btn-primary" onclick="showModalRegister()">
            <span>Registrar Entidad Organizadora</span>
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
                <th>Name</th>
                <th>Image</th>
                <th>Status</th>
                <th>Register by</th>
            </tr>
            </thead>
            <tbody>
            @if(count($organizings) > 0)
                @foreach($organizings as $organizing)
                    <tr>
                        <td class="controls-table">
                            <div class="simon">
                                <div class="botones">
                                    <form id="update{{$organizing->id}}" method="POST"
                                          action="{{ route('organizings.update', $organizing->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" onclick="showModalUpdate('{{$organizing->id}}')"
                                                class="custom-btn btn-1" data-organizing-id="{{$organizing->id}}"
                                                data-toggle="tooltip" data-placement="left" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </form>

                                    <form id="status{{$organizing->id}}" method="POST"
                                          action="{{ route('organizing.status', $organizing->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <button type="button" onclick="updateStatus('{{$organizing->id}}')"
                                                class="custom-btn {{($organizing->status == 1) ? 'btn-2' : 'btn-3'}}"
                                                data-toggle="tooltip" data-placement="left"
                                                title="{{($organizing->status == 1) ? 'Desactivar' : 'Activar'}}">
                                            <i class="fa-regular {{($organizing->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                        </button>
                                    </form>

                                </div>

                                <div class="botones3">
                                    <form id="delete{{$organizing->id}}" method="POST"
                                          action="{{route('organizings.delete',$organizing->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right"
                                                title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </td>
                        <td>{{$organizing->organizing_name}}</td>
                        <td>
                            <button class="button-ecu button-ecu-primary"
                                    onclick="showImage('{{$organizing->organizing_image}}')">
                                <span>Mostrar</span>
                                <i class="fa fa-image"></i>
                            </button>
                        </td>
                        <td class="text {{ ($organizing->status == 1) ? 'activo' : 'inactivo' }}">{{($organizing->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                        <td>{{$organizing->registerBy}}</td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" style="text-align: center;">There not organizing registered.</td>
                </tr>
            @endif
            </tbody>
        </table>
        <!-- Modal para registrar un organizador -->
        <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-register"
             tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 600px;">
                <div style="height: 230px; border: none; overflow: hidden" class="modal-content">
                    <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;"
                         class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Entidad Organizadora

                    </span>
                        <form id="register_form" method="POST" action="{{ route('organizings.store') }}" autocomplete="off"
                              enctype="multipart/form-data">
                            <div class="modal-body container">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Nombre de la entidad</label>
                                            <input type="text" class="form-control input-skew" name="organizing_name"
                                                   placeholder="Ingrese el nombre" maxlength="50" minlength="5"
                                                   value="{{ old('organizing_name') }}"
                                                   @if ($errors->has('organizing_name')) autofocus @endif required>
                                            @if ($errors->has('organizing_name'))
                                                <div class="error-message">{{ $errors->first('organizing_name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Subir imagen de la entidad <i
                                                    style="color: #e20816" class="fa fa-upload"></i></label>
                                            <input type="file" id="image_upload" class="form-control input-skew"
                                                   name="organizing_image" accept="image/jpeg, image/png"
                                                   @if ($errors->has('organizing_image')) autofocus @endif required>
                                            @if ($errors->has('organizing_image'))
                                                <div class="error-message">{{ $errors->first('organizing_image') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="status" value="1">
                                <input type="hidden" class="form-control" name="registerBy"
                                       value="{{ Auth::user()->id }}">
                                <div style="padding: 30px 0 0 0" class="modal-footer">
                                    <button style="background-color: #0d47a1; color: white" type="reset"
                                            class="button-ecu button-ecu-secondary">
                                        <span>Limpiar</span>
                                        <i class="fa fa-eraser"></i>
                                    </button>
                                    <button style="background-color: #4caf50" type="submit"
                                            class="button-ecu button-ecu-primary">
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

        @if(count($organizings) > 0)
            @foreach($organizings as $organizing)
                <!-- Modal para actualizar una entidad organizadora -->
                <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade"
                     id="modal-update-{{$organizing->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">

                    <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 600px;">
                        <div style="height: 240px; border: none;" class="modal-content">
                            <div class="container-see"
                                 style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%; height: 600px; overflow: hiden;">

                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>
                        Editar Entidad Organizadora

                    </span>
                                <form id="update_form" method="POST" action="{{ route('organizings.update', $organizing->id) }}"
                                      autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Nombre de la entidad</label>
                                                <input type="text" class="form-control input-skew" name="organizing_name"
                                                       placeholder="Ingrese el nombre" maxlength="50" minlength="5"
                                                       value="{{ old('organizing_name', $organizing->organizing_name) }}"
                                                       @if ($errors->has('organizing_name')) autofocus @endif required>
                                                @if ($errors->has('organizing_name'))
                                                    <div class="error-message">{{ $errors->first('organizing_name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Subir imagen de la entidad <i
                                                        style="color: #e20816" class="fa fa-upload"></i></label>
                                                <input type="file" id="image_upload" class="form-control input-skew"
                                                       name="organizing_image" accept="image/jpeg, image/png"
                                                       value="{{ old('organizing_image', $organizing->organizing_image) }}"
                                                       @if ($errors->has('organizing_image')) autofocus @endif required>
                                                @if($organizing->organizing_image)
                                                    <p class="image-actual">Imagen actual: <img
                                                            style="width: 100px; margin-left: 10px;"
                                                            src="{{ asset('uploads/organizing/' . $organizing->organizing_image) }}"
                                                            alt="Imagen Principal" class="img-pequena">
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="status" value="1">
                                    <input type="hidden" class="form-control" name="registerBy"
                                           value="{{ Auth::user()->id }}">
                                    <div style="padding: 30px 0 0 0" class="modal-footer">
                                        <button style="background-color: #0d47a1; color: white" type="reset"
                                                class="button-ecu button-ecu-secondary">
                                            <span>Limpiar</span>
                                            <i class="fa fa-eraser"></i>
                                        </button>
                                        <button style="background-color: #4caf50" type="submit"
                                                class="button-ecu button-ecu-primary">
                                            <span>Guardar</span>
                                            <i class="fa fa-save"></i>
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="pagination-organizing" style="text-align: end">
            {{ $organizings->links() }}
        </div>
    </main><!-- End #main -->
    @include('include.alerts')
    <!--Modal de la imagen -->
    <div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" style="min-width: 500px; height: 340px; margin-top: 62px">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Agregar el elemento img para mostrar la imagen -->
                    <img style="max-height: 320px" id="modal-image" src="" alt="Organizing Image"
                         class="img-fluid d-block mx-auto">
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts y enlaces a bibliotecas JS (al final del archivo) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/14b19b20ff.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Scripts personalizados -->
    <script>
        function showModalRegister() {
            // Abrir la modal
            $("#modal-register").modal('show');
        }

        function showModalUpdate(organizingId) {
            $('#modal-update-' + organizingId).modal('show');
        }

        function closeModal() {
            $("#modal-register").modal('hide');
            $("#modal-update").modal('hide');
        }

        function updateStatus(organizingId) {
            setTimeout(function () {
                document.getElementById('status' + organizingId).submit();
            }, 250);
        }

        function showImage(organizing_image) {
            const modalImage = document.getElementById("modal-image");
            modalImage.src = "uploads/organizing/" + organizing_image;
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
@else
    @include("auth.login")
@endif
