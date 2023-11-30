<title>Dashboard | Topics</title>
@include('include.sidebar')

<main id="main" class="main">

    <!-- Botón para abrir la modal de registro del programa -->
    <button id="openTopicModal" class="btn btn-primary" onclick="showModalRegister()">
        <span>Registrar Programa</span>
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
            <th>Name</th>
            <th>Description</th>
            <th>Topics</th>
            <th>Image</th>
            <th>Status</th>
            <th>Register by</th>
        </tr>
        </thead>
        <tbody>
        @if(count($topics) > 0)
            @foreach($topics as $topic)
                <tr>
                    <td class="controls-table">
                        <div class="simon">
                            <div class="botones">
                                <form id="update{{$topic->id}}" method="POST"
                                      action="{{ route('topics.update', $topic->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" onclick="showModalUpdate('{{$topic->id}}')" class="custom-btn btn-1" data-topic-id="{{$topic->id}}" data-toggle="tooltip" data-placement="left" title="Editar">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </form>

                                <form id="status{{$topic->id}}" method="POST"
                                      action="{{ route('topics.status', $topic->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <button type="button" onclick="updateStatus('{{$topic->id}}')"
                                            class="custom-btn {{($topic->status == 1) ? 'btn-2' : 'btn-3'}}"
                                            data-toggle="tooltip" data-placement="left"
                                            title="{{($topic->status == 1) ? 'Desactivar' : 'Activar'}}">
                                        <i class="fa-regular {{($topic->status == 1) ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                    </button>
                                </form>

                            </div>

                            <div class="botones3">
                                <form id="delete{{$topic->id}}" method="POST"
                                      action="{{route('topics.delete',$topic->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="custom-btn btn-4" data-toggle="tooltip" data-placement="right"
                                            title="Eliminar"><i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </td>
                    <td>{{$topic->program_name}}</td>
                    <td style="text-align: justify;">{{$topic->program_description}}</td>
                    <td style="text-align: left;">
                        {{ $topic->program_topics }}
{{--                        <script>--}}
{{--                            displayFormattedTopics(`{{ $topic->program_topics }}`);--}}
{{--                        </script>--}}
                    </td>
                    <td>
                        <button class="button-ecu button-ecu-primary" onclick="showImage('{{$topic->program_image}}')">
                            <span>Mostrar</span>
                            <i class="fa fa-image"></i>
                        </button>
                    </td>
                    <td class="text {{ ($topic->status == 1) ? 'activo' : 'inactivo' }}">{{($topic->status == 1) ? 'Activo' : 'Inactivo'}}</td>
                    <td>{{$topic->registerBy}}</td>

                </tr>
            @endforeach
            <div class="pagination-topic">
                {{ $topics->links() }}
            </div>
        @else
            <tr>
                <td colspan="9" style="text-align: center;">No hay programas registrados.</td>
            </tr>
        @endif
        </tbody>
    </table>
    <!-- Modal para registrar un programa -->
    <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-register" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 700px; top: 22%">
            <div style="height: 490px; border: none;" class="modal-content">
                <div style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column;"
                     class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>

                        Registrar Programa

                    </span>
                    <form id="register_form" method="POST" action="{{ route('topics.store') }}" autocomplete="off"
                          enctype="multipart/form-data">
                        <div class="modal-body container">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Nombre del Programa</label>
                                        <input type="text" class="form-control input-skew" name="program_name"
                                               placeholder="Ingrese el nombre del programa" maxlength="100"
                                               minlength="10" value="{{ old('program_name') }}"
                                               @if ($errors->has('program_name')) autofocus @endif required>
                                        @if ($errors->has('program_name'))
                                            <div class="error-message">{{ $errors->first('program_name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Descripción</label>
                                        <textarea type="text" class="form-control input-skew" name="program_description"
                                                  placeholder="Ingrese la descripción" maxlength="2000" minlength="10"
                                                  value="{{ old('program_description') }}"
                                                  @if ($errors->has('program_description'))autofocus
                                                  @endif required></textarea>
                                        @if ($errors->has('program_description'))
                                            <div class="error-message">{{ $errors->first('program_description') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label required">Topicos del programa</label>
                                        <textarea class="form-control input-skew" name="program_topics"
                                                  placeholder="Ingrese los topicos del programa" maxlength="2000"
                                                  minlength="10" value="{{ old('program_topics') }}"
                                                  @if ($errors->has('program_topics'))autofocus
                                                  @endif required></textarea>
                                        @if ($errors->has('program_topics'))
                                            <div class="error-message">{{ $errors->first('program_topics') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="mb-3 input-ecu">
                                        <label class="form-label">Subir imagen Principal <i style="color: #e20816"
                                                                                            class="fa fa-upload"></i></label>
                                        <input type="file" id="image_upload" class="form-control input-skew"
                                               name="program_image" accept="image/jpeg, image/png"
                                               value="{{ old('program_image') }}"
                                               @if ($errors->has('program_image'))autofocus @endif required>
                                        @if ($errors->has('program_image'))
                                            <div class="error-message">{{ $errors->first('program_image') }}</div>
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


    @if(count($topics) > 0)
        @foreach($topics as $topic)
            <!-- Modal para actualizar un topicos -->
            <div style="overflow: hidden; height: auto; margin-top: -1%" class="modal fade" id="modal-update-{{$topic->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 750px; top: 22%">
                    <div style="height: 450px; border: none;" class="modal-content">
                        <div
                            style="display: flex; align-items: center; padding: 0; border: none; flex-direction: column; margin-top: -1%"
                            class="modal-header">
                    <span style="font-size: 26px; padding-left: 16px" class="modal-title" id="exampleModalLabel"> <i
                            style="color: #0d47a1" class="bi bi-building"></i>
                        Editar Topicos

                    </span>
                            <form id="update_form" method="POST" action="{{ route('topics.update', $topic->id) }}"
                                  autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Nombre del Programa</label>
                                            <input type="text" class="form-control input-skew" name="program_name"
                                                   placeholder="Ingrese el nombre del programa" maxlength="100" minlength="10"
                                                   value="{{ old('program_name', $topic->program_name) }}"
                                                   @if ($errors->has('program_name')) autofocus @endif>
                                            @if ($errors->has('program_name'))
                                                <div class="error-message">{{ $errors->first('program_name') }}</div>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Descripción</label>
                                            <textarea type="text" class="form-control input-skew"
                                                      name="program_description" placeholder="Ingrese la descripción"
                                                      maxlength="2000" minlength="10"
                                                      @if ($errors->has('program_description'))autofocus
                                                      @endif>{{ old('program_description', $topic->program_description) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label required">Topicos del programa</label>
                                            <textarea class="form-control input-skew" name="program_topics"
                                                      placeholder="Ingrese los topicos del programa" maxlength="2000"
                                                      minlength="10"
                                                      @if ($errors->has('program_topics')) autofocus @endif >{{ old('program_topics', $topic->program_topics) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="mb-3 input-ecu">
                                            <label class="form-label">Subir imagen Principal <i style="color: #e20816"
                                                                                                class="fa fa-upload"></i></label>
                                            <input type="file" id="image_upload" class="form-control input-skew"
                                                   name="program_image" accept="image/jpeg, image/png"
                                                   value="{{ old('program_image', $topic->program_image) }}"
                                                   @if ($errors->has('program_image')) autofocus @endif>
                                            @if($topic->program_image)
                                                <p class="image-actual">Imagen actual: <img
                                                        style="width: 100px; margin-left: 10px;"
                                                        src="{{ asset('storage/' . $topic->program_image) }}"
                                                        alt="Imagen Principal" class="img-pequena">
                                                </p>
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
<!--Modal de la imagen -->
<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" style="min-width: 600px; height: 400px; margin-top: 62px">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Agregar el elemento img para mostrar la imagen -->
                <img style="max-height: 320px" id="modal-image" src="" alt="Program Image"
                     class="img-fluid d-block mx-auto">
            </div>
        </div>
    </div>
</div>

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

    function showModalUpdate(hotelId) {
        $('#modal-update-' + hotelId).modal('show');
    }

    function closeModal() {
        $("#modal-register").modal('hide');
        $("#modal-update").modal('hide');
    }

    function updateStatus(topicId) {
        setTimeout(function () {
            document.getElementById('status' + topicId).submit();
        }, 250);
    }

    function showImage(program_image) {
        const modalImage = document.getElementById("modal-image");
        modalImage.src = "/storage/" + program_image;
        $("#image-modal").modal('show');
    }

    document.getElementById('image_upload').addEventListener('change', function () {
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
                    customContainer: 'swal2-container-red'
                }
            });

            this.value = '';
        }
    });

    {{--function formatTopics(inputTopics) {--}}
    {{--    const topicsArray = inputTopics.split("\n");--}}

    {{--    const formattedTopics = topicsArray.map(topic => {--}}
    {{--        const formattedTopic = topic.trim().replace(/\w\S*/g, function (txt) {--}}
    {{--            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();--}}
    {{--        });--}}

    {{--        return formattedTopic.replace(/([A-Z])/g, '-$1').toLowerCase();--}}
    {{--    });--}}

    {{--    return formattedTopics;--}}
    {{--}--}}

    {{--const topicsData = `{{ $topic->program_topics }}`;--}}
    {{--const topics = formatTopics(topicsData);--}}

    {{--const ulElement = document.createElement('ul');--}}
    {{--topics.forEach(topic => {--}}
    {{--    const liElement = document.createElement('li');--}}
    {{--    const formattedTopic = topic.replace(/^-/, '').replace(/-/g, ' ');--}}
    {{--    liElement.textContent = formattedTopic.charAt(0).toUpperCase() + formattedTopic.slice(1);--}}
    {{--    ulElement.appendChild(liElement);--}}
    {{--});--}}

    {{--const tdElement = document.querySelector('td[style="text-align: left;"]');--}}
    {{--tdElement.appendChild(ulElement);--}}
</script>
