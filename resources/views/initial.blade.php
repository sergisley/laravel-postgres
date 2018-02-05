@extends('layout')


@section('content')


        <div class="container list-group">
            <ul>
                <li class="list-group-item list-group-item-action"><a href="{{ route('lawyers.index') }}">Acessar como Advogado</a></li>
                <li class="list-group-item list-group-item-action"><a href="{{ route('companies.index') }}">Acessar como Empresa</a></li>
            </ul>
        </div>


@endsection