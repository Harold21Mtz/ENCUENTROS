@if($user)
    <title>Dashboard | Scientific Commitee International</title>
    @include('include.sidebar')

    <main id="main" class="main">

        <!-- Botón para abrir la modal del comite cientifico nacional -->
        <button id="openTopicModal" class="btn btn-primary" onclick="showModalRegister()">
            <span>Registrar Comite Cientifico Internacional</span>
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
                <th>University</th>
                <th>Description</th>
                <th>Status</th>
                <th>Register by</th>
            </tr>
            </thead>
            <tbody>
            @if(count($scientificscommiteeI) > 0)
                @foreach($scientificscommiteeI as $scientificcommiteeI)
                    <tr>
                        <td class="controls-table">
                            <div class="simon">
                                <div class="botones">
                                    <form id="update{{$scientificcommiteeI->id}}" method="POST"
                                          action="{{ route('scientificcommitteeI.update', $scientificcommiteeI->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" onclick="showModalUpdate('{{$scientificcommiteeI->id}}')"
                                                class="custom-btn btn-1"
                                                data-scientificcommiteeI-id="{{$scientificcommiteeI->id}}"
                                                data-toggle="tooltip" data-placement="left" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </form>

                                    <form id="status{{$scientificcommiteeI->id}}" method="POST"
                                          action="{{ route('scientificcommitteeI.status', $scientificcommiteeI->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <button type="button" onclick="updateStatus('{{$scientificcommiteeI->id}}')"
                                                class="custom-btn {{($scientificcommiteeI->status == 1) ? 'btn-2' : 'btn-3'}}"
                                                data-toggle="tooltip" data-placement="left"
                                                title="{{($scientificcommiteeI->status == 1) ? 'Desactivar' : 'Activar'}}">
                                            <i class="fa-regular {{($scientificcommiteeI->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                        </button>
                                    </form>

                                </div>

                                <div class="botones3">
                                    <form id="delete{{$scientificcommiteeI->id}}" method="POST"
                                          action="{{route('scientificcommitteeI.delete',$scientificcommiteeI->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right"
                                                title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </td>
                        <td>{{$scientificcommiteeI->scientific_name}} {{$scientificcommiteeI->scientific_title}}</td>
                        <td>{{$scientificcommiteeI->scientific_university}}</td>
                        <td style="text-align: justify;">{{$scientificcommiteeI->scientific_description}}</td>
                        <td class="text {{ ($scientificcommiteeI->status == 1) ? 'activo' : 'inactivo' }}">{{($scientificcommiteeI->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                        <td>{{$scientificcommiteeI->registerBy}}</td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" style="text-align: center;">No scientific commite International registered.</td>
                </tr>
            @endif
            </tbody>
        </table>
        <!-- Modal para registrar un comite cientifico nacional -->
        <div style="overflow: hidden; height: auto; margin-top: -3%" class="modal fade" id="modal-register"
             tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; margin-top: 86px">
                <div style="height: 300px; border: none;" class="modal-content">
                    <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;"
                         class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Comite Cientifico Nacional

                    </span>
                        <form id="register_form" method="POST" action="{{ route('scientificcommitteeI.store') }}"
                              autocomplete="off" enctype="multipart/form-data">
                            <div class="modal-body container">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Nombre y Apellido del cientifico</label>
                                            <input type="text" class="form-control input-skew" name="scientific_name"
                                                   placeholder="Ingrese el nombre y apellido del cientifico"
                                                   maxlength="200" minlength="10" value="{{ old('scientific_name') }}"
                                                   @if ($errors->has('scientific_name')) autofocus @endif required>
                                            @if ($errors->has('scientific_name'))
                                                <div class="error-message">{{ $errors->first('scientific_name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Titúlo del cientifico</label>
                                            <input type="text" class="form-control input-skew" name="scientific_title"
                                                   placeholder="Ingrese el titúlo del cientifico" maxlength="10"
                                                   minlength="2" value="{{ old('scientific_title') }}"
                                                   @if ($errors->has('scientific_title')) autofocus @endif required>
                                            @if ($errors->has('scientific_title'))
                                                <div
                                                    class="error-message">{{ $errors->first('scientific_title') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Descripción del cientifico</label>
                                            <textarea type="text" class="form-control input-skew"
                                                      name="scientific_description"
                                                      placeholder="Ingrese la descripción del cientifico"
                                                      maxlength="400" minlength="10"
                                                      value="{{ old('scientific_description') }}"
                                                      @if ($errors->has('scientific_description'))autofocus
                                                      @endif required
                                                      style="max-height: 80px; min-height: 80px"></textarea>
                                            @if ($errors->has('scientific_description'))
                                                <div
                                                    class="error-message">{{ $errors->first('scientific_description') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Universidad del cientifico</label>
                                            <input type="text" class="form-control input-skew"
                                                   name="scientific_university"
                                                   placeholder="Ingrese la Universidad del cientifico" maxlength="100"
                                                   minlength="10" value="{{ old('scientific_university') }}"
                                                   @if ($errors->has('scientific_university')) autofocus
                                                   @endif required>
                                            @if ($errors->has('scientific_university'))
                                                <div
                                                    class="error-message">{{ $errors->first('scientific_university') }}</div>
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


        @if(count($scientificscommiteeI) > 0)
            @foreach($scientificscommiteeI as $scientificcommiteeI)
                <!-- Modal para actualizar un fecha importante -->
                <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade"
                     id="modal-update-{{$scientificcommiteeI->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px;">
                        <div style="height: 310px; border: none;" class="modal-content">
                            <div class="container-see"
                                 style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%; height: 574px; overflow: hidden; overflow-x: hidden;  ">

                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>
                        Editar Comite cientifico

                    </span>
                                <form id="update_form" method="POST"
                                      action="{{ route('scientificcommitteeI.update', $scientificcommiteeI->id) }}"
                                      autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Nombre y Apellido del
                                                    cientifico</label>
                                                <input type="text" class="form-control input-skew"
                                                       name="scientific_name"
                                                       placeholder="Ingrese el nombre y apellido del cientifico"
                                                       maxlength="200" minlength="10"
                                                       value="{{ old('scientific_name', $scientificcommiteeI->scientific_name) }}"
                                                       @if ($errors->has('scientific_name')) autofocus @endif required>
                                                @if ($errors->has('scientific_name'))
                                                    <div
                                                        class="error-message">{{ $errors->first('scientific_name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Titúlo del cientifico</label>
                                                <input type="text" class="form-control input-skew"
                                                       name="scientific_title"
                                                       placeholder="Ingrese el titúlo del cientifico" maxlength="10"
                                                       minlength="2"
                                                       value="{{ old('scientific_title', $scientificcommiteeI->scientific_title) }}"
                                                       @if ($errors->has('scientific_title')) autofocus @endif required>
                                                @if ($errors->has('scientific_title'))
                                                    <div
                                                        class="error-message">{{ $errors->first('scientific_title') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Descripción del cientifico</label>
                                                <textarea type="text" class="form-control input-skew"
                                                          name="scientific_description"
                                                          placeholder="Ingrese la descripción del cientifico"
                                                          maxlength="400" minlength="10"
                                                          @if ($errors->has('scientific_description'))autofocus
                                                          @endif required
                                                          style="max-height: 80px; min-height: 80px">{{ old('scientific_description', $scientificcommiteeI->scientific_description) }}</textarea>
                                                @if ($errors->has('scientific_description'))
                                                    <div
                                                        class="error-message">{{ $errors->first('scientific_description') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Universidad del cientifico</label>
                                                <input type="text" class="form-control input-skew"
                                                       name="scientific_university"
                                                       placeholder="Ingrese la Universidad del cientifico"
                                                       maxlength="100" minlength="10"
                                                       value="{{ old('scientific_university', $scientificcommiteeI->scientific_university) }}"
                                                       @if ($errors->has('scientific_university')) autofocus
                                                       @endif required>
                                                @if ($errors->has('scientific_university'))
                                                    <div
                                                        class="error-message">{{ $errors->first('scientific_university') }}</div>
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
        <div class="pagination-scientificcommiteeI" style="text-align: end">
            {{ $scientificscommiteeI->links() }}
        </div>

    </main><!-- End #main -->
    @include('include.alerts')

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

        function showModalUpdate(scientificcommiteeIId) {
            $('#modal-update-' + scientificcommiteeIId).modal('show');
        }

        function closeModal() {
            $("#modal-register").modal('hide');
            $("#modal-update").modal('hide');
        }

        function updateStatus(scientificcommiteeIId) {
            setTimeout(function () {
                document.getElementById('status' + scientificcommiteeIId).submit();
            }, 250);
        }
    </script>
@else
    @include("auth.login")
@endif
