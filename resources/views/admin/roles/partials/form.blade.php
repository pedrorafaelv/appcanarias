<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" 
           name="name" 
           id="name" 
           class="form-control @error('name') is-invalid @enderror" 
           placeholder="Ingrese el nombre de la categoría"
           value="{{ old('name') }}">
    
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror            
</div>  

<h2 class="h3 my-4">Lista de Permisos</h2>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
    @foreach ($permisos as $permiso)
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" 
                       type="checkbox" 
                       name="permissions[]" 
                       id="permiso_{{ $permiso->id }}" 
                       value="{{ $permiso->id }}"
                       {{ in_array($permiso->id, old('permissions', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="permiso_{{ $permiso->id }}">
                    {{ $permiso->description }}
                </label>
            </div>
        </div>
    @endforeach
</div>