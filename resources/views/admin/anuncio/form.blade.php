<div class="card shadow-sm mb-4">
    <div class="card-body">

        <!-- Campo user_id -->
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <input type="text" name="user_id" id="user_id" 
                   class="form-control @error('user_id') is-invalid @enderror" 
                   placeholder="Usuario" 
                   value="{{ old('user_id', $anuncio->user_id ?? '') }}">
            @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo nombre -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" 
                   class="form-control @error('nombre') is-invalid @enderror" 
                   placeholder="Nombre" 
                   value="{{ old('nombre', $anuncio->nombre ?? '') }}">
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo título -->
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" 
                   class="form-control @error('titulo') is-invalid @enderror" 
                   placeholder="Título" 
                   value="{{ old('titulo', $anuncio->titulo ?? '') }}">
            @error('titulo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo Slug -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" 
                   class="form-control @error('slug') is-invalid @enderror" 
                   placeholder="Slug" 
                   value="{{ old('slug', $anuncio->slug ?? '') }}">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo presentación -->
        <div class="mb-3">
            <label for="presentacion" class="form-label">Descripción corta</label>
            <textarea name="presentacion" id="presentacion" 
                      class="form-control @error('presentacion') is-invalid @enderror" 
                      placeholder="Ingrese una Descripción corta del Producto">{{ old('presentacion', $anuncio->presentacion ?? '') }}</textarea>
            @error('presentacion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Radio buttons para Tipo -->
        <div class="mb-3">
            <label class="form-label fw-bold">Tipo</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo" id="tipo_normal" 
                       value="Normal" @checked(old('tipo', $anuncio->tipo ?? '') === 'Normal')>
                <label class="form-check-label" for="tipo_normal">Normal</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo" id="tipo_doble" 
                       value="Doble" @checked(old('tipo', $anuncio->tipo ?? '') === 'Doble')>
                <label class="form-check-label" for="tipo_doble">Doble</label>
            </div>
            @error('tipo')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Radio buttons para Orientación -->
        <div class="mb-3">
            <label class="form-label fw-bold">Orientación</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="orientacion" id="orientacion_hetero" 
                       value="Heterosexual" @checked(old('orientacion', $anuncio->orientacion ?? '') === 'Heterosexual')>
                <label class="form-check-label" for="orientacion_hetero">Heterosexual</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="orientacion" id="orientacion_bi" 
                       value="Bisexual" @checked(old('orientacion', $anuncio->orientacion ?? '') === 'Bisexual')>
                <label class="form-check-label" for="orientacion_bi">Bisexual</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="orientacion" id="orientacion_otra" 
                       value="Otra" @checked(old('orientacion', $anuncio->orientacion ?? '') === 'Otra')>
                <label class="form-check-label" for="orientacion_otra">Otra</label>
            </div>
            @error('orientacion')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo teléfono -->
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" 
                   class="form-control @error('telefono') is-invalid @enderror" 
                   placeholder="Teléfono" 
                   value="{{ old('telefono', $anuncio->telefono ?? '') }}">
            @error('telefono')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Radio buttons para Mostrar Teléfono -->
        <div class="mb-3">
            <label class="form-label fw-bold">Mostrar Teléfono</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="mostrar_telefono" id="mostrar_telefono_no" 
                       value="No" @checked(old('mostrar_telefono', $anuncio->mostrar_telefono ?? '') === 'No')>
                <label class="form-check-label" for="mostrar_telefono_no">No</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="mostrar_telefono" id="mostrar_telefono_si" 
                       value="Si" @checked(old('mostrar_telefono', $anuncio->mostrar_telefono ?? '') === 'Si')>
                <label class="form-check-label" for="mostrar_telefono_si">Sí</label>
            </div>
            @error('mostrar_telefono')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo whatsapp -->
        <div class="mb-3">
            <label for="whatsapp" class="form-label">WhatsApp</label>
            <input type="text" name="whatsapp" id="whatsapp" 
                   class="form-control @error('whatsapp') is-invalid @enderror" 
                   placeholder="WhatsApp" 
                   value="{{ old('whatsapp', $anuncio->whatsapp ?? '') }}">
            @error('whatsapp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Select para clase_id -->
        <div class="mb-3">
            <label for="clase_id" class="form-label">Clase</label>
            <select name="clase_id" id="clase_id" 
                    class="form-select @error('clase_id') is-invalid @enderror">
                @foreach($clases as $id => $nombre)
                    <option value="{{ $id }}" @selected(old('clase_id', $anuncio->clase_id ?? '') == $id)>
                        {{ $nombre }}
                    </option>
                @endforeach
            </select>
            @error('clase_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Componente Livewire -->
        @livewire('statedropdowns', [
            'selectedState' => $anuncio->state ?? null,
            'selectedZone' => $anuncio->zone ?? null,
            'selectedPlane' => $anuncio->plane ?? null,
            'selectedCategoria' => $anuncio->categoria_id ?? null
        ])

        <!-- Campo localidad -->
        <div class="mb-3">
            <label for="localidad" class="form-label">Localidad</label>
            <input type="text" name="localidad" id="localidad" 
                   class="form-control @error('localidad') is-invalid @enderror" 
                   placeholder="Localidad" 
                   value="{{ old('localidad', $anuncio->localidad ?? '') }}">
            @error('localidad')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo fecha_nacimiento -->
        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" 
                   class="form-control @error('fecha_nacimiento') is-invalid @enderror" 
                   value="{{ old('fecha_nacimiento', $anuncio->fecha_nacimiento ?? '') }}">
            @error('fecha_nacimiento')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo edad -->
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" id="edad" 
                   class="form-control @error('edad') is-invalid @enderror" 
                   placeholder="Edad" 
                   value="{{ old('edad', $anuncio->edad ?? '') }}">
            @error('edad')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Select para nacionalidad -->
        <div class="mb-3">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <select name="nacionalidad" id="nacionalidad" 
                    class="form-select @error('nacionalidad') is-invalid @enderror">
                @foreach($anuncio->user->paises ?? [] as $codigo => $pais)
                    <option value="{{ $codigo }}" @selected(old('nacionalidad', $anuncio->nacionalidad ?? '') == $codigo)>
                        {{ $pais }}
                    </option>
                @endforeach
            </select>
            @error('nacionalidad')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo profesión -->
        <div class="mb-3">
            <label for="profesion" class="form-label">Profesión</label>
            <input type="text" name="profesion" id="profesion" 
                   class="form-control @error('profesion') is-invalid @enderror" 
                   placeholder="Profesión" 
                   value="{{ old('profesion', $anuncio->profesion ?? '') }}">
            @error('profesion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo GPS -->
        <div class="mb-3">
            <label for="gps" class="form-label">GPS</label>
            <input type="text" name="gps" id="gps" 
                   class="form-control @error('gps') is-invalid @enderror" 
                   placeholder="Coordenadas GPS" 
                   value="{{ old('gps', $anuncio->gps ?? '') }}">
            @error('gps')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo IP -->
        <div class="mb-3">
            <label for="ip_address" class="form-label">Dirección IP</label>
            <input type="text" name="ip_address" id="ip_address" 
                   class="form-control @error('ip_address') is-invalid @enderror" 
                   placeholder="Dirección IP" 
                   value="{{ old('ip_address', $anuncio->ip_address ?? '') }}">
            @error('ip_address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo port -->
        <div class="mb-3">
            <label for="port" class="form-label">Puerto</label>
            <input type="text" name="port" id="port" 
                   class="form-control @error('port') is-invalid @enderror" 
                   placeholder="Puerto" 
                   value="{{ old('port', $anuncio->port ?? '') }}">
            @error('port')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo estado -->
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" name="estado" id="estado" 
                   class="form-control @error('estado') is-invalid @enderror" 
                   placeholder="Estado" 
                   value="{{ old('estado', $anuncio->estado ?? '') }}">
            @error('estado')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo destacado -->
        <div class="mb-3">
            <label for="destacado" class="form-label">Destacado</label>
            <input type="text" name="destacado" id="destacado" 
                   class="form-control @error('destacado') is-invalid @enderror" 
                   placeholder="Destacado" 
                   value="{{ old('destacado', $anuncio->destacado ?? '') }}">
            @error('destacado')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo verificación -->
        <div class="mb-3">
            <label for="verificacion" class="form-label">Verificación</label>
            <input type="text" name="verificacion" id="verificacion" 
                   class="form-control @error('verificacion') is-invalid @enderror" 
                   placeholder="Verificación" 
                   value="{{ old('verificacion', $anuncio->verificacion ?? '') }}">
            @error('verificacion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> {{ __('Guardar') }}
            </button>
        </div>
    </div>
</div>