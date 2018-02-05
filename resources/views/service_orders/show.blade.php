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
            @if( $service_order->status=='d' && empty($lawyer_id))
                <a class="btn btn-warning" href="{{ route('service_orders.close',[$service_order->id]) }}"> Fechar Ordem de Serviço? </a>
            @endif
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
                        @if( empty($lawyer_id) )
                        <th>Advogado</th>
                        @endif
                        <th>Valor</th>
                        <th>Aceitação</th>
                        @if( empty($lawyer_id) )
                        <th width="280px">Ação</th>
                        @endif
                    </tr>
                    @foreach ($proposals as $proposal)
                        <tr>
                            <td>{{ $proposal->id }}</td>
                            @if( empty($lawyer_id) )
                            <td>{{ $lawyers[$proposal->lawyer_id]->name}}</td>
                            @endif
                            <td>{{ $proposal->value}}</td>
                            <td>{{ $status_proposals[$proposal->acceptance] }}</td>
                            @if( empty($lawyer_id) )
                            <td>
                                <a class="btn btn-outline-info btn-sm" href="{{ route('proposals.show',$proposal->id) }}">Exibir</a>
                                <a class="btn btn-outline-success btn-sm" href="{{ route('proposals.accept',$proposal->id) }}">Aceitar</a>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </table>

            </div>
            {!! $proposals->links() !!}

        </div>

@endsection
