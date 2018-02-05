@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Exibir Empresa</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('companies.index') }}"> Voltar</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
             <h3>Empresa: {{ $company->name}} - {{ $company->area_of_activity}}</h3>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="float-left">
                <h2>Ordem de serviço</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('service_orders.create',[$company->id]) }}"> Cadastrar Ordem de serviço </a>
            </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        </div>
        <table class="table table-dark table-bordered">
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Status</th>
                <th width="280px">Ação</th>
            </tr>
            @foreach ($service_orders as $service_order)
                <tr>
                    <td>{{ $service_order->id }}</td>
                    <td>{{ $service_order->title}}</td>
                    <td>{{ $status_os[$service_order->status] }}</td>
                    <td>
                        <a class="btn btn-outline-info btn-sm" href="{{ route('service_orders.show',$service_order->id) }}">Exibir</a>
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('service_orders.edit',$service_order->id) }}">Editar</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['service_orders.destroy', $service_order->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection