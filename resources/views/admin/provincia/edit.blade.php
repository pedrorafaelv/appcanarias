@extends('adminlte::page')

@section('template_title')
    {{__('Update')}} Provincia
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{__('Update')}} Provincia</span>
                    </div>
                    <div class="card-body">
                       {!! Form::model($provincia, [
                            'route' => ['provincias.update', $provincia],
                            'autocomplete' => 'off',
                            'files' => true,
                            'method' => 'post',
                            'class' => 'w-100',
                        ]) !!}
                        @csrf
                        {{-- <form method="POST" action="{{ route('provincias.update', $provincia) }}"  role="form" enctype="multipart/form-data"> --}}
                            {{ method_field('PATCH') }}
                           

                            @include('admin.provincia.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

   <script>  
    $(document).ready( function() {
        $("#nombre").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
        });
    });
    </script>

 <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
 <script>
    ClassicEditor
        .create(document.querySelector('#texto_seo'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection