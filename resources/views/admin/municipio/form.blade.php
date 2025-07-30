<div class="card bg-light p-3 mb-4">
    <div class="card-body">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" 
                   class="form-control @error('nombre') is-invalid @enderror" 
                   value="{{ old('nombre', $municipio->nombre) }}" 
                   placeholder="Nombre">
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" 
                   class="form-control @error('slug') is-invalid @enderror" 
                   value="{{ old('slug', $municipio->slug) }}" 
                   placeholder="Slug">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="provincia_id" class="form-label">Provincia</label>
            <select name="provincia_id" id="provincia_id" class="form-control @error('provincia_id') is-invalid @enderror">
                @foreach($provincias as $id => $nombre)
                    <option value="{{ $id }}" {{ old('provincia_id', $municipio->provincia_id) == $id ? 'selected' : '' }}>
                        {{ $nombre }}
                    </option>
                @endforeach
            </select>
            @error('provincia_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="isla_id" class="form-label">Isla</label>
            <select name="isla_id" id="isla_id" class="form-control @error('isla_id') is-invalid @enderror">
                <option value="">Seleccione una isla</option>
                @foreach($islas as $id => $nombre)
                    <option value="{{ $id }}" {{ old('isla_id', $municipio->isla_id) == $id ? 'selected' : '' }}>
                        {{ $nombre }}
                    </option>
                @endforeach
            </select>
            @error('isla_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="texto_seo" class="form-label">Texto SEO</label>
            <textarea name="texto_seo" id="texto_seo" 
                      class="form-control @error('texto_seo') is-invalid @enderror"
                      placeholder="Texto SEO">{{ old('texto_seo', $municipio->texto_seo) }}</textarea>
            @error('texto_seo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    </div>
    <div class="card-footer mt-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
        </button>
    </div>
</div>