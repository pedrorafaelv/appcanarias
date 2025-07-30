@extends('adminlte::page')

@section('title', __('Actualizar Provincia'))

@section('content_header')
    <h1 class="text-xl font-semibold text-gray-800">{{ __('Actualizar Provincia') }}</h1>
@endsection

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                {{-- @include('partial.errors') --}}

                <form method="POST" 
                      action="{{ route('provincias.update', $provincia) }}" 
                      enctype="multipart/form-data"
                      class="space-y-6">
                    @csrf
                    @method('PATCH')

                    @include('admin.provincia.form')

                    <div class="flex justify-end">
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                            <i class="fas fa-save mr-2"></i>{{ __('Actualizar Provincia') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="text-center text-sm text-gray-500">
        {{ config('app.name') }} © {{ date('Y') }}
    </div>
@endsection

@push('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    
    <script>
        // Convertir nombre a slug
        $(document).ready(function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        // Inicializar CKEditor
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#texto_seo'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush