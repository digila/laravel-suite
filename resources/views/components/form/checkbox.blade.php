
<?php
    $inputAttribs = [];
    $options = [];
    $class = 'form-control';
    if ($errors->has($name)) { $class .= ' form-control-danger'; }
    $inputAttribs['class'] = $class;
    if (!empty($attributes['placeholder'])) { $inputAttribs['placeholder'] = $attributes['placeholder']; }
    if (!empty($attributes['options'])) { $options = $attributes['options']; }
?>

<div class="form-group row {{ ($errors->has($name)) ? 'has-danger' : '' }}">
    @include('digilasuite::components.form._label')
    <div class="{{ $attributes['colInput'] or 'col-md-10' }}">
      <label>
      {{ Form::checkbox($name, $value, $inputAttribs) }}
      {{ $label }}
      </label>
      @foreach ($errors->get($name) as $message)
      <div class="form-control-feedback">{{ $message }}</div>
      @endforeach
      @if(!empty($attributes['description']))
      <small class="form-text text-muted">{{ $attributes['description'] }}</small>
      @endif
    </div>
</div>