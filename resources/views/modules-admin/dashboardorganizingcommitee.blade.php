@if($user)
    <title>Dashboard | Organizing Commitee</title>
    @include('include.dashboard')

    <main id="main" class="main">

        <!-- Botón para abrir la modal del comite organizador -->
        <button id="openTopicModal" class="btn btn-primary" onclick="showModalRegister()">
            <span>Registrar Comite Organizador</span>
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
                <th>Charge</th>
                <th>Name and Title</th>
                <th>University</th>
                <th>Description</th>
                <th>Status</th>
                <th>Register by</th>
            </tr>
            </thead>
            <tbody>
            @if(count($organizingscommitee) > 0)
                @foreach($organizingscommitee as $organizingcommitee)
                    <tr>
                        <td class="controls-table">
                            <div class="simon">
                                <div class="botones">
                                    <form id="update{{$organizingcommitee->id}}" method="POST"
                                          action="{{ route('organizingcommittee.update', $organizingcommitee->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" onclick="showModalUpdate('{{$organizingcommitee->id}}')"
                                                class="custom-btn btn-1"
                                                data-organizingcommitee-id="{{$organizingcommitee->id}}"
                                                data-toggle="tooltip" data-placement="left" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </form>

                                    <form id="status{{$organizingcommitee->id}}" method="POST"
                                          action="{{ route('organizingcommittee.status', $organizingcommitee->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <button type="button" onclick="updateStatus('{{$organizingcommitee->id}}')"
                                                class="custom-btn {{($organizingcommitee->status == 1) ? 'btn-2' : 'btn-3'}}"
                                                data-toggle="tooltip" data-placement="left"
                                                title="{{($organizingcommitee->status == 1) ? 'Desactivar' : 'Activar'}}">
                                            <i class="fa-regular {{($organizingcommitee->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                        </button>
                                    </form>

                                </div>

                                <div class="botones3">
                                    <form id="delete{{$organizingcommitee->id}}" method="POST"
                                          action="{{route('organizingcommittee.delete',$organizingcommitee->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right"
                                                title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </td>
                        <td>{{$organizingcommitee->organizer_charge}}</td>
                        <td>{{$organizingcommitee->organizer_name}} {{$organizingcommitee->organizer_title}}</td>
                        <td>{{$organizingcommitee->organizer_university}}</td>
                        <td style="text-align: justify;">{{$organizingcommitee->organizer_description}}</td>
                        <td class="text {{ ($organizingcommitee->status == 1) ? 'activo' : 'inactivo' }}">{{($organizingcommitee->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                        <td>{{$organizingcommitee->registerBy}}</td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" style="text-align: center;">No organizing commite registered.</td>
                </tr>
            @endif
            </tbody>
        </table>
        <!-- Modal para registrar un comite organizador -->
        <div style="overflow: hidden; height: auto; margin-top: -3%" class="modal fade" id="modal-register"
             tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; margin-top: 86px">
                <div style="height: 380px; border: none;" class="modal-content">
                    <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;"
                         class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Comite Organizador

                    </span>
                        <form id="register_form" method="POST" action="{{ route('organizingcommittee.store') }}"
                              autocomplete="off" enctype="multipart/form-data">
                            <div class="modal-body container">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Cargo del organizador</label>
                                            <input type="text" class="form-control input-skew" name="organizer_charge"
                                                   placeholder="Ingrese el cargo del organizador" maxlength="50"
                                                   minlength="10" value="{{ old('organizer_charge') }}"
                                                   @if ($errors->has('organizer_charge')) autofocus @endif required>
                                            @if ($errors->has('organizer_charge'))
                                                <div
                                                    class="error-message">{{ $errors->first('organizer_charge') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Nombre y Apellido del organizador</label>
                                            <input type="text" class="form-control input-skew" name="organizer_name"
                                                   placeholder="Ingrese el nombre y apellido del organizador"
                                                   maxlength="200" minlength="10" value="{{ old('organizer_name') }}"
                                                   @if ($errors->has('organizer_name')) autofocus @endif required>
                                            @if ($errors->has('organizer_name'))
                                                <div class="error-message">{{ $errors->first('organizer_name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Titúlo del organizador</label>
                                            <input type="text" class="form-control input-skew" name="organizer_title"
                                                   placeholder="Ingrese el titúlo del organizador" maxlength="10"
                                                   minlength="2" value="{{ old('organizer_title') }}"
                                                   @if ($errors->has('organizer_title')) autofocus @endif required>
                                            @if ($errors->has('organizer_title'))
                                                <div class="error-message">{{ $errors->first('organizer_title') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Descripción del organizador</label>
                                            <textarea type="text" class="form-control input-skew"
                                                      name="organizer_description"
                                                      placeholder="Ingrese la descripción del organizador"
                                                      maxlength="300" minlength="10"
                                                      value="{{ old('organizer_description') }}"
                                                      @if ($errors->has('organizer_description'))autofocus
                                                      @endif required
                                                      style="max-height: 80px; min-height: 80px"></textarea>
                                            @if ($errors->has('organizer_description'))
                                                <div
                                                    class="error-message">{{ $errors->first('organizer_description') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Universidad del organizador</label>
                                            <input type="text" class="form-control input-skew"
                                                   name="organizer_university"
                                                   placeholder="Ingrese la Universidad del organizador" maxlength="100"
                                                   minlength="10" value="{{ old('organizer_university') }}"
                                                   @if ($errors->has('organizer_university')) autofocus @endif required>
                                            @if ($errors->has('organizer_university'))
                                                <div
                                                    class="error-message">{{ $errors->first('organizer_university') }}</div>
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


        @if(count($organizingscommitee) > 0)
            @foreach($organizingscommitee as $organizingcommitee)
                <!-- Modal para actualizar un fecha importante -->
                <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade"
                     id="modal-update-{{$organizingcommitee->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px;">
                        <div style="height: 400px; border: none;" class="modal-content">
                            <div class="container-see"
                                 style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%; height: 574px; overflow: hidden; overflow-x: hidden;  ">

                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>
                        Editar Comite Organizador

                    </span>
                                <form id="update_form" method="POST"
                                      action="{{ route('organizingcommittee.update', $organizingcommitee->id) }}"
                                      autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Cargo del organizador</label>
                                                <input type="text" class="form-control input-skew"
                                                       name="organizer_charge"
                                                       placeholder="Ingrese el cargo del organizador" maxlength="50"
                                                       minlength="10"
                                                       value="{{ old('organizer_charge', $organizingcommitee->organizer_charge) }}"
                                                       @if ($errors->has('organizer_charge')) autofocus @endif required>
                                                @if ($errors->has('organizer_charge'))
                                                    <div
                                                        class="error-message">{{ $errors->first('organizer_charge') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Nombre y Apellido del
                                                    organizador</label>
                                                <input type="text" class="form-control input-skew" name="organizer_name"
                                                       placeholder="Ingrese el nombre y apellido del organizador"
                                                       maxlength="200" minlength="10"
                                                       value="{{ old('organizer_name', $organizingcommitee->organizer_name) }}"
                                                       @if ($errors->has('organizer_name')) autofocus @endif required>
                                                @if ($errors->has('organizer_name'))
                                                    <div
                                                        class="error-message">{{ $errors->first('organizer_name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Titúlo del organizador</label>
                                                <input type="text" class="form-control input-skew"
                                                       name="organizer_title"
                                                       placeholder="Ingrese el titúlo del organizador" maxlength="10"
                                                       minlength="2"
                                                       value="{{ old('organizer_title', $organizingcommitee->organizer_title) }}"
                                                       @if ($errors->has('organizer_title')) autofocus @endif required>
                                                @if ($errors->has('organizer_title'))
                                                    <div
                                                        class="error-message">{{ $errors->first('organizer_title') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Descripción del organizador</label>
                                                <textarea type="text" class="form-control input-skew"
                                                          name="organizer_description"
                                                          placeholder="Ingrese la descripción del organizador"
                                                          maxlength="300" minlength="10"
                                                          @if ($errors->has('organizer_description'))autofocus
                                                          @endif required
                                                          style="max-height: 80px; min-height: 80px">{{ old('organizer_description', $organizingcommitee->organizer_description) }}</textarea>
                                                @if ($errors->has('organizer_description'))
                                                    <div
                                                        class="error-message">{{ $errors->first('organizer_description') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Universidad del organizador</label>
                                                <input type="text" class="form-control input-skew"
                                                       name="organizer_university"
                                                       placeholder="Ingrese la Universidad del organizador"
                                                       maxlength="100" minlength="10"
                                                       value="{{ old('organizer_university', $organizingcommitee->organizer_university) }}"
                                                       @if ($errors->has('organizer_university')) autofocus
                                                       @endif required>
                                                @if ($errors->has('organizer_university'))
                                                    <div
                                                        class="error-message">{{ $errors->first('organizer_university') }}</div>
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
        <div class="pagination-organizingcommitee" style="text-align: end">
            {{ $organizingscommitee->links() }}
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

        function showModalUpdate(organizingcommiteeId) {
            $('#modal-update-' + organizingcommiteeId).modal('show');
        }

        function closeModal() {
            $("#modal-register").modal('hide');
            $("#modal-update").modal('hide');
        }

        function updateStatus(organizingcommiteeId) {
            setTimeout(function () {
                document.getElementById('status' + organizingcommiteeId).submit();
            }, 250);
        }
    </script>
@else
    @include("auth.login")
@endif
