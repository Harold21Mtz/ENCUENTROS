@if($user)
    <title>Dashboard | Scientific Program</title>
    @include('include.dashboard')

    <main id="main" class="main">

        <!-- Botón para abrir la modal de registro de la programacion de conferencias -->
        <button id="openTopicModal" class="btn btn-primary" onclick="showModalRegister()">
            <span>Registrar Programación de conferencias</span>
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
                <th>Name Program</th>
                <th>Date Presentation</th>
                <th>Hour Presentation</th>
                <th>Activity</th>
                <th>Status</th>
                <th>Register by</th>
            </tr>
            </thead>
            <tbody>
            @if(count($scientificprogramsS) > 0)
                @foreach($scientificprogramsS as $scientificprogramS)
                    <tr>
                        <td class="controls-table">
                            <div class="simon">
                                <div class="botones">
                                    <form id="update{{$scientificprogramS->id}}" method="POST" action="{{ route('scientificprogramsS.update', $scientificprogramS->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" onclick="showModalUpdate('{{$scientificprogramS->id}}')" class="custom-btn btn-1" data-scientificprogramS-id="{{$scientificprogramS->id}}" data-toggle="tooltip" data-placement="left" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </form>

                                    <form id="status{{$scientificprogramS->id}}" method="POST" action="{{ route('scientificprogramsS.status', $scientificprogramS->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <button type="button" onclick="updateStatus('{{$scientificprogramS->id}}')" class="custom-btn {{($scientificprogramS->status == 1) ? 'btn-2' : 'btn-3'}}" data-toggle="tooltip" data-placement="left" title="{{($scientificprogramS->status == 1) ? 'Desactivar' : 'Activar'}}">
                                            <i class="fa-regular {{($scientificprogramS->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                        </button>
                                    </form>

                                </div>

                                <div class="botones3">
                                    <form id="delete{{$scientificprogramS->id}}" method="POST" action="{{route('scientificprogramsS.delete',$scientificprogramS->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </td>
                        <td style="text-align: left">{{$scientificprogramS->name_program}}</td>
                        <td style="text-align: left">{{$scientificprogramS->date_presentation}}</td>
                        <td style="text-align: left;">{{$scientificprogramS->hour_presentation}}</td>
                        <td style="text-align: left;">{{$scientificprogramS->activity}}</td>
                        <td class="text {{ ($scientificprogramS->status == 1) ? 'activo' : 'inactivo' }}">{{($scientificprogramS->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                        <td>{{$scientificprogramS->registerBy}}</td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" style="text-align: center;">There is no registered conference schedule.</td>
                </tr>
            @endif
            </tbody>
        </table>
        <!-- Modal para registrar una programacion de conferencias -->
        <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; top: 22%">
                <div style="height: 400px; border: none;" class="modal-content">
                    <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;" class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Programación de conferencias

                    </span>
                        <form id="register_form" method="POST" action="{{ route('scientificprogramsS.store') }}" autocomplete="off" enctype="multipart/form-data">
                            <div class="modal-body container">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Nombre del Programa</label>
                                            <input type="text" class="form-control input-skew" name="name_program" placeholder="Ingrese el nombre del Programa" maxlength="50" minlength="10" value="{{ old('name_program') }}" @if ($errors->has('name_program')) autofocus @endif required>
                                            @if ($errors->has('name_program'))
                                                <div class="error-message">{{ $errors->first('name_program') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Fecha de Presentación</label>
                                            <input type="text" class="form-control input-skew" name="date_presentation" placeholder="Ingrese fecha de Presentación" maxlength="50" minlength="10" value="{{ old('date_presentation') }}" @if ($errors->has('date_presentation')) autofocus @endif required>
                                            @if ($errors->has('date_presentation'))
                                                <div class="error-message">{{ $errors->first('date_presentation') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Hora de Presentación</label>
                                            <textarea style="max-height: 125px; min-height: 125px" type="text" class="form-control input-skew" name="hour_presentation" placeholder="Ingrese hora de Presentación" maxlength="300" minlength="10" value="{{ old('hour_presentation') }}" @if ($errors->has('hour_presentation')) autofocus @endif required>

                                        </textarea>
                                            @if ($errors->has('hour_presentation'))
                                                <div class="error-message">{{ $errors->first('hour_presentation') }}</div>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Actividad</label>
                                            <textarea type="text" class="form-control input-skew" name="activity" placeholder="Ingrese la actividad de la conferencia a presentar" maxlength="1100" minlength="10" value="{{ old('activity') }}" @if ($errors->has('activity')) autofocus
                                                      @endif required style="max-height: 125px; min-height: 125px"></textarea>
                                            @if ($errors->has('activity'))
                                                <div class="error-message">{{ $errors->first('activity') }}</div>
                                            @endif
                                        </div>
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


        @if(count($scientificprogramsS) > 0)
            @foreach($scientificprogramsS as $scientificprogramS)
                <!-- Modal para actualizar una programacion de conferencias -->
                <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-update-{{$scientificprogramS->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px; margin-top: 86px;">
                        <div style="height: 400px; border: none;" class="modal-content">
                            <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%" class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i style="color: #0d47a1" class="bi bi-building"></i>
                        Editar Programación de conferencias

                    </span>
                                <form id="update_form" method="POST" action="{{ route('scientificprogramsS.update', $scientificprogramS->id) }}" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Nombre del Programa</label>
                                                <input type="text" class="form-control input-skew" name="name_program" placeholder="Ingrese el ombre del Programa" maxlength="50" minlength="10" value="{{ old('name_program', $scientificprogramS->name_program) }}" @if ($errors->has('name_program')) autofocus @endif required>
                                                @if ($errors->has('name_program'))
                                                    <div class="error-message">{{ $errors->first('name_program') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Fecha de Presentación</label>
                                                <input type="text" class="form-control input-skew" name="date_presentation" placeholder="Ingrese fecha de Presentación" maxlength="50" minlength="10" value="{{ old('date_presentation', $scientificprogramS->date_presentation) }}" @if ($errors->has('date_presentation')) autofocus @endif required>
                                                @if ($errors->has('date_presentation'))
                                                    <div class="error-message">{{ $errors->first('date_presentation') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Hora de Presentación</label>
                                                <textarea style="min-height: 185px; max-height: 185px" type="text" class="form-control input-skew" name="hour_presentation" placeholder="Ingrese hora de Presentación" maxlength="300" minlength="10"  @if ($errors->has('hour_presentation')) autofocus @endif required>
                                            {{ $scientificprogramS->hour_presentation}}"
                                        </textarea>
                                                @if ($errors->has('hour_presentation'))
                                                    <div class="error-message">{{ $errors->first('hour_presentation') }}</div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Actividad</label>
                                                <textarea type="text" class="form-control input-skew" name="activity" placeholder="Ingrese la actividad de la conferencia a presentar" maxlength="1100" minlength="10" @if ($errors->has('activity')) autofocus
                                                          @endif required style="min-height: 185px; max-height: 185px">{{$scientificprogramS->activity}}</textarea>
                                                @if ($errors->has('activity'))
                                                    <div class="error-message">{{ $errors->first('activity') }}</div>
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
        <div class="pagination-scientific-programS" style="text-align: end">
            {{ $scientificprogramsS->links() }}
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

        function showModalUpdate(scientificprogramSId) {
            $('#modal-update-' + scientificprogramSId).modal('show');
        }

        function closeModal() {
            $("#modal-register").modal('hide');
            $("#modal-update").modal('hide');
        }

        function updateStatus(scientificprogramSId) {
            setTimeout(function() {
                document.getElementById('status' + scientificprogramSId).submit();
            }, 250);
        }
    </script>
@else
    @include("auth.login")
@endif
