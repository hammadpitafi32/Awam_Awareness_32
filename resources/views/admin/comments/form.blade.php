<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    {!! Form::label('comment', 'Comment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('comment', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('post_id') ? 'has-error' : ''}}">
    {!! Form::label('post_id', 'Post Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('post_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('post_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
