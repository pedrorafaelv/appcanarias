<div class="card shadow-sm mb-4">
    <div class="card-body">
        <!-- Campo título -->
        <div class="mb-4">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control @error('titulo') is-invalid @enderror" 
                   id="titulo" name="titulo" value="{{ old('titulo', $nota->titulo ?? '') }}" 
                   placeholder="Ingrese el título">
            @error('titulo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo nota -->
        <div class="mb-4">
            <label for="nota" class="form-label">Nota</label>
            <textarea class="form-control @error('nota') is-invalid @enderror" 
                      id="nota" name="nota" rows="4"
                      placeholder="Escriba su nota aquí">{{ old('nota', $nota->nota ?? '') }}</textarea>
            @error('nota')
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