<div class="row">

    {!! Form::hidden('service_order_id', $service_order_id) !!}

    {!! Form::hidden('lawyer_id', $lawyer_id) !!}

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Valor:</strong>
            {!! Form::text('value', null, array('placeholder' => 'Valor','class' => 'form-control')) !!}
        </div>
    </div>
    @if( !empty($company_action) )
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Aceitação:</strong>
            {!! Form::text('acceptance', null, array('placeholder' => 'Aceitação','class' => 'form-control')) !!}
        </div>
    </div>
    @else
        {!! Form::hidden('acceptance', 'n') !!}
    @endif
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>
