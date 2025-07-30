<div class="card bg-light p-3 mb-4">
    <div class="card-body">

        <!-- Campo Usuario (solo lectura) -->
        <div class="mb-3">
            <label class="form-label fw-bold">Usuario:</label>
            <div class="form-control-plaintext">
                @if (is_null($pago->user_id))
                    N/D
                @else
                    ({{ $pago->user_id }}) - {{ $pago->user->name }}
                @endif
            </div>
        </div>

        <!-- Campos de solo lectura -->
        <div class="mb-3">
            <label class="form-label fw-bold">Mail Pago:</label>
            <div class="form-control-plaintext">{{ $pago->mail_pago }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Anuncio Id:</label>
            <div class="form-control-plaintext">{{ $pago->anuncio_id }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Moneda Precio:</label>
            <div class="form-control-plaintext">{{ $pago->moneda_precio }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Precio:</label>
            <div class="form-control-plaintext">{{ $pago->precio }}</div>
        </div>

        <!-- Campo Moneda Pago (editable) -->
        <div class="mb-3">
            <label for="moneda_pago" class="form-label">Moneda Pago</label>
            <input type="text" name="moneda_pago" id="moneda_pago" 
                   class="form-control @error('moneda_pago') is-invalid @enderror" 
                   value="{{ old('moneda_pago', $pago->moneda_pago) }}" 
                   placeholder="Moneda Pago">
            @error('moneda_pago')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo Monto Pago (editable) -->
        <div class="mb-3">
            <label for="monto_pago" class="form-label">Monto Pago</label>
            <input type="text" name="monto_pago" id="monto_pago" 
                   class="form-control @error('monto_pago') is-invalid @enderror" 
                   value="{{ old('monto_pago', $pago->monto_pago) }}" 
                   placeholder="Monto Pago">
            @error('monto_pago')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo Medio Pago (editable) -->
        <div class="mb-3">
            <label for="medio_pago" class="form-label">Medio Pago</label>
            <input type="text" name="medio_pago" id="medio_pago" 
                   class="form-control @error('medio_pago') is-invalid @enderror" 
                   value="{{ old('medio_pago', $pago->medio_pago) }}" 
                   placeholder="Medio Pago">
            @error('medio_pago')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo Número Transacción (editable) -->
        <div class="mb-3">
            <label for="nro_transac" class="form-label">Nro Transac</label>
            <input type="text" name="nro_transac" id="nro_transac" 
                   class="form-control @error('nro_transac') is-invalid @enderror" 
                   value="{{ old('nro_transac', $pago->nro_transac) }}" 
                   placeholder="Nro Transac">
            @error('nro_transac')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo Fecha Transacción (editable) -->
        <div class="mb-3">
            <label for="fecha_transac" class="form-label">Fecha Transac</label>
            <input type="text" name="fecha_transac" id="fecha_transac" 
                   class="form-control @error('fecha_transac') is-invalid @enderror" 
                   value="{{ old('fecha_transac', $pago->fecha_transac) }}" 
                   placeholder="Fecha Transac">
            @error('fecha_transac')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Radio Estado -->
        <div class="mb-3">
            <p class="fw-bold">Estado</p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="estado" id="estado_aprobado" 
                       value="Aprobado" {{ old('estado', $pago->estado ?: 'Aprobado') == 'Aprobado' ? 'checked' : '' }}>
                <label class="form-check-label" for="estado_aprobado">Aprobado</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="estado" id="estado_rechazado" 
                       value="Rechazado" {{ old('estado', $pago->estado) == 'Rechazado' ? 'checked' : '' }}>
                <label class="form-check-label" for="estado_rechazado">Rechazado</label>
            </div>
            @error('estado')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

    </div>
    <div class="card-footer mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Guardar
        </button>
    </div>
</div>