<div class="card shadow-sm border border-gray-200 rounded-lg">
    <div class="card-body p-4 md:p-6 space-y-6">
        <!-- Sección 1: Información básica -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <!-- Campo Nombres -->
            <div class="space-y-1">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombres *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                       required maxlength="50" placeholder="Nombre completo">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo Email -->
            <div class="space-y-1">
                <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                       required maxlength="120" placeholder="correo@ejemplo.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Sección 2: Contraseña -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <div class="space-y-1">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror"
                       placeholder="Dejar en blanco para no cambiar">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Sección 3: Contacto -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <!-- Campo Teléfono -->
            <div class="space-y-1">
                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono *</label>
                <input type="tel" name="telefono" id="telefono" value="{{ old('telefono', $user->telefono) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('telefono') border-red-500 @enderror"
                       required minlength="9" maxlength="9" placeholder="Ej: 612345678">
                @error('telefono')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo Dirección -->
            <div class="space-y-1">
                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $user->direccion) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('direccion') border-red-500 @enderror"
                       placeholder="Dirección completa">
                @error('direccion')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Sección 4: Información personal -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
            <!-- Nacionalidad -->
            <div class="space-y-1">
                <label for="nacionalidad" class="block text-sm font-medium text-gray-700">Nacionalidad</label>
                <select name="nacionalidad" id="nacionalidad" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('nacionalidad') border-red-500 @enderror">
                    <option value="">Seleccione una nacionalidad</option>
                    @foreach($user->paises ?? [] as $pais)
                        <option value="{{ $pais }}" @selected(old('nacionalidad', $user->nacionalidad) == $pais)>
                            {{ $pais }}
                        </option>
                    @endforeach
                </select>
                @error('nacionalidad')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Profesión -->
            <div class="space-y-1">
                <label for="profesion" class="block text-sm font-medium text-gray-700">Profesión</label>
                <input type="text" name="profesion" id="profesion" value="{{ old('profesion', $user->profesion) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('profesion') border-red-500 @enderror"
                       placeholder="Ej: Ingeniero, Médico">
                @error('profesion')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Edad -->
            <div class="space-y-1">
                <label for="edad" class="block text-sm font-medium text-gray-700">Edad</label>
                <select name="edad" id="edad" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('edad') border-red-500 @enderror">
                    @for($i = 18; $i <= 99; $i++)
                        <option value="{{ $i }}" @selected(old('edad', $user->edad) == $i)>{{ $i }}</option>
                    @endfor
                </select>
                @error('edad')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Sección 5: Información técnica -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <!-- GPS -->
            <div class="space-y-1">
                <label for="gps" class="block text-sm font-medium text-gray-700">Coordenadas GPS</label>
                <input type="text" name="gps" id="gps" value="{{ old('gps', $user->gps) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('gps') border-red-500 @enderror"
                       placeholder="Ej: 28.123456, -16.123456">
                @error('gps')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- IP -->
            <div class="space-y-1">
                <label for="ip_al_registrarse" class="block text-sm font-medium text-gray-700">IP al registrarse</label>
                <input type="text" name="ip_al_registrarse" id="ip_al_registrarse" value="{{ old('ip_al_registrarse', $user->ip_al_registrarse) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('ip_al_registrarse') border-red-500 @enderror"
                       placeholder="Dirección IP">
                @error('ip_al_registrarse')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Sección 6: Verificaciones -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
            <!-- Email verificado -->
            <div class="space-y-1">
                <label for="email_verified_at" class="block text-sm font-medium text-gray-700">Fecha validación Email</label>
                <input type="date" name="email_verified_at" id="email_verified_at" value="{{ old('email_verified_at', $user->email_verified_at ? $user->email_verified_at->format('Y-m-d') : '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('email_verified_at') border-red-500 @enderror">
                @error('email_verified_at')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Estado WSP -->
            <div class="space-y-1">
                <p class="text-sm font-medium text-gray-700">Estado WSP</p>
                <div class="flex flex-wrap gap-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="estado_wsp" value="Pendiente" @checked(old('estado_wsp', $user->estado_wsp) == 'Pendiente')
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                        <span class="ml-2 text-sm text-gray-700">Pendiente</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="estado_wsp" value="Validado" @checked(old('estado_wsp', $user->estado_wsp) == 'Validado')
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                        <span class="ml-2 text-sm text-gray-700">Validado</span>
                    </label>
                </div>
                @error('estado_wsp')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Verificado -->
            <div class="space-y-1">
                <p class="text-sm font-medium text-gray-700">Verificado</p>
                <div class="flex flex-wrap gap-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="verificado" value="No" @checked(old('verificado', $user->verificado) == 'No')
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                        <span class="ml-2 text-sm text-gray-700">No</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="verificado" value="Si" @checked(old('verificado', $user->verificado) == 'Si')
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                        <span class="ml-2 text-sm text-gray-700">Sí</span>
                    </label>
                </div>
                @error('verificado')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Botón de envío -->
        <div class="flex justify-end pt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                {{ __('Guardar cambios') }}
            </button>
        </div>
    </div>
</div>