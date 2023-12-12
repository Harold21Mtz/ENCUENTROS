@if($user)
<title>Dashboard | Slides</title>
@include('include.dashboard')

<main id="main" class="main">

    <!-- Botón para abrir la modal de registro de slide -->
    <button id="openSlideModal" class="btn btn-primary" onclick="showModalRegister()">
        <span>Registrar Slide</span>
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
                <th>Conference Name</th>
                <th>Conference Date</th>
                <th>University Name</th>
                <th>Faculty Name</th>
                <th>Image Logo</th>
                <th>Image</th>
                <th>Status</th>
                <th>Register by</th>
            </tr>
        </thead>
        <tbody>
            @if(count($slides) > 0)
            @foreach($slides as $slide)
            <tr>
                <td class="controls-table">
                    <div class="simon">
                        <div class="botones">
                            <form id="update{{$slide->id}}" method="POST" action="{{ route('slides.update', $slide->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="button" onclick="showModalUpdate('{{$slide->id}}')" class="custom-btn btn-1" data-slide-id="{{$slide->id}}" data-toggle="tooltip" data-placement="left" title="Editar">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </form>

                            <form id="status{{$slide->id}}" method="POST" action="{{ route('slides.status', $slide->id) }}">
                                @csrf
                                @method('PUT')

                                <button type="button" onclick="updateStatus('{{$slide->id}}')" class="custom-btn {{($slide->status == 1) ? 'btn-2' : 'btn-3'}}" data-toggle="tooltip" data-placement="left" title="{{($slide->status == 1) ? 'Desactivar' : 'Activar'}}">
                                    <i class="fa-regular {{($slide->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                </button>
                            </form>

                        </div>

                        <div class="botones3">
                            <form id="delete{{$slide->id}}" method="POST" action="{{route('slides.delete',$slide->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </td>
                <td>{{$slide->conference_name}}</td>
                <td>{{$slide->conference_date}}</td>
                <td>{{$slide->university_name}}</td>
                <td>{{$slide->faculty_name}}</td>
                <td>
                    <button class="button-ecu button-ecu-primary" onclick="showImageLogo('{{$slide->conference_logo}}')">
                        <span>Mostrar</span>
                        <i class="fa fa-image"></i>
                    </button>
                </td>
                <td>
                    <button class="button-ecu button-ecu-primary" onclick="showImage('{{$slide->conference_image}}')">
                        <span>Mostrar</span>
                        <i class="fa fa-image"></i>
                    </button>
                </td>
                <td class="text {{ ($slide->status == 1) ? 'activo' : 'inactivo' }}">{{($slide->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                <td>{{$slide->registerBy}}</td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="9" style="text-align: center;">No hay Slides registrados.</td>
            </tr>
            @endif
        </tbody>
    </table>
    <!-- Modal para registrar un slide -->
    <div style="overflow: hidden; height: auto; margin-top: -3%" class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; margin-top: 80px">
            <div style="height: 450px; border: none; overflow: scroll" class="modal-content">
                <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;" class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Slide

                    </span>
                    <form id="register_form" method="POST" action="{{ route('slides.store') }}" autocomplete="off" enctype="multipart/form-data">
                        <div class="modal-body container">
                            @csrf
                            <div class="row" style="display: flex;">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Nombre de la conferencia</label>
                                        <input type="text" class="form-control input-skew" name="conference_name" placeholder="Ingrese el nombre de la conferencia" maxlength="70" minlength="5" value="{{ old('conference_name') }}" @if ($errors->has('conference_name')) autofocus @endif required>
                                        @if ($errors->has('conference_name'))
                                        <div class="error-message">{{ $errors->first('conference_name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Fecha de la conferencia</label>
                                        <input type="text" class="form-control input-skew" name="conference_date" placeholder="Ingrese la fecha de la conferencia" maxlength="30" minlength="5" value="{{ old('conference_date') }}" @if ($errors->has('conference_date')) autofocus @endif required>
                                        @if ($errors->has('conference_date'))
                                        <div class="error-message">{{ $errors->first('conference_date') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Nombre de la universidad</label>
                                        <input type="text" class="form-control input-skew" name="university_name" placeholder="Ingrese el nombre de la universidad" maxlength="70" minlength="5" value="{{ old('university_name') }}" @if ($errors->has('university_name')) autofocus @endif required>
                                        @if ($errors->has('university_name'))
                                        <div class="error-message">{{ $errors->first('university_name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Nombre de la facultad</label>
                                        <input type="text" class="form-control input-skew" name="faculty_name" placeholder="Ingrese el nombre de la facultad" maxlength="60" minlength="5" value="{{ old('faculty_name') }}" @if ($errors->has('faculty_name')) autofocus @endif required>
                                        @if ($errors->has('faculty_name'))
                                        <div class="error-message">{{ $errors->first('faculty_name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Subir imagen del Logo <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_uploadlogo" class="form-control input-skew" name="conference_logo" accept="image/jpeg, image/png" value="{{ old('conference_logo') }}" @if ($errors->has('conference_logo')) autofocus @endif required>
                                        @if ($errors->has('conference_logo'))
                                        <div class="error-message">{{ $errors->first('conference_logo') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Subir imagen Principal<i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload" class="form-control input-skew" name="conference_image" accept="image/jpeg, image/png" value="{{ old('conference_image') }}" @if ($errors->has('conference_image')) autofocus @endif required>
                                        @if ($errors->has('conference_image'))
                                        <div class="error-message">{{ $errors->first('conference_image') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 1 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_secondary_one" class="form-control input-skew" name="conference_image_secondary_one" accept="image/jpeg, image/png" value="{{ old('conference_image_secondary_one') }}" @if ($errors->has('conference_image_secondary_one')) autofocus @endif>
                                        @if ($errors->has('conference_image_secondary_one'))
                                        <div class="error-message">{{ $errors->first('conference_image_secondary_one') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 2 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_secondary_two" class="form-control input-skew" name="conference_image_secondary_two" accept="image/jpeg, image/png" value="{{ old('conference_image_secondary_two') }}" @if ($errors->has('conference_image_secondary_two')) autofocus @endif>
                                        @if ($errors->has('conference_image_secondary_two'))
                                        <div class="error-message">{{ $errors->first('conference_image_secondary_two') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 3 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_secondary_three" class="form-control input-skew" name="conference_image_secondary_three" accept="image/jpeg, image/png" value="{{ old('conference_image_secondary_three') }}" @if ($errors->has('conference_image_secondary_three')) autofocus @endif>
                                        @if ($errors->has('conference_image_secondary_three'))
                                        <div class="error-message">{{ $errors->first('conference_image_secondary_three') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 4 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_secondary_four" class="form-control input-skew" name="conference_image_secondary_four" accept="image/jpeg, image/png" value="{{ old('conference_image_secondary_four') }}" @if ($errors->has('conference_image_secondary_four')) autofocus @endif>
                                        @if ($errors->has('conference_image_secondary_four'))
                                        <div class="error-message">{{ $errors->first('conference_image_secondary_four') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Secundaria 5 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload_secondary_five" class="form-control input-skew" name="conference_image_secondary_five" accept="image/jpeg, image/png" value="{{ old('conference_image_secondary_five') }}" @if ($errors->has('conference_image_secondary_five')) autofocus @endif>
                                        @if ($errors->has('conference_image_secondary_five'))
                                        <div class="error-message">{{ $errors->first('conference_image_secondary_five') }}</div>
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


    @if(count($slides) > 0)
    @foreach($slides as $slide)
    <!-- Modal para actualizar un slide -->
    <div style="overflow: hidden; height: auto; margin-top: -3%" class="modal fade" id="modal-update-{{$slide->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px; margin-top: 50px">
            <div style="height: 510px; border: none;" class="modal-content">
                <div class="container-see" style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%; height: 574px; overflow: scroll; overflow-x: hidden;  ">

                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i style="color: #0d47a1" class="bi bi-building"></i>
                        Editar Slide

                    </span>
                    <form id="update_form" method="POST" action="{{ route('slides.update', $slide->id) }}" autocomplete="off" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <div class="row" style="display: flex;">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Nombre de la conferencia</label>
                                    <input type="text" class="form-control input-skew" name="conference_name" placeholder="Ingrese el nombre de la conferencia" maxlength="70" minlength="5" value="{{ old('conference_name', $slide->conference_name) }}" @if ($errors->has('conference_name')) autofocus @endif required>
                                    @if ($errors->has('conference_name'))
                                    <div class="error-message">{{ $errors->first('conference_name') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Fecha de la conferencia</label>
                                    <input type="text" class="form-control input-skew" name="conference_date" placeholder="Ingrese la fecha de la conferencia" maxlength="30" minlength="5" value="{{ old('conference_date', $slide->conference_date) }}" @if ($errors->has('conference_date')) autofocus @endif required>
                                    @if ($errors->has('conference_date'))
                                    <div class="error-message">{{ $errors->first('conference_date') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Nombre de la universidad</label>
                                    <input type="text" class="form-control input-skew" name="university_name" placeholder="Ingrese el nombre de la universidad" maxlength="70" minlength="5" value="{{ old('university_name', $slide->university_name) }}" @if ($errors->has('university_name')) autofocus @endif required>
                                    @if ($errors->has('university_name'))
                                    <div class="error-message">{{ $errors->first('university_name') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Nombre de la facultad</label>
                                    <input type="text" class="form-control input-skew" name="faculty_name" placeholder="Ingrese el nombre de la facultad" maxlength="60" minlength="5" value="{{ old('faculty_name', $slide->faculty_name) }}" @if ($errors->has('faculty_name')) autofocus @endif required>
                                    @if ($errors->has('faculty_name'))
                                    <div class="error-message">{{ $errors->first('faculty_name') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Subir imagen del Logo <i style="color: #e20816" class="fa fa-upload"></i></label>
                                    <input type="file" id="image_uploadlogo" class="form-control input-skew" name="conference_logo" accept="image/jpeg, image/png" value="{{ old('conference_logo', $slide->conference_logo) }}" @if ($errors->has('conference_logo')) autofocus @endif>
                                    @if($slide->conference_logo)
                                    <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('uploads/slides/logo/' . $slide->conference_logo) }}" alt="Imagen Principal" class="img-pequena">
                                    </p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label required">Subir imagen Principal<i style="color: #e20816" class="fa fa-upload"></i></label>
                                    <input type="file" id="image_upload" class="form-control input-skew" name="conference_image" accept="image/jpeg, image/png" value="{{ old('conference_logo', $slide->conference_image) }}" @if ($errors->has('conference_image')) autofocus @endif>
                                    @if($slide->conference_image)
                                    <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('uploads/slides/' . $slide->conference_image) }}" alt="Imagen Principal" class="img-pequena">
                                    </p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label">Subir imagen Secundaria 1 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                    <input type="file" id="image_upload_secondary_one" class="form-control input-skew" name="conference_image_secondary_one" accept="image/jpeg, image/png" value="{{ old('conference_image_secondary_one', $slide->conference_image_secondary_one) }}" @if ($errors->has('conference_image_secondary_one')) autofocus @endif>
                                    @if($slide->conference_image_secondary_one)
                                    <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('uploads/slides/' . $slide->conference_image_secondary_one) }}" alt="Imagen Principal" class="img-pequena">
                                    </p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label">Subir imagen Secundaria 2 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                    <input type="file" id="image_upload_secondary_two" class="form-control input-skew" name="conference_image_secondary_two" accept="image/jpeg, image/png" value="{{ old('conference_image_secondary_two', $slide->conference_image_secondary_two) }}" @if ($errors->has('conference_image_secondary_two')) autofocus @endif>
                                    @if($slide->conference_image_secondary_two)
                                    <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('uploads/slides/' . $slide->conference_image_secondary_two) }}" alt="Imagen Principal" class="img-pequena">
                                    </p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label">Subir imagen Secundaria 3 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                    <input type="file" id="image_upload_secondary_three" class="form-control input-skew" name="conference_image_secondary_three" accept="image/jpeg, image/png" value="{{ old('conference_image_secondary_three', $slide->conference_image_secondary_three) }}" @if ($errors->has('conference_image_secondary_three')) autofocus @endif>
                                    @if($slide->conference_image_secondary_three)
                                    <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('uploads/slides/' . $slide->conference_image_secondary_three) }}" alt="Imagen Principal" class="img-pequena">
                                    </p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label">Subir imagen Secundaria 4 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                    <input type="file" id="image_upload_secondary_four" class="form-control input-skew" name="conference_image_secondary_four" accept="image/jpeg, image/png" value="{{ old('conference_image_secondary_four', $slide->conference_image_secondary_four) }}" @if ($errors->has('conference_image_secondary_four')) autofocus @endif>
                                    @if($slide->conference_image_secondary_four)
                                    <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('uploads/slides/' . $slide->conference_image_secondary_four) }}" alt="Imagen Principal" class="img-pequena">
                                    </p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="mb-3 input-ecu">
                                    <label class="form-label">Subir imagen Secundaria 5 <i style="color: #e20816" class="fa fa-upload"></i></label>
                                    <input type="file" id="image_upload_secondary_five" class="form-control input-skew" name="conference_image_secondary_five" accept="image/jpeg, image/png" value="{{ old('conference_image_secondary_five', $slide->conference_image_secondary_five) }}" @if ($errors->has('conference_image_secondary_five')) autofocus @endif>
                                    @if($slide->conference_image_secondary_five)
                                    <p class="image-actual">Imagen actual: <img style="width: 100px; margin-left: 10px;" src="{{ asset('uploads/slides/' . $slide->conference_image_secondary_one) }}" alt="Imagen Principal" class="img-pequena">
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
    <div class="pagination-slide" style="text-align: end">
        {{ $slides->links() }}
    </div>
</main><!-- End #main -->
@include('include.alerts')
<!--Modal de la imagen -->
<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 600px; height: 400px; margin-top: 62px">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Agregar el elemento img para mostrar la imagen -->
                <img style="max-height: 320px" id="modal-image" src="" alt="Slide Image" class="img-fluid d-block mx-auto">
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

    function showModalUpdate(slideId) {
        $('#modal-update-' + slideId).modal('show');
    }

    function closeModal() {
        $("#modal-register").modal('hide');
        $("#modal-update").modal('hide');
    }

    function updateStatus(slideId) {
        setTimeout(function() {
            document.getElementById('status' + slideId).submit();
        }, 250);
    }

    function showImage(conference_image) {
        const modalImage = document.getElementById("modal-image");
        modalImage.src = "uploads/slides/" + conference_image;
        $("#image-modal").modal('show');
    }

    function showImageLogo(conference_logo) {
        const modalImage = document.getElementById("modal-image");
        modalImage.src = "uploads/slides/logo/" + conference_logo;
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
    handleImageUpload('image_uploadlogo');
    handleImageUpload('image_upload_secondary_one');
    handleImageUpload('image_upload_secondary_two');
    handleImageUpload('image_upload_secondary_four');
    handleImageUpload('image_upload_secondary_five');
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