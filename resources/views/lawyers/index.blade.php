@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Advogados</h2>
                <h3>Selecione um ou crie um novo.</h3>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('lawyers.create') }}"> Cadastrar Advogado </a>
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
            <th>Email</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th width="280px">Ação</th>
        </tr>
        @if(!empty($lawyers))
        @foreach ($lawyers as $lawyer)
            <tr>
                <td>{{ $lawyer->id }}</td>
                <td>{{ $lawyer->name}}</td>
                <td>{{ $lawyer->email }}</td>

                <td>{{ vsprintf("%s%s%s.%s%s%s.%s%s%s-%s%s", str_split($lawyer->cpf))}}</td>

                <td>{{ vsprintf( (strlen($lawyer->phone)==10?"(%s%s) %s%s%s%s-%s%s%s%s":"(%s%s) %s%s%s%s-%s%s%s%s%s"), str_split($lawyer->phone))}}</td>
                <td>
                    <a class="btn btn-outline-info btn-sm" href="{{ route('lawyers.show',$lawyer->id) }}">Gerenciar</a>
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('lawyers.edit',$lawyer->id) }}">Editar</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['lawyers.destroy', $lawyer->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        @endif;
    </table>


    {!! $lawyers->links() !!}
@endsection