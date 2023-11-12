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
            <th>Opciones</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Número contacto</th>
            <th>Email contacto</th>
            <th>Imagen</th>
            <th>Localización</th>
            <th>Estado</th>
            <th>Registrado por</th>
        </tr>
        </thead>
        <tbody>
        @foreach($hotels as $hotel)
            <tr>
                <td class="controls-table">
                    <div class="simon">
                        <button onclick="window.location.replace('hotels/{{$hotel->id}}')"
                                class="custom-btn btn-1"
                                data-toggle="tooltip"
                                data-placement="left"
                                title="Editar"><i class="fa-regular fa-pen-to-square"></i>
                        </button>
                        
                        <button onclick="window.location.replace('hotels/status/{{$hotel->id}}')"
                                class="custom-btn {{($hotel->status == 1) ? 'btn-2' : 'btn-3'}}"
                                data-toggle="tooltip"
                                data-placement="bottom"
                                title="{{($hotel->status == 1) ? 'Desactivar' : 'Activar'}}">
                            <i class="fa-regular {{($hotel->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                        </button>

                        <form id="delete{{$hotel->id}}" method="POST"
                              action="{{route('hotels.delete',$hotel->id)}}">
                            @csrf
                            @method('DELETE')
                            <button onclick="deleteConfirm('{{$hotel->id}}')"
                                    class="custom-btn btn-4"
                                    data-toggle="tooltip"
                                    data-placement="right"
                                    title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
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
        </tbody>
    </table>
    <!-- Modal para registrar un hotel -->
    <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; top: 22%">
            <div class="modal-content">
                <div class="modal-header">
                <span class="modal-title" id="exampleModalLabel"><i class="fa fa-map-signs"></i>@if(session('id_to_update'))
                            Registrar @else Editar @endif
                        Hotel</span>
                    <form id="register_form" method="POST" action="{{ route('hotels.store') }}" autocomplete="off"
                          enctype="multipart/form-data">
                        <div class="modal-body container">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Nombre del Hotel</label>
                                        <input type="text" class="form-control input-skew" name="hotel_name"
                                               placeholder="Ingrese el nombre del hotel" maxlength="100"
                                               value="{{ old('hotel_name') }}" autofocus>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Descripción</label>
                                        <input type="text" class="form-control input-skew" name="hotel_description"
                                               placeholder="Ingrese la descripción" maxlength="255"
                                               value="{{ old('hotel_contact_description') }}" autofocus>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Número de Contacto</label>
                                        <input type="text" class="form-control input-skew" name="hotel_contact_number"
                                               placeholder="Ingrese el número de contacto" maxlength="15"
                                               value="{{ old('hotel_contact_number') }}" autofocus>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Correo de Contacto</label>
                                        <input type="email" class="form-control input-skew" name="hotel_contact_email"
                                               placeholder="Ingrese el correo de contacto" maxlength="100"
                                               value="{{ old('hotel_contact_email') }}" autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Imagen Principal</label>
                                        <label for="image_upload" class="input-file">
                                            <span id="label_upload">Subir imagen principal</span>
                                            <i class="fa fa-upload"></i>
                                        </label>
                                        <input type="file" id="image_upload" class="form-control input-skew"
                                               name="hotel_image" accept="image/jpeg, image/png"
                                               value="{{ old('hotel_image') }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Imagen Secundaria 1</label>
                                        <label for="image_upload_secondary_one" class="input-file">
                                            <span id="label_upload_secondary_one">Subir imagen secundaria 1</span>
                                            <i class="fa fa-upload"></i>
                                        </label>
                                        <input type="file" id="image_upload_secondary_one"
                                               class="form-control input-skew"
                                               name="hotel_image_secondary_one" accept="image/jpeg, image/png"
                                               value="{{ old('hotel_image_secondary_one') }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Imagen Secundaria 2</label>
                                        <label for="image_upload_secondary_two" class="input-file">
                                            <span id="label_upload_secondary_two">Subir imagen secundaria 2</span>
                                            <i class="fa fa-upload"></i>
                                        </label>
                                        <input type="file" id="image_upload_secondary_two"
                                               class="form-control input-skew"
                                               name="hotel_image_secondary_two" accept="image/jpeg, image/png"
                                               value="{{ old('hotel_image_secondary_two') }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Imagen Secundaria 3</label>
                                        <label for="image_upload_secondary_three" class="input-file">
                                            <span id="label_upload_secondary_three">Subir imagen secundaria 3</span>
                                            <i class="fa fa-upload"></i>
                                        </label>
                                        <input type="file" id="image_upload_secondary_three"
                                               class="form-control input-skew"
                                               name="hotel_image_secondary_three" accept="image/jpeg, image/png"
                                               value="{{ old('hotel_image_secondary_three') }}">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="status" value="1">
                            <input type="hidden" class="form-control" name="registerBy" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="button-ecu button-ecu-secondary">
                                <span>Limpiar</span>
                                <i class="fa fa-eraser"></i>
                            </button>
                            <button type="submit" class="button-ecu button-ecu-primary">
                                <span>Guardar</span>
                                <i class="fa fa-save"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->

<!-- Modal con el ID "image-modal" (usando Bootstrap) -->
<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" style="max-width: 700px; top: 22%">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Agregar el elemento img para mostrar la imagen -->
                <img id="modal-image" src="" alt="Hotel Image" class="img-fluid d-block mx-auto">
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
        $("#modal-register").modal('show');
    }

    function closeModal() {
        $("#modal-register").modal('hide');
    }

    function showImage(hotel_image) {
        var modalImage = document.getElementById("modal-image");
        modalImage.src = "/storage/" + hotel_image;
        $("#image-modal").modal('show');
    }

    function deleteConfirm(hotel_id) {
        if (confirm('¿Estás seguro de que deseas eliminar este hotel?')) {
            document.getElementById('delete' + hotel_id).submit();
        }
    }
</script>

