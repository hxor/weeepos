<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
    {!! Form::label('code', 'Code') !!}
    {!! Form::text('code', $code, ['class' => 'form-control', 'required' => 'required', 'readonly']) !!}
    <small class="text-danger">{{ $errors->first('code') }}</small>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nama Cutomers') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    {!! Form::label('phone', 'Telepon') !!}
    {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('phone') }}</small>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    {!! Form::label('address', 'Alamat') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('address') }}</small>
</div>

<div class="form-group text-right m-b-0">
    <button class="btn btn-primary waves-effect waves-light" type="submit">
        Submit
    </button>
    <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
        Cancel
    </button>
</div>