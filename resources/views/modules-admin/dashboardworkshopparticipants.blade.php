@if($user)
    <title>Dashboard | WorkShop Participants</title>
    @include('include.dashboard')

    <main id="main" class="main">

        <!-- Botón para abrir la modal de registro de participantes del workshop -->
        <button id="openTopicModal" class="btn btn-primary" onclick="showModalRegister()">
            <span>Registrar Participantes del WorkShop</span>
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
            @if(count($participants) > 0)
                @foreach($participants as $participant)
                    <tr>
                        <td class="controls-table">
                            <div class="simon">
                                <div class="botones">
                                    <form id="update{{$participant->id}}" method="POST"
                                          action="{{ route('participants.update', $participant->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" onclick="showModalUpdate('{{$participant->id}}')"
                                                class="custom-btn btn-1" data-participant-id="{{$participant->id}}"
                                                data-toggle="tooltip"
                                                data-placement="left" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </form>

                                    <form id="status{{$participant->id}}" method="POST"
                                          action="{{ route('participants.status', $participant->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <button type="button" onclick="updateStatus('{{$participant->id}}')"
                                                class="custom-btn {{($participant->status == 1) ? 'btn-2' : 'btn-3'}}"
                                                data-toggle="tooltip" data-placement="left"
                                                title="{{($participant->status == 1) ? 'Desactivar' : 'Activar'}}">
                                            <i class="fa-regular {{($participant->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                        </button>
                                    </form>

                                </div>

                                <div class="botones3">
                                    <form id="delete{{$participant->id}}" method="POST"
                                          action="{{route('participants.delete',$participant->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right"
                                                title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </td>
                        <td>{{$participant->participant_name}} {{$participant->participant_title}}</td>
                        <td>{{$participant->participant_presentation}}</td>
                        <td style="text-align: justify;">{{$participant->participant_description}}</td>
                        <td>{{$participant->participant_university}}</td>
                        <td>
                            <button class="button-ecu button-ecu-primary"
                                    onclick="showImage('{{$participant->participant_profile}}')">
                                <span>Mostrar</span>
                                <i class="fa fa-image"></i>
                            </button>
                        </td>
                        <td>
                            <button class="button-ecu button-ecu-primary"
                                    onclick="showImage('{{$participant->participant_image_country}}')">
                                <span>Mostrar</span>
                                <i class="fa fa-image"></i>
                            </button>
                        </td>
                        <td class="text {{ ($participant->status == 1) ? 'activo' : 'inactivo' }}">{{($participant->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                        <td>{{$participant->registerBy}}</td>

                    </tr>
                @endforeach
                {{--            <div class="pagination-participants">--}}
                {{--                {{ $dates->links() }}--}}
                {{--            </div>--}}
            @else
                <tr>
                    <td colspan="9" style="text-align: center;">No participants registered.</td>
                </tr>
            @endif
            </tbody>
        </table>
        <!-- Modal para registrar un participante -->
        <div style="overflow: hidden; height: auto; margin-top: -3%" class="modal fade" id="modal-register"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; margin-top: 86px;">
                <div style="height: 480px; border: none;" class="modal-content">
                    <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;"
                         class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Participante del WorkShop

                    </span>
                        <form id="register_form" method="POST" action="{{ route('participants.store') }}"
                              autocomplete="off"
                              enctype="multipart/form-data">
                            <div class="modal-body container">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Nombre y Apellido del
                                                participante</label>
                                            <input type="text" class="form-control input-skew" name="participant_name"
                                                   placeholder="Ingrese el nombre y apellido del participante"
                                                   maxlength="200"
                                                   minlength="10" value="{{ old('participant_name') }}"
                                                   @if ($errors->has('participant_name')) autofocus @endif required>
                                            @if ($errors->has('participant_name'))
                                                <div
                                                    class="error-message">{{ $errors->first('participant_name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Titúlo del participante</label>
                                            <input type="text" class="form-control input-skew" name="participant_title"
                                                   placeholder="Ingrese el titúlo del participante" maxlength="20"
                                                   minlength="10" value="{{ old('participant_title') }}"
                                                   @if ($errors->has('participant_title')) autofocus @endif required>
                                            @if ($errors->has('participant_title'))
                                                <div
                                                    class="error-message">{{ $errors->first('participant_title') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Presentación del participante</label>
                                            <textarea type="text" class="form-control input-skew"
                                                      name="participant_presentation"
                                                      placeholder="Ingrese la presentación del participante"
                                                      maxlength="200" minlength="10"
                                                      value="{{ old('participant_presentation') }}"
                                                      @if ($errors->has('participant_presentation'))autofocus
                                                      @endif required
                                                      style="max-height: 80px; min-height: 80px"></textarea>
                                            @if ($errors->has('participant_presentation'))
                                                <div
                                                    class="error-message">{{ $errors->first('participant_presentation') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Descripción del participante</label>
                                            <textarea type="text" class="form-control input-skew"
                                                      name="participant_description"
                                                      placeholder="Ingrese la descripción del participante"
                                                      maxlength="1000" minlength="10"
                                                      value="{{ old('participant_description') }}"
                                                      @if ($errors->has('participant_description'))autofocus
                                                      @endif required
                                                      style="max-height: 80px; min-height: 80px"></textarea>
                                            @if ($errors->has('participant_description'))
                                                <div
                                                    class="error-message">{{ $errors->first('participant_description') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Universidad del participante</label>
                                            <input type="text" class="form-control input-skew"
                                                   name="participant_university"
                                                   placeholder="Ingrese la Universidad del participante" maxlength="200"
                                                   minlength="10" value="{{ old('participant_university') }}"
                                                   @if ($errors->has('participant_university')) autofocus
                                                   @endif required>
                                            @if ($errors->has('participant_university'))
                                                <div
                                                    class="error-message">{{ $errors->first('participant_university') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Subir imagen del participante <i
                                                    style="color: #e20816" class="fa fa-upload"></i></label>
                                            <input type="file" id="image_upload" class="form-control input-skew"
                                                   name="participant_profile" accept="image/jpeg, image/png"
                                                   @if ($errors->has('participant_profile')) autofocus @endif>
                                            @if ($errors->has('participant_profile'))
                                                <div
                                                    class="error-message">{{ $errors->first('participant_profile') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Subir imagen del pais del participante <i
                                                    style="color: #e20816" class="fa fa-upload"></i></label>
                                            <input type="file" id="image_upload_one" class="form-control input-skew"
                                                   name="participant_image_country" accept="image/jpeg, image/png"
                                                   @if ($errors->has('participant_image_country')) autofocus @endif>
                                            @if ($errors->has('participant_image_country'))
                                                <div
                                                    class="error-message">{{ $errors->first('participant_image_country') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" name="status" value="1">
                                    <input type="hidden" class="form-control" name="registerBy"
                                           value="{{ Auth::user()->id }}">
                                    <div style="padding: 30px 0 0 0; margin-top: -60px; border:none"
                                         class="modal-footer">
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

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @if(count($participants) > 0)
            @foreach($participants as $participant)
                <!-- Modal para actualizar un fecha importante -->
                <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade"
                     id="modal-update-{{$participant->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">

                    <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px; top: 22%">
                        <div style="height: 300px; border: none;" class="modal-content">
                            <div
                                style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%"
                                class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>
                        Editar Participantes del WorkShop

                    </span>
                                <form id="update_form" method="POST"
                                      action="{{ route('participants.update', $participant->id) }}"
                                      autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Nombre y Apellido del
                                                        participante</label>
                                                    <input type="text" class="form-control input-skew"
                                                           name="participant_name"
                                                           placeholder="Ingrese el nombre y apellido del participante"
                                                           maxlength="200"
                                                           minlength="10"
                                                           value="{{ old('participant_name', $participant->participant_name) }}"
                                                           @if ($errors->has('participant_name')) autofocus
                                                           @endif required>
                                                    @if ($errors->has('participant_name'))
                                                        <div
                                                            class="error-message">{{ $errors->first('participant_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Titúlo del participante</label>
                                                    <input type="text" class="form-control input-skew"
                                                           name="participant_title"
                                                           placeholder="Ingrese el titúlo del participante"
                                                           maxlength="20"
                                                           minlength="10"
                                                           value="{{ old('participant_title', $participant->participant_title) }}"
                                                           @if ($errors->has('participant_title')) autofocus
                                                           @endif required>
                                                    @if ($errors->has('participant_title'))
                                                        <div
                                                            class="error-message">{{ $errors->first('participant_title') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Presentación del
                                                        participante</label>
                                                    <textarea type="text" class="form-control input-skew"
                                                              name="participant_presentation"
                                                              placeholder="Ingrese la dresentación del participante"
                                                              maxlength="200" minlength="10"
                                                              @if ($errors->has('participant_presentation'))autofocus
                                                              @endif required>{{ $participant->participant_presentation }}</textarea>
                                                    @if ($errors->has('participant_presentation'))
                                                        <div
                                                            class="error-message">{{ $errors->first('participant_presentation') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Descripción del
                                                        participante</label>
                                                    <textarea type="text" class="form-control input-skew"
                                                              name="participant_description"
                                                              placeholder="Ingrese la descripción del participante"
                                                              maxlength="1000" minlength="10"
                                                              @if ($errors->has('participant_description'))autofocus
                                                              @endif required>{{ $participant->participant_description }}</textarea>
                                                    @if ($errors->has('participant_description'))
                                                        <div
                                                            class="error-message">{{ $errors->first('participant_description') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Universidad del
                                                        participante</label>
                                                    <input type="text" class="form-control input-skew"
                                                           name="participant_university"
                                                           placeholder="Ingrese la Universidad del participante"
                                                           maxlength="200"
                                                           minlength="10"
                                                           value="{{ old('participant_university', $participant->participant_university) }}"
                                                           @if ($errors->has('participant_university')) autofocus
                                                           @endif required>
                                                    @if ($errors->has('participant_university'))
                                                        <div
                                                            class="error-message">{{ $errors->first('participant_university') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Subir imagen del participante <i
                                                            style="color: #e20816" class="fa fa-upload"></i></label>
                                                    <input type="file" id="image_upload" class="form-control input-skew"
                                                           name="participant_profile" accept="image/jpeg, image/png"
                                                           value="{{ old('participant_profile', $participant->participant_profile) }}"
                                                           @if ($errors->has('participant_profile')) autofocus @endif>
                                                    @if($participant->participant_profile)
                                                        <p class="image-actual">Imagen actual: <img
                                                                style="width: 100px; margin-left: 10px;"
                                                                src="{{ asset('storage/' . $participant->participant_profile) }}"
                                                                alt="Imagen Principal" class="img-pequena">
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Subir imagen del pais del
                                                        participante <i
                                                            style="color: #e20816" class="fa fa-upload"></i></label>
                                                    <input type="file" id="image_upload_one"
                                                           class="form-control input-skew"
                                                           name="participant_image_country"
                                                           accept="image/jpeg, image/png"
                                                           value="{{ old('participant_image_country', $participant->participant_image_country) }}"
                                                           @if ($errors->has('participant_image_country')) autofocus @endif>
                                                    @if($participant->participant_image_country)
                                                        <p class="image-actual">Imagen actual: <img
                                                                style="width: 100px; margin-left: 10px;"
                                                                src="{{ asset('storage/' . $participant->participant_image_country) }}"
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
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

        function showModalUpdate(participantId) {
            $('#modal-update-' + participantId).modal('show');
        }

        function closeModal() {
            $("#modal-register").modal('hide');
            $("#modal-update").modal('hide');
        }

        function updateStatus(participantId) {
            setTimeout(function () {
                document.getElementById('status' + participantId).submit();
            }, 250);
        }

        function showImage(participant_profile) {
            const modalImage = document.getElementById("modal-image");
            modalImage.src = "/storage/" + participant_profile;
            $("#image-modal").modal('show');
        }

        function showImage(participant_image_country) {
            const modalImage = document.getElementById("modal-image");
            modalImage.src = "/storage/" + participant_image_country;
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
