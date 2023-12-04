<title>Dashboard | Abstract Submission</title>
@include('include.dashboard')

<main id="main" class="main">

    <!-- Botón para abrir la modal de registro de la presentacion de resumenes -->
    <button id="openTopicModal" class="btn btn-primary" onclick="showModalRegister()">
        <span>Registrar Presentación de resúmenes</span>
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
            <th>Conference</th>
            <th>Structure submission</th>
            <th>Description</th>
            <th>Status</th>
            <th>Register by</th>
        </tr>
        </thead>
        <tbody>
        @if(count($submissions) > 0)
            @foreach($submissions as $submission)
                <tr>
                    <td class="controls-table">
                        <div class="simon">
                            <div class="botones">
                                <form id="update{{$submission->id}}" method="POST"
                                      action="{{ route('submissions.update', $submission->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" onclick="showModalUpdate('{{$submission->id}}')"
                                            class="custom-btn btn-1" data-submission-id="{{$submission->id}}"
                                            data-toggle="tooltip" data-placement="left" title="Editar">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </form>

                                <form id="status{{$submission->id}}" method="POST"
                                      action="{{ route('submissions.status', $submission->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <button type="button" onclick="updateStatus('{{$submission->id}}')"
                                            class="custom-btn {{($submission->status == 1) ? 'btn-2' : 'btn-3'}}"
                                            data-toggle="tooltip" data-placement="left"
                                            title="{{($submission->status == 1) ? 'Desactivar' : 'Activar'}}">
                                        <i class="fa-regular {{($submission->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                    </button>
                                </form>

                            </div>

                            <div class="botones3">
                                <form id="delete{{$submission->id}}" method="POST"
                                      action="{{route('submissions.delete',$submission->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right"
                                            title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </td>
                    <td style="text-align: left">{{$submission->submission_conference}}</td>
                    <td style="text-align: left">{{$submission->submission_structure}}</td>
                    <td style="text-align: left;">{{$submission->submission_description}}</td>
                    <td class="text {{ ($submission->status == 1) ? 'activo' : 'inactivo' }}">{{($submission->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                    <td>{{$submission->registerBy}}</td>

                </tr>
            @endforeach
            {{--            <div class="pagination-topic">--}}
            {{--                {{ $dates->links() }}--}}
            {{--            </div>--}}
        @else
            <tr>
                <td colspan="9" style="text-align: center;">No abstract submission registered.</td>
            </tr>
        @endif
        </tbody>
    </table>
    <!-- Modal para registrar una presentacion de resumenes -->
    <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-register" tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; margin-top: 85px">
            <div style="height: 450px; border: none;" class="modal-content">
                <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;"
                     class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Presentación de resúmenes

                    </span>
                    <form id="register_form" method="POST" action="{{ route('submissions.store') }}" autocomplete="off"
                          enctype="multipart/form-data">
                        <div class="modal-body container">
                           @csrf
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Conferencia a presentar</label>
                                        <textarea type="text" class="form-control input-skew"
                                                  name="submission_conference"
                                                  placeholder="Ingrese nombre de la conferencia a presentar"
                                                  maxlength="300"
                                                  minlength="10" value="{{ old('submission_conference') }}"
                                                  @if ($errors->has('submission_conference')) autofocus
                                                  @endif required style="min-height: 105px; max-height: 105px"></textarea>
                                        @if ($errors->has('submission_conference'))
                                            <div
                                                class="error-message">{{ $errors->first('submission_conference') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Estructura del resumen</label>
                                        <textarea type="text" class="form-control input-skew"
                                                  name="submission_structure"
                                                  placeholder="Ingrese la estructura de la presentación" maxlength="300"
                                                  minlength="10" value="{{ old('submission_structure') }}"
                                                  @if ($errors->has('submission_structure')) autofocus
                                                  @endif required style="min-height: 105px; max-height: 105px"></textarea>
                                        @if ($errors->has('submission_structure'))
                                            <div
                                                class="error-message">{{ $errors->first('submission_structure') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Descripción de la presentación del
                                            resumen</label>
                                        <textarea type="text" class="form-control input-skew"
                                                  name="submission_description"
                                                  placeholder="Ingrese la descripción de la presentación del resumen"
                                                  maxlength="900"
                                                  minlength="10" value="{{ old('submission_description') }}"
                                                  @if ($errors->has('submission_description')) autofocus
                                                  @endif required style="min-height: 105px; max-height: 105px"></textarea>
                                        @if ($errors->has('submission_description'))
                                            <div
                                                class="error-message">{{ $errors->first('submission_description') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="status" value="1">
                            <input type="hidden" class="form-control" name="registerBy" value="{{ Auth::user()->id }}">
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @if(count($submissions) > 0)
        @foreach($submissions as $submission)
            <!-- Modal para actualizar una presentacion de resumenes -->
            <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade"
                 id="modal-update-{{$submission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">

                <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px; margin-top: 85px">
                    <div style="height: 430px; border: none;" class="modal-content">
                        <div
                            style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%"
                            class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>
                        Editar la Presentación de Resúmenes

                    </span>
                            <form id="update_form" method="POST"
                                  action="{{ route('submissions.update', $submission->id) }}"
                                  autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Conferencia a presentar</label>
                                            <textarea type="text" class="form-control input-skew"
                                                      name="submission_conference"
                                                      placeholder="Ingrese nombre de la conferencia a presentar"
                                                      maxlength="300"
                                                      minlength="10"
                                                      @if ($errors->has('submission_conference')) autofocus
                                                      @endif required style="min-height: 100px; max-height: 100px">{{$submission->submission_conference}}"</textarea>
                                            @if ($errors->has('submission_conference'))
                                                <div
                                                    class="error-message">{{ $errors->first('submission_conference') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Estructura del resumen</label>
                                            <textarea type="text" class="form-control input-skew"
                                                      name="submission_structure"
                                                      placeholder="Ingrese la estructura de la presentación"
                                                      maxlength="300"
                                                      minlength="10"
                                                      @if ($errors->has('submission_structure')) autofocus
                                                      @endif required style="min-height: 100px; max-height: 100px">{{$submission->submission_structure}}</textarea>
                                            @if ($errors->has('submission_structure'))
                                                <div
                                                    class="error-message">{{ $errors->first('submission_structure') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Descripción de la presentación del
                                                resumen</label>
                                            <textarea type="text" class="form-control input-skew"
                                                      name="submission_description"
                                                      placeholder="Ingrese la descripción de la presentación del resumen"
                                                      maxlength="900"
                                                      minlength="10"
                                                      @if ($errors->has('submission_description')) autofocus
                                                      @endif required style="min-height: 120px; max-height: 120px">{{$submission->submission_description}}</textarea>
                                            @if ($errors->has('submission_description'))
                                                <div
                                                    class="error-message">{{ $errors->first('submission_description') }}</div>
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

    function showModalUpdate(submissionId) {
        $('#modal-update-' + submissionId).modal('show');
    }

    function closeModal() {
        $("#modal-register").modal('hide');
        $("#modal-update").modal('hide');
    }

    function updateStatus(submissionId) {
        setTimeout(function () {
            document.getElementById('status' + submissionId).submit();
        }, 250);
    }
</script>
