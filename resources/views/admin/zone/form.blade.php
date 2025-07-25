<div class="card shadow-sm mb-4">
    <div class="card-body">
        <!-- Componente Livewire para provincias/municipios -->
        @livewire('dropdown-provincia-muni', [
            'selectedMuni' => $zone->municipio_id ?? null
        ])

        <!-- Campo Nombre -->
        <div class="mb-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" 
                   class="form-control @error('nombre') is-invalid @enderror" 
                   id="nombre" 
                   name="nombre" 
                   value="{{ old('nombre', $zone->nombre ?? '') }}" 
                   placeholder="Ingrese el nombre">
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo Slug -->
        <div class="mb-4">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" 
                   class="form-control @error('slug') is-invalid @enderror" 
                   id="slug" 
                   name="slug" 
                   value="{{ old('slug', $zone->slug ?? '') }}" 
                   placeholder="Ingrese el slug">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    
    <div class="card-footer bg-transparent border-0 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary px-4">
            <i class="fas fa-save me-2"></i>{{ __('Guardar') }}
        </button>
    </div>
</div>