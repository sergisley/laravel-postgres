@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Proposta</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('proposals.create') }}"> Cadastrar Proposta </a>
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
            <th>Ordem de Serviço</th>
            <th>Advogado</th>
            <th>Valor</th>
            <th>Aceitação</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($proposals as $proposal)
            <tr>
                <td>{{ $proposal->id }}</td>
                <td>{{ $proposal->service_order_id}}</td>
                <td>{{ $proposal->lawyer_id}}</td>
                <td>{{ $proposal->value}}</td>
                <td>{{ $proposal->acceptance}}</td>
                <td>
                    <a class="btn btn-outline-info btn-sm" href="{{ route('companies.show',$proposal->id) }}">Exibir</a>
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('companies.edit',$proposal->id) }}">Editar</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['companies.destroy', $proposal->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>


    {!! $proposals->links() !!}
@endsection

