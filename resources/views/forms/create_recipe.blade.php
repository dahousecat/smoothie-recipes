<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
        {!! Form::text('name', null, ['placeholder' => '', 'class' => 'form-control']) !!}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Description</label>

    <div class="col-md-6">
        {!! Form::text('description', null, ['placeholder' => '', 'class' => 'form-control']) !!}

        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Image</label>

    <div class="col-md-6">
        {!! Form::text('image', null, ['placeholder' => '', 'class' => 'form-control']) !!}

        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="recipe-ingredient-template hidden">
    {!! Form::text('amount_x', 1, ['class' => 'form-control amount']) !!}
    {!! Form::select('unit_x', $units, null, ['class' => 'form-control unit']) !!}
    {!! Form::text('ingredient_id_x', null, ['class' => 'form-control id hidden']) !!}
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        <input type="submit" name="btnUrl" class="btn btn-primary" value="Save" />
    </div>
</div>
