@if($user)
    <title>Dashboard | Instructions for Authors</title>
    @include('include.dashboard')

    <main id="main" class="main">

        <!-- Botón para abrir la modal de registro de las instruciones para los autores -->
        <button id="openTopicModal" class="btn btn-primary" onclick="showModalRegister()">
            <span>Registrar Instrucción para Autor</span>
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
                <th>Instruction Conference</th>
                <th>Instruction Description</th>
                <th>Instruction Aspects</th>
                <th>Status</th>
                <th>Register by</th>
            </tr>
            </thead>
            <tbody>
            @if(count($instructions) > 0)
                @foreach($instructions as $instruction)
                    <tr>
                        <td class="controls-table">
                            <div class="simon">
                                <div class="botones">
                                    <form id="update{{$instruction->id}}" method="POST"
                                          action="{{ route('instructions.update', $instruction->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" onclick="showModalUpdate('{{$instruction->id}}')"
                                                class="custom-btn btn-1" data-instruction-id="{{$instruction->id}}"
                                                data-toggle="tooltip" data-placement="left" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </form>

                                    <form id="status{{$instruction->id}}" method="POST"
                                          action="{{ route('instructions.status', $instruction->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <button type="button" onclick="updateStatus('{{$instruction->id}}')"
                                                class="custom-btn {{($instruction->status == 1) ? 'btn-2' : 'btn-3'}}"
                                                data-toggle="tooltip" data-placement="left"
                                                title="{{($instruction->status == 1) ? 'Desactivar' : 'Activar'}}">
                                            <i class="fa-regular {{($instruction->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                        </button>
                                    </form>

                                </div>

                                <div class="botones3">
                                    <form id="delete{{$instruction->id}}" method="POST"
                                          action="{{route('instructions.delete',$instruction->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right"
                                                title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </td>
                        <td style="text-align: left">{{$instruction->instruction_conference}}</td>
                        <td style="text-align: left">{{$instruction->instruction_description}}</td>
                        <td style="text-align: left;">{{$instruction->instruction_aspects}}</td>
                        <td class="text {{ ($instruction->status == 1) ? 'activo' : 'inactivo' }}">{{($instruction->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                        <td>{{$instruction->registerBy}}</td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" style="text-align: center;">No author's instructions registered.</td>
                </tr>
            @endif
            </tbody>
        </table>
        <!-- Modal para registrar una presentacion de resumenes -->
        <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-register" tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; margin-top: 130px">
                <div style="height: 400px; border: none;" class="modal-content">
                    <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;"
                         class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Instrucción para Autores

                    </span>
                        <form id="register_form" method="POST" action="{{ route('instructions.store') }}" autocomplete="off"
                              enctype="multipart/form-data">
                            <div class="modal-body container">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Presentación de la conferencia</label>
                                            <textarea type="text" class="form-control input-skew"
                                                      name="instruction_conference"
                                                      placeholder="Ingrese la presentación de la conferencia"
                                                      maxlength="300"
                                                      minlength="10" value="{{ old('instruction_conference') }}"
                                                      @if ($errors->has('instruction_conference')) autofocus
                                                      @endif required style="min-height: 90px; max-height: 90px"></textarea>
                                            @if ($errors->has('instruction_conference'))
                                                <div
                                                    class="error-message">{{ $errors->first('instruction_conference') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Descripción de la instrucción</label>
                                            <textarea type="text" class="form-control input-skew"
                                                      name="instruction_description"
                                                      placeholder="Ingrese la descripción de la instrucción" maxlength="300"
                                                      minlength="10" value="{{ old('instruction_description') }}"
                                                      @if ($errors->has('instruction_description')) autofocus
                                                      @endif required style="min-height: 90px; max-height: 90px"></textarea>
                                            @if ($errors->has('instruction_description'))
                                                <div
                                                    class="error-message">{{ $errors->first('instruction_description') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Aspectos de la instrucción</label>
                                            <textarea type="text" class="form-control input-skew"
                                                      name="instruction_aspects"
                                                      placeholder="Ingrese los aspectos de la instrucción"
                                                      maxlength="1200"
                                                      minlength="10" value="{{ old('instruction_aspects') }}"
                                                      @if ($errors->has('instruction_aspects')) autofocus
                                                      @endif required style="min-height: 90px; max-height: 90px"></textarea>
                                            @if ($errors->has('instruction_aspects'))
                                                <div
                                                    class="error-message">{{ $errors->first('instruction_aspects') }}</div>
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


        @if(count($instructions) > 0)
            @foreach($instructions as $instruction)
                <!-- Modal para actualizar una presentacion de resumenes -->
                <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade"
                     id="modal-update-{{$instruction->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">

                    <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px; margin-top: 86px">
                        <div style="height: 400px; border: none;" class="modal-content">
                            <div
                                style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%"
                                class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>
                        Editar la Instrucción para Autor

                    </span>
                                <form id="update_form" method="POST"
                                      action="{{ route('instructions.update', $instruction->id) }}"
                                      autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Presentación de la conferencia</label>
                                                <textarea type="text" class="form-control input-skew"
                                                          name="instruction_conference"
                                                          placeholder="Ingrese la presentación de la conferencia"
                                                          maxlength="300"
                                                          minlength="10" style="min-height: 110px; max-height: 110px"
                                                          @if ($errors->has('instruction_conference')) autofocus
                                                          @endif required >{{$instruction->instruction_conference}}</textarea>
                                                @if ($errors->has('instruction_conference'))
                                                    <div
                                                        class="error-message">{{ $errors->first('instruction_conference') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Descripción de la instrucción</label>
                                                <textarea type="text" class="form-control input-skew"
                                                          name="instruction_description"
                                                          placeholder="Ingrese la descripción de la instrucción" maxlength="300"
                                                          minlength="10" style="min-height: 110px; max-height: 110px"
                                                          @if ($errors->has('instruction_description')) autofocus
                                                          @endif required>{{$instruction->instruction_description}}</textarea>
                                                @if ($errors->has('instruction_description'))
                                                    <div
                                                        class="error-message">{{ $errors->first('instruction_description') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="mb-3 input-ecu">
                                                <label class="form-label required">Aspectos de la instrucción</label>
                                                <textarea type="text" class="form-control input-skew"
                                                          name="instruction_aspects"
                                                          placeholder="Ingrese los aspectos de la instrucción"
                                                          maxlength="1200"
                                                          minlength="10" style="min-height: 110px; max-height: 110px"
                                                          value="{{ old('instruction_aspects') }}"
                                                          @if ($errors->has('instruction_aspects')) autofocus
                                                          @endif required>{{$instruction->instruction_aspects}}</textarea>
                                                @if ($errors->has('instruction_aspects'))
                                                    <div
                                                        class="error-message">{{ $errors->first('instruction_aspects') }}</div>
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
        <div class="pagination-instructions" style="text-align: end">
            {{ $instructions->links() }}
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

        function showModalUpdate(instructionId) {
            $('#modal-update-' + instructionId).modal('show');
        }

        function closeModal() {
            $("#modal-register").modal('hide');
            $("#modal-update").modal('hide');
        }

        function updateStatus(instructionId) {
            setTimeout(function () {
                document.getElementById('status' + instructionId).submit();
            }, 250);
        }
    </script>
@else
    @include("auth.login")
@endif
