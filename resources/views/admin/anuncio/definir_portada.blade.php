@extends('adminlte::page')

@section('template_title')
    {{ $anuncio->name ?? 'Gest. Imágenes' }}
@endsection

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <!-- Card Header -->
            <div class="px-6 py-4 bg-gray-50 border-b flex flex-col md:flex-row justify-between items-start md:items-center">
                <div class="mb-3 md:mb-0">
                    <h1 class="text-xl font-semibold text-gray-800">Definir Imágen de Portada</h1>
                </div>
                <div>
                    <a href="{{ route('admin.anuncios.show', $anuncio) }}" 
                       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        {{ __('Back') }}
                    </a>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <p class="font-medium text-gray-700">Imagenes a Cargar: 
                            <span class="font-normal">{{ $anuncio->imagenes_pendientes() }}</span>
                        </p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-700">Imágenes a Verificar: 
                            <span class="font-normal">{{ $anuncio->cantidad_img_verificar() }}</span>
                        </p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-700">Usuario: 
                            <span class="font-normal">{{ $anuncio->user ? '('.$anuncio->user->id.') '.$anuncio->user->name : 'N/D' }}</span>
                        </p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-700">Nombre: 
                            <span class="font-normal">{{ $anuncio->nombre }}</span>
                        </p>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.anuncios.guardar_portada', $anuncio) }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($anuncio->imagenes_verificadas_ordenadas as $img)
                            @php
                                $portada = false;
                                if (!is_null($img) and !is_null($anuncio->portada_id)) {
                                    if ($img->id == $anuncio->portada_id) {
                                        $portada = true;
                                    }
                                }
                            @endphp

                            <div class="border rounded-lg overflow-hidden {{ $portada ? 'border-red-500' : 'border-gray-200' }}">
                                <div class="px-4 py-2 bg-gray-50 border-b flex justify-between items-center">
                                    <span class="font-medium">Imágen {{ $img->position }}</span>
                                    @if ($portada)
                                        <span class="text-sm text-red-600">Portada</span>
                                    @endif
                                </div>

                                <div class="p-4">
                                    <div class="mb-3">
                                        <a href="{{ '/images/anuncio/'.$anuncio->id.'/'.$img->nombre }}" 
                                           data-lightbox="gallery" 
                                           data-title="Imágen {{ $img->position }}">
                                            <img src="{{ '/images/anuncio/'.$anuncio->id.'/'.$img->nombre }}" 
                                                 class="w-full h-auto rounded">
                                        </a>
                                    </div>

                                    <div class="space-y-1 text-sm">
                                        <div class="flex items-center">
                                            <input type="radio" name="portada_id" 
                                                   value="{{ $img->id }}" 
                                                   {{ $portada ? 'checked' : '' }}
                                                   class="mr-2">
                                            <span class="font-medium">Portada:</span>
                                        </div>
                                        <p><span class="font-medium">Nombre:</span> {{ $img->nombre }}</p>
                                        <p><span class="font-medium">Ubicación:</span> {{ $img->position }}</p>
                                        <p><span class="font-medium">Portada Solicitada:</span> {{ $img->portada }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 text-center">
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endpush