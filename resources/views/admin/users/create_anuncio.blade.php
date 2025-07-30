@extends('adminlte::page')

@section('template_title')
    {{__('Create')}} Anuncio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{__('Create')}} Anuncio</h3>
                        <div class="card-tools">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.users.show', $user) }}">
                                <i class="fas fa-arrow-left"></i> {{__('Back')}}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.users.store_anuncio', $user) }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @include('admin.users.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

<script>  
$(document).ready(function() {
    // Slug generator
    $("#nombre").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
    });

    // CKEditor
    ClassicEditor
        .create(document.querySelector('#presentacion_aux'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ]
            }
        })
        .catch(error => {
            console.error(error);
        });
});
</script>
@endsection