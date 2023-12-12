@if($user)
    <title>Dashboard | Index</title>
    @include('include.dashboard')

    <main id="main" class="main">

        <!-- Botón para abrir la modal de registro de la informacion del index -->
        <button id="openIndexModal" class="btn btn-primary" onclick="showModalRegister()">
            <span>Registrar Información del Index</span>
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
                <th>Description One</th>
                <th>Description Two</th>
                <th>UFPSO Student</th>
                <th>UFPSO Graduate</th>
                <th>External Professional</th>
                <th>Oral Presenter</th>
                <th>Description Three</th>
                <th>Message</th>
                <th>Status</th>
                <th>Register by</th>
            </tr>
            </thead>
            <tbody>
            @if(count($indexs) > 0)
                @foreach($indexs as $index)
                    <tr>
                        <td class="controls-table">
                            <div class="simon">
                                <div class="botones">
                                    <form id="update{{$index->id}}" method="POST" action="{{ route('index.update', $index->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" onclick="showModalUpdate('{{$index->id}}')" class="custom-btn btn-1" data-index-id="{{$index->id}}" data-toggle="tooltip" data-placement="left" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </form>

                                    <form id="status{{$index->id}}" method="POST" action="{{ route('index.status', $index->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <button type="button" onclick="updateStatus('{{$index->id}}')" class="custom-btn {{($index->status == 1) ? 'btn-2' : 'btn-3'}}" data-toggle="tooltip" data-placement="left" title="{{($index->status == 1) ? 'Desactivar' : 'Activar'}}">
                                            <i class="fa-regular {{($index->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                        </button>
                                    </form>

                                </div>

                                <div class="botones3">
                                    <form id="delete{{$index->id}}" method="POST" action="{{route('index.delete',$index->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </td>
                        <td style="text-align: left">{{$index->description_one}}</td>
                        <td style="text-align: left">{{$index->description_two}}</td>
                        <td style="text-align: left;">{{$index->ufpso_student}}</td>
                        <td style="text-align: left;">{{$index->ufpso_graduate}}</td>
                        <td style="text-align: left;">{{$index->external_professional}}</td>
                        <td style="text-align: left;">{{$index->oral_presenter}}</td>
                        <td style="text-align: left;">{{$index->description_three}}</td>
                        <td style="text-align: left;">{{$index->message}}</td>
                        <td class="text {{ ($index->status == 1) ? 'activo' : 'inactivo' }}">{{($index->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                        <td>{{$index->registerBy}}</td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" style="text-align: center;">There is no registered information index.</td>
                </tr>
            @endif
            </tbody>
        </table>
        <!-- Modal para registrar informacion del index -->
        <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-register" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; margin-top: 70px">
                <div style="height: 550px; border: none; overflow: scroll" class="modal-content">
                    <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;" class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Información del Index

                    </span>
                        <form id="register_form" method="POST" action="{{ route('index.store') }}" autocomplete="off" enctype="multipart/form-data">
                            <div class="modal-body container">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Description One</label>
                                            <textarea style="max-height: 125px; min-height: 125px" type="text" class="form-control input-skew" name="description_one" placeholder="Ingrese la descripcion uno" maxlength="500" minlength="10" value="{{ old('description_one') }}" @if ($errors->has('description_one')) autofocus @endif required>
                                        </textarea>
                                            @if ($errors->has('description_one'))
                                                <div class="error-message">{{ $errors->first('description_one') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Description Two</label>
                                            <textarea style="max-height: 125px; min-height: 125px" type="text" class="form-control input-skew" name="description_two" placeholder="Ingrese la descripcion dos" maxlength="500" minlength="10" value="{{ old('description_two') }}" @if ($errors->has('description_two')) autofocus @endif required>
                                        </textarea>
                                            @if ($errors->has('description_two'))
                                                <div class="error-message">{{ $errors->first('description_two') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">UFPSO Student</label>
                                            <input type="text" class="form-control input-skew" name="ufpso_student" placeholder="Ingrese valor a pagar por estudiante UFPSO" maxlength="30" minlength="5" value="{{ old('ufpso_student') }}" @if ($errors->has('ufpso_student')) autofocus @endif required>
                                            @if ($errors->has('ufpso_student'))
                                                <div class="error-message">{{ $errors->first('ufpso_student') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">UFPSO Graduate</label>
                                            <input type="text" class="form-control input-skew" name="ufpso_graduate" placeholder="Ingrese valor a pagar por graduado UFPSO" maxlength="30" minlength="5" value="{{ old('ufpso_graduate') }}" @if ($errors->has('ufpso_graduate')) autofocus @endif required>
                                            @if ($errors->has('ufpso_graduate'))
                                                <div class="error-message">{{ $errors->first('ufpso_graduate') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">External Professional</label>
                                            <input type="text" class="form-control input-skew" name="external_professional" placeholder="Ingrese valor a pagar por profesional externo" maxlength="30" minlength="5" value="{{ old('external_professional') }}" @if ($errors->has('external_professional')) autofocus @endif required>
                                            @if ($errors->has('external_professional'))
                                                <div class="error-message">{{ $errors->first('external_professional') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Oral Presenter</label>
                                            <input type="text" class="form-control input-skew" name="oral_presenter" placeholder="Ingrese valor a pagar por presentador oral" maxlength="30" minlength="5" value="{{ old('oral_presenter') }}" @if ($errors->has('oral_presenter')) autofocus @endif required>
                                            @if ($errors->has('oral_presenter'))
                                                <div class="error-message">{{ $errors->first('oral_presenter') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Description Three</label>
                                            <textarea style="max-height: 125px; min-height: 125px" type="text" class="form-control input-skew" name="description_three" placeholder="Ingrese la descripcion tres" maxlength="200" minlength="10" value="{{ old('description_three') }}" @if ($errors->has('description_three')) autofocus @endif required>
                                        </textarea>
                                            @if ($errors->has('description_three'))
                                                <div class="error-message">{{ $errors->first('description_three') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Message</label>
                                            <textarea style="max-height: 125px; min-height: 125px" type="text" class="form-control input-skew" name="message" placeholder="Ingrese el mensaje" maxlength="100" minlength="10" value="{{ old('message') }}" @if ($errors->has('message')) autofocus @endif required>
                                        </textarea>
                                            @if ($errors->has('message'))
                                                <div class="error-message">{{ $errors->first('message') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <input type="hidden" class="form-control" name="status" value="1">
                                <input type="hidden" class="form-control" name="registerBy" value="{{ Auth::check() ? Auth::user()->id : null }}">
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


        @if(count($indexs) > 0)
            @foreach($indexs as $index)
                <!-- Modal para actualizar informacion del index -->
                <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-update-{{$index->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px; margin-top: 65px;">
                        <div style="height: 550px; border: none; overflow: scroll" class="modal-content">
                            <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%" class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i style="color: #0d47a1" class="bi bi-building"></i>
                        Editar Información del Index

                    </span>
                                <form id="update_form" method="POST" action="{{ route('index.update', $index->id) }}" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body container">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Description One</label>
                                                    <textarea style="max-height: 125px; min-height: 125px" type="text" class="form-control input-skew" name="description_one" placeholder="Ingrese la descripcion uno" maxlength="500" minlength="10" @if ($errors->has('description_one')) autofocus @endif required>
                                                    {{ old('description_one', $index->description_one) }}
                                                    </textarea>
                                                    @if ($errors->has('description_one'))
                                                        <div class="error-message">{{ $errors->first('description_one') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Description Two</label>
                                                    <textarea style="max-height: 125px; min-height: 125px" type="text" class="form-control input-skew" name="description_two" placeholder="Ingrese la descripcion dos" maxlength="500" minlength="10" @if ($errors->has('description_two')) autofocus @endif required>
                                                    {{ old('description_two', $index->description_two) }}
                                                    </textarea>
                                                    @if ($errors->has('description_two'))
                                                        <div class="error-message">{{ $errors->first('description_two') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">UFPSO Student</label>
                                                    <input type="text" class="form-control input-skew" name="ufpso_student" placeholder="Ingrese valor a pagar por estudiante UFPSO" maxlength="30" minlength="5" value="{{ old('ufpso_student', $index->ufpso_student) }}" @if ($errors->has('ufpso_student')) autofocus @endif required>
                                                    @if ($errors->has('ufpso_student'))
                                                        <div class="error-message">{{ $errors->first('ufpso_student') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">UFPSO Graduate</label>
                                                    <input type="text" class="form-control input-skew" name="ufpso_graduate" placeholder="Ingrese valor a pagar por graduado UFPSO" maxlength="30" minlength="5" value="{{ old('ufpso_graduate', $index->ufpso_graduate) }}" @if ($errors->has('ufpso_graduate')) autofocus @endif required>
                                                    @if ($errors->has('ufpso_graduate'))
                                                        <div class="error-message">{{ $errors->first('ufpso_graduate') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">External Professional</label>
                                                    <input type="text" class="form-control input-skew" name="external_professional" placeholder="Ingrese valor a pagar por profesional externo" maxlength="30" minlength="5" value="{{ old('external_professional', $index->external_professional) }}" @if ($errors->has('external_professional')) autofocus @endif required>
                                                    @if ($errors->has('external_professional'))
                                                        <div class="error-message">{{ $errors->first('external_professional') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Oral Presenter</label>
                                                    <input type="text" class="form-control input-skew" name="oral_presenter" placeholder="Ingrese valor a pagar por presentador oral" maxlength="30" minlength="5" value="{{ old('oral_presenter', $index->oral_presenter) }}" @if ($errors->has('oral_presenter')) autofocus @endif required>
                                                    @if ($errors->has('oral_presenter'))
                                                        <div class="error-message">{{ $errors->first('oral_presenter') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Description Three</label>
                                                    <textarea style="max-height: 125px; min-height: 125px" type="text" class="form-control input-skew" name="description_three" placeholder="Ingrese la descripcion tres" maxlength="200" minlength="10" @if ($errors->has('description_three')) autofocus @endif required>
                                                    {{ old('description_three', $index->description_three) }}
                                                    </textarea>
                                                    @if ($errors->has('description_three'))
                                                        <div class="error-message">{{ $errors->first('description_three') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="mb-3 input-ecu">
                                                    <label class="form-label required">Message</label>
                                                    <textarea style="max-height: 125px; min-height: 125px" type="text" class="form-control input-skew" name="message" placeholder="Ingrese el mensaje" maxlength="100" minlength="10" @if ($errors->has('message')) autofocus @endif required>
                                                    {{ old('message', $index->message) }}
                                                    </textarea>
                                                    @if ($errors->has('message'))
                                                        <div class="error-message">{{ $errors->first('message') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>

                                    <input type="hidden" class="form-control" name="status" value="1">
                                    <input type="hidden" class="form-control" name="registerBy" value="{{ Auth::check() ? Auth::user()->id : null }}">
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
{{--        <div class="pagination-index-program" style="text-align: end">--}}
{{--            {{ $indexs->links() }}--}}
{{--        </div>--}}
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

        function showModalUpdate(indexId) {
            $('#modal-update-' + indexId).modal('show');
        }

        function closeModal() {
            $("#modal-register").modal('hide');
            $("#modal-update").modal('hide');
        }

        function updateStatus(indexId) {
            setTimeout(function() {
                document.getElementById('status' + indexId).submit();
            }, 250);
        }
    </script>
@else
    @include("auth.login")
@endif

