 <!-- Incluir Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome para íconos -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}
    
    <style>
        /* Estilos personalizados adicionales */
        .form-container {
            max-width: 1200px;
            margin: 2rem auto;
        }
        .form-section {
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }
        .form-title {
            color: #1a365d;
            font-weight: 600;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .radio-group {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
    </style>
<div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100">
    <div class="space-y-8">
        <!-- Campos ocultos -->
        <input type="hidden" name="verificacion" value="Si">
        <input type="hidden" name="user_id" value="{{ $anuncio->user_id }}">

        <!-- Sección 1: Información básica -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Título *</label>
                    <input type="text" name="titulo" value="{{ old('titulo', $anuncio->titulo) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('titulo') border-red-500 @enderror"
                           placeholder="Título del anuncio">
                    @error('titulo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div >
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre *</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $anuncio->nombre) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('nombre') border-red-500 @enderror"
                           placeholder="Tu nombre profesional">
                    @error('nombre')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $anuncio->slug) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('slug') border-red-500 @enderror"
                           placeholder="URL amigable">
                    @error('slug')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Presentación actual</label>
                    <div class="prose max-w-none p-3 bg-gray-50 rounded-md">
                        {!! $anuncio->presentacion !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección 2: Presentación editable -->
        <div class="@if($anuncio->presentacion_aux != $anuncio->presentacion) border-l-4 border-red-500 pl-4 @endif">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Editar presentación 
                @if($anuncio->presentacion_aux != $anuncio->presentacion)
                    <span class="text-xs text-red-600">(Tienes cambios sin guardar)</span>
                @endif
            </label>
            <textarea name="presentacion_aux" rows="4" id= "presentacion_aux" data-input="presentacion_aux"
                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('presentacion_aux') border-red-500 @enderror"
                      placeholder="Describe tus servicios...">{{ old('presentacion_aux', $anuncio->presentacion_aux) }}</textarea>
            @error('presentacion_aux')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Sección 3: Horario -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Horario de atención</label>
            <textarea name="horario" rows="3" id= horario data-input="horario"
                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('horario') border-red-500 @enderror"
                      placeholder="Ej: Lunes a Viernes 9:00 - 18:00">{{ old('horario', $anuncio->horario) }}</textarea>
            @error('horario')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Sección 4: Tarifas -->
        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Tarifas (€)</h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-7 gap-3">
                @foreach([
                    'treinta_minutos' => '30 min',
                    'cuarenta_y_cinco_minutos' => '45 min', 
                    'una_hora' => '1 hora',
                    'medio_dia' => 'Medio día',
                    'todo_el_dia' => 'Día completo',
                    'fin_de_semana' => 'Fin de semana',
                    'hora_desplazamiento' => 'Hora despl.'
                ] as $field => $label)
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">{{ $label }}</label>
                        <input type="number" name="{{ $field }}" 
                               value="{{ old($field, $anuncio->$field) }}"
                               class="w-full px-2 py-1 text-sm border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-500 @error($field) border-red-500 @enderror">
                        @error($field)
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Sección 5: Información personal -->
        <div class="grid grid-cols-1 md:grid-ccols-2 gap-6">
            <!-- Orientación -->
            <div>
                <p class="text-sm font-medium text-gray-700 mb-2">Orientación</p>
                <div class="grid grid-cols-2 gap-2">
                    @foreach(['Heterosexual', 'Bisexual', 'Homosexual', 'Otra'] as $orientacion)
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="orientacion" value="{{ $orientacion }}" 
                                   @checked(old('orientacion', $anuncio->orientacion ?: 'Heterosexual') == $orientacion)
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <span class="text-sm text-gray-700">{{ $orientacion }}</span>
                        </label>
                    @endforeach
                </div>
                @error('orientacion')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contacto -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono *</label>
                    <input type="tel" name="telefono" value="{{ old('telefono', $anuncio->telefono) }}"
                           pattern="[0-9]{9}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('telefono') border-red-500 @enderror"
                           placeholder="612345678">
                    @error('telefono')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono publicación</label>
                    <input type="tel" name="telefono_publicacion" value="{{ old('telefono_publicacion', $anuncio->telefono_publicacion) }}"
                           pattern="[0-9]{9}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('telefono_publicacion') border-red-500 @enderror"
                           placeholder="Opcional">
                    @error('telefono_publicacion')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-700 mb-2">WhatsApp</p>
                    <div class="flex space-x-4">
                        @foreach(['Si' => 'Sí', 'No' => 'No'] as $value => $label)
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="whatsapp" value="{{ $value }}" 
                                       @checked(old('whatsapp', $anuncio->whatsapp ?: 'Si') == $value)
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                <span class="text-sm text-gray-700">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('whatsapp')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Sección 6: Tipo de anuncio -->
        <div>
            <p class="text-sm font-medium text-gray-700 mb-2">Tipo de anuncio</p>
            <div class="flex space-x-6">
                @foreach(['Normal' => 'Normal', 'Doble' => 'Doble'] as $value => $label)
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="tipo" value="{{ $value }}" 
                               @checked(old('tipo', $anuncio->tipo ?: 'Normal') == $value)
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                        <span class="text-sm text-gray-700">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
            @error('tipo')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Componente Livewire -->
        @livewire('statedropdowns', [
            'anuncio' => $anuncio->id,
            'selectedProvincia' => old('provincia_id', $anuncio->provincia_id),
            'selectedMuni' => old('municipio_id', $anuncio->municipio_id),
            'selectedClase' => old('clase_id', $anuncio->clase_id),
            'selectedPlane' => old('plane_id', $anuncio->plane_id),
            'selectedCategoria' => old('categoria_id', $anuncio->categoria_id),
            'precio' => old('precio', $anuncio->precio),
            'dias' => old('dias', $anuncio->dias),
            'localidad' => old('localidad', $anuncio->localidad),
        ])

        <!-- Sección 7: Información adicional -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Edad</label>
                <select name="edad" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('edad') border-red-500 @enderror">
                    @for($i = 18; $i <= 99; $i++)
                        <option value="{{ $i }}" @selected(old('edad', $anuncio->edad) == $i)>{{ $i }}</option>
                    @endfor
                </select>
                @error('edad')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nacionalidad</label>
                <select name="nacionalidad" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('nacionalidad') border-red-500 @enderror">
                    @foreach ($paises as $pais)
                        <option value="{{ $pais }}" @if (old('nacionalidad') == $pais or $pais == $anuncio->nacionalidad) Selected @endif>
                            {{ $pais }}</option>
                    @endforeach
                
                </select>
                @error('nacionalidad')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Profesión</label>
                <input type="text" name="profesion" value="{{ old('profesion', $anuncio->profesion) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('profesion') border-red-500 @enderror"
                       placeholder="Tu profesión">
                @error('profesion')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Sección 8: Fechas -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @foreach([
                'fecha_de_publicacion' => 'Publicación',
                'fecha_caducidad' => 'Caducidad',
                'fecha_pausa' => 'Pausa'
            ] as $field => $label)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha {{ $label }}</label>
                    <input type="date" name="{{ $field }}" 
                           value="{{ old($field, $anuncio->$field ? \Carbon\Carbon::parse($anuncio->$field)->format('Y-m-d') : $anuncio->$field) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error($field) border-red-500 @enderror">
                    @error($field)
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Días restantes</label>
                <div class="px-3 py-2 bg-gray-100 rounded-md text-center font-medium">
                    {{ $anuncio->dias_restantes() }}
                </div>
            </div>
        </div>

        <!-- Sección 9: Tags y características -->
        
    <div class="row g-3">
    <!-- Exterior -->
    <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
        <p class="fw-bold mb-2">Exterior</p>

        @foreach ($tag_al as $tag)
            <div class="form-check form-check-inline mb-2">
                <input class="form-check-input" type="checkbox" name="tags[]" 
                       id="tag_{{ $tag->id }}_al" value="{{ $tag->id }}"
                       @if(in_array($tag->id, $anuncioTags)) checked @endif>
                <label class="form-check-label small" for="tag_{{ $tag->id }}_al">
                    {{ $tag->nombre }}
                </label>
            </div>
        @endforeach

        @error('tag')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Interior -->
    <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
        <p class="fw-bold mb-2">Interior</p>

        @foreach ($tag_in as $tag)
            <div class="form-check form-check-inline mb-2">
                <input class="form-check-input" type="checkbox" name="tags[]" 
                       id="tag_{{ $tag->id }}_in" value="{{ $tag->id }}"
                       @if(in_array($tag->id, $anuncioTags)) checked @endif>
                <label class="form-check-label small" for="tag_{{ $tag->id }}_in">
                    {{ $tag->nombre }}
                </label>
            </div>
        @endforeach

        @error('tag')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- En Casa -->
    <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
        <p class="fw-bold mb-2">En Casa</p>

        @foreach ($tag_ec as $tag)
            <div class="form-check form-check-inline mb-2">
                <input class="form-check-input" type="checkbox" name="tags[]" 
                       id="tag_{{ $tag->id }}_ec" value="{{ $tag->id }}"
                       @if(in_array($tag->id, $anuncioTags)) checked @endif>
                <label class="form-check-label small" for="tag_{{ $tag->id }}_ec">
                    {{ $tag->nombre }}
                </label>
            </div>
        @endforeach

        @error('tag')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- En tu casa -->
    <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
        <p class="fw-bold mb-2">En tu casa</p>

        @foreach ($tag_etc as $tag)
            <div class="form-check form-check-inline mb-2">
                <input class="form-check-input" type="checkbox" name="tags[]" 
                       id="tag_{{ $tag->id }}_etc" value="{{ $tag->id }}"
                       @if(in_array($tag->id, $anuncioTags)) checked @endif>
                <label class="form-check-label small" for="tag_{{ $tag->id }}_etc">
                    {{ $tag->nombre }}
                </label>
            </div>
        @endforeach

        @error('tag')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
        

        <!-- Sección 10: Estados -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
                <p class="text-sm font-medium text-gray-700 mb-2">Estado de pago</p>
                <div class="flex space-x-4">
                    @foreach(['No' => 'No', 'Si' => 'Sí'] as $value => $label)
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="estado_pago" value="{{ $value }}" 
                                   @checked(old('estado_pago', $anuncio->estado_pago ?: 'No') == $value)
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <span class="text-sm text-gray-700">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                @error('estado_pago')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <p class="text-sm font-medium text-gray-700 mb-2">Estado del anuncio</p>
                <div class="grid grid-cols-2 gap-2">
                    @foreach([
                        'Borrador' => 'Borrador',
                        'A_Publicar' => 'A Publicar',
                        'Publicado' => 'Publicado',
                        'Pausado' => 'Pausado',
                        'Finalizado' => 'Finalizado',
                        'Suspendido' => 'Suspendido'
                    ] as $value => $label)
                        <label class="flex items-center space-x-2 opacity-50">
                            <input type="radio" name="estado" value="{{ $value }}" 
                                   @checked(old('estado', $anuncio->estado) == $value) disabled
                                   class="h-4 w-4 text-gray-500 border-gray-300">
                            <span class="text-sm text-gray-600">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sección 11: Redes sociales -->
        <div class="mt-6 pt-6 border-t border-gray-200">
            <p class="text-sm font-medium text-gray-700 mb-3">¿Autorizas mostrarte en redes sociales?</p>
            <div class="flex space-x-6">
                @foreach(['No' => 'No', 'Si' => 'Sí'] as $value => $label)
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="mostrar_en_redes" value="{{ $value }}" 
                               @checked(old('mostrar_en_redes', $anuncio->mostrar_en_redes ?: 'No') == $value)
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                        <span class="text-sm text-gray-700">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
            @error('mostrar_en_redes')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botón de submit -->
        <div class="mt-8 flex justify-end">
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium rounded-lg shadow-md hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                <i class="fas fa-save mr-2"></i> Guardar cambios
            </button>
        </div>
    </div>
</div>