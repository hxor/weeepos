

{!! Form::hidden('customer_id',$customer->id) !!}

<div class="form-group{{ $errors->has('point_in') ? ' has-error' : '' }}">
    {!! Form::label('point_in', 'Tambah Point') !!}
    {!! Form::number('point_in', 0, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('point_in') }}</small>
</div>

<div class="form-group{{ $errors->has('point_out') ? ' has-error' : '' }}">
    {!! Form::label('point_out', 'Tukar Point') !!}
    {!! Form::number('point_out', 0, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('point_out') }}</small>
</div>

<div class="form-group text-right m-b-0">
    <button class="btn btn-primary waves-effect waves-light" type="submit">
        Submit
    </button>
    <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
        Cancel
    </button>
</div>