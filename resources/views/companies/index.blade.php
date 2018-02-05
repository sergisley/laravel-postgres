@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Empresas</h2>
                <h3>Selecione uma ou crie um nova.</h3>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('companies.create') }}"> Cadastrar Empresa </a>
                <a class="btn btn-info" href="{{ route('home') }}"> Voltar </a>
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
            <th>Nome</th>
            <th>Área de Atuação</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->area_of_activity }}</td>
                <td>
                    <a class="btn btn-outline-info btn-sm" href="{{ route('companies.show',$company->id) }}">Gerenciar</a>
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('companies.edit',$company->id) }}">Editar</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['companies.destroy', $company->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>


    {!! $companies->links() !!}
@endsection