@if($user)
<title>Dashboard | Social Events</title>
@include('include.dashboard')

<main id="main" class="main">

    <!-- Botón para abrir la modal de eventos sociales -->
    <button id="openHotelModal" class="btn btn-primary" onclick="showModalRegister()">
        <span>Registrar Evento</span>
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
                <th>Title</th>
                <th>Description 1</th>
                <th>Description 2</th>
                <th>Image</th>
                <th>Status</th>
                <th>Register by</th>
            </tr>
        </thead>
        <tbody>
            @if(count($events) > 0)
            @foreach($events as $event)
            <tr>
                <td class="controls-table">
                    <div class="simon">
                        <div class="botones">
                            <form id="update{{$event->id}}" method="POST" action="{{ route('events.update', $event->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="button" onclick="showModalUpdate('{{$event->id}}')" class="custom-btn btn-1" data-event-id="{{$event->id}}" data-toggle="tooltip" data-placement="left" title="Editar">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </form>

                            <form id="status{{$event->id}}" method="POST" action="{{ route('events.status', $event->id) }}">
                                @csrf
                                @method('PUT')

                                <button type="button" onclick="updateStatus('{{$event->id}}')" class="custom-btn {{($event->status == 1) ? 'btn-2' : 'btn-3'}}" data-toggle="tooltip" data-placement="left" title="{{($event->status == 1) ? 'Desactivar' : 'Activar'}}">
                                    <i class="fa-regular {{($event->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                </button>
                            </form>

                        </div>

                        <div class="botones3">
                            <form id="delete{{$event->id}}" method="POST" action="{{route('events.delete',$event->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </td>
                <td>{{$event->event_title}}</td>
                <td style="text-align: justify; width: 200px;">{{$event->event_description_one}}</td>
                <td style="text-align: justify; width: 200px;">{{$event->event_description_two}}</td>
                <td>
                    <button class="button-ecu button-ecu-primary" onclick="showImage('{{$event->event_image}}')">
                        <span>Mostrar</span>
                        <i class="fa fa-image"></i>
                    </button>
                </td>
                <td class="text {{ ($event->status == 1) ? 'activo' : 'inactivo' }}">{{($event->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                <td>{{$hotel->registerBy}}</td>

            </tr>
            @endforeach
            <div class="pagination-event">
                {{ $event->links() }}
            </div>
            @else
            <tr>
                <td colspan="9" style="text-align: center;">There not social events registered.</td>
            </tr>
            @endif
        </tbody>
    </table>
    <!-- Modal para registrar un evento -->
    <div style="overflow: hidden; height: auto; margin-top: -3%" class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; margin-top: 80px">
            <div style="height: 450px; border: none; overflow: scroll" class="modal-content">
                <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;" class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i style="color: #0d47a1" class="bi bi-building"></i>

                            Registrar Eventos Social

                    </span>
                    <form id="register_form" method="POST" action="{{ route('events.store') }}" autocomplete="off" enctype="multipart/form-data">
                        <div class="modal-body container">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Titulo del evento social</label>
                                        <input type="text" class="form-control input-skew" name="event_title" placeholder="Ingrese el titulo" maxlength="50" minlength="5" value="{{ old('event_title') }}" @if ($errors->has('event_title')) autofocus @endif required>
                                        @if ($errors->has('event_title'))
                                        <div class="error-message">{{ $errors->first('event_title') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Descripción Uno</label>
                                        <textarea type="text" class="form-control input-skew" name="event_description_one" placeholder="Ingrese la descripcion uno" maxlength="500" minlength="5" @if ($errors->has('event_description_one')) autofocus
                                                      @endif required style="max-height: 125px; min-height: 125px">{{ old('event_description_one') }}</textarea>
                                        @if ($errors->has('event_description_one'))
                                        <div class="error-message">{{ $errors->first('event_description_one') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Descripción Dos</label>
                                        <textarea type="text" class="form-control input-skew" name="event_description_two" placeholder="Ingrese la descripcion dos" maxlength="500" minlength="5" @if ($errors->has('event_description_two')) autofocus
                                                  @endif required style="max-height: 125px; min-height: 125px">{{ old('event_description_two') }}</textarea>
                                        @if ($errors->has('event_description_two'))
                                            <div class="error-message">{{ $errors->first('event_description_two') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Subir imagen Principal <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload" class="form-control input-skew" name="event_image" accept="image/jpeg, image/png" @if ($errors->has('event_image')) autofocus @endif required>
                                        @if ($errors->has('event_image'))
                                        <div class="error-message">{{ $errors->first('event_image') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 1 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_one" class="form-control input-skew" name="event_image_one" accept="image/jpeg, image/png" value="{{ old('event_image_one') }}" @if ($errors->has('event_image_one')) autofocus @endif>
                                        @if ($errors->has('event_image_one'))
                                        <div class="error-message">{{ $errors->first('event_image_one') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 2 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_two" class="form-control input-skew" name="event_image_two" accept="image/jpeg, image/png" value="{{ old('event_image_two') }}" @if ($errors->has('event_image_two')) autofocus @endif>
                                        @if ($errors->has('event_image_two'))
                                        <div class="error-message">{{ $errors->first('event_image_two') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 3 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_three" class="form-control input-skew" name="event_image_three" accept="image/jpeg, image/png" value="{{ old('event_image_three') }}" @if ($errors->has('event_image_three')) autofocus @endif>
                                        @if ($errors->has('event_image_three'))
                                        <div class="error-message">{{ $errors->first('event_image_three') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 4 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_four" class="form-control input-skew" name="event_image_four" accept="image/jpeg, image/png" value="{{ old('event_image_four') }}" @if ($errors->has('event_image_four')) autofocus @endif>
                                        @if ($errors->has('event_image_four'))
                                            <div class="error-message">{{ $errors->first('event_image_four') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 5 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_five" class="form-control input-skew" name="event_image_five" accept="image/jpeg, image/png" value="{{ old('event_image_five') }}" @if ($errors->has('event_image_five')) autofocus @endif>
                                        @if ($errors->has('event_image_five'))
                                            <div class="error-message">{{ $errors->first('event_image_five') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 6 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_six" class="form-control input-skew" name="event_image_six" accept="image/jpeg, image/png" value="{{ old('event_image_six') }}" @if ($errors->has('event_image_six')) autofocus @endif>
                                        @if ($errors->has('event_image_six'))
                                            <div class="error-message">{{ $errors->first('event_image_six') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 7 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_seven" class="form-control input-skew" name="event_image_seven" accept="image/jpeg, image/png" value="{{ old('event_image_seven') }}" @if ($errors->has('event_image_seven')) autofocus @endif>
                                        @if ($errors->has('event_image_seven'))
                                            <div class="error-message">{{ $errors->first('event_image_seven') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 8 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_eight" class="form-control input-skew" name="event_image_eight" accept="image/jpeg, image/png" value="{{ old('event_image_eight') }}" @if ($errors->has('event_image_eight')) autofocus @endif>
                                        @if ($errors->has('event_image_eight'))
                                            <div class="error-message">{{ $errors->first('event_image_eight') }}</div>
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


    @if(count($events) > 0)
    @foreach($events as $event)
    <!-- Modal para actualizar un evento -->
    <div style="overflow: hidden; height: auto; margin-top: -3%" class="modal fade" id="modal-update-{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px; margin-top: 50px">
            <div style="height: 580px; border: none;" class="modal-content">
                <div class="container-see" style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%; height: 574px; overflow: scroll; overflow-x: hidden;  ">

                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i style="color: #0d47a1" class="bi bi-building"></i>
                        Editar Evento Social

                    </span>
                    <form id="update_form" method="POST" action="{{ route('events.update', $event->id) }}" autocomplete="off" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Titulo del evento social</label>
                                        <input type="text" class="form-control input-skew" name="event_title" placeholder="Ingrese el titulo" maxlength="50" minlength="5" value="{{ old('event_title') }}" @if ($errors->has('event_title')) autofocus @endif required>
                                        @if ($errors->has('event_title'))
                                        <div class="error-message">{{ $errors->first('event_title') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Descripción Uno</label>
                                        <textarea type="text" class="form-control input-skew" name="event_description_one" placeholder="Ingrese la descripcion uno" maxlength="500" minlength="5" @if ($errors->has('event_description_one')) autofocus
                                                      @endif required style="max-height: 125px; min-height: 125px">{{ old('event_description_one') }}</textarea>
                                        @if ($errors->has('event_description_one'))
                                        <div class="error-message">{{ $errors->first('event_description_one') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Descripción Dos</label>
                                        <textarea type="text" class="form-control input-skew" name="event_description_two" placeholder="Ingrese la descripcion dos" maxlength="500" minlength="5" @if ($errors->has('event_description_two')) autofocus
                                                  @endif required style="max-height: 125px; min-height: 125px">{{ old('event_description_two') }}</textarea>
                                        @if ($errors->has('event_description_two'))
                                            <div class="error-message">{{ $errors->first('event_description_two') }}</div>
                                        @endif
                                    </div>
                                </div>
                            <div style="display: flex">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="padding-left: 4px">
                                    <div class="mb-3 input-ecu">

                                        <label class="form-label">Subir imagen Principal <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload" class="form-control input-skew" name="hotel_image" accept="image/jpeg, image/png" value="{{ old('hotel_image', $hotel->hotel_image) }}" @if ($errors->has('hotel_image')) autofocus @endif>
                                        @if($hotel->hotel_image)
                                        <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('uploads/hotels/' . $hotel->hotel_image) }}" alt="Imagen Principal" class="img-pequena">
                                        </p>
                                        @endif
                                    </div>
                                </div>

                            
                        <input type="hidden" class="form-control" name="status" value="1">
                        <input type="hidden" class="form-control" name="registerBy" value="{{ Auth::user()->id }}">
                        <div style="margin-top: -2%">
                            <div style="padding: 20px 0 0 0; margin-top: 20px" class="modal-footer">
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
<!--Modal de la imagen -->
<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 600px; height: 400px; margin-top: 62px">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Agregar el elemento img para mostrar la imagen -->
                <img style="max-height: 320px" id="modal-image" src="" alt="Hotel Image" class="img-fluid d-block mx-auto">
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

    function showModalUpdate(eventId) {
        $('#modal-update-' + eventId).modal('show');
    }

    function closeModal() {
        $("#modal-register").modal('hide');
        $("#modal-update").modal('hide');
    }

    function updateStatus(eventId) {
        setTimeout(function() {
            document.getElementById('status' + eventId).submit();
        }, 250);
    }

    function showImage(event_image) {
        const modalImage = document.getElementById("modal-image");
        modalImage.src = "uploads/socialEvents/" + event_image;
        $("#image-modal").modal('show');
    }
</script>

<script>
    function handleImageUpload(inputId) {
        document.getElementById(inputId).addEventListener('change', function() {
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
    handleImageUpload('image_upload_two');
    handleImageUpload('image_upload_three');
    handleImageUpload('image_upload_four');
    handleImageUpload('image_upload_five');
    handleImageUpload('image_upload_six');
    handleImageUpload('image_upload_seven');
    handleImageUpload('image_upload_eight');
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
