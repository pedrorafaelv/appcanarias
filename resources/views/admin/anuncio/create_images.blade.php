@extends('adminlte::page')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5.9.3/dist/min/dropzone.min.css" /> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
    {{-- <script src="https://unpkg.com/dropzone@5.9.3/dist/min/dropzone.min.js"></script> --}}
    <style>
        #waitOverlay {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 10001;
            cursor: pointer;
            display: none;
        }

        #waitOverlay .text {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #waitOverlay .text p {
            font-size: 20px;
            color: white;
            text-align: center;
        }

        #waitOverlay .text p i {
            font-size: 50px;
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('template_title')
    {{ __('Agregar') }} {{ __('imagenes') }}
@endsection

@section('content')
    <section>
        <div class="container mx-auto">
            <div class="hero my-4 ">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h2 class="text-6xl font-bold">{{ __('Gestiona las imágenes de tu anuncio.') }}</h2>
                        <p class="text-xl text-red-700">{{ __('Cada imagen tiene un orden...') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="waitOverlay">
        <div class="text">
            <p class="flex flex-col items-center mb-4">
                <svg width="25" viewBox="-2 -2 42 42" xmlns="http://www.w3.org/2000/svg" stroke="rgb(255, 255, 255)" class="w-8 h-8">
                    <g fill="none" stroke-width="4">
                        <circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
                        <path d="M36 18c0-9.94-8.06-18-18-18">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"/>
                        </path>
                    </g>
                </svg>
            </p>
            <p class="text-overlay">Cargando imágenes...</p>
        </div>
    </div>

    <section>
        <div class="container">
            <form action="{{ route('admin.guardar_imagen', $anuncio) }}" class="dropzone" id="file-dropzone"></form>

            <div class="grid grid-cols md:grid-cols-2 lg:grid-cols-5 gap-2 justify-center justify-items-center m-5 sortable files">
                @foreach ($imagenes_drop_zone as $imagen)
                    <div id="{{ $imagen['id'] }}" class="template">
                        <div class="dz-preview dz-file-preview w-40 h-40">
                            <img data-dz-thumbnail src="{{ $imagen['url'] }}" class="w-full h-full object-cover" />
                        </div>
                        <div class="text-center my-2">
                            <button type="button" class="bg-red-700 text-white px-4 py-1 rounded-lg delete hover:bg-black">Quitar</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="previews" class="grid grid-cols md:grid-cols-2 lg:grid-cols-5 gap-2 justify-center justify-items-center m-5">
                <div id="template" class="template">
                    <div class="dz-preview dz-file-preview w-40 h-40">
                        <img data-dz-thumbnail class="w-full h-full object-cover"/>
                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                        <div class="dz-error-message"><span data-dz-errormessage></span></div>
                    </div>
                    <div class="text-center my-2">
                        <button type="button" data-dz-remove class="bg-red-700 text-white px-4 py-1 rounded-lg delete hover:bg-black">Quitar</button>
                    </div>
                </div>
            </div>

            <div class="text-center my-10">
                <button id="submit" type="button" class="px-12 py-3 text-lg font-medium text-white bg-red-700 rounded hover:bg-green-500">
                    {{ __('Guardar cambios') }}
                </button>
            </div>
        </div>
    </section>
@endsection

@section('js')
    

    <script>
        const MAXIMO_TAMANIO_BYTES = 2000000;

        function reordenar_imagenes() {
            $('.sortable').sortable('refreshPositions');
            let sortedIDs = $(".sortable").sortable("toArray");

            $.ajax({
                type: "POST",
                url: "{{ route('imagenes_guardar_orden', $anuncio) }}",
                headers: { "X-CSRF-Token": "{{ csrf_token() }}" },
                data: { 'images': JSON.stringify(sortedIDs) },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                }
            });
        }

        Dropzone.autoDiscover = false;

        // Preparar template
        const previewNode = document.querySelector("#template");
        previewNode.id = "";
        const previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        Dropzone.options.fileDropzone = {
            headers: { "X-CSRF-Token": "{{ csrf_token() }}" },
            paramName: "image",
            previewsContainer: "#previews",
            previewTemplate: previewTemplate,
            parallelUploads: 10,
            maxFiles: {{ 10 - $anuncio->imagens()->count() }},
            maxFilesize: MAXIMO_TAMANIO_BYTES / 1024  // Dropzone usa MB
            acceptedFiles: ".jpg,.jpeg,.png",
            init: function () {
                const dz = this;

                dz.on("addedfile", function () {
                    $('#waitOverlay').fadeIn('fast');
                });

                dz.on("success", function (file, response) {
                    if (response.result) {
                        $(file.previewElement).attr("id", response.id);
                    } else {
                        $(file.previewElement).find('.dz-error-message').text(response.message);
                    }
                });

                dz.on("queuecomplete", function () {
                    $('#waitOverlay').fadeOut();
                });

                dz.on("removedfile", function (file) {
                    const image_id = file.previewElement?.id;
                    if (!image_id) return;

                    if (confirm("¿Estás seguro que deseas eliminar la imagen?")) {
                        $.post("{{ route('admin.eliminar_imagen') }}", {
                            image_id,
                            _token: "{{ csrf_token() }}"
                        }, function (data) {
                            if (data.result) {
                                $(file.previewElement).remove();
                                reordenar_imagenes();
                            }
                        });
                    }
                });
            }
        };

        $(function () {
            $(".sortable").sortable({
                cursor: "move",
                forcePlaceholderSize: true,
                containment: "parent",
                forceHelperSize: true,
                opacity: 0.5
            });

            $("#submit").on("click", function () {
                reordenar_imagenes();
                $('#waitOverlay .text-overlay').html('Guardando cambios...');
                $('#waitOverlay').fadeIn('fast');
                setTimeout(() => {
                    $('#waitOverlay .text-overlay').html('Los cambios han sido guardados.');
                    setTimeout(() => {
                        window.location.href = '{{ route('admin.users.edit_anuncio', $anuncio) }}';
                    }, 500);
                }, 1000);
            });

            // Eliminar imágenes ya cargadas (anteriores)
            $(document).on('click', '.delete', function () {
                const container = $(this).closest('.template');
                const image_id = container.attr('id');
                if (!image_id) return;

                if (confirm("¿Estás seguro que deseas eliminar la imagen?")) {
                    $.post("{{ route('admin.eliminar_imagen') }}", {
                        image_id,
                        _token: "{{ csrf_token() }}"
                    }, function (data) {
                        if (data.result) {
                            container.remove();
                            reordenar_imagenes();
                        }
                    });
                }
            });
        });
    </script>
@endsection
