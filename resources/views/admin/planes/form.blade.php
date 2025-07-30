<div class="card bg-light p-3 mb-4">
    <div class="card-body">

        <!-- Campo Nombre -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" 
                   class="form-control @error('nombre') is-invalid @enderror" 
                   value="{{ old('nombre', $plane->nombre) }}" 
                   placeholder="Nombre">
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo Slug -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" 
                   class="form-control @error('slug') is-invalid @enderror" 
                   value="{{ old('slug', $plane->slug) }}" 
                   placeholder="Slug">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Selector Clase -->
        <div class="mb-3">
            <label for="clase_id" class="form-label">Clase</label>
            <select name="clase_id" id="clase_id" class="form-control @error('clase_id') is-invalid @enderror">
                @foreach($clases as $id => $nombre)
                    <option value="{{ $id }}" {{ old('clase_id', $plane->clase_id) == $id ? 'selected' : '' }}>
                        {{ $nombre }}
                    </option>
                @endforeach
            </select>
            @error('clase_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Selector Categoría -->
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror">
                @foreach($categorias as $id => $nombre)
                    <option value="{{ $id }}" {{ old('categoria_id', $plane->categoria_id) == $id ? 'selected' : '' }}>
                        {{ $nombre }}
                    </option>
                @endforeach
            </select>
            @error('categoria_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo Días -->
        <div class="mb-3">
            <label for="dias" class="form-label">Días</label>
            <input type="number" name="dias" id="dias" 
                   class="form-control @error('dias') is-invalid @enderror" 
                   value="{{ old('dias', $plane->dias) }}" 
                   placeholder="Días">
            @error('dias')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo Precio -->
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" name="precio" id="precio" 
                   class="form-control @error('precio') is-invalid @enderror" 
                   value="{{ old('precio', $plane->precio) }}" 
                   placeholder="Precio">
            @error('precio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Radio Interno -->
        <div class="mb-3 col-lg-3">
            <p class="fw-bold">Interno</p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="interno" id="interno_no" 
                       value="No" {{ old('interno', $plane->interno ?: 'No') == 'No' ? 'checked' : '' }}>
                <label class="form-check-label" for="interno_no">No</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="interno" id="interno_si" 
                       value="Si" {{ old('interno', $plane->interno) == 'Si' ? 'checked' : '' }}>
                <label class="form-check-label" for="interno_si">Si</label>
            </div>
            @error('interno')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

    </div>
    <div class="card-footer mt-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
        </button>
    </div>
</div>