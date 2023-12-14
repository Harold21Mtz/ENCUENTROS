@if($user)
    <title>Dashboard | Scientific Program</title>
    @include('include.sidebar')

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
            @if(count($scientificprograms) > 0)
                @foreach($scientificprograms as $scientificprogram)
                    <tr>
                        <td class="controls-table">
                            <div class="simon">
                                <div class="botones">
                                    <form id="update{{$scientificprogram->id}}" method="POST"
                                          action="{{ route('scientificprograms.update', $scientificprogram->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" onclick="showModalUpdate('{{$scientificprogram->id}}')"
                                                class="custom-btn btn-1"
                                                data-scientificprogram-id="{{$scientificprogram->id}}"
                                                data-toggle="tooltip" data-placement="left" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </form>

                                    <form id="status{{$scientificprogram->id}}" method="POST"
                                          action="{{ route('scientificprograms.status', $scientificprogram->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <button type="button" onclick="updateStatus('{{$scientificprogram->id}}')"
                                                class="custom-btn {{($scientificprogram->status == 1) ? 'btn-2' : 'btn-3'}}"
                                                data-toggle="tooltip" data-placement="left"
                                                title="{{($scientificprogram->status == 1) ? 'Desactivar' : 'Activar'}}">
                                            <i class="fa-regular {{($scientificprogram->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                        </button>
                                    </form>

                                </div>

                                <div class="botones3">
                                    <form id="delete{{$scientificprogram->id}}" method="POST"
                                          action="{{route('scientificprograms.delete',$scientificprogram->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right"
                                                title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </td>
                        <td style="text-align: left">{{$scientificprogram->name_program}}</td>
                        <td style="text-align: left">{{$scientificprogram->date_presentation}}</td>
                        <td style="text-align: left;">{{$scientificprogram->hour_presentation}}</td>
                        <td style="text-align: left;">{{$scientificprogram->activity}}</td>
                        <td class="text {{ ($scientificprogram->status == 1) ? 'activo' : 'inactivo' }}">{{($scientificprogram->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                        <td>{{$scientificprogram->registerBy}}</td>

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
        <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-register"
             tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; top: 22%">
                <div style="height: 400px; border: none;" class="modal-content">
                    <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;"
                         class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Programación de conferencias

                    </span>
                        <form id="register_form" method="POST" action="{{ route('scientificprograms.store') }}"
                              autocomplete="off" enctype="multipart/form-data">
                            <div class="modal-body container">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Nombre del Programa</label>
                                            <input type="text" class="form-control input-skew" name="name_program"
                                                   placeholder="Ingrese el nombre del Programa" maxlength="50"
                                                   minlength="10" value="{{ old('name_program') }}"
                                                   @if ($errors->has('name_program')) autofocus @endif required>
                                            @if ($errors->has('name_program'))
                                                <div class="error-message">{{ $errors->first('name_program') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Fecha de Presentación</label>
                                            <input type="text" class="form-control input-skew" name="date_presentation"
                                                   placeholder="Ingrese fecha de Presentación" maxlength="50"
                                                   minlength="10" value="{{ old('date_presentation') }}"
                                                   @if ($errors->has('date_presentation')) autofocus @endif required>
                                            @if ($errors->has('date_presentation'))
                                                <div
                                                    class="error-message">{{ $errors->first('date_presentation') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Hora de Presentación</label>
                                            <textarea style="max-height: 125px; min-height: 125px" type="text"
                                                      class="form-control input-skew" name="hour_presentation"
                                                      placeholder="Ingrese hora de Presentación" maxlength="300"
                                                      minlength="10" value="{{ old('hour_presentation') }}"
                                                      @if ($errors->has('hour_presentation')) autofocus @endif required>

                                        </textarea>
                                            @if ($errors->has('hour_presentation'))
                                                <div
                                                    class="error-message">{{ $errors->first('hour_presentation') }}</div>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Actividad</label>
                                            <textarea type="text" class="form-control input-skew" name="activity"
                                                      placeholder="Ingrese la actividad de la conferencia a presentar"
                                                      maxlength="1100" minlength="10" value="{{ old('activity') }}"
                                                      @if ($errors->has('activity')) autofocus
                                                      @endif required
                                                      style="max-height: 125px; min-height: 125px"></textarea>
                                            @if ($errors->has('activity'))
                                                <div class="error-message">{{ $errors->first('activity') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="status" value="1">
                            <input type="hidden" class="form-control" name="registerBy"
                                   value="{{ Auth::check() ? Auth::user()->id : null }}">
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


        @if(count($scientificprograms) > 0)
            @foreach($scientificprograms as $scientificprogram)
                <!-- Modal para actualizar una programacion de conferencias -->
                <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade"
                     id="modal-update-{{$scientificprogram->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog modal-md modal-dialog-centered"
                         style="max-width: 750px; margin-top: 86px;">
                        <div style="height: 400px; border: none;" class="modal-content">
                            <div
                                style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%"
                                class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>
                        Editar Programación de conferencias

                    </span>
                                <form id="update_form" method="POST"
                                      action="{{ route('scientificprograms.update', $scientificprogram->id) }}"
                                      autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Nombre del Programa</label>
                                                <input type="text" class="form-control input-skew" name="name_program"
                                                       placeholder="Ingrese el nombre del Programa" maxlength="50"
                                                       minlength="10"
                                                       value="{{ old('name_program', $scientificprogram->name_program) }}"
                                                       @if ($errors->has('name_program')) autofocus @endif required>
                                                @if ($errors->has('name_program'))
                                                    <div
                                                        class="error-message">{{ $errors->first('name_program') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Fecha de Presentación</label>
                                                <input type="text" class="form-control input-skew"
                                                       name="date_presentation"
                                                       placeholder="Ingrese fecha de Presentación" maxlength="50"
                                                       minlength="10"
                                                       value="{{ old('date_presentation', $scientificprogram->date_presentation) }}"
                                                       @if ($errors->has('date_presentation')) autofocus
                                                       @endif required>
                                                @if ($errors->has('date_presentation'))
                                                    <div
                                                        class="error-message">{{ $errors->first('date_presentation') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Hora de Presentación</label>
                                                <textarea style="min-height: 185px; max-height: 185px" type="text"
                                                          class="form-control input-skew" name="hour_presentation"
                                                          placeholder="Ingrese hora de Presentación" maxlength="300"
                                                          minlength="10"
                                                          @if ($errors->has('hour_presentation')) autofocus
                                                          @endif required>
                                            {{ $scientificprogram->hour_presentation}}"
                                        </textarea>
                                                @if ($errors->has('hour_presentation'))
                                                    <div
                                                        class="error-message">{{ $errors->first('hour_presentation') }}</div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Actividad</label>
                                                <textarea type="text" class="form-control input-skew" name="activity"
                                                          placeholder="Ingrese la actividad de la conferencia a presentar"
                                                          maxlength="1100" minlength="10"
                                                          @if ($errors->has('activity')) autofocus
                                                          @endif required
                                                          style="min-height: 185px; max-height: 185px">{{$scientificprogram->activity}}</textarea>
                                                @if ($errors->has('activity'))
                                                    <div class="error-message">{{ $errors->first('activity') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" name="status" value="1">
                                    <input type="hidden" class="form-control" name="registerBy"
                                           value="{{ Auth::check() ? Auth::user()->id : null }}">
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
        <div class="pagination-scientific-program" style="text-align: end">
            {{ $scientificprograms->links() }}
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

        function showModalUpdate(scientificprogramId) {
            $('#modal-update-' + scientificprogramId).modal('show');
        }

        function closeModal() {
            $("#modal-register").modal('hide');
            $("#modal-update").modal('hide');
        }

        function updateStatus(scientificprogramId) {
            setTimeout(function () {
                document.getElementById('status' + scientificprogramId).submit();
            }, 250);
        }
    </script>
@else
    @include("auth.login")
@endif

