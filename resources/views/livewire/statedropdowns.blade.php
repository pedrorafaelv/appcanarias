<div class="space-y-6">
    <!-- Fila de Clase y Categoría -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="clase_id" class="block text-sm font-medium text-gray-700 mb-1">Clase</label>
            <select id="clase_id" name="clase_id" wire:model="selectedClase"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('clase_id') border-red-500 @enderror">
                @foreach($clases as $id => $nombre)
                    <option value="{{ $id }}" @selected(old('clase_id') == $id)>{{ $nombre }}</option>
                @endforeach
            </select>
            @error('clase_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="categoria_id" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
            <select id="categoria_id" name="categoria_id" wire:model="selectedCategoria"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('categoria_id') border-red-500 @enderror">
                @foreach($categorias as $id => $nombre)
                    <option value="{{ $id }}" @selected($selectedCategoria == $id)>{{ $nombre }}</option>
                @endforeach
            </select>
            @error('categoria_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Fila de Ubicación -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
            <label for="provincia_id" class="block text-sm font-medium text-gray-700 mb-1">Provincia</label>
            <select id="provincia_id" name="provincia_id" wire:model="selectedProvincia"  onchange="CambiarProvincia(this)"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('provincia_id') border-red-500 @enderror">
                <option value="">Seleccione una provincia</option>
                @foreach($provincias as $provincia)
                    <option value="{{ $provincia->id }}" @selected(old('provincia_id') == $provincia->id)>
                        {{ $provincia->nombre }}
                    </option>
                @endforeach
            </select>
            @error('provincia_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            {{-- {{$municipios}} --}}
            <label for="municipio_id" class="block text-sm font-medium text-gray-700 mb-1">Municipio</label>
            <select id="municipio_id" name="municipio_id" wire:model="selectedMuni"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('municipio_id') border-red-500 @enderror">
                <option value="">Seleccione un municipio</option>
                @foreach($municipios as $municipio)
                    <option value="{{ $municipio->id }}">
                        {{ $municipio->nombre }}
                    </option>
                @endforeach
            </select>
            @error('municipio_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="localidad" class="block text-sm font-medium text-gray-700 mb-1">Localidad</label>
            <input type="text" id="localidad" name="localidad" wire:model="localidad"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('localidad') border-red-500 @enderror"
                   placeholder="Localidad">
            @error('localidad')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Fila de Plan y Precios -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
            <label for="plane_id" class="block text-sm font-medium text-gray-700 mb-1">Plan</label>
            <select id="plane_id" name="plane_id" wire:model="selectedPlane"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('plane_id') border-red-500 @enderror">
                @foreach($planes as $id => $nombre)
                    <option value="{{ $id }}" @selected($selectedPlane == $id)>{{ $nombre }}</option>
                @endforeach
            </select>
            @error('plane_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
            <input type="number" id="precio" name="precio" wire:model="precio"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('precio') border-red-500 @enderror"
                   placeholder="Precio">
            @error('precio')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="dias" class="block text-sm font-medium text-gray-700 mb-1">Días</label>
            <input type="number" id="dias" name="dias" wire:model="dias"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('dias') border-red-500 @enderror"
                   placeholder="Días">
            @error('dias')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
<script>
    function CambiarProvincia(provinciaSelect){
        let provincia= provinciaSelect.value;
        // let nombre =document.getElementById('nombre');
        // nombre.value= "";
        // fetch(`appcanarias.test/bielsa22admin/provincias/${provincia}/getMunicipios`)
        // .then(function (response) {
        //     return response.json();
        // })
        // .then (function(jsonData){
        //     buildDivMunicipio(jsonData);
        // })
    }

     function buildDivMunicipio(jsonProvincias){
        let ulMunicipios=document.getElementById('ulMunicipios');
        document.getElementById("divMunicipios").classList.remove("hidden");
        ulProvincias.innerHTML = '';
        jsonProvincias.forEach(function(provincia) {
            let liTag = document.createElement('li');
            liTag.innerHTML = provincia.nombre;
            ulProvincias.appendChild(liTag);
        });
    }
    </script>