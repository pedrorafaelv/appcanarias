@extends('adminlte::page')

@section('template_title')
    {{__('Update')}} Nota
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{__('Update')}} Nota</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.notas.update', $nota->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf

                            @include('admin.nota.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
