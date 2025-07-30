<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de Usuario</title>
    
    <!-- Incluir Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Estilos personalizados adicionales */
        .form-container {
            max-width: 1200px;
            margin: 2rem auto;
        }
        .form-section {
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }
        .form-title {
            color: #1a365d;
            font-weight: 600;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .radio-group {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="form-container">
        <div class="form-section">
            <!-- Primera fila -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Campo Nombre -->
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                           required maxlength="50" placeholder="Nombre">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Email -->
                <div class="form-group">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                           required maxlength="120" placeholder="Email">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Segunda fila - Contraseñas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Campo Password -->
                <div class="form-group">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                    <input type="password" id="password" name="password"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror"
                           required minlength="8" placeholder="Contraseña">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmación Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           required minlength="8" placeholder="Confirmar Contraseña">
                </div>
            </div>

            <!-- Tercera fila - Contacto -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Campo Teléfono -->
                <div class="form-group">
                    <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" value="{{ old('telefono', $user->telefono ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('telefono') border-red-500 @enderror"
                           required minlength="9" maxlength="9" placeholder="Teléfono">
                    @error('telefono')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Dirección -->
                <div class="form-group">
                    <label for="direccion" class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                    <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $user->direccion ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('direccion') border-red-500 @enderror"
                           placeholder="Dirección">
                    @error('direccion')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Cuarta fila - Información personal -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Campo Nacionalidad -->
                <div class="form-group">
                    <label for="nacionalidad" class="block text-sm font-medium text-gray-700 mb-1">Nacionalidad</label>
                    <select id="nacionalidad" name="nacionalidad"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nacionalidad') border-red-500 @enderror">
                        @foreach ($user->paises ?? [] as $pais)
                            <option value="{{ $pais }}" @selected(old('nacionalidad', $user->nacionalidad ?? '') == $pais)>
                                {{ $pais }}
                            </option>
                        @endforeach
                    </select>
                    @error('nacionalidad')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Profesión -->
                <div class="form-group">
                    <label for="profesion" class="block text-sm font-medium text-gray-700 mb-1">Profesión</label>
                    <input type="text" id="profesion" name="profesion" value="{{ old('profesion', $user->profesion ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('profesion') border-red-500 @enderror"
                           placeholder="Profesión">
                    @error('profesion')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Edad -->
                <div class="form-group">
                    <label for="edad" class="block text-sm font-medium text-gray-700 mb-1">Edad</label>
                    <select id="edad" name="edad"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('edad') border-red-500 @enderror">
                        @for ($i = 18; $i <= 99; $i++)
                            <option value="{{ $i }}" @selected(old('edad', $user->edad ?? '') == $i)>{{ $i }}</option>
                        @endfor
                    </select>
                    @error('edad')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Quinta fila - Información técnica -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <!-- Campo GPS -->
                <div class="form-group">
                    <label for="gps" class="block text-sm font-medium text-gray-700 mb-1">Coordenadas GPS</label>
                    <input type="text" id="gps" name="gps" value="{{ old('gps', $user->gps ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('gps') border-red-500 @enderror"
                           placeholder="Coordenadas GPS">
                    @error('gps')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo IP -->
                <div class="form-group">
                    <label for="ip_al_registrarse" class="block text-sm font-medium text-gray-700 mb-1">IP al registrarse</label>
                    <input type="text" id="ip_al_registrarse" name="ip_al_registrarse" value="{{ old('ip_al_registrarse', $user->ip_al_registrarse ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('ip_al_registrarse') border-red-500 @enderror"
                           placeholder="Dirección IP">
                    @error('ip_al_registrarse')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Estado WSP -->
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Estado WSP</label>
                    <div class="radio-group">
                        <div class="flex items-center">
                            <input id="estado_wsp_pendiente" name="estado_wsp" type="radio" value="Pendiente"
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                   @checked(old('estado_wsp', $user->estado_wsp ?? '') === 'Pendiente')>
                            <label for="estado_wsp_pendiente" class="ml-2 block text-sm text-gray-700">Pendiente</label>
                        </div>
                        <div class="flex items-center ml-4">
                            <input id="estado_wsp_validado" name="estado_wsp" type="radio" value="Validado"
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                   @checked(old('estado_wsp', $user->estado_wsp ?? '') === 'Validado')>
                            <label for="estado_wsp_validado" class="ml-2 block text-sm text-gray-700">Validado</label>
                        </div>
                    </div>
                    @error('estado_wsp')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Verificado -->
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Verificado</label>
                    <div class="radio-group">
                        <div class="flex items-center">
                            <input id="verificado_no" name="verificado" type="radio" value="No"
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                   @checked(old('verificado', $user->verificado ?? '') === 'No')>
                            <label for="verificado_no" class="ml-2 block text-sm text-gray-700">No</label>
                        </div>
                        <div class="flex items-center ml-4">
                            <input id="verificado_si" name="verificado" type="radio" value="Si"
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                   @checked(old('verificado', $user->verificado ?? '') === 'Si')>
                            <label for="verificado_si" class="ml-2 block text-sm text-gray-700">Sí</label>
                        </div>
                    </div>
                    @error('verificado')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Botón de envío -->
            <div class="flex justify-end pt-4">
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-save mr-2"></i> Guardar Usuario
                </button>
            </div>
        </div>
    </div>
</body>
</html>