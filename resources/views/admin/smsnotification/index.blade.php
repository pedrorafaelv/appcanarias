@extends('adminlte::page')


@section('template_title')
    SMS Notificaciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Smsnotification') }}
                            </span>

                             <div class="float-right">                               
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Usuario</th>									
										<th>Telefono</th>
										<th>Mensaje</th>
										<th>Estado</th>
										<th>Sms Id</th>
										<th>Error Id</th>
										<th>Error Msg</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($smsnotifications as $smsnotification)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $smsnotification->user_id }}</td>
											<td>{{ $smsnotification->telefono }}</td>
											<td>{{ $smsnotification->mensaje }}</td>
											<td>{{ $smsnotification->respuesta }}</td>
											<td>{{ $smsnotification->sms_id }}</td>
											<td>{{ $smsnotification->error_id }}</td>
											<td>{{ $smsnotification->error_msg }}</td>

                                            <td>
                                                <form action="{{ route('smsnotifications.destroy',$smsnotification->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('smsnotifications.show',$smsnotification->id) }}"><i class="fa fa-fw fa-eye"></i> {{__('Show')}}</a>                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{__('Delete')}}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $smsnotifications->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
