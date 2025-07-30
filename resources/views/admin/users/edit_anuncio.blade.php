@extends('adminlte::page')

@section('title', __('Editar Anuncio'))

@section('content_header')
    <h1>{{ __('Editar Anuncio') }}</h1>
@stop

@section('content')
    <x-adminlte-card title="{{ $anuncio->nombre }}" theme="primary" icon="fas fa-ad">
        @if(session('success'))
            <x-adminlte-alert theme="success" dismissable>
                {{ session('success') }}
            </x-adminlte-alert>
        @endif

        <div class="row mb-4">
            <div class="col-md-4">
                <p class="mb-1"><strong>Usuario:</strong> #{{ $user->id }} - {{ $user->name }}</p>
                <p class="mb-1"><strong>Contacto:</strong> {{ $user->telefono }}</p>
                <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
            </div>
            <div class="col-md-4 text-right">
                <div class="btn-group">
                    <a href="{{ route('admin.anuncio.registrar_pago', $anuncio) }}" 
                       class="btn btn-success">
                        <i class="fas fa-money-bill-wave mr-1"></i> {{ __('Registrar Pago') }}
                    </a>
                    <a href="{{ route('admin.anuncios.index', $user) }}" 
                       class="btn btn-primary">
                        <i class="fas fa-arrow-left mr-1"></i> {{ __('Volver') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <x-adminlte-info-box title="Imágenes a Cargar" 
                    text="{{ $anuncio->imagenes_pendientes() }}" 
                    icon="fas fa-cloud-upload-alt" 
                    theme="info"/>
            </div>
            <div class="col-md-6">
                <x-adminlte-info-box title="Imágenes a Verificar" 
                    text="{{ $anuncio->cantidad_img_verificar() }}" 
                    icon="fas fa-check-circle" 
                    theme="warning"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                @include('admin.anuncio.partial.verificacion_partial')
            </div>

            <div class="col-md-4">
                <x-adminlte-card title="Portada" theme="purple" collapsible>
                    @if($anuncio->portada)
                        <a href="{{(config('app.url').'/images/anuncio/'.$anuncio->id.'/'.$anuncio->portada->nombre) }}" 
                           data-toggle="lightbox">
                            {{-- <img src="{{ Storage::url('anuncio/'.$anuncio->id.'/'.$anuncio->portada->nombre) }}"  --}}
                            <img src="{{config('app.url'). ('/images/anuncio/'.$anuncio->id.'/'.$anuncio->portada->nombre) }}" 
                                 class="img-fluid mb-2 rounded">
                        </a>
                        <p class="text-muted">Ubicación: {{ $anuncio->portada->position }}</p>
                    @endif
                </x-adminlte-card>
            </div>

            <div class="col-md-4">
                @if(!$anuncio->video)
                    @include('admin.anuncio.partial.subir_video_partial')
                @else
                    <x-adminlte-card title="Video" theme="teal">
                        <video controls class="w-100 rounded">
                            <source src="{{ config('app.url').('/videos/anuncios/'.$anuncio->id.'/'.$anuncio->video) }}" 
                                    type="video/mp4">
                        </video>
                        <p class="mt-2">Estado: {{ $anuncio->estado_video }}</p>
                        
                        <div class="btn-group mt-2">
                            @if($anuncio->estado_video != 'Verificado')
                                <a href="{{ route('admin.aceptar_video', $anuncio) }}" 
                                   class="btn btn-sm btn-success">
                                    <i class="fas fa-check mr-1"></i> Aprobar
                                </a>
                            @endif
                            <a href="{{ route('admin.rechazar_video', $anuncio) }}" 
                               class="btn btn-sm btn-danger">
                                <i class="fas fa-times mr-1"></i> Rechazar
                            </a>
                        </div>
                    </x-adminlte-card>
                @endif
            </div>
        </div>

        <hr class="my-4">

        <div class="bg-light p-4 rounded">
            @include('admin.anuncio.partial.create_images_partial')
        </div>

        <hr class="my-4">

        <form method="POST" action="{{ route('admin.users.update_anuncio', $anuncio) }}" 
              enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            
            @include('admin.users.form')

            <div class="d-flex justify-content-between mt-4">
                <div class="btn-group">
                    @if(in_array($anuncio->estado, ['Rechazado', 'A_Publicar', 'Borrador']))
                        <button type="button" class="btn btn-success"
                                onclick="window.location.href='{{ route('admin.anuncio.aprobar_anuncio', $anuncio) }}'">
                            <i class="fas fa-check mr-1"></i> Aprobar/Publicar
                        </button>
                    @endif
                    
                    <button type="button" class="btn btn-info"
                            onclick="window.location.href='{{ route('admin.anuncio.a_borrador', $anuncio) }}'">
                        <i class="fas fa-save mr-1"></i> Borrador
                    </button>
                    
                    <button type="button" class="btn btn-info"
                            onclick="window.location.href='{{ route('admin.anuncio.a_a_publicar', $anuncio) }}'">
                        <i class="fas fa-upload mr-1"></i> A Publicar
                    </button>
                </div>
                
                <div class="btn-group">
                    @if($anuncio->estado == 'Publicado' && $anuncio->dias_restantes() > 0)
                        <button type="button" class="btn btn-warning"
                                onclick="window.location.href='{{ route('admin.anuncio.pausar_anuncio', $anuncio) }}'">
                            <i class="fas fa-pause mr-1"></i> Pausar
                        </button>
                    @endif
                    
                    @if(in_array($anuncio->estado, ['Pausado', 'Suspendido']) && $anuncio->dias_restantes() > 0)
                        <button type="button" class="btn btn-success"
                                onclick="window.location.href='{{ route('admin.anuncio.reactivar_anuncio', $anuncio) }}'">
                            <i class="fas fa-play mr-1"></i> Reactivar
                        </button>
                    @endif
                    
                    <button type="button" class="btn btn-danger"
                            onclick="window.location.href='{{ route('admin.anuncio.rechazar_anuncio', $anuncio) }}'">
                        <i class="fas fa-ban mr-1"></i> Rechazar
                    </button>
                    
                    <button type="button" class="btn btn-warning"
                            onclick="window.location.href='{{ route('admin.anuncio.suspender_anuncio', $anuncio) }}'">
                        <i class="fas fa-exclamation-triangle mr-1"></i> Suspender
                    </button>
                    
                    <button type="button" class="btn btn-dark"
                            onclick="window.location.href='{{ route('admin.anuncio.finalizar_anuncio', $anuncio) }}'">
                        <i class="fas fa-stop mr-1"></i> Finalizar
                    </button>
                </div>
            </div>
        </form>
    </x-adminlte-card>

    <div class="row mt-4">
        <div class="col-md-6">
            @include('admin.anuncio.partial.notas')
        </div>
        <div class="col-md-6">
            @include('admin.anuncio.partial.pagos')
        </div>
    </div>
@stop

@section('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css">
    {{-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"> --}}
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5.9.3/dist/min/dropzone.min.css" />

    <style>
        .image-preview {
            max-height: 200px;
            object-fit: cover;
        }
        .action-buttons .btn {
            margin-right: 5px;
            margin-bottom: 5px;
        }
        </style>
@stop

@section('js')
@vite(['resources/js/app.js'])

<!-- DataTables y plugins -->
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

<script src="https://cdn.tailwindcss.com"></script>
<!-- Dropzone -->
    <script src="https://unpkg.com/dropzone@5.9.3/dist/min/dropzone.min.js"></script>

{{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script> --}}

    <script>
          Dropzone.autoDiscover = false;

        // Inicialización de DataTables
        document.addEventListener('DOMContentLoaded', function() {
            // Configuración común para ambas tablas
            const datatableConfig = {
                responsive: true,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.0.7/i18n/es-AR.json'
                },
                dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                     "<'row'<'col-sm-12'tr>>" +
                     "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    {
                        extend: 'colvis',
                        text: '<i class="fas fa-columns"></i> Columnas'
                    },
                    {
                        extend: 'collection',
                        text: '<i class="fas fa-download"></i> Exportar',
                        buttons: [
                            {
                                extend: 'pdfHtml5',
                                className: 'btn-sm',
                                exportOptions: { columns: ':visible' }
                            },
                            {
                                extend: 'excelHtml5',
                                className: 'btn-sm',
                                exportOptions: { columns: ':visible' }
                            },
                            {
                                extend: 'copy',
                                className: 'btn-sm',
                                exportOptions: { columns: ':visible' }
                            },
                            {
                                extend: 'csv',
                                className: 'btn-sm',
                                exportOptions: { columns: ':visible' }
                            },
                            {
                                extend: 'print',
                                className: 'btn-sm',
                                exportOptions: { columns: ':visible' }
                            }
                        ]
                    }
                ]
            };
            
            // Tabla de notas
            $('#notas').DataTable({
                ...datatableConfig,
                order: [[0, 'desc']]
            });
            
            // Tabla de pagos
            $('#pagos').DataTable({
                ...datatableConfig,
                order: [[0, 'desc']]
            });
            
            // Inicialización de CKEditor
            // ClassicEditor
            //     .create(document.querySelector('#presentacion_aux'))
            //     .catch(error => {
            //         console.error(error);
            //     });
            
            // ClassicEditor
            //     .create(document.querySelector('#horario'))
            //     .catch(error => {
            //         console.error(error);
            //     });
           
            // Configuración de Dropzone
            if (document.getElementById('file-dropzone')) {
                const dropzone = new Dropzone('#file-dropzone', {
                    url: "{{ route('admin.guardar_imagen', $anuncio) }}",
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}"
                    },
                    paramName: "image",
                    maxFilesize: 2, // MB
                    acceptedFiles: 'image/jpeg,image/png',
                    addRemoveLinks: true,
                    dictRemoveFile: "Eliminar",
                    maxFiles: {{ 14 - $anuncio->imagens()->count() }},
                    init: function() {
                        this.on('success', function(file, response) {
                            if (response.result) {
                                file.previewElement.dataset.id = response.id;
                            } else {
                                this.removeFile(file);
                                alert(response.message);
                            }
                        });
                        
                        this.on('removedfile', function(file) {
                            if (confirm("¿Estás seguro de eliminar esta imagen?")) {
                                const imageId = file.previewElement.dataset.id;
                                if (imageId) {
                                    fetch("{{ route('admin.eliminar_imagen') }}", {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-Token': "{{ csrf_token() }}"
                                        },
                                        body: JSON.stringify({ image_id: imageId })
                                    });
                                }
                            }
                        });
                    }
                });
            }
        });

    const initCKEditor = (selector) => {
        const el = document.querySelector(selector);
        if (!el || el.classList.contains('ck-editor__editable')) return;

        ClassicEditor
            .create(el)
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    // Si usas wire:model en el campo, actualiza el valor en Livewire
                    const event = new CustomEvent('ckeditor-update', {
                        detail: {
                            id: el.getAttribute('id'),
                            value: editor.getData()
                        }
                    });
                    window.dispatchEvent(event);
                });
            })
            .catch(error => {
                console.error(`Error inicializando CKEditor en ${selector}:`, error);
            });
    };

    document.addEventListener('DOMContentLoaded', () => {
        initCKEditor('#descripcion');
        initCKEditor('#presentacion_aux');
        initCKEditor('#horario');
    });

    // Livewire 3 hook: se dispara después de cualquier actualización del DOM
    document.addEventListener('livewire:init', () => {
        Livewire.hook('commit', ({ succeed }) => {
            succeed(() => {
                initCKEditor('#descripcion');
                initCKEditor('#presentacion_aux');
                initCKEditor('#horario');
            });
        });
    });

    // Comunicación CKEditor → Livewire (si usas wire:model en los campos)
    window.addEventListener('ckeditor-update', e => {
        const { id, value } = e.detail;
        const el = document.getElementById(id);
        if (el && el.__livewire_input_name) {
            Livewire.find(el.closest('[wire\\:id]').getAttribute('wire:id'))
                .set(el.__livewire_input_name, value);
        }
    }); 

    </script>
@stop