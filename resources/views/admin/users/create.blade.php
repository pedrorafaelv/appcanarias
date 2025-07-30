@extends('adminlte::page')

@section('title', 'Gmarket ADMIN PANEL')

@section('content_header')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Alta de Usuario</h1>
        <a href="{{ route('admin.users.index') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700 transition duration-150 ease-in-out">
            <i class="far fa-arrow-alt-circle-left mr-2"></i> 
            Listado
        </a>
    </div>
@stop

@section('content')
    <!-- Mensaje Flash -->
    @if (session('info'))
        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
            <p class="font-semibold">{{ session('info') }}</p>
        </div>
    @endif
    
    <!-- Formulario -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
                @csrf
                
                @include('admin.users.formuser')
                
                <div class="flex justify-end">
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                        Guardar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop