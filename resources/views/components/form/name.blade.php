
<?php
    $inputAttribs = [];
    $class = 'form-control';
    if ($errors->has($name)) { $class .= ' form-control-danger'; }
    $inputAttribs['class'] = $class;
    if (!empty($attributes['placeholder'])) { $inputAttribs['placeholder'] = $attributes['placeholder']; }
?>

<div class="form-group row {{ ($errors->has($name . '_last') || $errors->has($name . '_first')) ? 'has-danger' : '' }}">
    @include('digilasuite::components.form._label')
    <div class="{{ $attributes['colInput'] or 'col-md-10' }}">
        <div class="row">
            <div class="input-group col-md-6">
                <div class="input-group-addon">姓</div>
                {{ Form::text($name . '_last', $value, $inputAttribs) }}
            </div>
            <div class="input-group col-md-6">
                <div class="input-group-addon">名</div>
                {{ Form::text($name . '_first', $value, $inputAttribs) }}
            </div>
        </div>
      @foreach ($errors->get($name) as $message)
      <div class="form-control-feedback">{{ $message }}</div>
      @endforeach
      @if(!empty($attributes['description']))
      <small class="form-text text-muted">{{ $attributes['description'] }}</small>
      @endif
    </div>
</div>