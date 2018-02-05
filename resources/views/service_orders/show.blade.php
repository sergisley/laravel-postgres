@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Exibir Ordem de Serviço</h2>
            </div>
            <div class="float-right">
                @if( !empty($lawyer_id) )
                <a class="btn btn-primary" href="{{ route('lawyers.show',[$lawyer_id]) }}"> Voltar</a>
                @else
                <a class="btn btn-primary" href="{{ route('companies.show',[$company->id]) }}"> Voltar</a>
                @endif
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Empresa:</strong>
                {{ $company->name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Título:</strong>
                {{ $service_order->title}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $status_os[$service_order->status]}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {{ $service_order->description}}
            </div>
        </div>


            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Propostas</h2>
                </div>
                @if( !empty($lawyer_id) )
                <div class="float-right">
                    @if($service_order->status=='c')
                        <a class="btn btn-success" href="{{ route('proposals.create',[$service_order->id,$lawyer_id]) }}"> Cadastrar Proposta </a>
                    @else
                        <a class="btn btn-secondary disabled" href="#"> Cadastrar Proposta </a>
                    @endif
                </div>
                @endif
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="col-lg-12">
                <table class="table table-dark table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Advogado</th>
                        <th>Valor</th>
                        <th>Aceitação</th>
                        <th width="280px">Ação</th>
                    </tr>
                    @foreach ($proposals as $proposal)
                        <tr>
                            <td>{{ $proposal->id }}</td>
                            @if( empty($lawyer_id) )
                            <td>{{ $proposal->lawyer_id}}</td>
                            @endif
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

            </div>
            {!! $proposals->links() !!}

        </div>

@endsection
