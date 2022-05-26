<div class="row">
    <div class="primary_input col-md-6">
        {{Form::label('name', __('finance.Income Type'), ['class' => 'required'])}}
        {{Form::text('name', null, ['required' => '', 'class' => 'form-control', 'placeholder' => __('finance.Income Type')])}}
    </div>

    <div class="primary_input col-md-6">
        {{Form::label('description', __('finance.Description'))}}
        {{Form::text('description', null, ['class' => 'form-control', 'placeholder' => __('finance.Description')])}}
    </div>
</div>
