<div class="row">

    {!! Form::hidden('company_id', $company_id) !!}
    {!! Form::hidden('status', 'c') !!}

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Título:</strong>
            {!! Form::text('title', null, array('placeholder' => 'Título','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descrição:</strong>
            {!! Form::textarea('description', null, array('placeholder' => 'Descrição','class' => 'form-control')) !!}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>
{{--echo Form::select('size', array('L' => 'Large', 'S' => 'Small'), 'S');--}}