@livewireScripts
<div>
    <!-- Controles de búsqueda y paginación -->
    <div class="row mb-3">
        <div class="col-md-2">
            <select wire:model="perPage" class="form-control form-control-sm">
                <option value="10">10 por página</option>
                <option value="25">25 por página</option>
                <option value="50">50 por página</option>
                <option value="100">100 por página</option>
            </select>
        </div>
        <div class="col-md-10">
            <input 
            type="text" 
            class="form-control form-control-sm" 
            placeholder="Buscar por ID, nombre, estado..." 
            wire:model.debounce.500ms="search"
            >
        </div>
    </div>
    
    <!-- Tabla de resultados -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th wire:click="sortBy('id')" style="cursor: pointer;">
                        ID 
                        @if($sortField === 'id')
                        @if($sortDirection === 'asc') ↑ @else ↓ @endif
                        @endif
                    </th>
                    <th wire:click="sortBy('nombre')" style="cursor: pointer;">
                        Nombre
                        @if($sortField === 'nombre')
                        @if($sortDirection === 'asc') ↑ @else ↓ @endif
                        @endif
                    </th>
                    <th wire:click="sortBy('fecha_de_publicacion')" style="cursor: pointer;">
                        Publicación
                        @if($sortField === 'fecha_de_publicacion')
                        @if($sortDirection === 'asc') ↑ @else ↓ @endif
                        @endif
                    </th>
                    <th wire:click="sortBy('fecha_caducidad')" style="cursor: pointer;">
                        Vencimiento
                        @if($sortField === 'fecha_caducidad')
                        @if($sortDirection === 'asc') ↑ @else ↓ @endif
                        @endif
                    </th>
                    <th>Clase</th>
                    <th>Categoría</th>
                    <th>Zona</th>
                    <th>Plan</th>
                    <th wire:click="sortBy('estado')" style="cursor: pointer;">
                        Estado
                        @if($sortField === 'estado')
                        @if($sortDirection === 'asc') ↑ @else ↓ @endif
                        @endif
                    </th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($anuncios as $anuncio)
                @php
                        // Lógica para colores de fondo
                        $bgColor = '';
                        $today = now();
                        $tresDias = now()->addDays(3);
                        
                        if ($anuncio->estado == 'Finalizado') {
                            $bgColor = 'background-color: #FABFBD';
                        } elseif ($anuncio->fecha_caducidad && $anuncio->fecha_caducidad < $today) {
                            $bgColor = 'background-color: #FE362F';
                        } elseif ($anuncio->fecha_caducidad && $anuncio->fecha_caducidad <= $tresDias) {
                            $bgColor = 'background-color: #FBD3B6';
                        }
                        @endphp
                    <tr style="{{ $bgColor }}">
                        <td>{{ $anuncio->id }}</td>
                        <td>{{ $anuncio->nombre }}</td>
                        <td>{{ $anuncio->fecha_de_publicacion ? date('d-m-Y', strtotime($anuncio->fecha_de_publicacion)) : '' }}
                            {{-- <td>{{ optional($anuncio->fecha_de_publicacion)->format('d-m-Y') }}</td> --}}
                        <td>{{ $anuncio->fecha_caducidad ? date('d-m-Y', strtotime($anuncio->fecha_caducidad)) : '' }}
                        {{-- <td>{{ optional($anuncio->fecha_caducidad)->format('d-m-Y') }}</td> --}}
                        <td>{{ $anuncio->clase->nombre ?? 'N/D' }}</td>
                        <td>{{ $anuncio->categoria->nombre ?? 'N/D' }}</td>
                        <td>{{ $anuncio->localidad }}</td>
                        <td>{{ $anuncio->plane->nombre ?? 'N/D' }}</td>
                        <td>{{ $anuncio->estado }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit_anuncio', $anuncio) }}" 
                               class="btn btn-sm btn-info"
                               title="Ver detalles">
                                <i class="fas fa-eye"></i>
                            </a>
                            @livewire('anuncio-quitar-component', ['anuncio' => $anuncio], key('delete-'.$anuncio->id))
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center py-4">
                            No se encontraron anuncios que coincidan con tu búsqueda
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="row mt-3">
        <div class="col-12">
            {{ $anuncios->links() }}
        </div>
    </div>

    <!-- Leyenda de colores -->
    <div class="mt-3 small">
        <span class="badge mr-2" style="background-color: #FABFBD">Finalizado</span>
        <span class="badge mr-2" style="background-color: #FE362F">Publicación vencida</span>
        <span class="badge" style="background-color: #FBD3B6">Por vencer (72h)</span>
    </div>
</div>