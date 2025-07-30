<div class="bg-white rounded-lg shadow-md p-6">
    <div class="space-y-4">
        <!-- Campo Nombre -->
        <div class="form-group">
            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
            <input type="text" 
                   id="nombre" 
                   name="nombre" 
                   value="{{ old('nombre', $tag->nombre ?? '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nombre') border-red-500 @enderror"
                   placeholder="Nombre del tag"
                   required>
            @error('nombre')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Slug -->
        <div class="form-group">
            <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
            <input type="text" 
                   id="slug" 
                   name="slug" 
                   value="{{ old('slug', $tag->slug ?? '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('slug') border-red-500 @enderror"
                   placeholder="slug-del-tag"
                   required>
            @error('slug')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Color -->
        <div class="form-group">
            <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
            <div class="flex items-center">
                <input type="color" 
                       id="color" 
                       name="color" 
                       value="{{ old('color', $tag->color ?? '#3b82f6') }}"
                       class="h-10 w-10 rounded border border-gray-300 mr-2">
                <input type="text" 
                       id="color_text" 
                       name="color_text" 
                       value="{{ old('color', $tag->color ?? '#3b82f6') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('color') border-red-500 @enderror"
                       placeholder="Código hexadecimal"
                       required>
            </div>
            @error('color')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Rubro -->
        <div class="form-group">
            <label for="rubro" class="block text-sm font-medium text-gray-700 mb-1">Rubro</label>
            <select id="rubro" 
                    name="rubro"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('rubro') border-red-500 @enderror">
                @foreach($tag->rubros ?? [] as $key => $rubro)
                    <option value="{{ $key }}" @selected(old('rubro', $tag->rubro ?? '') == $key)>{{ $rubro }}</option>
                @endforeach
            </select>
            @error('rubro')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Visible -->
        <div class="form-group">
            <fieldset>
                <legend class="block text-sm font-medium text-gray-700 mb-1">Visibilidad</legend>
                <div class="flex items-center space-x-4 mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" 
                               name="visible" 
                               value="Si"
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                               @checked(old('visible', $tag->visible ?? '') === 'Si')>
                        <span class="ml-2 text-sm text-gray-700">Visible</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" 
                               name="visible" 
                               value="No"
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                               @checked(old('visible', $tag->visible ?? '') === 'No')>
                        <span class="ml-2 text-sm text-gray-700">Oculto</span>
                    </label>
                </div>
                @error('visible')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </fieldset>
        </div>

        <!-- Campo Menú -->
        <div class="form-group">
            <fieldset>
                <legend class="block text-sm font-medium text-gray-700 mb-1">Mostrar en menú</legend>
                <div class="flex items-center space-x-4 mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" 
                               name="menu" 
                               value="Si"
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                               @checked(old('menu', $tag->menu ?? '') === 'Si')>
                        <span class="ml-2 text-sm text-gray-700">Sí</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" 
                               name="menu" 
                               value="No"
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                               @checked(old('menu', $tag->menu ?? '') === 'No')>
                        <span class="ml-2 text-sm text-gray-700">No</span>
                    </label>
                </div>
                @error('menu')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </fieldset>
        </div>
    </div>

    <!-- Botón de envío -->
    <div class="flex justify-end mt-6">
        <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
            <i class="fas fa-save mr-2"></i>{{ __('Guardar Tag') }}
        </button>
    </div>
</div>