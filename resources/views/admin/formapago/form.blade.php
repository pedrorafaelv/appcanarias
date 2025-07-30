<div class="bg-white rounded-lg shadow-md p-6">
    <div class="space-y-4">
        <!-- Campo Nombre -->
        <div class="form-group">
            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
            <input type="text" 
                   id="nombre" 
                   name="nombre" 
                   value="{{ old('nombre', $formapago->nombre ?? '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nombre') border-red-500 @enderror"
                   placeholder="Nombre del método de pago"
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
                   value="{{ old('slug', $formapago->slug ?? '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('slug') border-red-500 @enderror"
                   placeholder="identificador-unico"
                   required>
            @error('slug')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Botón de envío -->
    <div class="flex justify-end mt-6">
        <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
            <i class="fas fa-save mr-2"></i>{{ __('Guardar Método de Pago') }}
        </button>
    </div>
</div>