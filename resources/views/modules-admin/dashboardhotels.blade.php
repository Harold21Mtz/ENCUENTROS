@if($user)
<title>Dashboard | Hotels</title>
@include('include.sidebar')

<main id="main" class="main">

    <!-- Botón para abrir la modal de registro de hotel -->
    <button id="openHotelModal" class="btn btn-primary" onclick="showModalRegister()">
        <span>Registrar Hotel</span>
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
                <th>Description</th>
                <th>Contact number</th>
                <th>Contact email</th>
                <th>Image</th>
                <th>Location</th>
                <th>Status</th>
                <th>Register by</th>
            </tr>
        </thead>
        <tbody>
            @if(count($hotels) > 0)
            @foreach($hotels as $hotel)
            <tr>
                <td class="controls-table">
                    <div class="simon">
                        <div class="botones">
                            <form id="update{{$hotel->id}}" method="POST" action="{{ route('hotels.update', $hotel->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="button" onclick="showModalUpdate('{{$hotel->id}}')" class="custom-btn btn-1" data-hotel-id="{{$hotel->id}}" data-toggle="tooltip" data-placement="left" title="Editar">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </form>

                            <form id="status{{$hotel->id}}" method="POST" action="{{ route('hotels.status', $hotel->id) }}">
                                @csrf
                                @method('PUT')

                                <button type="button" onclick="updateStatus('{{$hotel->id}}')" class="custom-btn {{($hotel->status == 1) ? 'btn-2' : 'btn-3'}}" data-toggle="tooltip" data-placement="left" title="{{($hotel->status == 1) ? 'Desactivar' : 'Activar'}}">
                                    <i class="fa-regular {{($hotel->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                </button>
                            </form>

                        </div>

                        <div class="botones3">
                            <form id="delete{{$hotel->id}}" method="POST" action="{{route('hotels.delete',$hotel->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </td>
                <td>{{$hotel->hotel_name}}</td>
                <td style="text-align: justify; width: 200px;">{{$hotel->hotel_description}}</td>
                <td>{{$hotel->hotel_contact_number}}</td>
                <td>{{$hotel->hotel_contact_email}}</td>
                <td>
                    <button class="button-ecu button-ecu-primary" onclick="showImage('{{$hotel->hotel_image}}')">
                        <span>Mostrar</span>
                        <i class="fa fa-image"></i>
                    </button>
                </td>
                <td style="text-align: justify; max-width: 150px; white-space: nowrap; overflow: scroll;">{{$hotel->hotel_location}}</td>
                <td class="text {{ ($hotel->status == 1) ? 'activo' : 'inactivo' }}">{{($hotel->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                <td>{{$hotel->registerBy}}</td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="9" style="text-align: center;">No hay hoteles registrados.</td>
            </tr>
            @endif
        </tbody>
    </table>
    <!-- Modal para registrar un hotel -->
    <div style="overflow: hidden; height: auto; margin-top: -3%" class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; margin-top: 80px">
            <div style="height: 450px; border: none; overflow: scroll" class="modal-content">
                <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;" class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Hotel

                    </span>
                    <form id="register_form" method="POST" action="{{ route('hotels.store') }}" autocomplete="off" enctype="multipart/form-data">
                        <div class="modal-body container">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Nombre del Hotel</label>
                                        <input type="text" class="form-control input-skew" name="hotel_name" placeholder="Ingrese el nombre del hotel" maxlength="100" minlength="5" value="{{ old('hotel_name') }}" @if ($errors->has('hotel_name')) autofocus @endif required>
                                        @if ($errors->has('hotel_name'))
                                        <div class="error-message">{{ $errors->first('hotel_name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Descripción</label>
                                        <textarea type="text" class="form-control input-skew" name="hotel_description" placeholder="Ingrese la descripción" maxlength="1000" minlength="5" @if ($errors->has('hotel_description')) autofocus
                                                      @endif required style="max-height: 125px; min-height: 125px">{{ old('hotel_description') }}</textarea>
                                        @if ($errors->has('hotel_description'))
                                        <div class="error-message">{{ $errors->first('hotel_description') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Número de Contacto</label>
                                        <input type="text" class="form-control input-skew" name="hotel_contact_number" placeholder="Ingrese el número de contacto" maxlength="20" minlength="10" value="{{ old('hotel_contact_number') }}" @if ($errors->has('hotel_contact_number')) autofocus @endif
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                                        @if ($errors->has('hotel_contact_number'))
                                        <div class="error-message">{{ $errors->first('hotel_contact_number') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Correo de Contacto</label>
                                        <input type="email" class="form-control input-skew" name="hotel_contact_email" placeholder="Ingrese el correo de contacto" maxlength="100" minlength="5" value="{{ old('hotel_contact_email') }}" @if ($errors->has('hotel_contact_email')) autofocus @endif
                                        required>
                                        @if ($errors->has('hotel_contact_email'))
                                        <div class="error-message">{{ $errors->first('hotel_contact_email') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Subir imagen Principal <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload" class="form-control input-skew" name="hotel_image" accept="image/jpeg, image/png" @if ($errors->has('hotel_image')) autofocus @endif required>
                                        @if ($errors->has('hotel_image'))
                                        <div class="error-message">{{ $errors->first('hotel_image') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 1 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_secondary_one" class="form-control input-skew" name="hotel_image_secondary_one" accept="image/jpeg, image/png" value="{{ old('hotel_image_secondary_one') }}" @if ($errors->has('hotel_image_secondary_one')) autofocus @endif>
                                        @if ($errors->has('hotel_image_secondary_one'))
                                        <div class="error-message">{{ $errors->first('hotel_image_secondary_one') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 2 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_secondary_two" class="form-control input-skew" name="hotel_image_secondary_two" accept="image/jpeg, image/png" value="{{ old('hotel_image_secondary_two') }}" @if ($errors->has('hotel_image_secondary_two')) autofocus @endif>
                                        @if ($errors->has('hotel_image_secondary_two'))
                                        <div class="error-message">{{ $errors->first('hotel_image_secondary_two') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 3 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_secondary_three" class="form-control input-skew" name="hotel_image_secondary_three" accept="image/jpeg, image/png" value="{{ old('hotel_image_secondary_three') }}" @if ($errors->has('hotel_image_secondary_three')) autofocus @endif>
                                        @if ($errors->has('hotel_image_secondary_three'))
                                        <div class="error-message">{{ $errors->first('hotel_image_secondary_three') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Dirección</label>
                                        <textarea type="text" class="form-control input-skew" name="hotel_location" placeholder="Ingrese la ubicación del hotel" maxlength="500" minlength="5" @if ($errors->has('hotel_location')) autofocus
                                                      @endif required style="max-height: 125px; min-height: 125px">{{ old('hotel_location') }}</textarea>
                                        @if ($errors->has('hotel_location'))
                                        <div class="error-message">{{ $errors->first('hotel_location') }}</div>
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


    @if(count($hotels) > 0)
    @foreach($hotels as $hotel)
    <!-- Modal para actualizar un hotel -->
    <div style="overflow: hidden; height: auto; margin-top: -3%" class="modal fade" id="modal-update-{{$hotel->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px; margin-top: 50px">
            <div style="height: 510px; border: none;" class="modal-content">
                <div class="container-see" style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%; height: 574px; overflow: scroll; overflow-x: hidden;  ">

                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i style="color: #0d47a1" class="bi bi-building"></i>
                        Editar Hotel

                    </span>
                    <form id="update_form" method="POST" action="{{ route('hotels.update', $hotel->id) }}" autocomplete="off" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Nombre del Hotel</label>
                                    <input type="text" class="form-control input-skew" name="hotel_name" placeholder="Ingrese el nombre del hotel" maxlength="100" value="{{ old('hotel_name', $hotel->hotel_name) }}" @if ($errors->has('hotel_name')) autofocus @endif>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Descripción</label>
                                    <textarea class="form-control input-skew" name="hotel_description" placeholder="Ingrese la descripción" maxlength="1000" minlength="10" @if ($errors->has('hotel_description')) autofocus @endif style="max-height: 120px; min-height: 120px">{{ old('hotel_description', $hotel->hotel_description) }}</textarea>
                                </div>
                            </div>


                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Número de Contacto</label>
                                    <input type="text" class="form-control input-skew" name="hotel_contact_number" placeholder="Ingrese el número de contacto" maxlength="20" value="{{ old('hotel_contact_number', $hotel->hotel_contact_number) }}" @if ($errors->has('hotel_contact_number'))autofocus @endif
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Correo de Contacto</label>
                                    <input type="email" class="form-control input-skew" name="hotel_contact_email" placeholder="Ingrese el correo de contacto" maxlength="100" value="{{ old('hotel_contact_email', $hotel->hotel_contact_email) }}" @if ($errors->has('hotel_contact_email'))autofocus @endif>
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

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="padding-right: 4px; padding-left: 0">
                                    <div class="mb-3 input-ecu" style="padding-left: 15px">

                                        <label class="form-label">Subir imagen Secundaria 1 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload" class="form-control input-skew" name="hotel_image_secondary_one" accept="image/jpeg, image/png" value="{{ old('hotel_image_secondary_one', $hotel->hotel_image_secondary_one) }}" @if ($errors->has('hotel_image_secondary_one')) autofocus @endif>
                                        @if($hotel->hotel_image_secondary_one)
                                        <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('uploads/hotels/' . $hotel->hotel_image_secondary_one) }}" alt="Imagen Secundaria 1" class="img-pequena">
                                        </p>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="display: flex">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="padding: 0">
                                <div class="mb-3 input-ecu" style="padding-right: 15px">

                                    <label class="form-label">Subir imagen Secundaria 2 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                    <input type="file" id="image_upload" class="form-control input-skew" name="hotel_image_secondary_two" accept="image/jpeg, image/png" value="{{ old('hotel_image_secondary_two', $hotel->hotel_image_secondary_two) }}" @if ($errors->has('hotel_image_secondary_two')) autofocus @endif>
                                    @if($hotel->hotel_image_secondary_two)
                                    <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('uploads/hotels/' . $hotel->hotel_image_secondary_two) }}" alt="Imagen Secundaria 2" class="img-pequena">
                                    </p>

                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="padding: 0">
                                <div class="mb-3 input-ecu" style="padding-left: 15px">

                                    <label class="form-label">Subir imagen Secundaria 3 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                    <input type="file" id="image_upload" class="form-control input-skew" name="hotel_image_secondary_three" accept="image/jpeg, image/png" value="{{ old('hotel_image_secondary_three', $hotel->hotel_image_secondary_three) }}" @if ($errors->has('hotel_image_secondary_three')) autofocus @endif>
                                    @if($hotel->hotel_image_secondary_three)
                                    <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('uploads/hotels/' . $hotel->hotel_image_secondary_three) }}" alt="Imagen Secundaria 3" class="img-pequena">
                                    </p>

                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Dirección</label>
                                    <textarea type="text" class="form-control input-skew" name="hotel_location" placeholder="Ingrese la ubicación del hotel" maxlength="500" minlength="5" @if ($errors->has('hotel_location')) autofocus
                                                      @endif required style="max-height: 120px; min-height: 120px">{{ old('hotel_location', $hotel->hotel_location) }}</textarea>
                                    @if ($errors->has('hotel_location'))
                                    <div class="error-message">{{ $errors->first('hotel_location') }}</div>
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
    <div class="pagination-hotel" style="text-align: end">
        {{ $hotels->links() }}
    </div>
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

    function showModalUpdate(hotelId) {
        $('#modal-update-' + hotelId).modal('show');
    }

    function closeModal() {
        $("#modal-register").modal('hide');
        $("#modal-update").modal('hide');
    }

    function updateStatus(hotelId) {
        setTimeout(function() {
            document.getElementById('status' + hotelId).submit();
        }, 250);
    }

    function showImage(hotel_image) {
        const modalImage = document.getElementById("modal-image");
        modalImage.src = "uploads/hotels/" + hotel_image;
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
    handleImageUpload('image_upload_secondary_one');
    handleImageUpload('image_upload_secondary_two');
    handleImageUpload('image_upload_secondary_three');
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
