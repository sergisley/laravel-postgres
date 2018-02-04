@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Advogado</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('lawyers.create') }}"> Cadastrar Advogado </a>
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
            <th>CPF</th>
            <th>Telefone</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($lawyers as $lawyer)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $lawyer->name}}</td>
                <td>{{ $lawyer->cpf}}</td>
                <td>{{ $lawyer->phone}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('lawyers.show',$lawyer->id) }}">Exibir</a>
                    <a class="btn btn-primary" href="{{ route('lawyers.edit',$lawyer->id) }}">Editar</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['lawyers.destroy', $lawyer->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>


    {!! $lawyers->links() !!}
@endsection