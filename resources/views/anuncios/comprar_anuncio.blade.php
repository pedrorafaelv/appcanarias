<x-registro-layout>
    <section class="relative">
        <!-- Hero Section -->
        <div class="px-4 py-20 md:py-32 lg:py-48 bg-gradient-to-r from-violet-500 to-purple-600">
            <div class="max-w-7xl mx-auto text-center">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-4">
                    {{ __('Empieza a crear tu Anuncio') }}
                </h1>
                
                <p class="text-xl md:text-2xl text-pink-200 mb-8">
                    {{ __('Complete todos los pasos') }}
                </p>

                <div class="max-w-3xl mx-auto bg-white/10 backdrop-blur-sm rounded-lg p-6">
                    <p class="text-sm md:text-base text-white leading-relaxed">
                        La ley APROBADA del 'Sí es Sí' el 25/08/2022 entrará en vigor a los 30 días de su publicación en el
                        BOE, prohíbe la publicidad de prostitución y la promoción de esta, también la que denigre a la
                        mujer. Cumpliendo la ley, NO se pueden publicar perfiles nuevos con textos que ofrezcan servicios
                        sexuales por dinero o sin dinero, tampoco perfiles que desprendan carácter sexual en fotos.
                    </p>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="px-4 py-12 md:py-16 max-w-7xl mx-auto -mt-10 md:-mt-20 bg-white rounded-lg shadow-xl relative z-10">
            <form method="POST" action="{{ route('guardar_anuncio') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Presentación Card -->
                <div class="card bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 md:p-8">
                        <h2 class="text-2xl md:text-3xl font-bold text-pink-700 mb-4">
                            {{ __('Hola! Queremos saber acerca de ti..') }}
                        </h2>
                        <textarea name="presentacion" class="textarea textarea-bordered w-full h-32" placeholder="Escribe una pequeña reseña sobre ti"></textarea>
                        @error('presentacion')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Grid de dos columnas -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Nombre y Título -->
                    <div class="card bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-xl font-bold text-pink-700">
                                    {{ __('Nombre, Título y Tarifa') }}
                                </h2>
                                <span class="badge badge-pink">{{ __('Paso 1') }}</span>
                            </div>
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" placeholder="Nombre de anuncio"
                                        class="input input-bordered w-full @error('nombre') input-error @enderror"
                                        value="{{ old('nombre', $anuncio->nombre) }}" />
                                    @error('nombre')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                                    <input type="text" id="titulo" name="titulo" placeholder="Título de anuncio"
                                        class="input input-bordered w-full @error('titulo') input-error @enderror"
                                        value="{{ old('titulo', $anuncio->titulo) }}" />
                                    @error('titulo')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="tarifa" class="block text-sm font-medium text-gray-700 mb-1">Tarifa</label>
                                    <input type="text" id="tarifa" name="tarifa" placeholder="Tarifa"
                                        class="input input-bordered w-full @error('tarifa') input-error @enderror"
                                        value="{{ old('tarifa', $anuncio->tarifa) }}" />
                                    @error('tarifa')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="edad" class="block text-sm font-medium text-gray-700 mb-1">Edad</label>
                                    <input type="number" id="edad" name="edad" placeholder="Edad"
                                        class="input input-bordered w-full @error('edad') input-error @enderror"
                                        value="{{ old('edad', $anuncio->edad) }}" />
                                    @error('edad')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <input type="hidden" id="slug" name="slug" class="input input-bordered">
                                
                                <p class="text-sm text-gray-500">Ingrese el nombre, el título <strong>(Max 25 caract)</strong> de anuncio que será publicado</p>
                            </div>
                        </div>
                    </div>

                    <!-- Orientación -->
                    <div class="card bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-xl font-bold text-pink-700">
                                    {{ __('¿Tú eres?') }}
                                </h2>
                                <span class="badge badge-pink">{{ __('Paso 2') }}</span>
                            </div>
                            
                            <div class="space-y-3">
                                <div class="flex flex-wrap gap-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="orientacion" value="Heterosexual" 
                                            {{ old('orientacion', $anuncio->orientacion) == 'Heterosexual' ? 'checked' : '' }}
                                            onclick="yesnoCheck()"
                                            class="radio radio-pink">
                                        <span class="ml-2">Heterosexual</span>
                                    </label>
                                    
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="orientacion" value="Bisexual" 
                                            {{ old('orientacion', $anuncio->orientacion) == 'Bisexual' ? 'checked' : '' }}
                                            onclick="yesnoCheck()"
                                            class="radio radio-pink">
                                        <span class="ml-2">Bisexual</span>
                                    </label>
                                    
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="orientacion" value="Homosexual" 
                                            {{ old('orientacion', $anuncio->orientacion) == 'Homosexual' ? 'checked' : '' }}
                                            onclick="yesnoCheck()"
                                            class="radio radio-pink">
                                        <span class="ml-2">Homosexual</span>
                                    </label>
                                    
                                    <label class="inline-flex items-center">
                                        <input type="radio" id="otra" name="orientacion" value="Otra" 
                                            {{ old('orientacion', $anuncio->orientacion) == 'Otra' ? 'checked' : '' }}
                                            onclick="yesnoCheck()"
                                            class="radio radio-pink">
                                        <span class="ml-2">Otra</span>
                                    </label>
                                </div>
                                
                                <div id="orientacion_otra_container" class="{{ old('orientacion', $anuncio->orientacion) == 'Otra' ? '' : 'hidden' }}">
                                    <label for="orientacion_otra" class="block text-sm font-medium text-gray-700 mb-1">Especifica tu orientación</label>
                                    <input type="text" id="orientacion_otra" name="orientacion_otra" 
                                        placeholder="Acláranos tu orientación sexual"
                                        class="input input-bordered w-full"
                                        value="{{ old('orientacion_otra', $anuncio->orientacion_otra) }}">
                                </div>
                                
                                <p class="text-sm text-gray-500">Seleccione el género/identidad que será visible en el anuncio</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Componente Livewire -->
                @php
                    $muni = null;
                    if (!is_null($anuncio->zone_id)) {
                        $muni = $anuncio->zone->municipio_id;
                    }
                @endphp
                @livewire('planes-component', [
                    'selectedMuni' => $muni,
                    'selectedZone' => $anuncio->zone_id,
                    'selectedPlane' => $anuncio->plane_id,
                    'selectedCategoria' => $anuncio->categoria_id,
                    'precio' => $anuncio->precio,
                    'dias' => $anuncio->dias,
                    'tipo' => 'Normal',
                ])

                <!-- Gustos - Grid de 4 columnas en pantallas grandes -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Exterior -->
                    <div class="card bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-pink-700 mb-4">
                                {{ __('Exterior') }}
                                <span class="badge badge-pink float-right">Gustos</span>
                            </h2>
                            
                            <p class="text-sm text-gray-500 mb-3">Selecciona qué actividades te gustan</p>
                            
                            <div class="space-y-2">
                                @foreach ($tag_al as $tag)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                            class="checkbox checkbox-pink">
                                        <span class="ml-2">{{ $tag->nombre }}</span>
                                    </label>
                                    <br>
                                @endforeach
                            </div>
                            
                            @error('tags')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Interior -->
                    <div class="card bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-pink-700 mb-4">
                                {{ __('Interior') }}
                                <span class="badge badge-pink float-right">Gustos</span>
                            </h2>
                            
                            <p class="text-sm text-gray-500 mb-3">Selecciona qué actividades te gustan</p>
                            
                            <div class="space-y-2">
                                @foreach ($tag_in as $tag)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                            class="checkbox checkbox-pink">
                                        <span class="ml-2">{{ $tag->nombre }}</span>
                                    </label>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- En Casa -->
                    <div class="card bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-pink-700 mb-4">
                                {{ __('En Casa') }}
                                <span class="badge badge-pink float-right">Gustos</span>
                            </h2>
                            
                            <p class="text-sm text-gray-500 mb-3">Selecciona qué actividades te gustan</p>
                            
                            <div class="space-y-2">
                                @foreach ($tag_ec as $tag)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                            class="checkbox checkbox-pink">
                                        <span class="ml-2">{{ $tag->nombre }}</span>
                                    </label>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- En Tu Casa -->
                    <div class="card bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-pink-700 mb-4">
                                {{ __('En Tu Casa') }}
                                <span class="badge badge-pink float-right">Gustos</span>
                            </h2>
                            
                            <p class="text-sm text-gray-500 mb-3">Selecciona qué actividades te gustan</p>
                            
                            <div class="space-y-2">
                                @foreach ($tag_etc as $tag)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                            class="checkbox checkbox-pink">
                                        <span class="ml-2">{{ $tag->nombre }}</span>
                                    </label>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contacto - Grid de 2 columnas -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Mostrar Teléfono -->
                    <div class="card bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-pink-700 mb-4">
                                {{ __('Mostrar Teléfono') }}
                                <span class="badge badge-pink float-right">Contacto</span>
                            </h2>
                            
                            <div class="flex flex-wrap gap-4 mb-3">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="mostrar_telefono" value="No" 
                                        {{ old('mostrar_telefono', $anuncio->mostrar_telefono) == 'No' ? 'checked' : '' }}
                                        class="radio radio-pink">
                                    <span class="ml-2">No</span>
                                </label>
                                
                                <label class="inline-flex items-center">
                                    <input type="radio" name="mostrar_telefono" value="Si" 
                                        {{ old('mostrar_telefono', $anuncio->mostrar_telefono) == 'Si' ? 'checked' : '' }}
                                        class="radio radio-pink">
                                    <span class="ml-2">Sí</span>
                                </label>
                            </div>
                            
                            <p class="text-sm text-gray-500">¿Permites mostrar tu número de teléfono en el anuncio?</p>
                            
                            @error('mostrar_telefono')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div class="card bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-pink-700 mb-4">
                                {{ __('¿WhatsApp?') }}
                                <span class="badge badge-pink float-right">Contacto</span>
                            </h2>
                            
                            <div class="flex flex-wrap gap-4 mb-3">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="whatsapp" value="No" 
                                        {{ old('whatsapp', $anuncio->whatsapp) == 'No' ? 'checked' : '' }}
                                        class="radio radio-pink">
                                    <span class="ml-2">No</span>
                                </label>
                                
                                <label class="inline-flex items-center">
                                    <input type="radio" name="whatsapp" value="Si" 
                                        {{ old('whatsapp', $anuncio->whatsapp) == 'Si' ? 'checked' : '' }}
                                        class="radio radio-pink">
                                    <span class="ml-2">Sí</span>
                                </label>
                            </div>
                            
                            <p class="text-sm text-gray-500">¿Admites contactos por WhatsApp?</p>
                            
                            @error('whatsapp')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Botón de envío -->
                <div class="text-center">
                    <button type="submit"
                        class="px-8 py-3 text-lg font-medium text-white bg-pink-600 rounded-lg hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition-colors">
                        {{ __('Continuar y Pagar Anuncio') }}
                    </button>
                </div>
            </form>
        </div>
    </section>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
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
                document.getElementById('orientacion_otra_container').classList.toggle('hidden', !otraChecked);
            }




            
        </script>
    @endpush
</x-registro-layout>