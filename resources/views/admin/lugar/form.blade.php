<div class="bg-white rounded-lg shadow-md p-6">
    <div class="space-y-4">
        <!-- Campo Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre del Lugar</label>
            <input type="text"
                   id="nombre"
                   name="nombre"
                   value="{{ old('nombre', $lugar->nombre ?? '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nombre') border-red-500 @enderror"
                   placeholder="Ej: Restaurante Principal"
                   required>
            @error('nombre')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Slug -->
        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Identificador URL</label>
            <input type="text"
                   id="slug"
                   name="slug"
                   value="{{ old('slug', $lugar->slug ?? '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('slug') border-red-500 @enderror"
                   placeholder="Ej: restaurante-principal"
                   required>
            @error('slug')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Botón de envío -->
    <div class="flex justify-end mt-6">
        <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
            </svg>
            {{ __('Guardar Lugar') }}
        </button>
    </div>
</div>