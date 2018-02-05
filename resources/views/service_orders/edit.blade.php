@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Editar Ordem de serviço</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('companies.show',[$company_id]) }}"> Voltar</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Atenção!</strong> Há problemas em seu cadastro.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($service_order, ['method' => 'PATCH','route' => ['service_orders.update', $service_order->id]]) !!}
    @include('service_orders.form')
    {!! Form::close() !!}


@endsection