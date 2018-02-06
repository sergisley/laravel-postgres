<div class="row">

    {!! Form::hidden('service_order_id', $service_order_id) !!}

    {!! Form::hidden('lawyer_id', $lawyer_id) !!}

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Valor:</strong>
            {!! Form::text('value', null, array('placeholder' => 'Valor','class' => 'form-control','data-mask'=>"000.000.000,00",'data-mask-reverse'=>"true")) !!}
        </div>
    </div>

    {!! Form::hidden('acceptance', 'n') !!}

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>
