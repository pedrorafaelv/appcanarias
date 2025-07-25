@extends('adminlte::page')

@section('template_title')
    {{__('Update')}} Pago
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{__('Update')}} Pago</span>
                         <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pagos.index') }}"> {{__('Back')}}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pagos.update', $pago->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.pago.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
