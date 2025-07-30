<x-registro-layout>
    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
                <!-- Sidebar -->
                <div class="md:col-span-1">
                    <div class="space-y-4">
                        <h2 class="text-pink-700 font-bold text-xl">
                            {{ __('Categoría de Anuncio seleccionada') }}
                        </h2>
                        <span class="badge badge-secondary text-lg">{{ $anuncio->categoria->nombre }}</span>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="md:col-span-3">
                    <form action="{{ route('guarda_actualizacion_inicio', $anuncio) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="bg-white shadow rounded-lg overflow-hidden">
                            <div class="p-6 space-y-6">
                                <!-- Presentación -->
                                <div>
                                    <h1 class="text-pink-700 font-extrabold text-2xl md:text-3xl mb-4">
                                        {{ __('¡Hola! Queremos saber acerca de ti...') }}
                                    </h1>
                                    
                                    <div class="form-control">
                                        <label for="presentacion" class="label">
                                            <span class="label-text">{{ __('Presentación') }}</span>
                                        </label>
                                        <textarea id="presentacion" name="presentacion" class="textarea textarea-secondary w-full h-32" 
                                            placeholder="Escribe una pequeña reseña sobre ti">{{ old('presentacion', $anuncio->presentacion) }}</textarea>
                                        @error('presentacion')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Datos Generales -->
                                <div class="space-y-4">
                                    <h2 class="text-pink-700 font-bold text-xl flex items-center gap-2">
                                        {{ __('Datos Generales') }}
                                        <span class="badge badge-secondary">Anuncio</span>
                                    </h2>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                                        <div class="form-control">
                                            <input type="text" id="nombre" name="nombre" placeholder="Nombre a publicar"
                                                class="input input-bordered w-full"
                                                value="{{ old('nombre', $anuncio->nombre) }}" />
                                            @error('nombre')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-control sm:col-span-2">
                                            <input type="text" id="titulo" name="titulo" placeholder="Título del Anuncio"
                                                class="input input-bordered w-full"
                                                value="{{ old('titulo', $anuncio->titulo) }}" />
                                            @error('titulo')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-control">
                                            <input type="text" id="tarifa" name="tarifa" placeholder="Tarifa"
                                                class="input input-bordered w-full"
                                                value="{{ old('tarifa', $anuncio->tarifa) }}" />
                                            @error('tarifa')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-control">
                                            <input type="number" id="edad" name="edad" placeholder="Edad"
                                                class="input input-bordered w-full"
                                                value="{{ old('edad', $anuncio->edad) }}" />
                                            @error('edad')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="hidden" id="slug" name="slug">
                                </div>

                                <hr class="border-gray-200">

                                <!-- Contacto -->
                                <div class="space-y-4">
                                    <h2 class="text-pink-700 font-bold text-xl flex items-center gap-2">
                                        {{ __('Mostrar Teléfono') }}
                                        <span class="badge badge-secondary">Contacto</span>
                                    </h2>

                                    <div class="space-y-3">
                                        <p class="text-gray-600">¿Permites mostrar tu número de teléfono en el anuncio?</p>
                                        
                                        <div class="flex flex-wrap gap-4">
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="radio" name="mostrar_telefono" value="No" 
                                                    class="radio radio-secondary" 
                                                    {{ $anuncio->mostrar_telefono == '' || $anuncio->mostrar_telefono == 'No' ? 'checked' : '' }}>
                                                <span>No</span>
                                            </label>
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="radio" name="mostrar_telefono" value="Si" 
                                                    class="radio radio-secondary"
                                                    {{ $anuncio->mostrar_telefono == 'Si' ? 'checked' : '' }}>
                                                <span>Sí</span>
                                            </label>
                                        </div>
                                        @error('mostrar_telefono')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror

                                        <div class="form-control">
                                            <input type="text" id="telefono_publicacion" name="telefono_publicacion" 
                                                placeholder="Teléfono a publicar (Max 9 caracteres)"
                                                class="input input-bordered w-full max-w-xs"
                                                value="{{ old('telefono_publicacion', $anuncio->telefono_publicacion) }}">
                                            @error('telefono_publicacion')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                            <p class="text-sm text-gray-500 mt-1">Indica el teléfono a publicar <strong>Max 9 caracteres</strong></p>
                                        </div>

                                        <p class="text-gray-600">¿Admites contactos por WhatsApp?</p>
                                        <div class="flex flex-wrap gap-4">
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="radio" name="whatsapp" value="No" 
                                                    class="radio radio-secondary"
                                                    {{ $anuncio->whatsapp == '' || $anuncio->whatsapp == 'No' ? 'checked' : '' }}>
                                                <span>No</span>
                                            </label>
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="radio" name="whatsapp" value="Si" 
                                                    class="radio radio-secondary"
                                                    {{ $anuncio->whatsapp == 'Si' ? 'checked' : '' }}>
                                                <span>Sí</span>
                                            </label>
                                        </div>
                                        @error('whatsapp')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="border-gray-200">

                                <!-- Género/Identidad -->
                                <div class="space-y-4">
                                    <h2 class="text-pink-700 font-bold text-xl flex items-center gap-2">
                                        {{ __('¿Tú eres?') }}
                                        <span class="badge badge-secondary">Género/Identidad</span>
                                    </h2>

                                    <div class="flex flex-wrap gap-4">
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="orientacion" value="Heterosexual" 
                                                class="radio radio-secondary" onclick="yesnoCheck()"
                                                {{ $anuncio->orientacion == '' || $anuncio->orientacion == 'Heterosexual' ? 'checked' : '' }}>
                                            <span>Heterosexual</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="orientacion" value="Bisexual" 
                                                class="radio radio-secondary" onclick="yesnoCheck()"
                                                {{ $anuncio->orientacion == 'Bisexual' ? 'checked' : '' }}>
                                            <span>Bisexual</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="orientacion" value="Homosexual" 
                                                class="radio radio-secondary" onclick="yesnoCheck()"
                                                {{ $anuncio->orientacion == 'Homosexual' ? 'checked' : '' }}>
                                            <span>Homosexual</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" id="otra" name="orientacion" value="Otra" 
                                                class="radio radio-secondary" onclick="yesnoCheck()"
                                                {{ $anuncio->orientacion == 'Otra' ? 'checked' : '' }}>
                                            <span>Otra</span>
                                        </label>
                                    </div>

                                    <div id="orientacion_otra_container" class="hidden">
                                        <input type="text" id="orientacion_otra" name="orientacion_otra" 
                                            placeholder="Acláranos tu orientación sexual"
                                            class="input input-bordered w-full max-w-md">
                                    </div>

                                    <p class="text-gray-600">Seleccione el género/identidad que será visible en el anuncio</p>
                                </div>

                                <hr class="border-gray-200">

                                <!-- Gustos y Actividades -->
                                <div class="space-y-4">
                                    <h2 class="text-pink-700 font-bold text-xl flex items-center gap-2">
                                        {{ __('Al aire libre, en tu casa o en la mía...') }}
                                        <span class="badge badge-secondary">Gustos y Actividades</span>
                                    </h2>

                                    <p class="text-gray-600">Selecciona qué actividades te gustan</p>

                                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                                        @foreach ($tag_etc as $tag)
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                                    class="checkbox checkbox-secondary">
                                                <span>{{ $tag->nombre }}</span>
                                            </label>
                                        @endforeach

                                        @foreach ($tag_ec as $tag)
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                                    class="checkbox checkbox-secondary">
                                                <span>{{ $tag->nombre }}</span>
                                            </label>
                                        @endforeach

                                        @foreach ($tag_al as $tag)
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                                    class="checkbox checkbox-secondary">
                                                <span>{{ $tag->nombre }}</span>
                                            </label>
                                        @endforeach

                                        @foreach ($tag_in as $tag)
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                                    class="checkbox checkbox-secondary">
                                                <span>{{ $tag->nombre }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    @error('tags')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <hr class="border-gray-200">

                                <!-- Ubicación -->
                                <div class="space-y-4">
                                    <h2 class="text-pink-700 font-bold text-xl flex items-center gap-2">
                                        {{ __('Ubicación') }}
                                        <span class="badge badge-secondary">Lugar</span>
                                    </h2>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <p class="font-medium">Provincia: {{ $anuncio->provincia->nombre }}</p>
                                            <p class="font-medium">Municipio: {{ $anuncio->municipio->nombre }}</p>
                                        </div>

                                        <div class="form-control">
                                            <input type="text" id="localidad" name="localidad" placeholder="Localidad o Zona"
                                                class="input input-bordered w-full"
                                                value="{{ old('localidad', $anuncio->localidad) }}">
                                            @error('localidad')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr class="border-gray-200">

                                <!-- Plan -->
                                <div class="space-y-4">
                                    <div class="stats stats-vertical w-full lg:stats-horizontal shadow">
                                        <div class="stat place-items-center">
                                            <div class="stat-title">Plan</div>
                                            <div class="stat-value text-lg">{{ $anuncio->plane->nombre }}</div>
                                            <div class="stat-desc">{{ $anuncio->clase->nombre }}</div>
                                        </div>
                                        
                                        <div class="stat place-items-center">
                                            <div class="stat-title">Precio</div>
                                            <div class="stat-value text-secondary text-lg">{{ $anuncio->precio }}€</div>
                                        </div>
                                        
                                        <div class="stat place-items-center">
                                            <div class="stat-title">Días</div>
                                            <div class="stat-value text-lg">{{ $anuncio->dias }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botones -->
                            <div class="bg-gray-50 px-6 py-4 flex flex-wrap justify-end gap-4">
                                <a href="{{ route('dashboard') }}" class="btn btn-outline">
                                    {{ __('Cancelar') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-registro-layout>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        function yesnoCheck() {
            const otraChecked = document.getElementById('otra').checked;
            const container = document.getElementById('orientacion_otra_container');
            
            if (otraChecked) {
                container.classList.remove('hidden');
            } else {
                container.classList.add('hidden');
            }
        }

        // Ejecutar al cargar para ver el estado inicial
        document.addEventListener('DOMContentLoaded', yesnoCheck);
    </script>
@endpush