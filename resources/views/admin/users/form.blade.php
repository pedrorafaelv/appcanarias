<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <div class="space-y-6">
        <input type="hidden" name="verificacion" value="Si">
        <input type="hidden" name="user_id" value="{{ $anuncio->user_id }}" 
               class="form-input @error('user_id') border-red-500 @enderror"
               placeholder="Usuario">
        @error('user_id')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 mb-2">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo', $anuncio->titulo) }}"
                       class="form-input w-full @error('titulo') border-red-500 @enderror"
                       placeholder="Título">
                @error('titulo')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $anuncio->nombre) }}"
                       class="form-input w-full @error('nombre') border-red-500 @enderror"
                       placeholder="Nombre">
                @error('nombre')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $anuncio->slug) }}"
                   class="form-input w-full @error('slug') border-red-500 @enderror"
                   placeholder="Slug">
            @error('slug')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Presentación que se Muestra en el Anuncio</label>
            <div class="prose max-w-none">
                {!! $anuncio->presentacion !!}
            </div>
        </div>

        <div class="@if($anuncio->presentacion_aux != $anuncio->presentacion) text-red-600 @endif">
            <label class="block text-gray-700 mb-2">
                Presentación 
                @if($anuncio->presentacion_aux != $anuncio->presentacion) 
                    <span class="text-sm">(Existen modificaciones)</span>
                @endif
            </label>
            <textarea name="presentacion_aux" 
                      class="form-textarea w-full @error('presentacion_aux') border-red-500 @enderror"
                      rows="4"
                      maxlength="20"
                      placeholder="Ingrese la presentación del anuncio.">{{ old('presentacion_aux', $anuncio->presentacion_aux) }}</textarea>
            @error('presentacion_aux')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Horario</label>
            <textarea name="horario" 
                      class="form-textarea w-full @error('horario') border-red-500 @enderror"
                      rows="4"
                      maxlength="20"
                      placeholder="Ingrese su horarios disponibles.">{{ old('horario', $anuncio->horario) }}</textarea>
            @error('horario')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="bg-gray-100 p-4 rounded-lg mb-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Tarifas €</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-4">
                <div>
                    <label class="block text-gray-700 mb-2">30 Min.</label>
                    <input type="number" name="treinta_minutos" value="{{ old('treinta_minutos', $anuncio->treinta_minutos) }}"
                           class="form-input w-full @error('treinta_minutos') border-red-500 @enderror"
                           placeholder="Precio">
                    @error('treinta_minutos')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">45 Min.</label>
                    <input type="number" name="cuarenta_y_cinco_minutos" value="{{ old('cuarenta_y_cinco_minutos', $anuncio->cuarenta_y_cinco_minutos) }}"
                           class="form-input w-full @error('cuarenta_y_cinco_minutos') border-red-500 @enderror"
                           placeholder="Precio">
                    @error('cuarenta_y_cinco_minutos')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">1 Hora</label>
                    <input type="number" name="una_hora" value="{{ old('una_hora', $anuncio->una_hora) }}"
                           class="form-input w-full @error('una_hora') border-red-500 @enderror"
                           placeholder="Precio">
                    @error('una_hora')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Medio día</label>
                    <input type="number" name="medio_dia" value="{{ old('medio_dia', $anuncio->medio_dia) }}"
                           class="form-input w-full @error('medio_dia') border-red-500 @enderror"
                           placeholder="Precio">
                    @error('medio_dia')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">El día</label>
                    <input type="number" name="todo_el_dia" value="{{ old('todo_el_dia', $anuncio->todo_el_dia) }}"
                           class="form-input w-full @error('todo_el_dia') border-red-500 @enderror"
                           placeholder="Precio">
                    @error('todo_el_dia')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Fin de sem.</label>
                    <input type="number" name="fin_de_semana" value="{{ old('fin_de_semana', $anuncio->fin_de_semana) }}"
                           class="form-input w-full @error('fin_de_semana') border-red-500 @enderror"
                           placeholder="Precio">
                    @error('fin_de_semana')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Hora Despl.</label>
                    <input type="number" name="hora_desplazamiento" value="{{ old('hora_desplazamiento', $anuncio->hora_desplazamiento) }}"
                           class="form-input w-full @error('hora_desplazamiento') border-red-500 @enderror"
                           placeholder="Precio">
                    @error('hora_desplazamiento')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="font-medium text-gray-700 mb-2">Orientación</p>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="radio" name="orientacion" value="Heterosexual" 
                               @checked(old('orientacion', $anuncio->orientacion ?: 'Heterosexual') == 'Heterosexual')
                               class="mr-2">
                        Heterosexual
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="orientacion" value="Bisexual" 
                               @checked(old('orientacion', $anuncio->orientacion) == 'Bisexual')
                               class="mr-2">
                        Bisexual
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="orientacion" value="Homosexual" 
                               @checked(old('orientacion', $anuncio->orientacion) == 'Homosexual')
                               class="mr-2">
                        Homosexual
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="orientacion" value="Otra" 
                               @checked(old('orientacion', $anuncio->orientacion) == 'Otra')
                               class="mr-2">
                        Otra
                    </label>
                </div>
                @error('orientacion')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-gray-700 mb-2">Teléfono</label>
                    <input type="text" name="telefono" value="{{ old('telefono', $anuncio->telefono) }}"
                           required minlength="9" maxlength="9"
                           class="form-input w-full @error('telefono') border-red-500 @enderror"
                           placeholder="Teléfono">
                    @error('telefono')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Teléfono Publicación</label>
                    <input type="text" name="telefono_publicacion" value="{{ old('telefono_publicacion', $anuncio->telefono_publicacion) }}"
                           maxlength="9"
                           class="form-input w-full @error('telefono_publicacion') border-red-500 @enderror"
                           placeholder="Teléfono Publicación">
                    @error('telefono_publicacion')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <p class="font-medium text-gray-700 mb-2">Whatsapp</p>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="radio" name="whatsapp" value="No" 
                                   @checked(old('whatsapp', $anuncio->whatsapp ?: 'Si') == 'No')
                                   class="mr-2">
                            No
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="whatsapp" value="Si" 
                                   @checked(old('whatsapp', $anuncio->whatsapp ?: 'Si') == 'Si')
                                   class="mr-2">
                            Si
                        </label>
                    </div>
                    @error('whatsapp')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div>
            <p class="font-medium text-gray-700 mb-2">Tipo</p>
            <div class="flex space-x-4">
                <label class="flex items-center">
                    <input type="radio" name="tipo" value="Normal" 
                           @checked(old('tipo', $anuncio->tipo ?: 'Normal') == 'Normal')
                           class="mr-2">
                    Normal
                </label>
                <label class="flex items-center">
                    <input type="radio" name="tipo" value="Doble" 
                           @checked(old('tipo', $anuncio->tipo) == 'Doble')
                           class="mr-2">
                    Doble
                </label>
            </div>
            @error('tipo')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        @livewire('statedropdowns', [
            'selectedMuni' => old('municipio_id', $anuncio->municipio_id),
            'selectedClase' => old('clase_id', $anuncio->clase_id),
            'selectedPlane' => old('plane_id', $anuncio->plane_id),
            'selectedCategoria' => old('categoria_id', $anuncio->categoria_id),
            'precio' => old('precio', $anuncio->precio),
            'dias' => old('dias', $anuncio->dias),
            'localidad' => old('localidad', $anuncio->localidad),
        ])

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-gray-700 mb-2">Edad</label>
                <select name="edad" class="form-select w-full @error('edad') border-red-500 @enderror">
                    @for($i = 18; $i <= 99; $i++)
                        <option value="{{ $i }}" @selected(old('edad', $anuncio->edad) == $i)>{{ $i }}</option>
                    @endfor
                </select>
                @error('edad')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Nacionalidad</label>
                <select name="nacionalidad" class="form-select w-full @error('nacionalidad') border-red-500 @enderror">    
                    {{-- {{$user}}             --}}
                    {{-- @foreach($user->paises as $pais)
                        <option value="{{ $pais }}" @selected(old('nacionalidad', $anuncio->nacionalidad) == $pais)>{{ $pais }}</option>
                    @endforeach --}}
                </select>
                @error('nacionalidad')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Profesión</label>
                <input type="text" name="profesion" value="{{ old('profesion', $anuncio->profesion) }}"
                       class="form-input w-full @error('profesion') border-red-500 @enderror"
                       placeholder="Profesión">
                @error('profesion')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div>
                <label class="block text-gray-700 mb-2">Fecha de Publicación</label>
                <input type="date" name="fecha_de_publicacion" 
                       value="{{ old('fecha_de_publicacion', $anuncio->fecha_de_publicacion ? \Carbon\Carbon::parse($anuncio->fecha_de_publicacion)->format('Y-m-d') : $anuncio->fecha_de_publicacion) }}"
                       class="form-input w-full @error('fecha_de_publicacion') border-red-500 @enderror">
                @error('fecha_de_publicacion')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Fecha de Caducidad</label>
                <input type="date" name="fecha_caducidad" 
                       value="{{ old('fecha_caducidad', $anuncio->fecha_caducidad ? \Carbon\Carbon::parse($anuncio->fecha_caducidad)->format('Y-m-d') : $anuncio->fecha_caducidad) }}"
                       class="form-input w-full @error('fecha_caducidad') border-red-500 @enderror">
                @error('fecha_caducidad')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Fecha de Pausa</label>
                <input type="date" name="fecha_pausa" 
                       value="{{ old('fecha_pausa', $anuncio->fecha_pausa ? \Carbon\Carbon::parse($anuncio->fecha_pausa)->format('Y-m-d') : $anuncio->fecha_pausa) }}"
                       class="form-input w-full @error('fecha_pausa') border-red-500 @enderror">
                @error('fecha_pausa')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Días Restantes</label>
                <div class="p-2 bg-gray-100 rounded">
                    {{ $anuncio->dias_restantes() }}
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-gray-700 mb-2">GPS</label>
                <input type="text" name="gps" value="{{ old('gps', $anuncio->gps) }}"
                       class="form-input w-full @error('gps') border-red-500 @enderror"
                       placeholder="GPS">
                @error('gps')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 mb-2">IP Address</label>
                <input type="text" name="ip_address" value="{{ old('ip_address', $anuncio->ip_address) }}"
                       class="form-input w-full @error('ip_address') border-red-500 @enderror"
                       placeholder="IP Address">
                @error('ip_address')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Port</label>
                <input type="text" name="port" value="{{ old('port', $anuncio->port) }}"
                       class="form-input w-full @error('port') border-red-500 @enderror"
                       placeholder="Port">
                @error('port')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-6 gap-6">
            <div>
                <p class="font-medium text-gray-700 mb-2">Exterior</p>
                <div class="space-y-1">
                    @foreach($tag_al as $tag)
                        <label class="flex items-center">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                   @checked(in_array($tag->id, old('tags', [])))
                                   class="mr-2">
                            <span class="text-sm">{{ $tag->nombre }}</span>
                        </label>
                    @endforeach
                </div>
                @error('tags')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <p class="font-medium text-gray-700 mb-2">Interior</p>
                <div class="space-y-1">
                    @foreach($tag_in as $tag)
                        <label class="flex items-center">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                   @checked(in_array($tag->id, old('tags', [])))
                                   class="mr-2">
                            <span class="text-sm">{{ $tag->nombre }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <p class="font-medium text-gray-700 mb-2">En Casa</p>
                <div class="space-y-1">
                    @foreach($tag_ec as $tag)
                        <label class="flex items-center">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                   @checked(in_array($tag->id, old('tags', [])))
                                   class="mr-2">
                            <span class="text-sm">{{ $tag->nombre }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <p class="font-medium text-gray-700 mb-2">En tu casa</p>
                <div class="space-y-1">
                    @foreach($tag_etc as $tag)
                        <label class="flex items-center">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                   @checked(in_array($tag->id, old('tags', [])))
                                   class="mr-2">
                            <span class="text-sm">{{ $tag->nombre }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <p class="font-medium text-gray-700 mb-2">Estado Pago</p>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="radio" name="estado_pago" value="No" 
                               @checked(old('estado_pago', $anuncio->estado_pago ?: 'No') == 'No')
                               class="mr-2">
                        No
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="estado_pago" value="Si" 
                               @checked(old('estado_pago', $anuncio->estado_pago) == 'Si')
                               class="mr-2">
                        Si
                    </label>
                </div>
                @error('estado_pago')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <p class="font-medium text-gray-700 mb-2">Estado</p>
                <div class="space-y-2">
                    <label class="flex items-center text-gray-500">
                        <input type="radio" name="estado" value="Borrador" 
                               @checked(old('estado', $anuncio->estado ?: 'Borrador') == 'Borrador')
                               disabled class="mr-2">
                        Borrador
                    </label>
                    <label class="flex items-center text-gray-500">
                        <input type="radio" name="estado" value="A_Publicar" 
                               @checked(old('estado', $anuncio->estado) == 'A_Publicar')
                               disabled class="mr-2">
                        A Publicar
                    </label>
                    <label class="flex items-center text-gray-500">
                        <input type="radio" name="estado" value="Publicado" 
                               @checked(old('estado', $anuncio->estado) == 'Publicado')
                               disabled class="mr-2">
                        Publicado
                    </label>
                    <label class="flex items-center text-gray-500">
                        <input type="radio" name="estado" value="Pausado" 
                               @checked(old('estado', $anuncio->estado) == 'Pausado')
                               disabled class="mr-2">
                        Pausado
                    </label>
                    <label class="flex items-center text-gray-500">
                        <input type="radio" name="estado" value="Finalizado" 
                               @checked(old('estado', $anuncio->estado) == 'Finalizado')
                               disabled class="mr-2">
                        Finalizado
                    </label>
                    <label class="flex items-center text-gray-500">
                        <input type="radio" name="estado" value="Suspendido" 
                               @checked(old('estado', $anuncio->estado) == 'Suspendido')
                               disabled class="mr-2">
                        Suspendido
                    </label>
                </div>
                @error('estado')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <p class="text-sm font-medium text-gray-700 mb-2">¿Autorizas mostrarte en las redes?</p>
            <div class="flex space-x-4">
                <label class="flex items-center">
                    <input type="radio" name="mostrar_en_redes" value="No" 
                           @checked(old('mostrar_en_redes', $anuncio->mostrar_en_redes ?: 'No') == 'No')
                           class="mr-2">
                    No
                </label>
                <label class="flex items-center">
                    <input type="radio" name="mostrar_en_redes" value="Si" 
                           @checked(old('mostrar_en_redes', $anuncio->mostrar_en_redes) == 'Si')
                           class="mr-2">
                    Si
                </label>
            </div>
            @error('mostrar_en_redes')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-8">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                {{ __('Guardar Anuncio') }}
            </button>
        </div>
    </div>
</div>