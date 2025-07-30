<div class="bg-white rounded-lg shadow-md p-6">
    <div class="space-y-4">
        <!-- Campo Nombre -->
        <div class="form-group">
            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
            <input type="text"
                   id="nombre"
                   name="nombre"
                   value="{{ old('nombre', $provincia->nombre ?? '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nombre') border-red-500 @enderror"
                   placeholder="Nombre de la provincia"
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
                   value="{{ old('slug', $provincia->slug ?? '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('slug') border-red-500 @enderror"
                   placeholder="nombre-provincia"
                   required>
            @error('slug')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Texto SEO -->
        <div class="form-group">
            <label for="texto_seo" class="block text-sm font-medium text-gray-700 mb-1">Texto SEO</label>
            <textarea id="texto_seo"
                      name="texto_seo"
                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('texto_seo') border-red-500 @enderror"
                      rows="4"
                      placeholder="Texto optimizado para SEO">{{ old('texto_seo', $provincia->texto_seo ?? '') }}</textarea>
            @error('texto_seo')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Botón de envío -->
    <div class="flex justify-end mt-6">
        <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
            <i class="fas fa-save mr-2"></i>{{ __('Guardar Provincia') }}
        </button>
    </div>
</div>