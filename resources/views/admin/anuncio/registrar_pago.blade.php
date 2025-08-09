@extends('adminlte::page')

@section('title', $anuncio->name ?? 'Gestión de Imágenes')

@section('content')
    <div class="container-fluid px-0 px-sm-3 py-3">
        <div class="card card-outline card-primary shadow">
            <div class="card-header bg-gradient-primary">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <h3 class="card-title text-white mb-2 mb-md-0">Registrar Pago</h3>
                     <a href="{{ url()->previous() }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                    {{-- <a href="{{ route('admin.anuncios.show', $anuncio) }}" 
                       class="btn btn-light btn-sm text-primary font-weight-bold">
                        <i class="fas fa-arrow-left mr-1"></i> Volver
                    </a> --}}
                </div>
            </div>

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <div class="info-box bg-light">
                            <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Usuario</span>
                                <span class="info-box-number">
                                    {{ $anuncio->user ? '('.$anuncio->user->id.') '.$anuncio->user->name : 'N/D' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="info-box bg-light">
                            <span class="info-box-icon bg-success"><i class="fas fa-ad"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Anuncio</span>
                                <span class="info-box-number">{{ $anuncio->nombre }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.anuncios.store_pago', $anuncio) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $pago->user_id }}">
                    <input type="hidden" name="anuncio_id" value="{{ $pago->anuncio_id }}">

                    <div class="row">
                        <!-- Columna Izquierda -->
                        <div class="col-12 col-md-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Información de Pago</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="mail_pago">Email de Pago</label>
                                        <input type="text" name="mail_pago" id="mail_pago" 
                                               value="{{ $pago->mail_pago }}"
                                               class="form-control form-control-sm @error('mail_pago') is-invalid @enderror"
                                               placeholder="Email de pago">
                                        @error('mail_pago')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="moneda_precio">Moneda de Precio</label>
                                        <input type="text" name="moneda_precio" id="moneda_precio" 
                                               value="EUR"
                                               class="form-control form-control-sm @error('moneda_precio') is-invalid @enderror"
                                               placeholder="Moneda de precio">
                                        @error('moneda_precio')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        <input type="text" name="precio" id="precio" 
                                               value="{{ $pago->precio }}"
                                               class="form-control form-control-sm @error('precio') is-invalid @enderror"
                                               placeholder="Precio">
                                        @error('precio')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Columna Derecha -->
                        <div class="col-12 col-md-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Detalles de Transacción</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="moneda_pago">Moneda de Pago</label>
                                        <input type="text" name="moneda_pago" id="moneda_pago" 
                                               value="{{ $pago->moneda_pago }}"
                                               class="form-control form-control-sm @error('moneda_pago') is-invalid @enderror"
                                               placeholder="Moneda de pago">
                                        @error('moneda_pago')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="monto_pago">Monto de Pago</label>
                                        <input type="text" name="monto_pago" id="monto_pago" 
                                               value="{{ $pago->monto_pago }}"
                                               class="form-control form-control-sm @error('monto_pago') is-invalid @enderror"
                                               placeholder="Monto de pago">
                                        @error('monto_pago')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="medio_pago">Medio de Pago</label>
                                        <input type="text" name="medio_pago" id="medio_pago" 
                                               value="{{ $pago->medio_pago }}"
                                               class="form-control form-control-sm @error('medio_pago') is-invalid @enderror"
                                               placeholder="Medio de pago">
                                        @error('medio_pago')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Transacción</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="nro_transac">Número de Transacción</label>
                                                <input type="text" name="nro_transac" id="nro_transac" 
                                                       value="{{ $pago->nro_transac }}"
                                                       class="form-control form-control-sm @error('nro_transac') is-invalid @enderror"
                                                       placeholder="Número de transacción">
                                                @error('nro_transac')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="fecha_transac">Fecha de Transacción</label>
                                                <input type="date" name="fecha_transac" id="fecha_transac" 
                                                       value="{{ $pago->fecha_transac }}"
                                                       class="form-control form-control-sm @error('fecha_transac') is-invalid @enderror">
                                                @error('fecha_transac')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Estado del Pago</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline mr-3">
                                            <input type="radio" id="estadoAprobado" name="estado" value="Aprobado" 
                                                   {{ $anuncio->estado == '' || $anuncio->estado == 'Aprobado' ? 'checked' : '' }}>
                                            <label for="estadoAprobado">Aprobado</label>
                                        </div>
                                        <div class="icheck-danger d-inline">
                                            <input type="radio" id="estadoRechazado" name="estado" value="Rechazado" 
                                                   {{ $anuncio->estado == 'Rechazado' ? 'checked' : '' }}>
                                            <label for="estadoRechazado">Rechazado</label>
                                        </div>
                                        @error('estado')
                                            <span class="text-danger d-block mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-save mr-1"></i> Guardar Pago
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <!-- Estilos adicionales para mejorar la visualización en móviles -->
    <style>
        @media (max-width: 576px) {
            .card-header {
                padding: 0.75rem 1rem;
            }
            .card-title {
                font-size: 1.1rem;
            }
            .btn-lg {
                padding: 0.375rem 0.75rem;
                font-size: 0.9rem;
            }
            .info-box-content {
                padding: 5px;
            }
            .info-box-text, .info-box-number {
                font-size: 0.8rem;
            }
        }
    </style>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Inicializar iCheck para los radio buttons
            $('input[type="radio"]').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });

            // Manejo de la subida de video (si es necesario)
            $('#videoUpload').on('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const blobURL = URL.createObjectURL(file);
                    $('video').attr('src', blobURL);
                }
            });
        });

        // Función para limpiar la imagen de perfil
        function limpiar() {
            $('#uploadPreview').attr('src', "{{ asset('img/logo.png') }}");
            $('#btnrm').hide();
            $('#uploadImage').val('');
        }
    </script>
@endsection