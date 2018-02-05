@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Ordem de serviço</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('service_orders.create') }}"> Cadastrar Ordem de serviço </a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-dark table-bordered">
        <tr>
            <th>#</th>
            <th>Compania</th>
            <th>Título</th>
            <th>Status</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($service_orders as $service_order)
            <tr>
                <td>{{ $service_order->id }}</td>
                <td>{{ $service_order->company_id}}</td>
                <td>{{ $service_order->title}}</td>
                <td>{{ $service_order->status}}</td>
                <td>
                    <a class="btn btn-outline-info btn-sm" href="{{ route('companies.show',$service_order->id) }}">Exibir</a>
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('companies.edit',$service_order->id) }}">Editar</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['companies.destroy', $service_order->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>


    {!! $service_orders->links() !!}
@endsection