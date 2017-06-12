
{!! Form::open(['route' => 'ingredient.store', 'class' => 'form-horizontal create-ingredient-form']) !!}

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

<div class="section-title">
    Units
</div>

<hr>

<div class="form-group">
    <label class="col-md-4 control-label">Quantity</label>

    <div class="col-md-6">
    {{ Form::checkbox('unit_quantity') }}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Volume</label>
    <div class="col-md-6">
        {{ Form::checkbox('unit_volume') }}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Weight</label>
    <div class="col-md-6">
        {{ Form::checkbox('unit_weight') }}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Length</label>
    <div class="col-md-6">
        {{ Form::checkbox('unit_length') }}
    </div>
</div>


<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        <input type="submit" name="btnUrl" class="btn btn-primary" value="Save" />
    </div>
</div>

{!! Form::close() !!}
