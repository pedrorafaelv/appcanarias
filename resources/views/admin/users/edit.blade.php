@extends('adminlte::page')

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

@section('title', 'Gmarket ADMIN PANEL')

@section('content')

    <section class="container mx-auto px-4 py-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Mostrar errores -->
                @include('partials.errors')

                <div class="bg-white border-b border-gray-200">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800">
                            {{ __('Update') }} {{ __('Usuario') }}
                        </h2>
                    </div>
                    
                    <div class="p-6">
                        <form method="POST" 
                              action="{{ route('admin.users.update', $user->id) }}" 
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            @include('admin.users.formuseredit')

                            <div class="flex justify-end mt-6">
                                <button type="submit" 
                                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection