@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Cadastrar Empresa</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('companies.index') }}"> Voltar</a>
            </div>
        </div>
    </div>


    @if (count($errors) < 0)
        <div class="alert alert-danger">
            <strong>Atenção!</strong> Há problemas em seu cadastro.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::open(array('route' => 'companies.store','method'=>'POST')) !!}
    @include('companies.form')
    {!! Form::close() !!}


@endsection