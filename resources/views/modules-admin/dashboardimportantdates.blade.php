<title>Dashboard | Important Dates</title>
@include('include.sidebar')

<main id="main" class="main">

    <!-- Botón para abrir la modal de registro del programa -->
    <button id="openTopicModal" class="btn btn-primary" onclick="showModalRegister()">
        <span>Registrar fecha importante</span>
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
            <th>Name Date</th>
            <th>Date</th>
            <th>Description</th>
            <th>Status</th>
            <th>Register by</th>
        </tr>
        </thead>
        <tbody>
        @if(count($dates) > 0)
            @foreach($dates as $date)
                <tr>
                    <td class="controls-table">
                        <div class="simon">
                            <div class="botones">
                                <form id="update{{$date->id}}" method="POST"
                                      action="{{ route('dates.update', $date->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" onclick="showModalUpdate('{{$date->id}}')" class="custom-btn btn-1" data-date-id="{{$date->id}}" data-toggle="tooltip" data-placement="left" title="Editar">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </form>

                                <form id="status{{$date->id}}" method="POST"
                                      action="{{ route('dates.status', $date->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <button type="button" onclick="updateStatus('{{$date->id}}')"
                                            class="custom-btn {{($date->status == 1) ? 'btn-2' : 'btn-3'}}"
                                            data-toggle="tooltip" data-placement="left"
                                            title="{{($date->status == 1) ? 'Desactivar' : 'Activar'}}">
                                        <i class="fa-regular {{($date->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                    </button>
                                </form>

                            </div>

                            <div class="botones3">
                                <form id="delete{{$date->id}}" method="POST"
                                      action="{{route('dates.delete',$date->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right"
                                            title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </td>
                    <td>{{$date->date_name}}</td>
                    <td>{{$date->date_important}}</td>
                    <td style="text-align: justify;">{{$date->date_description}}</td>
                    <td class="text {{ ($date->status == 1) ? 'activo' : 'inactivo' }}">{{($date->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                    <td>{{$date->registerBy}}</td>

                </tr>
            @endforeach
{{--            <div class="pagination-topic">--}}
{{--                {{ $dates->links() }}--}}
{{--            </div>--}}
        @else
            <tr>
                <td colspan="9" style="text-align: center;">No hay fechas importantes registradas.</td>
            </tr>
        @endif
        </tbody>
    </table>
    <!-- Modal para registrar un fecha importante -->
    <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-register" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; top: 22%">
            <div style="height: 350px; border: none;" class="modal-content">
                <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;"
                     class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Fecha Importante

                    </span>
                    <form id="register_form" method="POST" action="{{ route('dates.store') }}" autocomplete="off"
                          enctype="multipart/form-data">
                        <div class="modal-body container">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Nombre de la fecha importante</label>
                                        <input type="text" class="form-control input-skew" name="date_name"
                                               placeholder="Ingrese nombre de la fecha importante" maxlength="100"
                                               minlength="10" value="{{ old('date_name') }}"
                                               @if ($errors->has('date_name')) autofocus @endif required>
                                        @if ($errors->has('date_name'))
                                            <div class="error-message">{{ $errors->first('date_name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Fecha importante</label>
                                        <input type="text" class="form-control input-skew" name="date_important"
                                               placeholder="Ingrese la fecha importante" maxlength="100"
                                               minlength="10" value="{{ old('date_important') }}"
                                               @if ($errors->has('date_important')) autofocus @endif required>
                                        @if ($errors->has('date_important'))
                                            <div class="error-message">{{ $errors->first('date_important') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Descripción</label>
                                        <textarea type="text" class="form-control input-skew" name="date_description"
                                                  placeholder="Ingrese la descripción" maxlength="2000" minlength="10"
                                                  value="{{ old('date_description') }}"
                                                  @if ($errors->has('date_description'))autofocus
                                                  @endif required></textarea>
                                        @if ($errors->has('date_description'))
                                            <div class="error-message">{{ $errors->first('date_description') }}</div>
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


    @if(count($dates) > 0)
        @foreach($dates as $date)
            <!-- Modal para actualizar un fecha importante -->
            <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-update-{{$date->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px; top: 22%">
                    <div style="height: 300px; border: none;" class="modal-content">
                        <div
                            style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%"
                            class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>
                        Editar Fechas Importantes

                    </span>
                            <form id="update_form" method="POST" action="{{ route('dates.update', $date->id) }}"
                                  autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Nombre de la fecha importante</label>
                                            <input type="text" class="form-control input-skew" name="date_name"
                                                   placeholder="Ingrese nombre de la fecha importante" maxlength="100"
                                                   minlength="10"
                                                   value="{{ old('date_name', $date->date_name) }}"
                                                   @if ($errors->has('date_name')) autofocus @endif required>
                                            @if ($errors->has('date_name'))
                                                <div class="error-message">{{ $errors->first('date_name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Fecha importante</label>
                                            <input type="text" class="form-control input-skew" name="date_important"
                                                   placeholder="Ingrese la fecha importante" maxlength="100"
                                                   minlength="10"
                                                   value="{{ old('te_important', $date->date_important) }}"
                                                   @if ($errors->has('date_important')) autofocus @endif required>
                                            @if ($errors->has('date_important'))
                                                <div class="error-message">{{ $errors->first('date_important') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Descripción</label>
                                            <textarea type="text" class="form-control input-skew" name="date_description"
                                                      placeholder="Ingrese la descripción" maxlength="2000" minlength="10"
                                                      @if ($errors->has('date_description'))autofocus
                                                      @endif required>{{$date->date_description }}</textarea>
                                            @if ($errors->has('date_description'))
                                                <div class="error-message">{{ $errors->first('date_description') }}</div>
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

    function showModalUpdate(dateId) {
        $('#modal-update-' + dateId).modal('show');
    }

    function closeModal() {
        $("#modal-register").modal('hide');
        $("#modal-update").modal('hide');
    }

    function updateStatus(dateId) {
        setTimeout(function () {
            document.getElementById('status' + dateId).submit();
        }, 250);
    }
</script>
