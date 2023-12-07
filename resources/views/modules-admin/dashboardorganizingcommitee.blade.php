@if($user)
    <title>Dashboard | Speakers</title>
    @include('include.dashboard')

    <main id="main" class="main">

        <!-- Botón para abrir la modal de registro de ponentes -->
        <button id="openTopicModal" class="btn btn-primary" onclick="showModalRegister()">
            <span>Registrar Ponentes</span>
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
                <th>Name and Title</th>
                <th>Presentation</th>
                <th>Description</th>
                <th>University</th>
                <th>Image Profile</th>
                <th>Image Country</th>
                <th>Status</th>
                <th>Register by</th>
            </tr>
            </thead>
            <tbody>
            @if(count($speakers) > 0)
                @foreach($speakers as $speaker)
                    <tr>
                        <td class="controls-table">
                            <div class="simon">
                                <div class="botones">
                                    <form id="update{{$speaker->id}}" method="POST"
                                          action="{{ route('speakers.update', $speaker->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" onclick="showModalUpdate('{{$speaker->id}}')"
                                                class="custom-btn btn-1" data-speaker-id="{{$speaker->id}}"
                                                data-toggle="tooltip"
                                                data-placement="left" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </form>

                                    <form id="status{{$speaker->id}}" method="POST"
                                          action="{{ route('speakers.status', $speaker->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <button type="button" onclick="updateStatus('{{$speaker->id}}')"
                                                class="custom-btn {{($speaker->status == 1) ? 'btn-2' : 'btn-3'}}"
                                                data-toggle="tooltip" data-placement="left"
                                                title="{{($speaker->status == 1) ? 'Desactivar' : 'Activar'}}">
                                            <i class="fa-regular {{($speaker->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                        </button>
                                    </form>

                                </div>

                                <div class="botones3">
                                    <form id="delete{{$speaker->id}}" method="POST"
                                          action="{{route('speakers.delete',$speaker->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right"
                                                title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </td>
                        <td>{{$speaker->speaker_name}} {{$speaker->speaker_title}}</td>
                        <td>{{$speaker->speaker_presentation}}</td>
                        <td style="text-align: justify;">{{$speaker->speaker_description}}</td>
                        <td>{{$speaker->speaker_university}}</td>
                        <td>
                            <button class="button-ecu button-ecu-primary"
                                    onclick="showImage('{{$speaker->speaker_profile}}')">
                                <span>Mostrar</span>
                                <i class="fa fa-image"></i>
                            </button>
                        </td>
                        <td>
                            <button class="button-ecu button-ecu-primary"
                                    onclick="showImage('{{$speaker->speaker_image_country}}')">
                                <span>Mostrar</span>
                                <i class="fa fa-image"></i>
                            </button>
                        </td>
                        <td class="text {{ ($speaker->status == 1) ? 'activo' : 'inactivo' }}">{{($speaker->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                        <td>{{$speaker->registerBy}}</td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" style="text-align: center;">No speakers registered.</td>
                </tr>
            @endif
            </tbody>
        </table>
        <!-- Modal para registrar un ponente -->
        <div style="overflow: hidden; height: auto; margin-top: -3%" class="modal fade" id="modal-register"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; margin-top: 86px">
                <div style="height: 480px; border: none;" class="modal-content">
                    <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;"
                         class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Ponente

                    </span>
                        <form id="register_form" method="POST" action="{{ route('speakers.store') }}" autocomplete="off"
                              enctype="multipart/form-data">
                            <div class="modal-body container">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Nombre y Apellido del ponente</label>
                                            <input type="text" class="form-control input-skew" name="speaker_name"
                                                   placeholder="Ingrese el nombre y apellido del ponente"
                                                   maxlength="200"
                                                   minlength="10" value="{{ old('speaker_name') }}"
                                                   @if ($errors->has('speaker_name')) autofocus @endif required>
                                            @if ($errors->has('speaker_name'))
                                                <div class="error-message">{{ $errors->first('speaker_name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Titúlo del ponente</label>
                                            <input type="text" class="form-control input-skew" name="speaker_title"
                                                   placeholder="Ingrese el titúlo del ponente" maxlength="20"
                                                   minlength="10" value="{{ old('speaker_title') }}"
                                                   @if ($errors->has('speaker_title')) autofocus @endif required>
                                            @if ($errors->has('speaker_title'))
                                                <div class="error-message">{{ $errors->first('speaker_title') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Presentación del ponente</label>
                                            <textarea type="text" class="form-control input-skew"
                                                      name="speaker_presentation"
                                                      placeholder="Ingrese la dresentación del ponente" maxlength="300"
                                                      minlength="10"
                                                      value="{{ old('speaker_presentation') }}"
                                                      @if ($errors->has('speaker_presentation'))autofocus
                                                      @endif required
                                                      style="max-height: 80px; min-height: 80px"></textarea>
                                            @if ($errors->has('speaker_presentation'))
                                                <div
                                                    class="error-message">{{ $errors->first('speaker_presentation') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Descripción del ponente</label>
                                            <textarea type="text" class="form-control input-skew"
                                                      name="speaker_description"
                                                      placeholder="Ingrese la descripción del ponente" maxlength="300"
                                                      minlength="10"
                                                      value="{{ old('speaker_description') }}"
                                                      @if ($errors->has('speaker_description'))autofocus
                                                      @endif required
                                                      style="max-height: 80px; min-height: 80px"></textarea>
                                            @if ($errors->has('speaker_description'))
                                                <div
                                                    class="error-message">{{ $errors->first('speaker_description') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Universidad del ponente</label>
                                            <input type="text" class="form-control input-skew" name="speaker_university"
                                                   placeholder="Ingrese la Universidad del ponente" maxlength="100"
                                                   minlength="10" value="{{ old('speaker_title') }}"
                                                   @if ($errors->has('speaker_university')) autofocus @endif required>
                                            @if ($errors->has('speaker_university'))
                                                <div
                                                    class="error-message">{{ $errors->first('speaker_university') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Subir imagen del ponente <i
                                                    style="color: #e20816" class="fa fa-upload"></i></label>
                                            <input type="file" id="image_upload" class="form-control input-skew"
                                                   name="speaker_profile" accept="image/jpeg, image/png"
                                                   @if ($errors->has('speaker_profile')) autofocus @endif>
                                            @if ($errors->has('speaker_profile'))
                                                <div class="error-message">{{ $errors->first('speaker_profile') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Subir imagen del pais del ponente <i
                                                    style="color: #e20816" class="fa fa-upload"></i></label>
                                            <input type="file" id="image_upload_one" class="form-control input-skew"
                                                   name="speaker_image_country" accept="image/jpeg, image/png"
                                                   @if ($errors->has('speaker_image_country')) autofocus @endif>
                                            @if ($errors->has('speaker_image_country'))
                                                <div
                                                    class="error-message">{{ $errors->first('speaker_image_country') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="status" value="1">
                                <input type="hidden" class="form-control" name="registerBy"
                                       value="{{ Auth::user()->id }}">
                                <div style="padding: 30px 0 0 0; margin-top: -60px; border:none" class="modal-footer">
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


        @if(count($speakers) > 0)
            @foreach($speakers as $speaker)
                <!-- Modal para actualizar un fecha importante -->
                <div style="overflow: hidden; height: auto; margin-top: -3%" class="modal fade"
                     id="modal-update-{{$speaker->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">

                    <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px; margin-top: 50px">
                        <div style="height: 500px; border: none;" class="modal-content">
                            <div class="container-see"
                                 style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%; height: 574px; overflow: scroll; overflow-x: hidden;  ">

                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>
                        Editar Ponente

                    </span>
                                <form id="update_form" method="POST"
                                      action="{{ route('speakers.update', $speaker->id) }}"
                                      autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Nombre y Apellido del
                                                        ponente</label>
                                                    <input type="text" class="form-control input-skew"
                                                           name="speaker_name"
                                                           placeholder="Ingrese el nombre y apellido del ponente"
                                                           maxlength="200"
                                                           minlength="10"
                                                           value="{{ old('speaker_name', $speaker->speaker_name) }}"
                                                           @if ($errors->has('speaker_name')) autofocus @endif required>
                                                    @if ($errors->has('speaker_name'))
                                                        <div
                                                            class="error-message">{{ $errors->first('speaker_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Titúlo del ponente</label>
                                                    <input type="text" class="form-control input-skew"
                                                           name="speaker_title"
                                                           placeholder="Ingrese el titúlo del ponente" maxlength="20"
                                                           minlength="10"
                                                           value="{{ old('speaker_title', $speaker->speaker_title) }}"
                                                           @if ($errors->has('speaker_title')) autofocus
                                                           @endif required>
                                                    @if ($errors->has('speaker_title'))
                                                        <div
                                                            class="error-message">{{ $errors->first('speaker_title') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Presentación del ponente</label>
                                                    <textarea type="text" class="form-control input-skew"
                                                              name="speaker_presentation"
                                                              placeholder="Ingrese la dresentación del ponente"
                                                              maxlength="300" minlength="10"
                                                              @if ($errors->has('speaker_presentation'))autofocus
                                                              @endif required
                                                              style="max-height: 100px; min-height: 100px;">{{ $speaker->speaker_presentation }}</textarea>
                                                    @if ($errors->has('speaker_presentation'))
                                                        <div
                                                            class="error-message">{{ $errors->first('speaker_presentation') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Descripción del ponente</label>
                                                    <textarea type="text" class="form-control input-skew"
                                                              name="speaker_description"
                                                              placeholder="Ingrese la descripción del ponente"
                                                              maxlength="300" minlength="10"
                                                              @if ($errors->has('speaker_description'))autofocus
                                                              @endif required
                                                              style="max-height: 100px; min-height: 100px;">{{ $speaker->speaker_description }}</textarea>
                                                    @if ($errors->has('speaker_description'))
                                                        <div
                                                            class="error-message">{{ $errors->first('speaker_description') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Universidad del ponente</label>
                                                    <input type="text" class="form-control input-skew"
                                                           name="speaker_university"
                                                           placeholder="Ingrese la Universidad del ponente"
                                                           maxlength="100"
                                                           minlength="10"
                                                           value="{{ old('speaker_university', $speaker->speaker_university) }}"
                                                           @if ($errors->has('speaker_university')) autofocus
                                                           @endif required>
                                                    @if ($errors->has('speaker_university'))
                                                        <div
                                                            class="error-message">{{ $errors->first('speaker_university') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Subir imagen del ponente <i
                                                            style="color: #e20816" class="fa fa-upload"></i></label>
                                                    <input type="file" id="image_upload" class="form-control input-skew"
                                                           name="speaker_profile" accept="image/jpeg, image/png"
                                                           value="{{ old('speaker_profile', $speaker->speaker_profile) }}"
                                                           @if ($errors->has('speaker_profile')) autofocus @endif>
                                                    @if($speaker->speaker_profile)
                                                        <p class="image-actual">Imagen actual: <img
                                                                style="width: 100px; margin-left: 10px;"
                                                                src="{{ asset('uploads/speakers/' . $speaker->speaker_profile) }}"
                                                                alt="Imagen Principal" class="img-pequena">
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Subir imagen del pais del ponente
                                                        <i
                                                            style="color: #e20816" class="fa fa-upload"></i></label>
                                                    <input type="file" id="image_upload_one"
                                                           class="form-control input-skew"
                                                           name="speaker_image_country" accept="image/jpeg, image/png"
                                                           value="{{ old('speaker_image_country', $speaker->speaker_image_country) }}"
                                                           @if ($errors->has('speaker_image_country')) autofocus @endif>
                                                    @if($speaker->speaker_image_country)
                                                        <p class="image-actual">Imagen actual: <img
                                                                style="width: 100px; margin-left: 10px;"
                                                                src="{{ asset('uploads/countries/' . $speaker->speaker_image_country) }}"
                                                                alt="Imagen Principal" class="img-pequena">
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" class="form-control" name="status" value="1">
                                        <input type="hidden" class="form-control" name="registerBy"
                                               value="{{ Auth::user()->id }}">
                                        <div style="margin-top: -2%">
                                            <div style="padding: 25px 0 0 0" class="modal-footer">
                                                <button style="background-color: #0d47a1; color: white" type="reset"
                                                        class="button-ecu button-ecu-secondary">
                                                    <span>Limpiar</span>
                                                    <i class="fa fa-eraser"></i>
                                                </button>
                                                <button style="background-color: #4caf50" type="submit"
                                                        class="button-ecu button-ecu-primary">
                                                    <span>Actualizar</span>
                                                    <i class="fa fa-save"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif    <div class="pagination-speakers" style="text-align: end">
            {{ $speakers->links() }}
        </div>

    </main><!-- End #main -->
    @include('include.alerts')
    <!--Modal de la imagen -->
    <div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" style="min-width: 600px; height: 400px; margin-top: 62px">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Agregar el elemento img para mostrar la imagen -->
                    <img style="max-height: 320px" id="modal-image" src="" alt="Hotel Image"
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

    <script>
        function showModalRegister() {
            // Abrir la modal
            $("#modal-register").modal('show');
        }

        function showModalUpdate(speakerId) {
            $('#modal-update-' + speakerId).modal('show');
        }

        function closeModal() {
            $("#modal-register").modal('hide');
            $("#modal-update").modal('hide');
        }

        function updateStatus(speakerId) {
            setTimeout(function () {
                document.getElementById('status' + speakerId).submit();
            }, 250);
        }

        function showImage(speaker_profile) {
            const modalImage = document.getElementById("modal-image");
            modalImage.src = "uploads/speakers/" + speaker_profile;
            $("#image-modal").modal('show');
        }

        function showImage(speaker_image_country) {
            const modalImage = document.getElementById("modal-image");
            modalImage.src = "uploads/countries/" + speaker_image_country;
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
        handleImageUpload('image_upload_one');
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
