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
                                <button type="button" onclick="showModalUpdate()" class="custom-btn btn-1" data-hotel-id="{{$hotel->id}}" data-toggle="tooltip" data-placement="left" title="Editar">
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
                <td>{{$hotel->hotel_description}}</td>
                <td>{{$hotel->hotel_contact_number}}</td>
                <td>{{$hotel->hotel_contact_email}}</td>
                <td>
                    <button class="button-ecu button-ecu-primary" onclick="showImage('{{$hotel->hotel_image}}')">
                        <span>Mostrar</span>
                        <i class="fa fa-image"></i>
                    </button>
                </td>
                <td>Por Hacer</td>
                <td class="text {{ ($hotel->status == 1) ? 'activo' : 'inactivo' }}">{{($hotel->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                <td>{{$hotel->registerBy}}</td>

            </tr>
            @endforeach
            <!-- <div class="pagination-hotel">
                {{ $hotels->links() }}
            </div>-->
            @else
            <tr>
                <td colspan="9" style="text-align: center;">No hay hoteles registrados.</td>
            </tr>
            @endif
        </tbody>
    </table>
    <!-- Modal para registrar un hotel -->
    <div style="overflow: hidden; height: auto" class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; top: 22%">
            <div style="height: 500px; border: none;" class="modal-content">
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
                                        <input type="text" class="form-control input-skew" name="hotel_name" placeholder="Ingrese el nombre del hotel" maxlength="100" value="{{ old('hotel_name') }}" @if ($errors->has('hotel_name')) autofocus @endif>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Descripción</label>
                                        <input type="text" class="form-control input-skew" name="hotel_description" placeholder="Ingrese la descripción" maxlength="255" value="{{ old('hotel_description') }}" @if ($errors->has('hotel_description'))autofocus @endif>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Número de Contacto</label>
                                        <input type="text" class="form-control input-skew" name="hotel_contact_number" placeholder="Ingrese el número de contacto" maxlength="15" value="{{ old('hotel_contact_number') }}" @if ($errors->has('hotel_contact_number'))autofocus @endif
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Correo de Contacto</label>
                                        <input type="email" class="form-control input-skew" name="hotel_contact_email" placeholder="Ingrese el correo de contacto" maxlength="100" value="{{ old('hotel_contact_email') }}" @if ($errors->has('hotel_contact_email'))autofocus @endif>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 " >
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Principal <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload" class="form-control input-skew" name="hotel_image" accept="image/jpeg, image/png" value="{{ old('hotel_image') }}" @if ($errors->has('hotel_image'))autofocus @endif>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Subir imagen Secundaria 1 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_secondary_one" class="form-control input-skew" name="hotel_image_secondary_one" accept="image/jpeg, image/png" value="{{ old('hotel_image_secondary_one') }}" @if ($errors->has('hotel_image_secondary_one'))autofocus @endif>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Subir imagen Secundaria 2 <i style="color: #e20816" class="fa fa-upload"></i></label>

                                        <input type="file" id="image_upload_secondary_two" class="form-control input-skew" name="hotel_image_secondary_two" accept="image/jpeg, image/png" value="{{ old('hotel_image_secondary_two') }}" @if ($errors->has('hotel_image_secondary_two'))autofocus @endif>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Subir imagen Secundaria 3 <i style="color: #e20816" class="fa fa-upload"></i></label>

                                        <input type="file" id="image_upload_secondary_three" class="form-control input-skew" name="hotel_image_secondary_three" accept="image/jpeg, image/png" value="{{ old('hotel_image_secondary_three') }}" @if ($errors->has('hotel_image_secondary_three'))autofocus @endif>
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
    <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px; top: 22%">
            <div style="height: 550px; border: none;" class="modal-content">
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
                                    <input type="text" class="form-control input-skew" name="hotel_description" placeholder="Ingrese la descripción" maxlength="255" value="{{ old('hotel_description', $hotel->hotel_description) }}" @if ($errors->has('hotel_description'))autofocus @endif>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Número de Contacto</label>
                                    <input type="text" class="form-control input-skew" name="hotel_contact_number" placeholder="Ingrese el número de contacto" maxlength="15" value="{{ old('hotel_contact_number', $hotel->hotel_contact_number) }}" @if ($errors->has('hotel_contact_number'))autofocus @endif
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
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="padding-left: 0">
                                    <div class="mb-3 input-ecu" >

                                        <label class="form-label">Subir imagen Principal <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input  type="file" id="image_upload" class="form-control input-skew" name="hotel_image" accept="image/jpeg, image/png" value="{{ old('hotel_image', $hotel->hotel_image) }}" @if ($errors->has('hotel_image')) autofocus @endif>
                                        @if($hotel->hotel_image)
                                        <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('storage/' . $hotel->hotel_image) }}" alt="Imagen Principal" class="img-pequena">
                                        </p>
                                        @endif


                                    </div>
                                </div>


                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="padding-right: 0; padding-left: 0">
                                    <div class="mb-3 input-ecu" style="padding-left: 15px">

                                        <label class="form-label">Subir imagen Secundaria 1 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload" class="form-control input-skew" name="hotel_image_secondary_one" accept="image/jpeg, image/png" value="{{ old('hotel_image_secondary_one', $hotel->hotel_image_secondary_one) }}" @if ($errors->has('hotel_image_secondary_one')) autofocus @endif>
                                        <!-- @if($hotel->hotel_image_secondary_one)
                                        <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('storage/' . $hotel->hotel_image_secondary_one) }}" alt="Imagen Secundaria 1" class="img-pequena">
                                        </p>
                                        @endif -->
                                        @if($hotel->hotel_image)
                                        <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('storage/' . $hotel->hotel_image) }}" alt="Imagen Principal" class="img-pequena">
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
                                    <!-- @if($hotel->hotel_image_secondary_two)
                                    <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('storage/' . $hotel->hotel_image_secondary_two) }}" alt="Imagen Secundaria 2" class="img-pequena">
                                    </p>
                                    @endif -->
                                    @if($hotel->hotel_image)
                                        <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('storage/' . $hotel->hotel_image) }}" alt="Imagen Principal" class="img-pequena">
                                        </p>
                                        @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="padding: 0">
                                <div class="mb-3 input-ecu" style="padding-left: 15px">

                                    <label class="form-label">Subir imagen Secundaria 3 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                    <input type="file" id="image_upload" class="form-control input-skew" name="hotel_image_secondary_three" accept="image/jpeg, image/png" value="{{ old('hotel_image_secondary_three', $hotel->hotel_image_secondary_three) }}" @if ($errors->has('hotel_image_secondary_three')) autofocus @endif>
                                    <!-- @if($hotel->hotel_image_secondary_three)
                                    <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('storage/' . $hotel->hotel_image_secondary_three) }}" alt="Imagen Secundaria 3" class="img-pequena">
                                    </p>
                                    @endif -->
                                    @if($hotel->hotel_image)
                                        <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('storage/' . $hotel->hotel_image) }}" alt="Imagen Principal" class="img-pequena">
                                        </p>
                                        @endif
                                </div>
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

<!-- Scripts personalizados -->
<script>
    function showModalRegister() {
        // Abrir la modal
        $("#modal-register").modal('show');
    }

    function showModalUpdate() {
        // Abrir la modal
        $("#modal-update").modal('show');
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
        modalImage.src = "/storage/" + hotel_image;
        $("#image-modal").modal('show');
    }
</script>
