@extends('adminlte::page')

@section('template_title')
    Anuncio
@endsection

@section('content_header')
<h1>Lista de Anuncios</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <style>
        .badge-leyenda {
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 3px;
        }
    </style>
@endsection

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    
    <div class="mb-3">
        <span class="badge-leyenda" style="background-color: #FABFBD"># Finalizado</span>
        <span class="badge-leyenda" style="background-color: #FE362F"># Publicado con fecha finalizada</span>
        <span class="badge-leyenda" style="background-color: #FBD3B6"># Vencen en menos de 72hrs</span>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="anunciosTable" class="table table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Publicación</th>
                        <th>Vencimiento</th>
                        <th>Clase</th>
                        <th>Categoría</th>
                        <th>Zona</th>
                        <th>Plan</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anuncios as $anuncio)
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
                            <td>{{ $anuncio->fecha_de_publicacion ? date('d-m-Y', strtotime($anuncio->fecha_de_publicacion)) : '' }}</td>
                            <td>{{ $anuncio->fecha_caducidad ? date('d-m-Y', strtotime($anuncio->fecha_caducidad)) : '' }}</td>
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#anunciosTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
                    buttons: {
                        copyTitle: 'Copiado al Portapales',
                        copySuccess: {
                            _: '%d Lineas copiadas',
                            1: '1 linea copiada'
                        }
                    }
                },
                responsive: true,
                autoWidth: false,
                dom: '<"top"lf>rt<"bottom"ip>',
                buttons: [
                    {
                        extend: 'colvis',
                        text: 'Columnas Visibles'
                    },
                    {
                        extend: 'collection',
                        text: 'Exportar',
                        buttons: [
                            {
                                extend: 'pdfHtml5',
                                title: 'Listado de Anuncios',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                title: 'Listado de Anuncios',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'copy',
                                text: 'Copiar',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            'csv',
                            {
                                extend: 'print',
                                text: 'Imprimir',
                                title: 'Listado de Anuncios',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }
                        ]
                    }
                ]
            });
        });
    </script>
@endsection